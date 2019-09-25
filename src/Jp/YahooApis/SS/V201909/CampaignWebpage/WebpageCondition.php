<?php

namespace Jp\YahooApis\SS\V201909\CampaignWebpage;

class WebpageCondition
{

    /**
     * @var WebpageConditionType $type
     */
    protected $type = null;

    /**
     * @var string $argument
     */
    protected $argument = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return WebpageConditionType
     */
    public function getType()
    {
      return $this->type;
    }

    /**
     * @param WebpageConditionType $type
     * @return \Jp\YahooApis\SS\V201909\CampaignWebpage\WebpageCondition
     */
    public function setType($type)
    {
      $this->type = $type;
      return $this;
    }

    /**
     * @return string
     */
    public function getArgument()
    {
      return $this->argument;
    }

    /**
     * @param string $argument
     * @return \Jp\YahooApis\SS\V201909\CampaignWebpage\WebpageCondition
     */
    public function setArgument($argument)
    {
      $this->argument = $argument;
      return $this;
    }

}
