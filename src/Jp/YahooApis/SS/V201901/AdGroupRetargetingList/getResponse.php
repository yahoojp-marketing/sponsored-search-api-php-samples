<?php

namespace Jp\YahooApis\SS\V201901\AdGroupRetargetingList;

class getResponse
{

    /**
     * @var AdGroupRetargetingListPage $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Error $error
     */
    protected $error = null;

    /**
     * @param AdGroupRetargetingListPage $rval
     * @param \Jp\YahooApis\SS\V201901\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return AdGroupRetargetingListPage
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param AdGroupRetargetingListPage $rval
     * @return \Jp\YahooApis\SS\V201901\AdGroupRetargetingList\getResponse
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupRetargetingList\getResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
