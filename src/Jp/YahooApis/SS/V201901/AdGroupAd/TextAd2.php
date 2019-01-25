<?php

namespace Jp\YahooApis\SS\V201901\AdGroupAd;

class TextAd2 extends Ad
{

    /**
     * @var string $description2
     */
    protected $description2 = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return string
     */
    public function getDescription2()
    {
      return $this->description2;
    }

    /**
     * @param string $description2
     * @return \Jp\YahooApis\SS\V201901\AdGroupAd\TextAd2
     */
    public function setDescription2($description2)
    {
      $this->description2 = $description2;
      return $this;
    }

}
