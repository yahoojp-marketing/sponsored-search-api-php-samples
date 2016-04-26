<?php
require_once (dirname(__FILE__) . '/../../conf/api_config.php');
require_once (dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for AccountTrackingUrlService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class AccountTrackingUrlServiceSample{
    private $serviceName = 'AccountTrackingUrlService';

    /**
     * Sample Program for AccountTrackingUrlService MUTATE.
     *
     * @param array $operation AccountTrackingUrlOperation entity.
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
            if(!isset($returnValue->accountTrackingUrl)){
                throw new Exception('Fail to ' . $method . ' ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * Sample Program for AccountService GET.
     *
     * @param array $selector AccountTrackingUrlSelector entity.
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
            if(!isset($returnValue->accountTrackingUrl)){
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
 * execute AccountTrackingUrlServiceSample.
 */
try{
    $accountTrackingUrlServiceSample = new AccountTrackingUrlServiceSample();

    $accountId = SoapUtils::getAccountId();

    // =================================================================
    // AccountService GET
    // =================================================================
    // Create selector
    $selector = array(
        'selector' => array(
            'accountIds' => array(
                $accountId
            ),
            'paging' => array(
                'startIndex' => 1,
                'numberResults' => 20
            )
        )
    );

    // Run
    $accountTrackingUrlServiceSample->get($selector);

    // =================================================================
    // AccountService SET
    // =================================================================
    // Create defaultTargetList
    $operands = array(
        array(
            'accountId' => $accountId,
            'trackingUrl' => 'http://www.yahoo.co.jp?url={lpurl}&amp;id={_id1}'
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
    $accountTrackingUrlServiceSample->mutate($operation, 'SET');

}catch(Exception $e){
    printf($e->getMessage() . "\n");
}
