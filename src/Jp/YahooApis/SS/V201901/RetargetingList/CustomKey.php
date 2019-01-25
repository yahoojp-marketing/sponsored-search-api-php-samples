<?php

namespace Jp\YahooApis\SS\V201901\RetargetingList;

class CustomKey
{

    /**
     * @var string[] $textKey
     */
    protected $textKey = null;

    /**
     * @param string[] $textKey
     */
    public function __construct(array $textKey)
    {
      $this->textKey = $textKey;
    }

    /**
     * @return string[]
     */
    public function getTextKey()
    {
      return $this->textKey;
    }

    /**
     * @param string[] $textKey
     * @return \Jp\YahooApis\SS\V201901\RetargetingList\CustomKey
     */
    public function setTextKey(array $textKey)
    {
      $this->textKey = $textKey;
      return $this;
    }

}
