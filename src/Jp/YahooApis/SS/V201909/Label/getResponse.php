<?php

namespace Jp\YahooApis\SS\V201909\Label;

class getResponse
{

    /**
     * @var LabelPage $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\SS\V201909\Error $error
     */
    protected $error = null;

    /**
     * @param LabelPage $rval
     * @param \Jp\YahooApis\SS\V201909\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return LabelPage
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param LabelPage $rval
     * @return \Jp\YahooApis\SS\V201909\Label\getResponse
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
     * @return \Jp\YahooApis\SS\V201909\Label\getResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
