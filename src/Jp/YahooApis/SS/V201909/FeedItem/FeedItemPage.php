<?php

namespace Jp\YahooApis\SS\V201909\FeedItem;

class FeedItemPage extends \Jp\YahooApis\SS\V201909\Page
{

    /**
     * @var FeedItemValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return FeedItemValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param FeedItemValues[] $values
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItemPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
