<?php

namespace KoninklijkeCollective\KoningKiyoh\Domain\Model;

/**
 * Model: Review
 *
 * @package KoninklijkeCollective\KoningKiyoh\Domain\Model
 */
class Review extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var \DateTime
     */
    protected $reviewDate;

    /**
     * @var int
     */
    protected $score;

    /**
     * @var bool
     */
    protected $recommendation;

    /**
     * @var string
     */
    protected $positiveComment;

    /**
     * @var string
     */
    protected $negativeComment;

    /**
     * @var string
     */
    protected $reaction;

    /**
     * @var string
     */
    protected $image;

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @lazy
     */
    protected $fallbackImage;

    /**
     * @var int
     */
    protected $remoteIdentifier;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return \DateTime
     */
    public function getReviewDate()
    {
        return $this->reviewDate;
    }

    /**
     * @param \DateTime $reviewDate
     * @return void
     */
    public function setReviewDate($reviewDate)
    {
        $this->reviewDate = $reviewDate;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param int $score
     * @return void
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return bool
     */
    public function isRecommendation()
    {
        return $this->recommendation;
    }

    /**
     * @param bool $recommendation
     * @return void
     */
    public function setRecommendation($recommendation)
    {
        $this->recommendation = $recommendation;
    }

    /**
     * @return string
     */
    public function getPositiveComment()
    {
        return $this->positiveComment;
    }

    /**
     * @param string $positiveComment
     * @return void
     */
    public function setPositiveComment($positiveComment)
    {
        $this->positiveComment = $positiveComment;
    }

    /**
     * @return string
     */
    public function getNegativeComment()
    {
        return $this->negativeComment;
    }

    /**
     * @param string $negativeComment
     * @return void
     */
    public function setNegativeComment($negativeComment)
    {
        $this->negativeComment = $negativeComment;
    }

    /**
     * @return string
     */
    public function getReaction()
    {
        return $this->reaction;
    }

    /**
     * @param string $reaction
     * @return void
     */
    public function setReaction($reaction)
    {
        $this->reaction = $reaction;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return void
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getFallbackImage()
    {
        return $this->fallbackImage;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $fallbackImage
     * @return void
     */
    public function setFallbackImage($fallbackImage)
    {
        $this->fallbackImage = $fallbackImage;
    }

    /**
     * @return int
     */
    public function getRemoteIdentifier()
    {
        return $this->remoteIdentifier;
    }

    /**
     * @param int $remoteIdentifier
     * @return void
     */
    public function setRemoteIdentifier($remoteIdentifier)
    {
        $this->remoteIdentifier = $remoteIdentifier;
    }
}
