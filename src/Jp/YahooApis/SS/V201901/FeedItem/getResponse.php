<?php

namespace Jp\YahooApis\SS\V201901\FeedItem;

class getResponse
{

    /**
     * @var FeedItemPage $rval
     */
    protected $rval = null;

    /**
     * @var \Jp\YahooApis\SS\V201901\Error $error
     */
    protected $error = null;

    /**
     * @param FeedItemPage $rval
     * @param \Jp\YahooApis\SS\V201901\Error $error
     */
    public function __construct($rval, $error)
    {
      $this->rval = $rval;
      $this->error = $error;
    }

    /**
     * @return FeedItemPage
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param FeedItemPage $rval
     * @return \Jp\YahooApis\SS\V201901\FeedItem\getResponse
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
     * @return \Jp\YahooApis\SS\V201901\FeedItem\getResponse
     */
    public function setError($error)
    {
      $this->error = $error;
      return $this;
    }

}
