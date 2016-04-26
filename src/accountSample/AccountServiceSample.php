<?php
require_once (dirname(__FILE__) . '/../../conf/api_config.php');
require_once (dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for AccountService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class AccountServiceSample{
    private $serviceName = 'AccountService';

    /**
     * Sample Program for AccountService MUTATE.
     *
     * @param array $operation AccountOperation entity.
     * @param string $method Operator enum.
     * @return array AccountValues entity.
     * @throws Exception
     */
    public function mutate($operation, $method){

        // Call API
        $service = SoapUtils::getService($this->serviceName);
        $response = $service->invoke('mutate', $operation);

        // Response
        $returnValues = array();
        if(isset($response->rval->values)){
            if(is_array($response->rval->values)){
                $returnValues = $response->rval->values;
            }else{
                $returnValues = array(
                    $response->rval->values
                );
            }
        }else{
            throw new Exception('No response of ' . $method . ' ' . $this->serviceName . '.');
        }

        // Error
        foreach($returnValues as $returnValue){
            if(!isset($returnValue->account)){
                throw new Exception('Fail to ' . $method . ' ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * Sample Program for AccountService GET.
     *
     * @param array $selector AccountSelector entity.
     * @return array AccountValues entity.
     * @throws Exception
     */
    public function get($selector){

        // Call API
        $service = SoapUtils::getService($this->serviceName);
        $response = $service->invoke('get', $selector);

        // Response
        $returnValues = null;
        if(isset($response->rval->values)){
            if(is_array($response->rval->values)){
                $returnValues = $response->rval->values;
            }else{
                $returnValues = array(
                    $response->rval->values
                );
            }
        }else{
            throw new Exception('No response of get ' . $this->serviceName . '.');
        }

        // Error
        foreach($returnValues as $returnValue){
            if(!isset($returnValue->account)){
                throw new Exception('Fail to get ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }
}

if(__FILE__ != realpath($_SERVER['PHP_SELF'])){
    return;
}

/**
 * execute AccountServiceSample.
 */
try{
    $accountServiceSample = new AccountServiceSample();

    $accountId = SoapUtils::getAccountId();

    // =================================================================
    // AccountService GET
    // =================================================================
    // Create selector
    $selector = array(
        'selector' => array(
            'accountId' => $accountId,
            'accountTypes' => array(
                'INVOICE'
            ),
            'accountStatuses' => array(
                'SERVING',
                'ENDED'
            ),
            'paging' => array(
                'startIndex' => 1,
                'numberResults' => 20
            )
        )
    );

    // Run
    $accountServiceSample->get($selector);

    // =================================================================
    // AccountService SET
    // =================================================================
    // Create defaultTargetList
    $operands = array(
        array(
            'accountId' => $accountId,
            'accountName' => 'SampleAccount_UpdatedOn_' . SoapUtils::getCurrentTimestamp(),
            'deliveryStatus' => 'PAUSED'
        )
    );

    // Create operation
    $operation = array(
        'operations' => array(
            'operator' => 'SET',
            'operand' => $operands
        )
    );

    // Run
    $accountServiceSample->mutate($operation, 'SET');

}catch(Exception $e){
    printf($e->getMessage() . "\n");
}
