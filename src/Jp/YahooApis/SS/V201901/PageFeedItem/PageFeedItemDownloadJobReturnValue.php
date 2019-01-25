<?php

namespace Jp\YahooApis\SS\V201901\PageFeedItem;

class PageFeedItemDownloadJobReturnValue extends \Jp\YahooApis\SS\V201901\ListReturnValue
{

    /**
     * @var PageFeedItemDownloadJobValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return PageFeedItemDownloadJobValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param PageFeedItemDownloadJobValues[] $values
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemDownloadJobReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
