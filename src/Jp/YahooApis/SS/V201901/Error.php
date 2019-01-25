<?php

namespace Jp\YahooApis\SS\V201901;

class Error
{

    /**
     * @var string $code
     */
    protected $code = null;

    /**
     * @var string $message
     */
    protected $message = null;

    /**
     * @var ErrorDetail[] $detail
     */
    protected $detail = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getCode()
    {
      return $this->code;
    }

    /**
     * @param string $code
     * @return \Jp\YahooApis\SS\V201901\Error
     */
    public function setCode($code)
    {
      $this->code = $code;
      return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
      return $this->message;
    }

    /**
     * @param string $message
     * @return \Jp\YahooApis\SS\V201901\Error
     */
    public function setMessage($message)
    {
      $this->message = $message;
      return $this;
    }

    /**
     * @return ErrorDetail[]
     */
    public function getDetail()
    {
      return $this->detail;
    }

    /**
     * @param ErrorDetail[] $detail
     * @return \Jp\YahooApis\SS\V201901\Error
     */
    public function setDetail(array $detail = null)
    {
      $this->detail = $detail;
      return $this;
    }

}
