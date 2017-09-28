<?php

namespace KoninklijkeCollective\KoningKiyoh\Domain\Repository;

/**
 * Repository: Review
 *
 * @package KoninklijkeCollective\KoningKiyoh\Domain\Repository
 */
class ReviewRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrders = ['reviewDate' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING];
}
