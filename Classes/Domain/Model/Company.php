<?php

namespace KoninklijkeCollective\KoningKiyoh\Domain\Model;

/**
 * Model: Company
 *
 * @package KoninklijkeCollective\KoningKiyoh\Domain\Model
 */
class Company extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var string
     */
    protected $remoteIdentifier;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<Review>
     */
    protected $reviews;

    /**
     * @return string
     */
    public function getRemoteIdentifier()
    {
        return $this->remoteIdentifier;
    }

    /**
     * @param string $remoteIdentifier
     * @return void
     */
    public function setRemoteIdentifier($remoteIdentifier)
    {
        $this->remoteIdentifier = $remoteIdentifier;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return void
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $reviews
     * @return void
     */
    public function setReviews($reviews)
    {
        $this->reviews = $reviews;
    }
}
