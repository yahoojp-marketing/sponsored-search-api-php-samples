<?php

namespace Jp\YahooApis\SS\V201901\CampaignSharedSet;

class mutateResponse
{

    /**
     * @var CampaignSharedSetReturnValue $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Error $error
     */
    protected $error = null;

    /**
     * @param CampaignSharedSetReturnValue $rval
     * @param \Jp\YahooApis\SS\V201901\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return CampaignSharedSetReturnValue
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param CampaignSharedSetReturnValue $rval
     * @return \Jp\YahooApis\SS\V201901\CampaignSharedSet\mutateResponse
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
     * @return \Jp\YahooApis\SS\V201901\CampaignSharedSet\mutateResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
