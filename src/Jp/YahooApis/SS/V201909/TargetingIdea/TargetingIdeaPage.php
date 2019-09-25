<?php

namespace Jp\YahooApis\SS\V201909\TargetingIdea;

class TargetingIdeaPage extends \Jp\YahooApis\SS\V201909\Page
{

    /**
     * @var TargetingIdeaValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return TargetingIdeaValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param TargetingIdeaValues[] $values
     * @return \Jp\YahooApis\SS\V201909\TargetingIdea\TargetingIdeaPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
