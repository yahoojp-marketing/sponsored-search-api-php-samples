<?php

namespace Jp\YahooApis\SS\V201901\AdGroupFeed;

class getResponse
{

    /**
     * @var AdGroupFeedPage $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Error $error
     */
    protected $error = null;

    /**
     * @param AdGroupFeedPage $rval
     * @param \Jp\YahooApis\SS\V201901\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return AdGroupFeedPage
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param AdGroupFeedPage $rval
     * @return \Jp\YahooApis\SS\V201901\AdGroupFeed\getResponse
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
     * @return \Jp\YahooApis\SS\V201901\AdGroupFeed\getResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
