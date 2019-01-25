<?php

namespace Jp\YahooApis\SS\V201901\RetargetingList;

class Tag
{

    /**
     * @var string $snippet
     */
    protected $snippet = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getSnippet()
    {
      return $this->snippet;
    }

    /**
     * @param string $snippet
     * @return \Jp\YahooApis\SS\V201901\RetargetingList\Tag
     */
    public function setSnippet($snippet)
    {
      $this->snippet = $snippet;
      return $this;
    }

}
