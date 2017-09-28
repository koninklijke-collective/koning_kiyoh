<?php

namespace KoninklijkeCollective\KoningKiyoh\Command;

use KoninklijkeCollective\KoningKiyoh\Service\KiyohService;
use KoninklijkeCollective\KoningKiyoh\Utility\ConfigurationUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Command: Kiyoh
 *
 * @package KoninklijkeCollective\KoningKiyoh\Command
 */
class KiyohCommandController extends \TYPO3\CMS\Extbase\Mvc\Controller\CommandController
{
    /**
     * Syncs all reviews based on the provided company id
     *
     * @param int $companyId
     * @return bool
     */
    public function syncAllReviewsCommand($companyId)
    {
        if (ConfigurationUtility::isValid()) {
            $settings = ConfigurationUtility::getKiyohSettings();

            /** @var KiyohService $kiyohService */
            $kiyohService = GeneralUtility::makeInstance(KiyohService::class);

            $kiyohService
                ->setReviewUrl($settings['reviewUrl'])
                ->setConnectorCode($settings['connectorCode'])
                ->getReviews($companyId);
        } else {
            $this->outputLine('Invalid configuration, see Extension Manager for details');
            return false;
        }
        return true;
    }
}
