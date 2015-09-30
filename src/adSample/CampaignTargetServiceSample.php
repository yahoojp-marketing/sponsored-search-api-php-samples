<?php
/**
 * Sample Program for CampaignTargetServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for CampaignTargetService ADD.
 *
 * @param string $accountId Account ID
 * @param string $campaignId Campaign ID
 * @return array CampaignTargetValues entity
 * @throws Exception
 */
function addCampaignTarget($accountId, $campaignId)
{
    // Set Operand
    $operand = array(
        // Set ScheduleTarget
        array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'target' => array(
                'targetType' => 'SCHEDULE',
                'dayOfWeek' => 'MONDAY',
                'startHour' => 10,
                'startMinute' => 'ZERO',
                'endHour' => 11,
                'endMinute' => 'THIRTY',
            ),
            'bidMultiplier' => 1.0
        ),
        // Set LocationTarget
        array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'target' => array(
                'targetType' => 'LOCATION',
                'targetId' => 'JP-13-0048',
                'excludedType' => 'INCLUDED'
            ),
            'bidMultiplier' => 0.95
        ),
        // Set NetworkTarget
        array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'target' => array(
                'targetType' => 'NETWORK',
                'networkCoverageType' => 'YAHOO_SEARCH'
            )
        ),
    );

    //xsi:type for target
    $operand[0]['target'] =
        new SoapVar($operand[0]['target'], SOAP_ENC_OBJECT, 'ScheduleTarget', API_NS, 'target', XMLSCHEMANS);
    $operand[1]['target'] =
        new SoapVar($operand[1]['target'], SOAP_ENC_OBJECT, 'LocationTarget', API_NS, 'target', XMLSCHEMANS);
    $operand[2]['target'] =
        new SoapVar($operand[2]['target'], SOAP_ENC_OBJECT, 'NetworkTarget', API_NS, 'target', XMLSCHEMANS);

    // Set Request
    $campaignTargetRequest= array(
        'operations' => array(
            'operator' => 'ADD',
            'accountId' => $accountId,
            'operand' => $operand,
        ),
    );

    // Call API
    $campaignTargetService = SoapUtils::getService('CampaignTargetService');
    $campaignTargetResponse = $campaignTargetService->invoke('mutate', $campaignTargetRequest);

    // Response
    if (isset($campaignTargetResponse->rval->values)) {
        if (is_array($campaignTargetResponse->rval->values)) {
            $campaignTargetReturnValues = $campaignTargetResponse->rval->values;
        } else {
            $campaignTargetReturnValues = array($campaignTargetResponse->rval->values);
        }
    } else {
        throw new Exception("No response of add CampaignTargetService.");
    }

    // Error
    foreach ($campaignTargetReturnValues as $campaignTargetReturnValue) {
        if (!isset($campaignTargetReturnValue->campaignTarget)) {
            throw new Exception("Fail to add CampaignTargetService.");
        }
    }

    return $campaignTargetReturnValues;
}

/**
 * Sample Program for CampaignTargetService Set.
 *
 * @param string $accountId Account ID
 * @param array $campaignTargetValues CampaignTargetValues entity for set.
 * @return array CampaignTargetValues entity
 * @throws Exception
 */
function setCampaignTarget($accountId, $campaignTargetValues)
{
    // Set Operand
    $operand = array();
    foreach ($campaignTargetValues as $campaignTargetValue) {

        $target = array();

        // Set Target
        if ($campaignTargetValue->campaignTarget->target->targetType === 'SCHEDULE') {
            // Set ScheduleTarget
            $target = array(
                'accountId' => $campaignTargetValue->campaignTarget->accountId,
                'campaignId' => $campaignTargetValue->campaignTarget->campaignId,
                'target' => array(
                    'targetId' => $campaignTargetValue->campaignTarget->target->targetId,
                    'targetType' => 'SCHEDULE'
                ),
                'bidMultiplier' => 0.5
            );
            //xsi:type for targets of ScheduleTarget
            $target['target'] =
                new SoapVar($target['target'], SOAP_ENC_OBJECT, 'ScheduleTarget', API_NS, 'target', XMLSCHEMANS);

        } else if ($campaignTargetValue->campaignTarget->target->targetType === 'LOCATION') {
            // Set LocationTarget
            $target = array(
                'accountId' => $campaignTargetValue->campaignTarget->accountId,
                'campaignId' => $campaignTargetValue->campaignTarget->campaignId,
                'target' => array(
                    'targetId' => $campaignTargetValue->campaignTarget->target->targetId,
                    'targetType' => 'LOCATION'
                ),
                'bidMultiplier' => 0.5
            );
            //xsi:type for targets of LocationTarget
            $target['target'] =
                new SoapVar($target['target'], SOAP_ENC_OBJECT, 'LocationTarget', API_NS, 'target', XMLSCHEMANS);

        } else if ($campaignTargetValue->campaignTarget->target->targetType === 'LOCATION') {
            // Set PlatformTarget
            $target = array(
                'accountId' => $campaignTargetValue->campaignTarget->accountId,
                'campaignId' => $campaignTargetValue->campaignTarget->campaignId,
                'target' => array(
                    'targetId' => $campaignTargetValue->campaignTarget->target->targetId,
                    'targetType' => 'PLATFORM'
                ),
                'bidMultiplier' => 0.5
            );
            //xsi:type for targets of PlatformTarget
            $target['target'] =
                new SoapVar($target['target'], SOAP_ENC_OBJECT, 'PlatformTarget', API_NS, 'target', XMLSCHEMANS);
        }

        $operand[] = $target;
    }

    // Set Request
    $campaignTargetRequest= array(
        'operations' => array(
            'operator' => 'SET',
            'accountId' => $accountId,
            'operand' => $operand,
        ),
    );

    // Call API
    $campaignTargetService = SoapUtils::getService('CampaignTargetService');
    $campaignTargetResponse = $campaignTargetService->invoke('mutate', $campaignTargetRequest);

    // Response
    if (isset($campaignTargetResponse->rval->values)) {
        if (is_array($campaignTargetResponse->rval->values)) {
            $campaignTargetReturnValues = $campaignTargetResponse->rval->values;
        } else {
            $campaignTargetReturnValues = array($campaignTargetResponse->rval->values);
        }
    } else {
        throw new Exception("No response of set CampaignTargetService.");
    }

    // Error
    foreach ($campaignTargetReturnValues as $campaignTargetReturnValue) {
        if (!isset($campaignTargetReturnValue->campaignTarget)) {
            throw new Exception("Fail to set CampaignTargetService.");
        }
    }

    return $campaignTargetReturnValues;
}

/**
 * Sample Program for CampaignTargetService Remove.
 *
 * @param string $accountId Account ID
 * @param array $campaignTargetValues CampaignTargetValues entity for remove.
 * @return array CampaignTargetValues entity
 * @throws Exception
 */
function removeCampaignTarget($accountId, $campaignTargetValues)
{
    // Set Operand
    $operand = array();
    foreach ($campaignTargetValues as $campaignTargetValue) {
        $operand[] = array(
            'accountId' => $campaignTargetValue->campaignTarget->accountId,
            'campaignId' => $campaignTargetValue->campaignTarget->campaignId,
            'target' => array(
                'targetId' => $campaignTargetValue->campaignTarget->target->targetId,
                'targetType' => $campaignTargetValue->campaignTarget->target->targetType,
            )
        );
    }

    // Set Request
    $campaignTargetRequest= array(
        'operations' => array(
            'operator' => 'REMOVE',
            'accountId' => $accountId,
            'operand' => $operand,
        ),
    );

    // Call API
    $campaignTargetService = SoapUtils::getService('CampaignTargetService');
    $campaignTargetResponse = $campaignTargetService->invoke('mutate', $campaignTargetRequest);

    // Response
    if (isset($campaignTargetResponse->rval->values)) {
        if (is_array($campaignTargetResponse->rval->values)) {
            $campaignTargetReturnValues = $campaignTargetResponse->rval->values;
        } else {
            $campaignTargetReturnValues = array($campaignTargetResponse->rval->values);
        }
    } else {
        throw new Exception("No response of remove CampaignTargetService.");
    }

    // Error
    foreach ($campaignTargetReturnValues as $campaignTargetReturnValue) {
        if (!isset($campaignTargetReturnValue->campaignTarget)) {
            throw new Exception("Fail to remove CampaignTargetService.");
        }
    }

    return $campaignTargetReturnValues;
}

/**
 * Sample Program for CampaignTargetService Get.
 *
 * @param string $accountId Account ID
 * @param array $campaignTargetValues CampaignTargetValues entity for get.
 * @return array CampaignTargetValues entity
 * @throws Exception
 */
function getCampaignTarget($accountId, $campaignTargetValues)
{
    // Set campaignIds
    $campaignIds = array();
    foreach ($campaignTargetValues as $campaignTargetValue) {
        $campaignIds[] = $campaignTargetValue->campaignTarget->campaignId;
    }

    // Set Selector
    $campaignTargetRequest= array(
        'selector' => array(
            'accountId' => $accountId,
            'campaignIds' => $campaignIds,
            'paging' => array(
                'startIndex' => 1,
                'numberResults' => 20,
            ),
        ),
    );

    // Call API
    $campaignTargetService = SoapUtils::getService('CampaignTargetService');
    $campaignTargetResponse = $campaignTargetService->invoke('get', $campaignTargetRequest);

    // Response
    if (isset($campaignTargetResponse->rval->values)) {
        if (is_array($campaignTargetResponse->rval->values)) {
            $campaignTargetReturnValues = $campaignTargetResponse->rval->values;
        } else {
            $campaignTargetReturnValues = array($campaignTargetResponse->rval->values);
        }
    } else {
        throw new Exception("No response of get CampaignTargetService.");
    }

    // Error
    foreach ($campaignTargetReturnValues as $campaignTargetReturnValue) {
        if (!isset($campaignTargetReturnValue->campaignTarget)) {
            throw new Exception("Fail to get CampaignTargetService.");
        }
    }

    return $campaignTargetReturnValues;
}


if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

// CampaignTargetServiceSample
try {
    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();

    // CampaignTargetServiceSample ADD
    $campaignTargetValues = addCampaignTarget($accountId, $campaignId);

    // CampaignTargetServiceSample GET
    getCampaignTarget($accountId, $campaignTargetValues);

    // CampaignTargetServiceSample SET
    setCampaignTarget($accountId, $campaignTargetValues);

    // CampaignTargetServiceSample REMOVE
    removeCampaignTarget($accountId, $campaignTargetValues);

} catch (Exception $e) {
    printf($e->getMessage() ."\n");
}

