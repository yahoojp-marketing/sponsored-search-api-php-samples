<?php

namespace Jp\YahooApis\SS\V201909;

abstract class ListReturnValue
{

    /**
     * @var string $ListReturnValueType
     */
    protected $ListReturnValueType = null;

    /**
     * @var string $OperationType
     */
    protected $OperationType = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getListReturnValueType()
    {
      return $this->ListReturnValueType;
    }

    /**
     * @param string $ListReturnValueType
     * @return \Jp\YahooApis\SS\V201909\ListReturnValue
     */
    public function setListReturnValueType($ListReturnValueType)
    {
      $this->ListReturnValueType = $ListReturnValueType;
      return $this;
    }

    /**
     * @return string
     */
    public function getOperationType()
    {
      return $this->OperationType;
    }

    /**
     * @param string $OperationType
     * @return \Jp\YahooApis\SS\V201909\ListReturnValue
     */
    public function setOperationType($OperationType)
    {
      $this->OperationType = $OperationType;
      return $this;
    }

}
