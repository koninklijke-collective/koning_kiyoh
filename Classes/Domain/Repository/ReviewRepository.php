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

    /**
     * @param array $uidList
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findByUidList(array $uidList)
    {
        $query = $this->createQuery();
        return $query->matching(
            $query->logicalAnd(
                $query->in('uid', $uidList)
            )
        )->execute();
    }
}
