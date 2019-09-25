<?php

namespace Jp\YahooApis\SS\V201909\CampaignExport;

class addJobResponse
{

    /**
     * @var CampaignExportReturnValue $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\SS\V201909\Error $error
     */
    protected $error = null;

    /**
     * @param CampaignExportReturnValue $rval
     * @param \Jp\YahooApis\SS\V201909\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return CampaignExportReturnValue
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param CampaignExportReturnValue $rval
     * @return \Jp\YahooApis\SS\V201909\CampaignExport\addJobResponse
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
     * @return \Jp\YahooApis\SS\V201909\CampaignExport\addJobResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
