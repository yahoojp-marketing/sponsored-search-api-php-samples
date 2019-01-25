<?php

namespace Jp\YahooApis\SS\V201901\AdGroupBidMultiplier;

class mutateResponse
{

    /**
     * @var AdGroupBidMultiplierReturnValue $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Error $error
     */
    protected $error = null;

    /**
     * @param AdGroupBidMultiplierReturnValue $rval
     * @param \Jp\YahooApis\SS\V201901\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return AdGroupBidMultiplierReturnValue
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param AdGroupBidMultiplierReturnValue $rval
     * @return \Jp\YahooApis\SS\V201901\AdGroupBidMultiplier\mutateResponse
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupBidMultiplier\mutateResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
