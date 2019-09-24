<?php

namespace Jp\YahooApis\SS\V201909\CampaignCriterion;

class getResponse
{

    /**
     * @var CampaignCriterionPage $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\SS\V201909\Error $error
     */
    protected $error = null;

    /**
     * @param CampaignCriterionPage $rval
     * @param \Jp\YahooApis\SS\V201909\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return CampaignCriterionPage
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param CampaignCriterionPage $rval
     * @return \Jp\YahooApis\SS\V201909\CampaignCriterion\getResponse
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
     * @return \Jp\YahooApis\SS\V201909\CampaignCriterion\getResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
