<?php

namespace Jp\YahooApis\SS\V201909\FeedItem;

class FeedItemScheduling
{

    /**
     * @var FeedItemSchedule[] $schedules
     */
    protected $schedules = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return FeedItemSchedule[]
     */
    public function getSchedules()
    {
      return $this->schedules;
    }

    /**
     * @param FeedItemSchedule[] $schedules
     * @return \Jp\YahooApis\SS\V201909\FeedItem\FeedItemScheduling
     */
    public function setSchedules(array $schedules = null)
    {
      $this->schedules = $schedules;
      return $this;
    }

}
