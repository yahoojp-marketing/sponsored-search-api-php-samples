<?php

namespace Jp\YahooApis\SS\V201901\AdGroupCriterion;

class getResponse
{

    /**
     * @var AdGroupCriterionPage $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Error $error
     */
    protected $error = null;

    /**
     * @param AdGroupCriterionPage $rval
     * @param \Jp\YahooApis\SS\V201901\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return AdGroupCriterionPage
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param AdGroupCriterionPage $rval
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\getResponse
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupCriterion\getResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
