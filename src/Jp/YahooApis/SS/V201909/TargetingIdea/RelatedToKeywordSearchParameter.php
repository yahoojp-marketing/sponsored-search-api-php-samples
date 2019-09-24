<?php

namespace Jp\YahooApis\SS\V201909\TargetingIdea;

class RelatedToKeywordSearchParameter extends SearchParameter
{

    /**
     * @var ProposalKeyword[] $keywords
     */
    protected $keywords = null;

    /**
     * @param SearchParameterUse $searchParameterUse
     * @param ProposalKeyword[] $keywords
     */
    public function __construct($searchParameterUse, array $keywords)
    {
      parent::__construct($searchParameterUse);
      $this->keywords = $keywords;
    }

    /**
     * @return ProposalKeyword[]
     */
    public function getKeywords()
    {
      return $this->keywords;
    }

    /**
     * @param ProposalKeyword[] $keywords
     * @return \Jp\YahooApis\SS\V201909\TargetingIdea\RelatedToKeywordSearchParameter
     */
    public function setKeywords(array $keywords)
    {
      $this->keywords = $keywords;
      return $this;
    }

}
