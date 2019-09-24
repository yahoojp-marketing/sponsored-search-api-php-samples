<?php

namespace Jp\YahooApis\SS\V201909\CampaignWebpage;

class mutateResponse
{

    /**
     * @var CampaignWebpageReturnValue $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\SS\V201909\Error $error
     */
    protected $error = null;

    /**
     * @param CampaignWebpageReturnValue $rval
     * @param \Jp\YahooApis\SS\V201909\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return CampaignWebpageReturnValue
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param CampaignWebpageReturnValue $rval
     * @return \Jp\YahooApis\SS\V201909\CampaignWebpage\mutateResponse
     */
    public function setRval($rval)
    {
      $this->rval = $rval;
      return $this;
    }

    /**
     * @return \Jp\YahooApis\SS\V201909\Error
     */
    public function getError()
    {
      return $this->error;
    }

    /**
     * @param \Jp\YahooApis\SS\V201909\Error $error
     * @return \Jp\YahooApis\SS\V201909\CampaignWebpage\mutateResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
