<?php

namespace Jp\YahooApis\SS\V201901\FeedItem;

class FeedItemSchedule
{

    /**
     * @var DayOfWeek $dayOfWeek
     */
    protected $dayOfWeek = null;

    /**
     * @var int $startHour
     */
    protected $startHour = null;

    /**
     * @var MinuteOfHour $startMinute
     */
    protected $startMinute = null;

    /**
     * @var int $endHour
     */
    protected $endHour = null;

    /**
     * @var MinuteOfHour $endMinute
     */
    protected $endMinute = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return DayOfWeek
     */
    public function getDayOfWeek()
    {
      return $this->dayOfWeek;
    }

    /**
     * @param DayOfWeek $dayOfWeek
     * @return \Jp\YahooApis\SS\V201901\FeedItem\FeedItemSchedule
     */
    public function setDayOfWeek($dayOfWeek)
    {
      $this->dayOfWeek = $dayOfWeek;
      return $this;
    }

    /**
     * @return int
     */
    public function getStartHour()
    {
      return $this->startHour;
    }

    /**
     * @param int $startHour
     * @return \Jp\YahooApis\SS\V201901\FeedItem\FeedItemSchedule
     */
    public function setStartHour($startHour)
    {
      $this->startHour = $startHour;
      return $this;
    }

    /**
     * @return MinuteOfHour
     */
    public function getStartMinute()
    {
      return $this->startMinute;
    }

    /**
     * @param MinuteOfHour $startMinute
     * @return \Jp\YahooApis\SS\V201901\FeedItem\FeedItemSchedule
     */
    public function setStartMinute($startMinute)
    {
      $this->startMinute = $startMinute;
      return $this;
    }

    /**
     * @return int
     */
    public function getEndHour()
    {
      return $this->endHour;
    }

    /**
     * @param int $endHour
     * @return \Jp\YahooApis\SS\V201901\FeedItem\FeedItemSchedule
     */
    public function setEndHour($endHour)
    {
      $this->endHour = $endHour;
      return $this;
    }

    /**
     * @return MinuteOfHour
     */
    public function getEndMinute()
    {
      return $this->endMinute;
    }

    /**
     * @param MinuteOfHour $endMinute
     * @return \Jp\YahooApis\SS\V201901\FeedItem\FeedItemSchedule
     */
    public function setEndMinute($endMinute)
    {
      $this->endMinute = $endMinute;
      return $this;
    }

}
