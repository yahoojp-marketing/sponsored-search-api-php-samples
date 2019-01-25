<?php

namespace Jp\YahooApis\SS\V201901\RetargetingList;

class RuleGroup
{

    /**
     * @var RuleItem[] $ruleItems
     */
    protected $ruleItems = null;

    /**
     * @param RuleItem[] $ruleItems
     */
    public function __construct(array $ruleItems)
    {
      $this->ruleItems = $ruleItems;
    }

    /**
     * @return RuleItem[]
     */
    public function getRuleItems()
    {
      return $this->ruleItems;
    }

    /**
     * @param RuleItem[] $ruleItems
     * @return \Jp\YahooApis\SS\V201901\RetargetingList\RuleGroup
     */
    public function setRuleItems(array $ruleItems)
    {
      $this->ruleItems = $ruleItems;
      return $this;
    }

}
