<?php

namespace Jp\YahooApis\SS\V201909\PageFeedItem;

class PageFeedItemPage extends \Jp\YahooApis\SS\V201909\Page
{

    /**
     * @var PageFeedItemReturnValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return PageFeedItemReturnValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param PageFeedItemReturnValues[] $values
     * @return \Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
