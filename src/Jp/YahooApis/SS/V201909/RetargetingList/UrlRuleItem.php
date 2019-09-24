<?php

namespace Jp\YahooApis\SS\V201909\RetargetingList;

class UrlRuleItem extends RuleItem
{

    /**
     * @var UrlRuleKey $urlKey
     */
    protected $urlKey = null;

    /**
     * @param RuleType $ruleType
     * @param RuleOperator $operator
     * @param string $value
     * @param UrlRuleKey $urlKey
     */
    public function __construct($ruleType, $operator, $value, $urlKey)
    {
      parent::__construct($ruleType, $operator, $value);
      $this->urlKey = $urlKey;
    }

    /**
     * @return UrlRuleKey
     */
    public function getUrlKey()
    {
      return $this->urlKey;
    }

    /**
     * @param UrlRuleKey $urlKey
     * @return \Jp\YahooApis\SS\V201909\RetargetingList\UrlRuleItem
     */
    public function setUrlKey($urlKey)
    {
      $this->urlKey = $urlKey;
      return $this;
    }

}
