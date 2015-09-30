<?php
/**
 * Sample Program for AdGroupAdServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');


/**
 * Sample Program for AdGroupAdService ADD.
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @param string $adGroupId Ad group ID
 * @return array AdGroupAdValues entity
 * @throws Exception
 */
function addAdGroupAd($accountId, $campaignId, $adGroupId)
{
    // Set Operand
    $operand = array(
        // Set TextAd2
        array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'adGroupId' => $adGroupId,
            'adName' => 'SampleTextAd2_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'ad' => array(
                'type' => 'TEXT_AD2',
                'headline' => 'sample headline',
                'description' => 'sample ad desc',
                'description2' => 'sample ad desc2',
                'url' => 'http://www.yahoo.co.jp/',
                'displayUrl' => 'www.yahoo.co.jp',
                'devicePreference' => 'SMART_PHONE',
            ),
            'userStatus' => 'ACTIVE',
        ),
        // Set AppAd
        array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'adGroupId' => $adGroupId,
            'adName' => 'SampleAppAd_CreateOn_' . SoapUtils::getCurrentTimestamp(),
            'ad' => array(
                'type' => 'APP_AD',
                'headline' => 'sample',
                'description' => 'sample ad desc',
                'description2' => 'sample ad desc2',
                'url' => 'http://www.yahoo.co.jp/',
                'displayUrl' => 'www.yahoo.co.jp',
                'appStore' => 'ANDROID',
                'appId' => '99999',
                'devicePreference' => 'SMART_PHONE',
            ),
            'userStatus' => 'ACTIVE',
        ),
    );

    //xsi:typ for ad of TextAd2
    $operand[0]['ad'] =
        new SoapVar($operand[0]['ad'],SOAP_ENC_OBJECT, 'TextAd2',API_NS,'ad',XMLSCHEMANS);
    //xsi:typ for ad of AppAd
    $operand[1]['ad'] =
        new SoapVar($operand[1]['ad'],SOAP_ENC_OBJECT, 'AppAd',API_NS,'ad',XMLSCHEMANS);

    // Set Request
    $adGroupAdRequest = array(
        'operations' => array(
            'operator' => 'ADD',
            'accountId' => $accountId,
            'operand' => $operand,
        ),
    );

    // Call API
    $adGroupAdService = SoapUtils::getService('AdGroupAdService');
    $adGroupAdResponse = $adGroupAdService->invoke('mutate', $adGroupAdRequest);

    // Response
    if (isset($adGroupAdResponse->rval->values)) {
        if (is_array($adGroupAdResponse->rval->values)) {
            $adGroupAdReturnValues = $adGroupAdResponse->rval->values;
        } else {
            $adGroupAdReturnValues = array($adGroupAdResponse->rval->values);
        }
    } else {
        throw new Exception("No response of add AdGroupAdService.");
    }

    // Error
    foreach ($adGroupAdReturnValues as $adGroupAdReturnValue) {
        if (!isset($adGroupAdReturnValue->adGroupAd)) {
            throw new Exception("Fail to add AdGroupAdService.");
        }
    }

    return $adGroupAdReturnValues;
}

/**
 * Sample Program for AdGroupAdService Set.
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @param string $adGroupId Ad group ID
 * @param array $adGroupAdValues AdGroupAdValues entity for set.
 * @return array AdGroupAdValues entity
 * @throws Exception
 */
function setAdGroupAd($accountId, $campaignId, $adGroupId, $adGroupAdValues)
{
    // Set Operand
    $operand = array();
    foreach ($adGroupAdValues as $adGroupAdValue) {

        $ad = array();

        // Set Ad
        if ($adGroupAdValue->adGroupAd->ad->type === 'TEXT_AD2') {
            // Set TextAd2
            $ad = array(
                'accountId' => $adGroupAdValue->adGroupAd->accountId,
                'campaignId' => $adGroupAdValue->adGroupAd->campaignId,
                'adGroupId' => $adGroupAdValue->adGroupAd->adGroupId,
                'adId' => $adGroupAdValue->adGroupAd->adId,
                'adName' => 'SampleTextAd2_UpdateOn_' . SoapUtils::getCurrentTimestamp(),
                'ad' => array(
                    'type' => 'TEXT_AD2',
                    'headline' => 'mod sample headline',
                    'description' => 'mod sample ad desc',
                    'description2' => 'mod sample ad desc2',
                    'url' => 'http://www.yahoo.mod.co.jp/',
                    'displayUrl' => 'www.yahoo.mod.co.jp',
                ),
                'userStatus' => 'PAUSED',
            );

            //xsi:typ for ad of TextAd2
            $ad['ad'] = new SoapVar($ad['ad'],SOAP_ENC_OBJECT, 'TextAd2',API_NS,'ad',XMLSCHEMANS);

        } else if ($adGroupAdValue->adGroupAd->ad->type === 'APP_AD') {
            // Set AppAd
            $ad = array(
                'accountId' => $adGroupAdValue->adGroupAd->accountId,
                'campaignId' => $adGroupAdValue->adGroupAd->campaignId,
                'adGroupId' => $adGroupAdValue->adGroupAd->adGroupId,
                'adId' => $adGroupAdValue->adGroupAd->adId,
                'adName' => 'SampleAppAd_UpdateOn_' . SoapUtils::getCurrentTimestamp(),
                'ad' => array(
                    'type' => 'APP_AD',
                    'headline' => 'mod sample',
                    'description' => 'mod sample ad desc',
                    'description2' => 'mod sample ad desc2',
                    'url' => 'http://www.yahoo.mod.co.jp/',
                    'displayUrl' => 'www.yahoo.mod.co.jp',
                ),
                'userStatus' => 'PAUSED',
            );

            //xsi:typ for ad of AppAd
            $ad['ad'] = new SoapVar($ad['ad'],SOAP_ENC_OBJECT, 'AppAd',API_NS,'ad',XMLSCHEMANS);
        }

        $operand[] = $ad;
    }

    // Set Request
    $adGroupAdRequest = array(
        'operations' => array(
            'operator' => 'SET',
            'accountId' => $accountId,
            'operand' => $operand,
        ),
    );

    // Call API
    $adGroupAdService = SoapUtils::getService('AdGroupAdService');
    $adGroupAdResponse = $adGroupAdService->invoke('mutate', $adGroupAdRequest);

    // Response
    if (isset($adGroupAdResponse->rval->values)) {
        if (is_array($adGroupAdResponse->rval->values)) {
            $adGroupAdReturnValues = $adGroupAdResponse->rval->values;
        } else {
            $adGroupAdReturnValues = array($adGroupAdResponse->rval->values);
        }
    } else {
        throw new Exception("No response of set AdGroupAdService.");
    }

    // Error
    foreach ($adGroupAdReturnValues as $adGroupAdReturnValue) {
        if (!isset($adGroupAdReturnValue->adGroupAd)) {
            throw new Exception("Fail to set AdGroupAdService.");
        }
    }

    return $adGroupAdReturnValues;
}

/**
 * Sample Program for AdGroupAdService Remove.
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @param string $adGroupId Ad group ID
 * @param array $adGroupAdValues AdGroupAdValues entity for remove.
 * @return array AdGroupAdValues entity
 * @throws Exception
 */
function removeAdGroupAd($accountId, $campaignId, $adGroupId, $adGroupAdValues)
{
    // Set Operand
    $operand = array();
    foreach ($adGroupAdValues as $adGroupAdValue) {
        $operand[] = array(
            'accountId' => $adGroupAdValue->adGroupAd->accountId,
            'campaignId' => $adGroupAdValue->adGroupAd->campaignId,
            'adGroupId' => $adGroupAdValue->adGroupAd->adGroupId,
            'adId' => $adGroupAdValue->adGroupAd->adId,
        );
    }

    // Set Request
    $adGroupAdRequest = array(
        'operations' => array(
            'operator' => 'REMOVE',
            'accountId' => $accountId,
            'operand' => $operand,
        ),
    );

    // Call API
    $adGroupAdService = SoapUtils::getService('AdGroupAdService');
    $adGroupAdResponse = $adGroupAdService->invoke('mutate', $adGroupAdRequest);

    // Response
    if (isset($adGroupAdResponse->rval->values)) {
        if (is_array($adGroupAdResponse->rval->values)) {
            $adGroupAdReturnValues = $adGroupAdResponse->rval->values;
        } else {
            $adGroupAdReturnValues = array($adGroupAdResponse->rval->values);
        }
    } else {
        throw new Exception("No response of remove AdGroupAdService.");
    }

    // Error
    foreach ($adGroupAdReturnValues as $adGroupAdReturnValue) {
        if (!isset($adGroupAdReturnValue->adGroupAd)) {
            throw new Exception("Fail to remove AdGroupAdService.");
        }
    }

    return $adGroupAdReturnValues;
}

/**
 * Sample Program for AdGroupAdService Get.
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @param string $adGroupId Ad group ID
 * @param array $adGroupAdValues AdGroupAdValues entity for get.
 * @return array AdGroupAdValues entity
 * @throws Exception
 */
function getAdGroupAd($accountId, $campaignId, $adGroupId, $adGroupAdValues)
{
    // Set adIds
    $adIds = array();
    foreach ($adGroupAdValues as $adGroupAdValue) {
        $adIds[] = $adGroupAdValue->adGroupAd->adId;
    }

    // Set Selector
    $adGroupAdRequest = array(
        'selector' => array(
            'accountId' => $accountId,
            'campaignIds' => array($campaignId),
            'adGroupIds' => array($adGroupId),
            'adIds' => $adIds,
            'adTypes' => array(
                'TEXT_AD2',
                'MOBILE_AD',
                'APP_AD',
            ),
            'userStatuses' => array(
                'ACTIVE',
                'PAUSED',
            ),
            'criterionUse' => 'BIDDABLE',
            'approvalStatuses' => array(
                'APPROVED',
                'APPROVED_WITH_REVIEW',
                'REVIEW',
                'PRE_DISAPPROVED',
                'POST_DISAPPROVED'
            ),
            'paging' => array(
                'startIndex' => 1,
                'numberResults' => 20,
            ),
        ),
    );

    // Call API
    $adGroupAdService = SoapUtils::getService('AdGroupAdService');
    $adGroupAdResponse = $adGroupAdService->invoke('get', $adGroupAdRequest);

    // Response
    if (isset($adGroupAdResponse->rval->values)) {
        if (is_array($adGroupAdResponse->rval->values)) {
            $adGroupAdReturnValues = $adGroupAdResponse->rval->values;
        } else {
            $adGroupAdReturnValues = array($adGroupAdResponse->rval->values);
        }
    } else {
        throw new Exception("No response of get AdGroupAdService.");
    }

    // Error
    foreach ($adGroupAdReturnValues as $adGroupAdReturnValue) {
        if (!isset($adGroupAdReturnValue->adGroupAd)) {
            throw new Exception("Fail to get AdGroupAdService.");
        }
    }

    return $adGroupAdReturnValues;
}


if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

// AdGroupAdServiceSample
try {
    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();
    $adGroupId = SoapUtils::getAdGroupId();

    // AdGroupAdServiceSample ADD
    $adGroupAdValues = addAdGroupAd($accountId, $campaignId, $adGroupId);

    // AdGroupAdServiceSample GET
    getAdGroupAd($accountId, $campaignId, $adGroupId, $adGroupAdValues);

    // AdGroupAdServiceSample SET
    setAdGroupAd($accountId, $campaignId, $adGroupId, $adGroupAdValues);

    // AdGroupAdServiceSample REMOVE
    removeAdGroupAd($accountId, $campaignId, $adGroupId, $adGroupAdValues);

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}

