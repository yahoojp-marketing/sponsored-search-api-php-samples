<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for AdGroupAdServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class AdGroupAdServiceSample
{

    private $serviceName = 'AdGroupAdService';

    /**
     * Sample Program for AdGroupAdService MUTATE.
     *
     * @param array $operation AdGroupAdOperation entity.
     * @param string $method Operator enum.
     * @return array AdGroupAdValues entity.
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
            if ($returnValue->operationSucceeded != true) {
                throw new Exception('Fail to ' . $method . ' ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * Sample Program for AdGroupAdService GET.
     *
     * @param array $selector AdGroupAdSelector entity.
     * @return array AdGroupAdValues entity.
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
            if ($returnValue->operationSucceeded != true) {
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
     * @param long $appCampaignId AppCampaignID
     * @param long $adGroupId AdGroupID
     * @param long $appAdGroupId AppAdGroupID
     * @return AdGroupAdOperation entity.
     */
    public function createSampleAddRequest($accountId, $campaignId, $appCampaignId, $adGroupId, $appAdGroupId)
    {

        // Create operands
        $operands = array(

            // Set AppAd
            array(
                'accountId' => $accountId,
                'campaignId' => $appCampaignId,
                'adGroupId' => $appAdGroupId,
                'adName' => 'SampleAppAd_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'ad' => array(
                    'type' => 'APP_AD',
                    'headline' => 'sample',
                    'description' => 'sample ad desc',
                    'description2' => 'sample ad desc2',
                    'devicePreference' => 'SMART_PHONE',
                    'advancedUrl' => 'http://www.yahoo.co.jp',
                    'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                    'customParameters' => array(
                        'parameters' => array(
                            'key' => 'id1',
                            'value' => '1234'
                        )
                    )
                ),
                'userStatus' => 'ACTIVE'
            ),

            // Set ExtendedTextAd
            array(
                'accountId' => $accountId,
                'campaignId' => $campaignId,
                'adGroupId' => $adGroupId,
                'adName' => 'SampleExtendedTextAd_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'ad' => array(
                    'type' => 'EXTENDED_TEXT_AD',
                    'headline' => 'sample headline',
                    'headline2' => 'sample headline2',
                    'description' => 'sample ad desc',
                    'advancedUrl' => 'http://www.yahoo.co.jp',
                    'additionalAdvancedUrls' => array(
                        array('advancedUrl' => 'http://www1.yahoo.co.jp'),
                        array('advancedUrl' => 'http://www2.yahoo.co.jp'),
                        array('advancedUrl' => 'http://www3.yahoo.co.jp')
                    ),
                    'advancedMobileUrl' => 'http://www.yahoo.co.jp/mobile',
                    'additionalAdvancedMobileUrls' => array(
                        array('advancedMobileUrl' => 'http://www1.yahoo.co.jp/mobile'),
                        array('advancedMobileUrl' => 'http://www2.yahoo.co.jp/mobile'),
                        array('advancedMobileUrl' => 'http://www3.yahoo.co.jp/mobile')
                    ),
                    'trackingUrl' => 'http://www.yahoo.co.jp/?url={lpurl}&amp;a={creative}&amp;pid={_id1}',
                    'customParameters' => array(
                        'parameters' => array(
                            'key' => 'id1',
                            'value' => '1234'
                        )
                    ),
                    'path1' => 'path1',
                    'path2' => 'path2'
                ),
                'userStatus' => 'ACTIVE'
            )
        );

        $operands[0]['ad'] = SoapUtils::encodingSoapVar($operands[0]['ad'], 'AppAd','AdGroupAd' , 'ad');
        $operands[1]['ad'] = SoapUtils::encodingSoapVar($operands[1]['ad'], 'ExtendedTextAd','AdGroupAd' , 'ad');

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
     * @param array $adGroupAdlues AdGroupAdValues entity.
     * @return AdGroupAdOperation entity.
     */
    public function createSampleSetRequest($accountId, $adGroupAdValues)
    {

        // Create operands
        $operands = array();
        foreach ($adGroupAdValues as $adGroupAdValue) {

            // Create operand
            $ad = array();

            // Set Ad
            switch ($adGroupAdValue->adGroupAd->ad->type) {

                default:
                // Set AppAd
                case 'APP_AD':
                    $ad = array(
                        'accountId' => $adGroupAdValue->adGroupAd->accountId,
                        'campaignId' => $adGroupAdValue->adGroupAd->campaignId,
                        'adGroupId' => $adGroupAdValue->adGroupAd->adGroupId,
                        'adId' => $adGroupAdValue->adGroupAd->adId,
                        'adName' => 'SampleAppAd_UpdateOn_' . SoapUtils::getCurrentTimestamp(),
                        'userStatus' => 'PAUSED'
                    );
                    break;

                // Set ExtendedTextAd
                case 'EXTENDED_TEXT_AD':
                    $ad = array(
                        'accountId' => $adGroupAdValue->adGroupAd->accountId,
                        'campaignId' => $adGroupAdValue->adGroupAd->campaignId,
                        'adGroupId' => $adGroupAdValue->adGroupAd->adGroupId,
                        'adId' => $adGroupAdValue->adGroupAd->adId,
                        'adName' => 'SampleExtendedTextAd_UpdateOn_' . SoapUtils::getCurrentTimestamp(),
                        'userStatus' => 'PAUSED'
                    );
                    break;
            }

            $operands[] = $ad;
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

    /**
     * create sample request.
     *
     * @param long $accountId AccountID
     * @param array $adGroupAdValues AdGroupAdValues entity.
     * @return AdGroupAdOperation entity.
     */
    public function createSampleRemoveRequest($accountId, $adGroupAdValues)
    {

        // Create operands
        $operands = array();
        foreach ($adGroupAdValues as $adGroupAdValue) {

            // Create operand
            $operand = array(
                'accountId' => $adGroupAdValue->adGroupAd->accountId,
                'campaignId' => $adGroupAdValue->adGroupAd->campaignId,
                'adGroupId' => $adGroupAdValue->adGroupAd->adGroupId,
                'adId' => $adGroupAdValue->adGroupAd->adId
            );

            array_push($operands, $operand);
        }

        // Create operation
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
     * @param long $campaignId CampaignID
     * @param long $appCampaignId AppCampaignID
     * @param long $adGroupId AdGroupID
     * @param long $appAdGroupId AppAdGroupID
     * @param array $adGroupAdValues AdGroupAdValues entity.
     * @return AdGroupAdSelector entity.
     */
    public function createSampleGetRequest($accountId, $campaignId, $appCampaignId, $adGroupId, $appAdGroupId, $adGroupAdValues)
    {

        // Get adGroupIds
        $adIds = array();
        foreach ($adGroupAdValues as $adGroupAdValue) {
            if (isset($adGroupAdValue->adGroupAd)) {
                $adIds[] = $adGroupAdValue->adGroupAd->adId;
            }
        }

        // Create selector
        $selector = array(
            'selector' => array(
                'accountId' => $accountId,
                'campaignIds' => array(
                    $campaignId,
                    $appCampaignId
                ),
                'adGroupIds' => array(
                    $adGroupId,
                    $appAdGroupId
                ),
                'adIds' => $adIds,
                'adTypes' => array(
                    'TEXT_AD2',
                    'APP_AD',
                    'EXTENDED_TEXT_AD',
                ),
                'userStatuses' => array(
                    'ACTIVE',
                    'PAUSED'
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
 * execute AdGroupAdServiceSample.
 */
try {
    $adGroupAdServiceSample = new AdGroupAdServiceSample();

    $accountId = SoapUtils::getAccountId();
    $campaignId = SoapUtils::getCampaignId();
    $appCampaignId = SoapUtils::getAppCampaignId();
    $adGroupId = SoapUtils::getAdGroupId();
    $appAdGroupId = SoapUtils::getAppAdGroupId();

    // =================================================================
    // AdGroupAdService ADD
    // =================================================================
    // Create operands
    $operation = $adGroupAdServiceSample->createSampleAddRequest($accountId, $campaignId, $appCampaignId, $adGroupId, $appAdGroupId);

    // Run
    $adGroupAdValues = $adGroupAdServiceSample->mutate($operation, 'ADD');

    // =================================================================
    // AdGroupAdService SET
    // =================================================================
    // Create operands
    $operation = $adGroupAdServiceSample->createSampleSetRequest($accountId, $adGroupAdValues);

    // Run
    $adGroupAdValues = $adGroupAdServiceSample->mutate($operation, 'SET');

    // =================================================================
    // AdGroupAdService GET
    // =================================================================
    // Create selector
    $selector = $adGroupAdServiceSample->createSampleGetRequest($accountId, $campaignId, $appCampaignId, $adGroupId, $appAdGroupId, $adGroupAdValues);

    // Run
    $adGroupAdValues = $adGroupAdServiceSample->get($selector);

    // =================================================================
    // AdGroupAdService REMOVE
    // =================================================================
    // Create operands
    $operation = $adGroupAdServiceSample->createSampleRemoveRequest($accountId, $adGroupAdValues);

    // Run
    $adGroupAdValues = $adGroupAdServiceSample->mutate($operation, 'REMOVE');

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
