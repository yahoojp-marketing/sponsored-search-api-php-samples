<?php

namespace Jp\YahooApis\SS\V201901\Report;

class mutateResponse
{

    /**
     * @var ReportReturnValue $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Error $error
     */
    protected $error = null;

    /**
     * @param ReportReturnValue $rval
     * @param \Jp\YahooApis\SS\V201901\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return ReportReturnValue
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param ReportReturnValue $rval
     * @return \Jp\YahooApis\SS\V201901\Report\mutateResponse
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
     * @return \Jp\YahooApis\SS\V201901\Report\mutateResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
