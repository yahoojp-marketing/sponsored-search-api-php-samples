<?php

namespace Jp\YahooApis\SS\V201901\RetargetingList;

class CustomKeyRuleItem extends RuleItem
{

    /**
     * @var string $textKey
     */
    protected $textKey = null;

    /**
     * @param RuleType $ruleType
     * @param RuleOperator $operator
     * @param string $value
     * @param string $textKey
     */
    public function __construct($ruleType, $operator, $value, $textKey)
    {
      parent::__construct($ruleType, $operator, $value);
      $this->textKey = $textKey;
    }

    /**
     * @return string
     */
    public function getTextKey()
    {
      return $this->textKey;
    }

    /**
     * @param string $textKey
     * @return \Jp\YahooApis\SS\V201901\RetargetingList\CustomKeyRuleItem
     */
    public function setTextKey($textKey)
    {
      $this->textKey = $textKey;
      return $this;
    }

}
