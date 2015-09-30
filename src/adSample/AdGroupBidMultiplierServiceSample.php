<?php
/**
 * Sample Program for AdGroupBidMultiplierServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');


/**
 * Sample Program for AdGroupBidMultiplierService Set.
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @param string $adGroupId Ad group ID
 * @return array AdGroupBidMultiplierValues entity
 * @throws Exception
 */
function setAdGroupBidMultiplier($accountId, $campaignId, $adGroupId)
{
    // Set Operand
    $operand = array(
        array(
            'adGroupId' => $adGroupId,
            'bidMultipliers' => array(
                'type' => 'PLATFORM',
                'bidMultipliers' => array(
                    'type' => 'PLATFORM',
                    'platformName' => 'SMART_PHONE',
                    'bidMultiplier' => '3.2',
                ),
            ),
        ),
    );

    //xsi:typ for bidMultipliers of PlatformBidMultiplierList
    $operand[0]['bidMultipliers'] =
        new SoapVar($operand[0]['bidMultipliers'], SOAP_ENC_OBJECT, 'PlatformBidMultiplierList', API_NS, 'bidMultipliers', XMLSCHEMANS);

    // Set Request
    $adGroupBidMultiplierRequest = array(
        'operations' => array(
            'operator' => 'SET',
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'operand' => $operand,
        ),
    );

    // Call API
    $adGroupBidMultiplierService = SoapUtils::getService('AdGroupBidMultiplierService');
    $adGroupBidMultiplierResponse = $adGroupBidMultiplierService->invoke('mutate', $adGroupBidMultiplierRequest);

    // Response
    if (isset($adGroupBidMultiplierResponse->rval->values)) {
        if (is_array($adGroupBidMultiplierResponse->rval->values)) {
            $adGroupBidMultiplierReturnValues = $adGroupBidMultiplierResponse->rval->values;
        } else {
            $adGroupBidMultiplierReturnValues = array($adGroupBidMultiplierResponse->rval->values);
        }
    } else {
        throw new Exception("No response of set AdGroupBidMultiplierService.");
    }

    // Error
    foreach ($adGroupBidMultiplierReturnValues as $adGroupBidMultiplierReturnValue) {
        if (!isset($adGroupBidMultiplierReturnValue->adGroupBidMultiplier)) {
            throw new Exception("Fail to set AdGroupBidMultiplierService.");
        }
    }

    return $adGroupBidMultiplierReturnValues;
}

/**
 * Sample Program for AdGroupBidMultiplierService Get.
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @param string $adGroupId Ad group ID
 * @return array AdGroupBidMultiplierValues entity
 * @throws Exception
 */
function getAdGroupBidMultiplier($accountId, $campaignId, $adGroupId)
{
    // Set Selector
    $adGroupBidMultiplierRequest = array(
        'selector' => array(
            'accountId' => $accountId,
            'campaignIds' => array($campaignId),
            'adGroupIds' => array($adGroupId),
            'paging' => array(
                'startIndex' => 1,
                'numberResults' => 20,
            ),
        ),
    );

    // Call API
    $adGroupBidMultiplierService = SoapUtils::getService('AdGroupBidMultiplierService');
    $adGroupBidMultiplierResponse = $adGroupBidMultiplierService->invoke('get', $adGroupBidMultiplierRequest);

    // Response
    if (isset($adGroupBidMultiplierResponse->rval->values)) {
        if (is_array($adGroupBidMultiplierResponse->rval->values)) {
            $adGroupBidMultiplierReturnValues = $adGroupBidMultiplierResponse->rval->values;
        } else {
            $adGroupBidMultiplierReturnValues = array($adGroupBidMultiplierResponse->rval->values);
        }
    } else {
        throw new Exception("No response of get AdGroupBidMultiplierService.");
    }

    // Error
    foreach ($adGroupBidMultiplierReturnValues as $adGroupBidMultiplierReturnValue) {
        if (!isset($adGroupBidMultiplierReturnValue->adGroupBidMultiplier)) {
            throw new Exception("Fail to get AdGroupBidMultiplierService.");
        }
    }

    return $adGroupBidMultiplierReturnValues;
}


if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

// AdGroupBidMultiplierServiceSample
try {
    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();
    $adGroupId = SoapUtils::getAdGroupId();

    // AdGroupBidMultiplierServiceSample SET
    setAdGroupBidMultiplier($accountId, $campaignId, $adGroupId);

    // AdGroupBidMultiplierServiceSample GET
    getAdGroupBidMultiplier($accountId, $campaignId, $adGroupId);

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}

