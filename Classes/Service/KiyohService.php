<?php

namespace KoninklijkeCollective\KoningKiyoh\Service;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Service: Kiyoh
 *
 * @package KoninklijkeCollective\KoningKiyoh\Service
 */
class KiyohService
{
    /**
     * @var string
     */
    protected $reviewUrl;

    /**
     * @var string
     */
    protected $connectorCode;

    /**
     * @param string $reviewUrl
     * @return KiyohService
     */
    public function setReviewUrl($reviewUrl)
    {
        $this->reviewUrl = $reviewUrl;
        return $this;
    }

    /**
     * @param string $connectorCode
     * @return KiyohService
     */
    public function setConnectorCode($connectorCode)
    {
        $this->connectorCode = $connectorCode;
        return $this;
    }

    /**
     * @param int $companyId
     * @return void
     * @throws \Exception
     */
    public function getReviews($companyId)
    {
        $query = http_build_query([
            'connectorcode' => $this->connectorCode,
            'company_id' => $companyId,
            'reviewcount' => 'all'
        ]);

        $url = $this->reviewUrl . '?' . $query;
        $response = GeneralUtility::getUrl($url);
        if ($response !== false) {
            $this->saveResponse($response, $companyId);
        } else {
            throw new \Exception('Request to KiyOh failed, url: ' . $url);
        }
    }

    /**
     * @param string $response
     * @param int $remoteCompanyIdentifier
     * @return void
     */
    protected function saveResponse($response, $remoteCompanyIdentifier)
    {
        $xml = new \SimpleXMLElement($response);
        $localCompanyIdentifier = null;
        if (isset($xml->company)) {
            $localCompanyIdentifier = $this->saveCompany($xml->company, $remoteCompanyIdentifier);
        }

        if (isset($xml->review_list->review) && $localCompanyIdentifier !== null) {
            $reviews = [];

            foreach ($xml->review_list->review as $review) {
                if (isset($review->id)) {
                    $reviews[(int)$review->id] = $this->mapReview($review, $localCompanyIdentifier);
                }
            }

            if (!empty($reviews)) {
                $existingReviews = $this->getDatabaseConnection()->exec_SELECTgetRows(
                    'remote_identifier',
                    'tx_koningkiyoh_domain_model_review',
                    'remote_identifier IN(' . implode(',', array_keys($reviews)) . ') AND deleted = 0',
                    '',
                    '',
                    '',
                    'remote_identifier'
                );

                $savedIdentifiers = [];
                foreach ($reviews as $review) {
                    $savedIdentifiers[] = $review['remote_identifier'];
                    if (isset($existingReviews[$review['remote_identifier']])) {
                        $this->getDatabaseConnection()->exec_UPDATEquery(
                            'tx_koningkiyoh_domain_model_review',
                            'remote_identifier = ' . (int)$review['remote_identifier'],
                            $review
                        );
                    } else {
                        $this->getDatabaseConnection()->exec_INSERTquery(
                            'tx_koningkiyoh_domain_model_review',
                            array_merge($review, [
                                'crdate' => time(),
                                'tstamp' => time(),
                                'pid' => 0,
                                'cruser_id' => 0
                            ])
                        );
                    }
                }

                $this->getDatabaseConnection()->exec_DELETEquery(
                    'tx_koningkiyoh_domain_model_review',
                    'remote_identifier NOT IN(' . implode(',', $savedIdentifiers) . ')'
                );
            }
        }
    }

    /**
     * @param string $response
     * @param int $companyId
     * @return int
     */
    protected function saveCompany($response, $companyId)
    {
        $company = $this->getDatabaseConnection()->exec_SELECTgetSingleRow(
            'uid',
            'tx_koningkiyoh_domain_model_company',
            'remote_identifier = ' . (int)$companyId
        );

        $fields = [
            'crdate' => time(),
            'tstamp' => time(),
            'remote_identifier' => $companyId,
            'name' => isset($response->name) ? (string)$response->name : '',
            'url' => isset($response->url) ? (string)$response->url : '',
            'reviews' => isset($response->total_reviews) ? (int)$response->total_reviews : 0
        ];

        if ($company === false) {
            $this->getDatabaseConnection()->exec_INSERTquery(
                'tx_koningkiyoh_domain_model_company',
                array_merge($fields, [
                    'crdate' => time(),
                    'pid' => 0,
                    'cruser_id' => 1
                ])
            );
            return $this->getDatabaseConnection()->sql_insert_id();
        } else {
            $this->getDatabaseConnection()->exec_UPDATEquery(
                'tx_koningkiyoh_domain_model_company',
                'remote_identifier = ' . (int)$companyId,
                $fields
            );
            return $company['uid'];
        }
    }

    /**
     * @param \stdClass $response
     * @param int $companyId
     * @return array
     */
    protected function mapReview($response, $companyId)
    {
        $date = 0;
        if (isset($response->customer->date)) {
            $date = (new \DateTime((string)$response->customer->date))->getTimestamp();
        }

        return [
            'remote_identifier' => isset($response->id) ? (string)$response->id : 0,
            'name' => isset($response->customer->name) ? (string)$response->customer->name : '',
            'company' => $companyId,
            'review_date' => $date,
            'score' => isset($response->total_score) ? (int)$response->total_score : 0,
            'positive_comment' => isset($response->positive) ? (string)$response->positive : '',
            'negative_comment' => isset($response->negative) ? (string)$response->negative : '',
            'recommendation' => isset($response->recommendation) && (string)$response->recommendation === 'Ja' ? 1 : 0,
            'image' => isset($response->image) ? (string)$response->image : ''
        ];
    }

    /**
     * @return \TYPO3\CMS\Core\Database\DatabaseConnection
     */
    protected function getDatabaseConnection()
    {
        return $GLOBALS['TYPO3_DB'];
    }
}
