<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');
require_once(dirname(__FILE__) . '/CampaignServiceSample.php');

/**
 * Sample Program for CampaignTargetServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class CampaignTargetServiceSample
{

    private $serviceName = 'CampaignTargetService';

    /**
     * Sample Program for CampaignTargetService MUTATE.
     *
     * @param array $operation CampaignTargetOperation entity.
     * @param string $method Operator enum.
     * @return array CampaignTargetReturnValue entity.
     * @throws Exception
     */
    public function mutate($operation, $method)
    {

        // Call API
        $service = SoapUtils::getService($this->serviceName);
        $response = $service->invoke('mutate', $operation);

        // Response
        $returnValues = array();
        if (isset($response->rval->values)) {
            if (is_array($response->rval->values)) {
                $returnValues = $response->rval->values;
            } else {
                $returnValues = array(
                    $response->rval->values
                );
            }
        } else {
            throw new Exception('No response of ' . $method . ' ' . $this->serviceName . '.');
        }

        // Error
        foreach ($returnValues as $returnValue) {
            if (!isset($returnValue->campaignTarget)) {
                throw new Exception('Fail to ' . $method . ' ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * Sample Program for CampaignTargetService GET.
     *
     * @param array $selector CampaignTargetSelector entity.
     * @return array CampaignTargetReturnValue entity.
     * @throws Exception
     */
    public function get($selector)
    {

        // Call API
        $service = SoapUtils::getService($this->serviceName);
        $response = $service->invoke('get', $selector);

        // Response
        $returnValues = null;
        if (isset($response->rval->values)) {
            if (is_array($response->rval->values)) {
                $returnValues = $response->rval->values;
            } else {
                $returnValues = array(
                    $response->rval->values
                );
            }
        } else {
            throw new Exception('No response of get ' . $this->serviceName . '.');
        }

        // Error
        foreach ($returnValues as $returnValue) {
            if (!isset($returnValue->campaignTarget)) {
                throw new Exception('Fail to get ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * create sample request.
     *
     * @param long $accountId AccountID
     * @param long $campaignId CampaignID
     * @return CampaignOperation entity.
     */
    public function createSampleAddRequest($accountId, $campaignId)
    {

        // Create operands
        $operands = array(

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
                    'endMinute' => 'THIRTY'
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
            )
        );

        // xsi:type for target
        $operands[0]['target'] = SoapUtils::encodingSoapVar($operands[0]['target'], 'ScheduleTarget','CampaignTarget' , 'target');
        $operands[1]['target'] = SoapUtils::encodingSoapVar($operands[1]['target'], 'LocationTarget','CampaignTarget' , 'target');
        $operands[2]['target'] = SoapUtils::encodingSoapVar($operands[2]['target'], 'NetworkTarget','CampaignTarget' , 'target');

        // Create Request
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
     * @param long $campaignTargetValues CampaignTargetReturnValue entity.
     * @return CampaignOperation entity.
     */
    public function createSampleSetRequest($accountId, $campaignId, $campaignTargetValues)
    {

        // Create operands
        $operands = array();
        foreach ($campaignTargetValues as $campaignTargetValue) {

            $target = array();

            // Set Target
            switch ($campaignTargetValue->campaignTarget->target->targetType) {
                default:
                    break 2;

                case 'SCHEDULE':
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
                    // xsi:type for targets of ScheduleTarget
                    $target['target'] = SoapUtils::encodingSoapVar($target['target'], 'ScheduleTarget','CampaignTarget' , 'target');
                    break;

                case 'LOCATION':
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
                    // xsi:type for targets of LocationTarget
                    $target['target'] = SoapUtils::encodingSoapVar($target['target'], 'LocationTarget','CampaignTarget' , 'target');
                    break;
            }

            array_push($operands, $target);
        }

        // Set PlatformTarget for SMART_PHONE
        $platformTarget = array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'target' => array(
                'targetType' => 'PLATFORM',
                'platformType' => 'SMART_PHONE'
            ),
            'bidMultiplier' => 0.1
        );
        // xsi:type for targets of PlatformTarget
        $platformTarget['target'] = SoapUtils::encodingSoapVar($platformTarget['target'], 'PlatformTarget','CampaignTarget' , 'target');
        array_push($operands, $platformTarget);

        // Set PlatformTarget for TABLET
        $platformTarget = array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'target' => array(
                'targetType' => 'PLATFORM',
                'platformType' => 'TABLET'
            ),
            'bidMultiplier' => 0.1
        );
        // xsi:type for targets of PlatformTarget
        $platformTarget['target'] = SoapUtils::encodingSoapVar($platformTarget['target'], 'PlatformTarget','CampaignTarget' , 'target');
        array_push($operands, $platformTarget);

        // Set PlatformTarget for DESKTOP
        $platformTarget = array(
            'accountId' => $accountId,
            'campaignId' => $campaignId,
            'target' => array(
                'targetType' => 'PLATFORM',
                'platformType' => 'DESKTOP'
            ),
            'bidMultiplier' => 0.1
        );
        // xsi:type for targets of PlatformTarget
        $platformTarget['target'] = SoapUtils::encodingSoapVar($platformTarget['target'], 'PlatformTarget','CampaignTarget' , 'target');
        array_push($operands, $platformTarget);

        // Create Request
        $operation = array(
            'operations' => array(
                'operator' => 'SET',
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
     * @param long $campaignTargetValues CampaignTargetReturnValue entity.
     * @return CampaignOperation entity.
     */
    public function createSampleRemoveRequest($accountId, $campaignTargetValues)
    {

        // Create operands
        $operands = array();
        foreach ($campaignTargetValues as $campaignTargetValue) {
            if ($campaignTargetValue->campaignTarget->target->targetType != 'PLATFORM') {
                $operands[] = array(
                    'accountId' => $campaignTargetValue->campaignTarget->accountId,
                    'campaignId' => $campaignTargetValue->campaignTarget->campaignId,
                    'target' => array(
                        'targetId' => $campaignTargetValue->campaignTarget->target->targetId,
                        'targetType' => $campaignTargetValue->campaignTarget->target->targetType
                    )
                );
            }
        }

        // Create Request
        $operation = array(
            'operations' => array(
                'operator' => 'REMOVE',
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
     * @param array $campaignTargetValues CampaignTargetReturnValue entity.
     * @return CampaignTargetSelector entity.
     */
    public function createSampleGetRequest($accountId, $campaignTargetValues)
    {

        // Get campaignIds
        $campaignIds = array();
        foreach ($campaignTargetValues as $campaignTargetValue) {
            $campaignIds[] = $campaignTargetValue->campaignTarget->campaignId;
        }

        // Create Selector
        $selector = array(
            'selector' => array(
                'accountId' => $accountId,
                'campaignIds' => $campaignIds,
                'targetTypes' => array(
                    'LOCATION',
                    'SCHEDULE',
                    'NETWORK',
                    'PLATFORM',
                ),
                'excludedType' => 'INCLUDED',
                'platformTypes' => array(
                    'SMART_PHONE',
                    'TABLET',
                    'DESKTOP',
                ),
                'paging' => array(
                    'startIndex' => 1,
                    'numberResults' => 20
                )
            )
        );

        return $selector;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

/**
 * execute CampaignServiceSample.
 */
try {
    $campaignServiceSample = new CampaignServiceSample();
    $campaignTargetServiceSample = new CampaignTargetServiceSample();

    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();

    // =================================================================
    // CampaignService::mutate(ADD)
    // =================================================================
    $campaignValues = array();
    if ($campaignId === 'xxxxxxxx') {
        $addCampaignRequest = $campaignServiceSample->createMutateRequest('ADD', $accountId);
        array_push($addCampaignRequest['operations']['operand'], $campaignServiceSample->createAddManualCpcStandardCampaign($accountId));
        $campaignValues = $campaignServiceSample->mutate($addCampaignRequest, 'ADD');
        foreach ($campaignValues as $campaignValue) {
            $campaignId = $campaignValue->campaign->campaignId;
        }
    }

    // =================================================================
    // CampaignTargetService ADD
    // =================================================================
    // Create operands
    $operation = $campaignTargetServiceSample->createSampleAddRequest($accountId, $campaignId);

    // Run
    $campaignTargetValues = $campaignTargetServiceSample->mutate($operation, 'ADD');

    // =================================================================
    // CampaignTargetService SET
    // =================================================================
    // Create operands
    $operation = $campaignTargetServiceSample->createSampleSetRequest($accountId, $campaignId, $campaignTargetValues);

    // Run
    $campaignTargetValues = $campaignTargetServiceSample->mutate($operation, 'SET');

    // =================================================================
    // CampaignTargetService GET
    // =================================================================
    // Create selector
    $selector = $campaignTargetServiceSample->createSampleGetRequest($accountId, $campaignTargetValues);

    // Run
    $campaignTargetValues = $campaignTargetServiceSample->get($selector);

    // =================================================================
    // CampaignTargetService REMOVE
    // =================================================================
    // Create operands
    $operation = $campaignTargetServiceSample->createSampleRemoveRequest($accountId, $campaignTargetValues);

    // Run
    $campaignTargetServiceSample->mutate($operation, 'REMOVE');

    // =================================================================
    // remove Campaign
    // =================================================================
    if (count($campaignValues) > 0) {
        $operation = $campaignServiceSample->createSampleRemoveRequest($accountId, $campaignValues);
        $campaignValues = $campaignServiceSample->mutate($operation, 'REMOVE');
    }

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
