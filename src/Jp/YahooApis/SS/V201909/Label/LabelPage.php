<?php

namespace Jp\YahooApis\SS\V201909\Label;

class LabelPage extends \Jp\YahooApis\SS\V201909\Page
{

    /**
     * @var LabelValues[] $values
     */
    protected $values = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return LabelValues[]
     */
    public function getValues()
    {
      return $this->values;
    }

    /**
     * @param LabelValues[] $values
     * @return \Jp\YahooApis\SS\V201909\Label\LabelPage
     */
    public function setValues(array $values = null)
    {
      $this->values = $values;
      return $this;
    }

}
