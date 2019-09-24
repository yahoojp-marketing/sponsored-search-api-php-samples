<?php

namespace Jp\YahooApis\SS\V201909\SharedCriterion;

class SharedCriterion
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var int $sharedListId
     */
    protected $sharedListId = null;

    /**
     * @var int $criterionId
     */
    protected $criterionId = null;

    /**
     * @var string $text
     */
    protected $text = null;

    /**
     * @var KeywordMatchType $matchType
     */
    protected $matchType = null;

    /**
     * @var SharedCriterionUse $criterionUseType
     */
    protected $criterionUseType = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getAccountId()
    {
      return $this->accountId;
    }

    /**
     * @param int $accountId
     * @return \Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterion
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return int
     */
    public function getSharedListId()
    {
      return $this->sharedListId;
    }

    /**
     * @param int $sharedListId
     * @return \Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterion
     */
    public function setSharedListId($sharedListId)
    {
      $this->sharedListId = $sharedListId;
      return $this;
    }

    /**
     * @return int
     */
    public function getCriterionId()
    {
      return $this->criterionId;
    }

    /**
     * @param int $criterionId
     * @return \Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterion
     */
    public function setCriterionId($criterionId)
    {
      $this->criterionId = $criterionId;
      return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
      return $this->text;
    }

    /**
     * @param string $text
     * @return \Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterion
     */
    public function setText($text)
    {
      $this->text = $text;
      return $this;
    }

    /**
     * @return KeywordMatchType
     */
    public function getMatchType()
    {
      return $this->matchType;
    }

    /**
     * @param KeywordMatchType $matchType
     * @return \Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterion
     */
    public function setMatchType($matchType)
    {
      $this->matchType = $matchType;
      return $this;
    }

    /**
     * @return SharedCriterionUse
     */
    public function getCriterionUseType()
    {
      return $this->criterionUseType;
    }

    /**
     * @param SharedCriterionUse $criterionUseType
     * @return \Jp\YahooApis\SS\V201909\SharedCriterion\SharedCriterion
     */
    public function setCriterionUseType($criterionUseType)
    {
      $this->criterionUseType = $criterionUseType;
      return $this;
    }

}
