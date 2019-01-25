<?php

namespace Jp\YahooApis\SS\V201901\TargetingIdea;

class KeywordAttribute extends Attribute
{

    /**
     * @var ProposalKeyword $value
     */
    protected $value = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return ProposalKeyword
     */
    public function getValue()
    {
      return $this->value;
    }

    /**
     * @param ProposalKeyword $value
     * @return \Jp\YahooApis\SS\V201901\TargetingIdea\KeywordAttribute
     */
    public function setValue($value)
    {
      $this->value = $value;
      return $this;
    }

}
