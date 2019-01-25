<?php

namespace Jp\YahooApis\SS\V201901\CampaignWebpage;

class getResponse
{

    /**
     * @var CampaignWebpagePage $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Error $error
     */
    protected $error = null;

    /**
     * @param CampaignWebpagePage $rval
     * @param \Jp\YahooApis\SS\V201901\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return CampaignWebpagePage
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param CampaignWebpagePage $rval
     * @return \Jp\YahooApis\SS\V201901\CampaignWebpage\getResponse
     */
    public function setRval($rval)
    {
      $this->rval = $rval;
      return $this;
    }

    /**
     * @return \Jp\YahooApis\SS\V201901\Error
     */
    public function getError()
    {
      return $this->error;
    }

    /**
     * @param \Jp\YahooApis\SS\V201901\Error $error
     * @return \Jp\YahooApis\SS\V201901\CampaignWebpage\getResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
