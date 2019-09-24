<?php

namespace Jp\YahooApis\SS\V201909\Dictionary;

class DisapprovalReason
{

    /**
     * @var string $disapprovalReasonCode
     */
    protected $disapprovalReasonCode = null;

    /**
     * @var DictionaryLang $lang
     */
    protected $lang = null;

    /**
     * @var string $title
     */
    protected $title = null;

    /**
     * @var string $description
     */
    protected $description = null;

    /**
     * @var string $recommendation
     */
    protected $recommendation = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getDisapprovalReasonCode()
    {
      return $this->disapprovalReasonCode;
    }

    /**
     * @param string $disapprovalReasonCode
     * @return \Jp\YahooApis\SS\V201909\Dictionary\DisapprovalReason
     */
    public function setDisapprovalReasonCode($disapprovalReasonCode)
    {
      $this->disapprovalReasonCode = $disapprovalReasonCode;
      return $this;
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
     * @return \Jp\YahooApis\SS\V201909\Dictionary\DisapprovalReason
     */
    public function setLang($lang)
    {
      $this->lang = $lang;
      return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
      return $this->title;
    }

    /**
     * @param string $title
     * @return \Jp\YahooApis\SS\V201909\Dictionary\DisapprovalReason
     */
    public function setTitle($title)
    {
      $this->title = $title;
      return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
      return $this->description;
    }

    /**
     * @param string $description
     * @return \Jp\YahooApis\SS\V201909\Dictionary\DisapprovalReason
     */
    public function setDescription($description)
    {
      $this->description = $description;
      return $this;
    }

    /**
     * @return string
     */
    public function getRecommendation()
    {
      return $this->recommendation;
    }

    /**
     * @param string $recommendation
     * @return \Jp\YahooApis\SS\V201909\Dictionary\DisapprovalReason
     */
    public function setRecommendation($recommendation)
    {
      $this->recommendation = $recommendation;
      return $this;
    }

}
