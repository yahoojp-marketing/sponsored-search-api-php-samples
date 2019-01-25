<?php

namespace Jp\YahooApis\SS\V201901\RetargetingList;

class mutateResponse
{

    /**
     * @var RetargetingListReturnValue $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Error $error
     */
    protected $error = null;

    /**
     * @param RetargetingListReturnValue $rval
     * @param \Jp\YahooApis\SS\V201901\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return RetargetingListReturnValue
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param RetargetingListReturnValue $rval
     * @return \Jp\YahooApis\SS\V201901\RetargetingList\mutateResponse
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
     * @return \Jp\YahooApis\SS\V201901\RetargetingList\mutateResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
