<?php

namespace Jp\YahooApis\SS\V201909\TargetingIdea;

class RelatedToUrlSearchParameter extends SearchParameter
{

    /**
     * @var string $url
     */
    protected $url = null;

    /**
     * @param SearchParameterUse $searchParameterUse
     * @param string $url
     */
    public function __construct($searchParameterUse, $url)
    {
      parent::__construct($searchParameterUse);
      $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
      return $this->url;
    }

    /**
     * @param string $url
     * @return \Jp\YahooApis\SS\V201909\TargetingIdea\RelatedToUrlSearchParameter
     */
    public function setUrl($url)
    {
      $this->url = $url;
      return $this;
    }

}
