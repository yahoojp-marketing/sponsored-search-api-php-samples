<?php

namespace Jp\YahooApis\SS\V201909\TargetingIdea;

class ProposalKeyword
{

    /**
     * @var CriterionType $type
     */
    protected $type = null;

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
    
    }

    /**
     * @return CriterionType
     */
    public function getType()
    {
      return $this->type;
    }

    /**
     * @param CriterionType $type
     * @return \Jp\YahooApis\SS\V201909\TargetingIdea\ProposalKeyword
     */
    public function setType($type)
    {
      $this->type = $type;
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
     * @return \Jp\YahooApis\SS\V201909\TargetingIdea\ProposalKeyword
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
     * @return \Jp\YahooApis\SS\V201909\TargetingIdea\ProposalKeyword
     */
    public function setMatchType($matchType)
    {
      $this->matchType = $matchType;
      return $this;
    }

}
