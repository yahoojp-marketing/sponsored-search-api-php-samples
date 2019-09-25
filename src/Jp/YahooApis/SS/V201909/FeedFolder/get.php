<?php

namespace Jp\YahooApis\SS\V201909\FeedFolder;

class get
{

    /**
     * @var FeedFolderSelector $selector
     */
    protected $selector = null;

    /**
     * @param FeedFolderSelector $selector
     */
    public function __construct($selector)
    {
      $this->selector = $selector;
    }

    /**
     * @return FeedFolderSelector
     */
    public function getSelector()
    {
      return $this->selector;
    }

    /**
     * @param FeedFolderSelector $selector
     * @return \Jp\YahooApis\SS\V201909\FeedFolder\get
     */
    public function setSelector($selector)
    {
      $this->selector = $selector;
      return $this;
    }

}
