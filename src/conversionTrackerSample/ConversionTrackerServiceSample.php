<?php
require_once (dirname(__FILE__) . '/../../conf/api_config.php');
require_once (dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for ConversionTrackerService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */

class ConversionTrackerServiceSample{
    private $serviceName = 'ConversionTrackerService';

    /**
     * Sample Program for ConversionTrackerService MUTATE.
     *
     * @param array $operation ConversionTrackerOperation entity.
     * @param string $method Operator enum.
     * @return array ConversionTrackerReturnValue entity.
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
            if(!isset($returnValue->conversionTracker)){
                throw new Exception('Fail to ' . $method . ' ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * Sample Program for ConversionTrackerService GET.
     *
     * @param array $selector ConversionTrackerSelector entity.
     * @return array ConversionTrackerReturnValue entity.
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
            if(!isset($returnValue->conversionTracker)){
                throw new Exception('Fail to get ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * create sample request.
     *
     * @param long $accountId AccountID
     * @return ConversionTrackerOperation entity.
     */
    public function createSampleAddRequest($accountId){

        $operands = array(

            // WebConversionTracker
            array(
                'conversionTrackerName' => 'SampleWebConversionTracker_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'status' => 'ENABLED',
                'category' => 'DEFAULT',
                'markupLanguage' => 'HTML',
                'httpProtocol' => 'HTTP',
                'userRevenueValue' => '100',
                'conversionTrackerType' => 'WEB_CONVERSION',
                'trackingCodeType' => 'CLICK_TO_CALL'
            ),

            // AppConversionTracker(DOWNLOAD)
            array(
                'conversionTrackerName' => 'SampleAppConversionTracker1_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'status' => 'ENABLED',
                'category' => 'DOWNLOAD',
                'userRevenueValue' => '100',
                'conversionTrackerType' => 'APP_CONVERSION',
                'appId' => 'sample123_' . SoapUtils::getCurrentTimestamp(),
                'appPlatform' => 'ANDROID_MARKET',
                'appConversionType' => 'DOWNLOAD'
            ),

            // AppConversionTracker(FIRST_OPEN)
            array(
                'conversionTrackerName' => 'SampleAppConversionTracker2_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'status' => 'ENABLED',
                'category' => 'DOWNLOAD',
                'userRevenueValue' => '100',
                'conversionTrackerType' => 'APP_CONVERSION',
                'appId' => 'sample123_' . SoapUtils::getCurrentTimestamp(),
                'appPlatform' => 'ANDROID_MARKET',
                'appConversionType' => 'FIRST_OPEN',
                'appPostbackUrl' => array(
                    'url' => 'http://yahoo.co.jp?advertising_id={adid}&lat={lat}'
                )
            ),

            // AppConversionTracker(IN_APP_PURCHASE)
            array(
                'conversionTrackerName' => 'SampleAppConversionTracker3_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'status' => 'ENABLED',
                'category' => 'DEFAULT',
                'userRevenueValue' => '100',
                'conversionTrackerType' => 'APP_CONVERSION',
                'appPlatform' => 'ANDROID_MARKET',
                'appConversionType' => 'IN_APP_PURCHASE'
            )
        );

        $operands[0] = new SoapVar($operands[0], SOAP_ENC_OBJECT, 'WebConversion', API_NS, 'operand', XMLSCHEMANS);
        $operands[1] = new SoapVar($operands[1], SOAP_ENC_OBJECT, 'AppConversion', API_NS, 'operand', XMLSCHEMANS);
        $operands[2] = new SoapVar($operands[2], SOAP_ENC_OBJECT, 'AppConversion', API_NS, 'operand', XMLSCHEMANS);
        $operands[3] = new SoapVar($operands[3], SOAP_ENC_OBJECT, 'AppConversion', API_NS, 'operand', XMLSCHEMANS);

        // Create operation
        $operation = array(
            'operations' => array(
                'operator' => 'ADD',
                'accountId' => $accountId,
                'operand' => $operands
            )
        );

        return $operation;
    }

    /**
     * create sample request.
     *
     * @param long $accountId AccountID
     * @param array $conversionTrackerValues ConversionTrackerReturnValue entity.
     * @return ConversionTrackerSelector entity.
     */
    public function createSampleGetRequest($accountId, $conversionTrackerValues){

        // Get conversionTrackerIds
        $conversionTrackerIds = array();
        foreach($conversionTrackerValues as $conversionTrackerValue){
            if(isset($conversionTrackerValue->conversionTracker)){
                $conversionTrackerIds[] = $conversionTrackerValue->conversionTracker->conversionTrackerId;
            }
        }

        // Create selector
        $selector = array(
            'selector' => array(
                'accountId' => $accountId,
                'conversionTrackerIds' => $conversionTrackerIds,
                'dateRange' => array(
                    'startDate' => date("Ymd"),
                    'endDate' => date("Ymd", strtotime('+10 day'))
                ),
                'conversionTrackerTypes' => array(
                    'WEB_CONVERSION',
                    'APP_CONVERSION'
                ),
                'paging' => array(
                    'startIndex' => 1,
                    'numberResults' => 20
                )
            )
        );

        return $selector;
    }

    /**
     * create sample request.
     *
     * @param long $accountId AccountID
     * @param array $conversionTrackerValues ConversionTrackerReturnValue entity.
     * @return ConversionTrackerOperation entity.
     */
    public function createSampleSetRequest($accountId, $conversionTrackerValues){

        // Create operands
        $operands = array();
        foreach($conversionTrackerValues as $conversionTrackerValue){

            // Set operand
            $operand = array(
                'conversionTrackerId' => $conversionTrackerValue->conversionTracker->conversionTrackerId,
                'conversionTrackerType' => $conversionTrackerValue->conversionTracker->conversionTrackerType
            );

            switch($conversionTrackerValue->conversionTracker->conversionTrackerType){

                // WebConversionTracker
                case 'WEB_CONVERSION' :
                    $operand['conversionTrackerName'] = 'SampleWebConversionTracker_UpdateOn_' . SoapUtils::getCurrentTimestamp();
                    $operand['status'] = 'DISABLED';
                    $operand['category'] = 'DEFAULT';
                    $operand = new SoapVar($operand, SOAP_ENC_OBJECT, 'WebConversion', API_NS, 'operand', XMLSCHEMANS);
                    break;

                // AppConversionTracker
                case 'APP_CONVERSION' :
                    switch($conversionTrackerValue->conversionTracker->appConversionType){

                        case 'DOWNLOAD' :
                            $operand['conversionTrackerName'] = 'SampleAppConversionTracker1_UpdateOn_' . SoapUtils::getCurrentTimestamp();
                            $operand['status'] = 'DISABLED';
                            break;

                        case 'FIRST_OPEN' :
                            $operand['conversionTrackerName'] = 'SampleAppConversionTracker2_UpdateOn_' . SoapUtils::getCurrentTimestamp();
                            $operand['status'] = 'DISABLED';
                            $operand['appPostbackUrl'] = array(
                                'clearFlag' => 'TRUE'
                            );
                            break;

                        case 'IN_APP_PURCHASE' :
                            $operand['conversionTrackerName'] = 'SampleAppConversionTracker3_UpdateOn_' . SoapUtils::getCurrentTimestamp();
                            $operand['status'] = 'DISABLED';
                            $operand['category'] = 'PURCHASE';
                            $operand['userRevenueValue'] = '300';
                            break;

                        default :
                            break;
                    }

                    $operand = new SoapVar($operand, SOAP_ENC_OBJECT, 'AppConversion', API_NS, 'operand', XMLSCHEMANS);
                    break;

                default :
                    break;
            }

            array_push($operands, $operand);
        }

        // Create operation
        $operation = array(
            'operations' => array(
                'operator' => 'SET',
                'accountId' => $accountId,
                'operand' => $operands
            )
        );

        return $operation;
    }
}

if(__FILE__ != realpath($_SERVER['PHP_SELF'])){
    return;
}

/**
 * execute ConversionTrackerServiceSample.
 */
try{
    $conversionTrackerServiceSample = new ConversionTrackerServiceSample();

    $accountId = SoapUtils::getAccountId();

    // =================================================================
    // ConversionTrackerService::mutate(ADD)
    // =================================================================
    // Set Operation
    $operation = $conversionTrackerServiceSample->createSampleAddRequest($accountId);

    // Run
    $conversionTrackerValues = $conversionTrackerServiceSample->mutate($operation, 'ADD');

    // =================================================================
    // ConversionTrackerService::get
    // =================================================================
    // Set Selector
    $selector = $conversionTrackerServiceSample->createSampleGetRequest($accountId, $conversionTrackerValues);

    // Run
    $conversionTrackerValues = $conversionTrackerServiceSample->get($selector);

    // =================================================================
    // ConversionTrackerService::mutate(SET)
    // =================================================================
    // Set Operation
    $operation = $conversionTrackerServiceSample->createSampleSetRequest($accountId, $conversionTrackerValues);

    // Run
    $conversionTrackerValues = $conversionTrackerServiceSample->mutate($operation, 'SET');

}catch(Exception $e){
    printf($e->getMessage() . "\n");
}
