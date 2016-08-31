<?php
require_once (dirname(__FILE__) . '/../../conf/api_config.php');
require_once (dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for FeedFolderServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class FeedFolderServiceSample{

    /**
     * Sample Program for FeedFolderService ADD.
     *
     * @param string $accountId Account ID
     * @return array FeedFolderValues entity
     * @throws Exception
     */
    function addFeedFolder($accountId){
        // Set Operand
        $operand = array(
            array(
                'accountId' => $accountId,
                'feedFolderName' => 'SampleFeedFolder_' . SoapUtils::getCurrentTimestamp(),
                'feedAttribute' => array(
                    // Set AdCustomizerInteger
                    array(
                        'feedAttributeName' => 'SampleInteger_' . SoapUtils::getCurrentTimestamp(),
                        'placeholderField' => 'AD_CUSTOMIZER_INTEGER'
                    ),
                    // Set AdCustomizerPrice
                    array(
                        'feedAttributeName' => 'SamplePrice_' . SoapUtils::getCurrentTimestamp(),
                        'placeholderField' => 'AD_CUSTOMIZER_PRICE'
                    ),
                    // Set AdCustomizerDate
                    array(
                        'feedAttributeName' => 'SampleDate_' . SoapUtils::getCurrentTimestamp(),
                        'placeholderField' => 'AD_CUSTOMIZER_DATE'
                    ),
                    // Set AdCustomizerString
                    array(
                        'feedAttributeName' => 'SampleString_' . SoapUtils::getCurrentTimestamp(),
                        'placeholderField' => 'AD_CUSTOMIZER_STRING'
                    )
                ),
                'placeholderType' => 'AD_CUSTOMIZER'
            )
        );

        // Set Request
        $feedFolderRequest = array(
            'operations' => array(
                'operator' => 'ADD',
                'accountId' => $accountId,
                'operand' => $operand
            )
        );

        // Call API
        $feedFolderService = SoapUtils::getService('FeedFolderService');
        $feedFolderResponse = $feedFolderService->invoke('mutate', $feedFolderRequest);

        // Response
        if(isset($feedFolderResponse->rval->values)){
            if(is_array($feedFolderResponse->rval->values)){
                $feedFolderReturnValues = $feedFolderResponse->rval->values;
            }else{
                $feedFolderReturnValues = array(
                    $feedFolderResponse->rval->values
                );
            }
        }else{
            throw new Exception("No response of add FeedFolderService.");
        }

        // Error
        foreach($feedFolderReturnValues as $feedFolderReturnValue){
            if(!isset($feedFolderReturnValue->feedFolder)){
                throw new Exception("Fail to add FeedFolderService.");
            }
        }

        return $feedFolderReturnValues;
    }

    /**
     * Sample Program for FeedFolderService Set.
     *
     * @param string $accountId Account ID
     * @param array $feedFolderValues FeedFolderValues entity for set.
     * @return array FeedFolderValues entity
     * @throws Exception
     */
    function setFeedFolder($accountId, $feedFolderValues){
        // Set Operand
        $operand = array();
        foreach($feedFolderValues as $feedFolderValue){

            $operand = array(
                array(
                    'accountId' => $accountId,
                    'feedFolderId' => $feedFolderValue->feedFolder->feedFolderId,
                    'feedAttribute' => array(
                        // Set AdCustomizerInteger
                        array(
                            'feedAttributeName' => 'SampleInteger2_' . SoapUtils::getCurrentTimestamp(),
                            'placeholderField' => 'AD_CUSTOMIZER_INTEGER'
                        ),
                        // Set AdCustomizerPrice
                        array(
                            'feedAttributeName' => 'SamplePrice2_' . SoapUtils::getCurrentTimestamp(),
                            'placeholderField' => 'AD_CUSTOMIZER_PRICE'
                        ),
                        // Set AdCustomizerDate
                        array(
                            'feedAttributeName' => 'SampleDate2_' . SoapUtils::getCurrentTimestamp(),
                            'placeholderField' => 'AD_CUSTOMIZER_DATE'
                        ),
                        // Set AdCustomizerString
                        array(
                            'feedAttributeName' => 'SampleString2_' . SoapUtils::getCurrentTimestamp(),
                            'placeholderField' => 'AD_CUSTOMIZER_STRING'
                        )
                    ),
                    'placeholderType' => 'AD_CUSTOMIZER'
                )
            );
        }

        // Set Request
        $feedFolderRequest = array(
            'operations' => array(
                'operator' => 'SET',
                'accountId' => $accountId,
                'operand' => $operand
            )
        );

        // Call API
        $feedFolderService = SoapUtils::getService('FeedFolderService');
        $feedFolderResponse = $feedFolderService->invoke('mutate', $feedFolderRequest);

        // Response
        if(isset($feedFolderResponse->rval->values)){
            if(is_array($feedFolderResponse->rval->values)){
                $feedFolderReturnValues = $feedFolderResponse->rval->values;
            }else{
                $feedFolderReturnValues = array(
                    $feedFolderResponse->rval->values
                );
            }
        }else{
            throw new Exception("No response of set FeedFolderService.");
        }

        // Error
        foreach($feedFolderReturnValues as $feedFolderReturnValue){
            if(!isset($feedFolderReturnValue->feedFolder)){
                throw new Exception("Fail to set FeedFolderService.");
            }
        }

        return $feedFolderReturnValues;
    }

    /**
     * Sample Program for FeedFolderService Remove.
     *
     * @param string $accountId Account ID
     * @param array $feedFolderValues FeedFolderValues entity for set.
     * @return array FeedFolderValues entity
     * @throws Exception
     */
    function removeFeedFolder($accountId, $feedFolderValues){
        // Set Operand
        $operands = array();
        foreach($feedFolderValues as $feedFolderValue){
            $operand = array(
                'accountId' => $accountId,
                'feedFolderId' => $feedFolderValue->feedFolder->feedFolderId
            );
            array_push($operands, $operand);
        }

        // Set Request
        $feedFolderRequest = array(
            'operations' => array(
                'operator' => 'REMOVE',
                'accountId' => $accountId,
                'operand' => $operands
            )
        );

        // Call API
        $feedFolderService = SoapUtils::getService('FeedFolderService');
        $feedFolderResponse = $feedFolderService->invoke('mutate', $feedFolderRequest);

        // Response
        if(isset($feedFolderResponse->rval->values)){
            if(is_array($feedFolderResponse->rval->values)){
                $feedFolderReturnValues = $feedFolderResponse->rval->values;
            }else{
                $feedFolderReturnValues = array(
                    $feedFolderResponse->rval->values
                );
            }
        }else{
            throw new Exception("No response of set FeedFolderService.");
        }

        // Error
        foreach($feedFolderReturnValues as $feedFolderReturnValue){
            if(!isset($feedFolderReturnValue->feedFolder)){
                throw new Exception("Fail to set FeedFolderService.");
            }
        }

        return $feedFolderReturnValues;
    }

    /**
     * Sample Program for FeedFolderService Get.
     *
     * @param string $accountId Account ID
     * @param array $feedFolderValues FeedFolderValues entity for set.
     * @return array FeedFolderValues entity
     * @throws Exception
     */
    function getFeedFolder($accountId, $feedFolderValues){
        // Set feedFolderIds
        $feedFolderIds = array();
        foreach($feedFolderValues as $feedFolderValue){
            $feedFolderIds[] = $feedFolderValue->feedFolder->feedFolderId;
        }

        // Set Selector
        $feedFolderRequest = array(
            'selector' => array(
                'accountId' => $accountId,
                'feedFolderIds' => $feedFolderIds,
                'paging' => array(
                    'startIndex' => 1,
                    'numberResults' => 20
                )
            )
        );

        // Call API
        $feedFolderService = SoapUtils::getService('FeedFolderService');
        $feedFolderResponse = $feedFolderService->invoke('get', $feedFolderRequest);

        // Response
        if(isset($feedFolderResponse->rval->values)){
            if(is_array($feedFolderResponse->rval->values)){
                $feedFolderReturnValues = $feedFolderResponse->rval->values;
            }else{
                $feedFolderReturnValues = array(
                    $feedFolderResponse->rval->values
                );
            }
        }else{
            throw new Exception("No response of get FeedFolderService.");
        }

        // Error
        foreach($feedFolderReturnValues as $feedFolderReturnValue){
            if(!isset($feedFolderReturnValue->feedFolder)){
                throw new Exception("Fail to get FeedFolderService.");
            }
        }

        return $feedFolderReturnValues;
    }
}

if(__FILE__ != realpath($_SERVER['PHP_SELF'])){
    return;
}

/**
 * FeedFolderServiceSample
 */
try{
    $feedFolderServiceSample = new FeedFolderServiceSample();

    $accountId = SoapUtils::getAccountId();
    $feedFolderValues = array();

    // FeedFolderServiceSample ADD
    $feedFolderValues = $feedFolderServiceSample->addFeedFolder($accountId);

    // FeedFolderServiceSample GET
    $feedFolderValues = $feedFolderServiceSample->getFeedFolder($accountId, $feedFolderValues);

    // FeedFolderServiceSample SET
    $feedFolderServiceSample->setFeedFolder($accountId, $feedFolderValues);

    // FeedFolderServiceSample REMOVE
    $feedFolderServiceSample->removeFeedFolder($accountId, $feedFolderValues);

}catch(Exception $e){
    printf($e->getMessage() . "\n");
}