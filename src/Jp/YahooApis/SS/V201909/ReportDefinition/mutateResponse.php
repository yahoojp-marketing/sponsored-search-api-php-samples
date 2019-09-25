<?php

namespace Jp\YahooApis\SS\V201909\ReportDefinition;

class mutateResponse
{

    /**
     * @var ReportDefinitionReturnValue $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\SS\V201909\Error $error
     */
    protected $error = null;

    /**
     * @param ReportDefinitionReturnValue $rval
     * @param \Jp\YahooApis\SS\V201909\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return ReportDefinitionReturnValue
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param ReportDefinitionReturnValue $rval
     * @return \Jp\YahooApis\SS\V201909\ReportDefinition\mutateResponse
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
     * @return \Jp\YahooApis\SS\V201909\ReportDefinition\mutateResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
