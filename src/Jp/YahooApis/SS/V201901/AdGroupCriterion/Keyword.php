<?php

namespace Jp\YahooApis\SS\V201901\AdGroupCriterion;

class Keyword extends Criterion
{

    /**
     * @var string $text
     */
    protected $text = null;

    /**
     * @var KeywordMatchType $matchType
     */
    protected $matchType = null;

    
    public function __construct()
    {
      parent::__construct();
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\Keyword
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\Keyword
     */
    public function setMatchType($matchType)
    {
      $this->matchType = $matchType;
      return $this;
    }

}
