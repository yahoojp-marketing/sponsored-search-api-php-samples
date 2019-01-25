<?php

namespace Jp\YahooApis\SS\V201901\AdGroupWebpage;

class mutateResponse
{

    /**
     * @var AdGroupWebpageReturnValue $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Error $error
     */
    protected $error = null;

    /**
     * @param AdGroupWebpageReturnValue $rval
     * @param \Jp\YahooApis\SS\V201901\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return AdGroupWebpageReturnValue
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param AdGroupWebpageReturnValue $rval
     * @return \Jp\YahooApis\SS\V201901\AdGroupWebpage\mutateResponse
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupWebpage\mutateResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
