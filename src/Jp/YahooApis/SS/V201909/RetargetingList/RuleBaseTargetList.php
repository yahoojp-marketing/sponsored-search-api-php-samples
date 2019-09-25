<?php

namespace Jp\YahooApis\SS\V201909\RetargetingList;

class RuleBaseTargetList extends TargetingList
{

    /**
     * @var RuleGroup[] $rules
     */
    protected $rules = null;

    /**
     * @var IsAllVisitorRule $isAllVisitor
     */
    protected $isAllVisitor = null;

    /**
     * @var IsDateSpecificRule $isDateSpecific
     */
    protected $isDateSpecific = null;

    /**
     * @var string $startDate
     */
    protected $startDate = null;

    /**
     * @var string $endDate
     */
    protected $endDate = null;

    /**
     * @param int $accountId
     * @param TargetListType $targetListType
     * @param IsAllVisitorRule $isAllVisitor
     */
    public function __construct($accountId, $targetListType, $isAllVisitor)
    {
      parent::__construct($accountId, $targetListType);
      $this->isAllVisitor = $isAllVisitor;
    }

    /**
     * @return RuleGroup[]
     */
    public function getRules()
    {
      return $this->rules;
    }

    /**
     * @param RuleGroup[] $rules
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\RuleBaseTargetList
     */
    public function setRules(array $rules = null)
    {
      $this->rules = $rules;
      return $this;
    }

    /**
     * @return IsAllVisitorRule
     */
    public function getIsAllVisitor()
    {
      return $this->isAllVisitor;
    }

    /**
     * @param IsAllVisitorRule $isAllVisitor
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\RuleBaseTargetList
     */
    public function setIsAllVisitor($isAllVisitor)
    {
      $this->isAllVisitor = $isAllVisitor;
      return $this;
    }

    /**
     * @return IsDateSpecificRule
     */
    public function getIsDateSpecific()
    {
      return $this->isDateSpecific;
    }

    /**
     * @param IsDateSpecificRule $isDateSpecific
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\RuleBaseTargetList
     */
    public function setIsDateSpecific($isDateSpecific)
    {
      $this->isDateSpecific = $isDateSpecific;
      return $this;
    }

    /**
     * @return string
     */
    public function getStartDate()
    {
      return $this->startDate;
    }

    /**
     * @param string $startDate
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\RuleBaseTargetList
     */
    public function setStartDate($startDate)
    {
      $this->startDate = $startDate;
      return $this;
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
      return $this->endDate;
    }

    /**
     * @param string $endDate
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\RuleBaseTargetList
     */
    public function setEndDate($endDate)
    {
      $this->endDate = $endDate;
      return $this;
    }

}
