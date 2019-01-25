<?php

namespace Jp\YahooApis\SS\V201901\AdGroupWebpage;

class Webpage
{

    /**
     * @var int $targetId
     */
    protected $targetId = null;

    /**
     * @var int $targetTrackId
     */
    protected $targetTrackId = null;

    /**
     * @var WebpageParameter $parameter
     */
    protected $parameter = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getTargetId()
    {
      return $this->targetId;
    }

    /**
     * @param int $targetId
     * @return \Jp\YahooApis\SS\V201901\AdGroupWebpage\Webpage
     */
    public function setTargetId($targetId)
    {
      $this->targetId = $targetId;
      return $this;
    }

    /**
     * @return int
     */
    public function getTargetTrackId()
    {
      return $this->targetTrackId;
    }

    /**
     * @param int $targetTrackId
     * @return \Jp\YahooApis\SS\V201901\AdGroupWebpage\Webpage
     */
    public function setTargetTrackId($targetTrackId)
    {
      $this->targetTrackId = $targetTrackId;
      return $this;
    }

    /**
     * @return WebpageParameter
     */
    public function getParameter()
    {
      return $this->parameter;
    }

    /**
     * @param WebpageParameter $parameter
     * @return \Jp\YahooApis\SS\V201901\AdGroupWebpage\Webpage
     */
    public function setParameter($parameter)
    {
      $this->parameter = $parameter;
      return $this;
    }

}
