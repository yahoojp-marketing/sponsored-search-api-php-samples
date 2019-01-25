<?php

namespace Jp\YahooApis\SS\V201901\FeedItem;

class FeedItemReturnValue extends \Jp\YahooApis\SS\V201901\ListReturnValue
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
     * @return \Jp\YahooApis\SS\V201901\FeedItem\FeedItemReturnValue
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
