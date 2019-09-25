<?php

namespace Jp\YahooApis\SS\V201909\Dictionary;

class DisapprovalReasonSelector
{

    /**
     * @var DictionaryLang $lang
     */
    protected $lang = null;

    /**
     * @param DictionaryLang $lang
     */
    public function __construct($lang)
    {
      $this->lang = $lang;
    }

    /**
     * @return DictionaryLang
     */
    public function getLang()
    {
      return $this->lang;
    }

    /**
     * @param DictionaryLang $lang
     * @return \Jp\YahooApis\SS\V201909\Dictionary\DisapprovalReasonSelector
     */
    public function setLang($lang)
    {
      $this->lang = $lang;
      return $this;
    }

}
