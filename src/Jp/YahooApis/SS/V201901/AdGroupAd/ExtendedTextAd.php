<?php

namespace Jp\YahooApis\SS\V201901\AdGroupAd;

class ExtendedTextAd extends Ad
{

    /**
     * @var string $headline2
     */
    protected $headline2 = null;

    /**
     * @var string $path1
     */
    protected $path1 = null;

    /**
     * @var string $path2
     */
    protected $path2 = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return string
     */
    public function getHeadline2()
    {
      return $this->headline2;
    }

    /**
     * @param string $headline2
     * @return \Jp\YahooApis\SS\V201901\AdGroupAd\ExtendedTextAd
     */
    public function setHeadline2($headline2)
    {
      $this->headline2 = $headline2;
      return $this;
    }

    /**
     * @return string
     */
    public function getPath1()
    {
      return $this->path1;
    }

    /**
     * @param string $path1
     * @return \Jp\YahooApis\SS\V201901\AdGroupAd\ExtendedTextAd
     */
    public function setPath1($path1)
    {
      $this->path1 = $path1;
      return $this;
    }

    /**
     * @return string
     */
    public function getPath2()
    {
      return $this->path2;
    }

    /**
     * @param string $path2
     * @return \Jp\YahooApis\SS\V201901\AdGroupAd\ExtendedTextAd
     */
    public function setPath2($path2)
    {
      $this->path2 = $path2;
      return $this;
    }

}
