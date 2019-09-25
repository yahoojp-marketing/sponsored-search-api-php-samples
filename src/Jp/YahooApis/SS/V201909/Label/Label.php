<?php

namespace Jp\YahooApis\SS\V201909\Label;

class Label
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var int $labelId
     */
    protected $labelId = null;

    /**
     * @var string $labelName
     */
    protected $labelName = null;

    /**
     * @var string $description
     */
    protected $description = null;

    /**
     * @var string $color
     */
    protected $color = null;

    /**
     * @var int $labeledCampaign
     */
    protected $labeledCampaign = null;

    /**
     * @var int $labeledAdGroup
     */
    protected $labeledAdGroup = null;

    /**
     * @var int $labeledAdGroupAd
     */
    protected $labeledAdGroupAd = null;

    /**
     * @var int $labeledAdGroupCriterion
     */
    protected $labeledAdGroupCriterion = null;

    
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
     * @return \Jp\YahooApis\SS\V201909\Label\Label
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return int
     */
    public function getLabelId()
    {
      return $this->labelId;
    }

    /**
     * @param int $labelId
     * @return \Jp\YahooApis\SS\V201909\Label\Label
     */
    public function setLabelId($labelId)
    {
      $this->labelId = $labelId;
      return $this;
    }

    /**
     * @return string
     */
    public function getLabelName()
    {
      return $this->labelName;
    }

    /**
     * @param string $labelName
     * @return \Jp\YahooApis\SS\V201909\Label\Label
     */
    public function setLabelName($labelName)
    {
      $this->labelName = $labelName;
      return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
      return $this->description;
    }

    /**
     * @param string $description
     * @return \Jp\YahooApis\SS\V201909\Label\Label
     */
    public function setDescription($description)
    {
      $this->description = $description;
      return $this;
    }

    /**
     * @return string
     */
    public function getColor()
    {
      return $this->color;
    }

    /**
     * @param string $color
     * @return \Jp\YahooApis\SS\V201909\Label\Label
     */
    public function setColor($color)
    {
      $this->color = $color;
      return $this;
    }

    /**
     * @return int
     */
    public function getLabeledCampaign()
    {
      return $this->labeledCampaign;
    }

    /**
     * @param int $labeledCampaign
     * @return \Jp\YahooApis\SS\V201909\Label\Label
     */
    public function setLabeledCampaign($labeledCampaign)
    {
      $this->labeledCampaign = $labeledCampaign;
      return $this;
    }

    /**
     * @return int
     */
    public function getLabeledAdGroup()
    {
      return $this->labeledAdGroup;
    }

    /**
     * @param int $labeledAdGroup
     * @return \Jp\YahooApis\SS\V201909\Label\Label
     */
    public function setLabeledAdGroup($labeledAdGroup)
    {
      $this->labeledAdGroup = $labeledAdGroup;
      return $this;
    }

    /**
     * @return int
     */
    public function getLabeledAdGroupAd()
    {
      return $this->labeledAdGroupAd;
    }

    /**
     * @param int $labeledAdGroupAd
     * @return \Jp\YahooApis\SS\V201909\Label\Label
     */
    public function setLabeledAdGroupAd($labeledAdGroupAd)
    {
      $this->labeledAdGroupAd = $labeledAdGroupAd;
      return $this;
    }

    /**
     * @return int
     */
    public function getLabeledAdGroupCriterion()
    {
      return $this->labeledAdGroupCriterion;
    }

    /**
     * @param int $labeledAdGroupCriterion
     * @return \Jp\YahooApis\SS\V201909\Label\Label
     */
    public function setLabeledAdGroupCriterion($labeledAdGroupCriterion)
    {
      $this->labeledAdGroupCriterion = $labeledAdGroupCriterion;
      return $this;
    }

}
