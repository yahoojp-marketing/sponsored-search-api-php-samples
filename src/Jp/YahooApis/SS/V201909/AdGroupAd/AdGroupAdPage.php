<?php

namespace Jp\YahooApis\SS\V201909\AdGroupAd;

class AdGroupAdPage extends \Jp\YahooApis\SS\V201909\Page
{

    /**
     * @var AdGroupAdValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return AdGroupAdValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param AdGroupAdValues[] $values
     * @return \Jp\YahooApis\SS\V201909\AdGroupAd\AdGroupAdPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
