<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for BidLandscapeService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */

//=================================================================
// BidLandscapeService
//=================================================================
$bidLandscapeService = SoapUtils::getService('BidLandscapeService');
$adGroupCriterionIds = explode(',', SoapUtils::getAdGroupCriterionIds());
if (count($adGroupCriterionIds) > 0 && $adGroupCriterionIds[0] != 'ADGROUPCRITERIONIDS') {
    $getRequest = array(
        'selector' => array(
            'accountId' => SoapUtils::getAccountId(),
            'campaignId' => SoapUtils::getCampaignId(),
            'adGroupId' => SoapUtils::getAdGroupId(),
            'criterionIds' => $adGroupCriterionIds,
            'simType' => 'CRITERION'
        )
    );
} else {
    $getRequest = array(
        'selector' => array(
            'accountId' => SoapUtils::getAccountId(),
            'campaignId' => SoapUtils::getCampaignId(),
            'adGroupId' => SoapUtils::getAdGroupId(),
            'simType' => 'ADGROUP'
        )
    );
}

$getResponse = $bidLandscapeService->invoke('get', $getRequest);

if (!isset($getResponse->rval->values)) {
    echo 'Fail to get BidLandscape.';
    exit();
}
