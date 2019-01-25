<?php

namespace Jp\YahooApis\SS\V201901\AccountTrackingUrl;

class mutateResponse
{

    /**
     * @var AccountTrackingUrlReturnValue $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Error $error
     */
    protected $error = null;

    /**
     * @param AccountTrackingUrlReturnValue $rval
     * @param \Jp\YahooApis\SS\V201901\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return AccountTrackingUrlReturnValue
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param AccountTrackingUrlReturnValue $rval
     * @return \Jp\YahooApis\SS\V201901\AccountTrackingUrl\mutateResponse
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
     * @return \Jp\YahooApis\SS\V201901\AccountTrackingUrl\mutateResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
