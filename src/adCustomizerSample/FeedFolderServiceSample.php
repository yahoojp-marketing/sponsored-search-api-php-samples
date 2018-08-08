<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for FeedFolderServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class FeedFolderServiceSample
{

    private $serviceName = 'FeedFolderService';

    /**
     * Sample Program for FeedFolderService MUTATE.
     *
     * @param array $operation FeedFolderOperation entity.
     * @param string $method Operator enum.
     * @return array FeedFolderReturnValue entity.
     * @throws Exception
     */
    public function mutate($operation, $method)
    {
        // Call API
        $feedFolderService = SoapUtils::getService($this->serviceName);
        $feedFolderResponse = $feedFolderService->invoke('mutate', $operation);

        // Response
        if (isset($feedFolderResponse->rval->values)) {
            if (is_array($feedFolderResponse->rval->values)) {
                $feedFolderReturnValues = $feedFolderResponse->rval->values;
            } else {
                $feedFolderReturnValues = array(
                    $feedFolderResponse->rval->values
                );
            }
        } else {
            throw new Exception("No response of " . $method . " FeedFolderService.");
        }

        // Error
        foreach ($feedFolderReturnValues as $feedFolderReturnValue) {
            if (!isset($feedFolderReturnValue->feedFolder)) {
                throw new Exception("Fail to " . $method . " FeedFolderService.");
            }
        }

        return $feedFolderReturnValues;
    }

    /**
     * Sample Program for FeedFolderService GET.
     *
     * @param array $selector FeedFolderSelector entity.
     * @return array FeedFolderReturnValue entity.
     * @throws Exception
     */
    public function get($selector)
    {

        // Call API
        $feedFolderService = SoapUtils::getService($this->serviceName);
        $feedFolderResponse = $feedFolderService->invoke('get', $selector);

        // Response
        if (isset($feedFolderResponse->rval->values)) {
            if (is_array($feedFolderResponse->rval->values)) {
                $feedFolderReturnValues = $feedFolderResponse->rval->values;
            } else {
                $feedFolderReturnValues = array(
                    $feedFolderResponse->rval->values
                );
            }
        } else {
            throw new Exception("No response of get FeedFolderService.");
        }

        // Error
        foreach ($feedFolderReturnValues as $feedFolderReturnValue) {
            if (!isset($feedFolderReturnValue->feedFolder)) {
                throw new Exception("Fail to get FeedFolderService.");
            }
        }

        return $feedFolderReturnValues;
    }

    /**
     * Example Mutate Request Base.
     *
     * @param string $operator Operator
     * @param string $accountId Account ID
     * @return array Mutate entity.
     */
    public function createMutateRequest($operator, $accountId)
    {
        return array(
            'operations' => array(
                'operator' => $operator,
                'accountId' => $accountId,
                'operand' => array()
            )
        );
    }

    /**
     * Example AdCustomizer entity.
     *
     * @param string $accountId Account ID
     * @return  array FeedFolder entity.
     */
    public function createAddAdCustomizerFeedFolder($accountId)
    {
        return array(
            'accountId' => $accountId,
            'feedFolderName' => 'SampleAdCustomizerFeedFolder_' . SoapUtils::getCurrentTimestamp(),
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
        );
    }

    /**
     * Example DynamicAdForSearch entity.
     *
     * @param string $accountId Account ID
     * @return  array FeedFolder entity.
     */
    public function createAddDynamicAdForSearchFeedFolder($accountId)
    {
        return array(
            'accountId' => $accountId,
            'feedFolderName' => 'SampleDASFeedFolder_' . SoapUtils::getCurrentTimestamp(),
            'domain' => 'http://yahoo.co.jp',
            'placeholderType' => 'DYNAMIC_AD_FOR_SEARCH_PAGE_FEEDS'
        );
    }

    /**
     * Sample Program for FeedFolderService ADD.
     *
     * @param string $accountId Account ID
     * @return array FeedFolderValues entity
     * @throws Exception
     */
    function addFeedFolder($accountId)
    {
        // Set Request
        $feedFolderRequest = $this->createMutateRequest('ADD', $accountId);
        array_push($feedFolderRequest['operations']['operand'], $this->createAddAdCustomizerFeedFolder($accountId));
        array_push($feedFolderRequest['operations']['operand'], $this->createAddDynamicAdForSearchFeedFolder($accountId));
        return $this->mutate($feedFolderRequest, 'ADD');
    }

    /**
     * Sample Program for FeedFolderService Set.
     *
     * @param string $accountId Account ID
     * @param array $feedFolderValues FeedFolderValues entity for set.
     * @return array FeedFolderValues entity
     * @throws Exception
     */
    function setFeedFolder($accountId, $feedFolderValues)
    {

        // Set Request
        $feedFolderRequest = $this->createMutateRequest('SET', $accountId);

        // Set Operand
        foreach ($feedFolderValues as $feedFolderValue) {
            // for AdCustomizer
            if ($feedFolderValue->feedFolder->placeholderType === 'AD_CUSTOMIZER') {
                $operand = array(
                    'accountId' => $accountId,
                    'feedFolderId' => $feedFolderValue->feedFolder->feedFolderId,
                    'placeholderType' => $feedFolderValue->feedFolder->placeholderType,
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
                    )
                );
                array_push($feedFolderRequest['operations']['operand'], $operand);
            }
        }

        return $this->mutate($feedFolderRequest, 'SET');
    }

    /**
     * Sample Program for FeedFolderService Remove.
     *
     * @param string $accountId Account ID
     * @param array $feedFolderValues FeedFolderValues entity for set.
     * @return array FeedFolderValues entity
     * @throws Exception
     */
    function removeFeedFolder($accountId, $feedFolderValues)
    {
        // Set Request
        $feedFolderRequest = $this->createMutateRequest('REMOVE', $accountId);

        // Set Operand
        foreach ($feedFolderValues as $feedFolderValue) {
            $operand = array(
                'accountId' => $accountId,
                'placeholderType' => $feedFolderValue->feedFolder->placeholderType,
                'feedFolderId' => $feedFolderValue->feedFolder->feedFolderId
            );
            array_push($feedFolderRequest['operations']['operand'], $operand);
        }

        return $this->mutate($feedFolderRequest, 'REMOVE');
    }

    /**
     * Sample Program for FeedFolderService Get.
     *
     * @param string $accountId Account ID
     * @param array $feedFolderValues FeedFolderValues entity for set.
     * @return array FeedFolderValues entity
     * @throws Exception
     */
    function getFeedFolder($accountId, $feedFolderValues)
    {
        // Set feedFolderIds
        $feedFolderIds = array();
        foreach ($feedFolderValues as $feedFolderValue) {
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

        return $this->get($feedFolderRequest);
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

/**
 * FeedFolderServiceSample
 */
try {
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

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}