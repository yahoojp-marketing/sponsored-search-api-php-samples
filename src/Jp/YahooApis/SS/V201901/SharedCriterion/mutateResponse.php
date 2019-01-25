<?php

namespace Jp\YahooApis\SS\V201901\SharedCriterion;

class mutateResponse
{

    /**
     * @var SharedCriterionReturnValue $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Error $error
     */
    protected $error = null;

    /**
     * @param SharedCriterionReturnValue $rval
     * @param \Jp\YahooApis\SS\V201901\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return SharedCriterionReturnValue
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param SharedCriterionReturnValue $rval
     * @return \Jp\YahooApis\SS\V201901\SharedCriterion\mutateResponse
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
     * @return \Jp\YahooApis\SS\V201901\SharedCriterion\mutateResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
