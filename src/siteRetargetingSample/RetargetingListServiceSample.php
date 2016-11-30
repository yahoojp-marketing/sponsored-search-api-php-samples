<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for RetargetingListServiceSample.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class RetargetingListServiceSample
{

    private $serviceName = 'RetargetingListService';

    /**
     * Sample Program for RetargetingListService MUTATE.
     *
     * @param array $operation RetargetingListOperation entity.
     * @param string $method Operator enum.
     * @return array RetargetingListValues entity.
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
            if (!isset($returnValue->targetList)) {
                if ($returnValue->error->code != '210804') {
                    throw new Exception('Fail to ' . $method . ' ' . $this->serviceName . '.');
                }
            }
        }

        return $returnValues;
    }

    /**
     * Sample Program for RetargetingListService GET.
     *
     * @param array $selector RetargetingListSelector entity.
     * @return array RetargetingListValues entity.
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
            if (!isset($returnValue->targetList)) {
                throw new Exception('Fail to get ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * create sample request.
     *
     * @param long $accountId AccountID
     * @return RetargetingListOperation entity.
     */
    public function createSampleAddDefaultTargetListRequest($accountId)
    {

        // Create operands
        $operands = array(
            array(
                'accountId' => $accountId,
                'targetListType' => 'DEFAULT',
                'targetListName' => 'SampleDefaultTargetList_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'targetListDescription' => 'SampleDefaultTargetList',
                'reachStorageStatus' => 'OPEN',
                'reachStorageSpan' => '180'
            )
        );

        // Set xsi:type
        $operands[0] = new SoapVar($operands[0], SOAP_ENC_OBJECT, 'DefaultTargetList', API_NS, null, XMLSCHEMANS);

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
     * @return RetargetingListOperation entity.
     */
    public function createSampleAddRuleBaseTargetListRequest($accountId)
    {

        // Create operands
        $operands = array(
            array(
                'accountId' => $accountId,
                'targetListType' => 'RULE',
                'targetListName' => 'SampleRuleBaseTargetList_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'targetListDescription' => 'SampleRuleBaseTargetList',
                'reachStorageStatus' => 'OPEN',
                'reachStorageSpan' => '180',
                'rules' => array(
                    array(
                        'ruleItems' => array(
                            array(
                                'ruleType' => 'URL_RULE',
                                'operator' => 'CONTAINS',
                                'value' => 'yahoo.co.jp',
                                'urlKey' => 'REFFER_URL'
                            ),
                            array(
                                'ruleType' => 'URL_RULE',
                                'operator' => 'EQUALS',
                                'value' => 'http://promotionalads.yahoo.co.jp/',
                                'urlKey' => 'URL'
                            )
                        )
                    )
                ),
                'isAllVisitor' => 'FALSE',
                'isDateSpecific' => 'TRUE',
                'startDate' => '20161231',
                'endDate' => '20181231'
            )
        );

        // Copy
        $operands[1] = $operands[0];
        $operands[1]['targetListName'] = 'SampleRuleBaseTargetList2_CreateOn_' . SoapUtils::getCurrentTimestamp();
        $operands[2] = $operands[0];
        $operands[2]['targetListName'] = 'SampleRuleBaseTargetList3_CreateOn_' . SoapUtils::getCurrentTimestamp();

        // Set xsi:type
        $operands[0]['rules'][0]['ruleItems'][0] = new SoapVar($operands[0]['rules'][0]['ruleItems'][0], SOAP_ENC_OBJECT, 'UrlRuleItem', API_NS, null, XMLSCHEMANS);
        $operands[0]['rules'][0]['ruleItems'][1] = new SoapVar($operands[0]['rules'][0]['ruleItems'][1], SOAP_ENC_OBJECT, 'UrlRuleItem', API_NS, null, XMLSCHEMANS);
        $operands[0] = new SoapVar($operands[0], SOAP_ENC_OBJECT, 'RuleBaseTargetList', API_NS, null, XMLSCHEMANS);
        $operands[1]['rules'][0]['ruleItems'][0] = new SoapVar($operands[1]['rules'][0]['ruleItems'][0], SOAP_ENC_OBJECT, 'UrlRuleItem', API_NS, null, XMLSCHEMANS);
        $operands[1]['rules'][0]['ruleItems'][1] = new SoapVar($operands[1]['rules'][0]['ruleItems'][1], SOAP_ENC_OBJECT, 'UrlRuleItem', API_NS, null, XMLSCHEMANS);
        $operands[1] = new SoapVar($operands[1], SOAP_ENC_OBJECT, 'RuleBaseTargetList', API_NS, null, XMLSCHEMANS);
        $operands[2]['rules'][0]['ruleItems'][0] = new SoapVar($operands[2]['rules'][0]['ruleItems'][0], SOAP_ENC_OBJECT, 'UrlRuleItem', API_NS, null, XMLSCHEMANS);
        $operands[2]['rules'][0]['ruleItems'][1] = new SoapVar($operands[2]['rules'][0]['ruleItems'][1], SOAP_ENC_OBJECT, 'UrlRuleItem', API_NS, null, XMLSCHEMANS);
        $operands[2] = new SoapVar($operands[2], SOAP_ENC_OBJECT, 'RuleBaseTargetList', API_NS, null, XMLSCHEMANS);

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
     * @param array $retargetingListValues RetargetingListValues entity.
     * @return RetargetingListOperation entity.
     */
    public function createSampleAddLogicalTargetListRequest($accountId, $retargetingListValues)
    {

        // Get targetListIds
        $targetListIds = array();
        foreach ($retargetingListValues as $retargetingListKey => $retargetingListValue) {
            if (isset($retargetingListValue->targetList)) {
                $targetListIds[] = $retargetingListValue->targetList->targetListId;
            }
        }

        // Create logicalGroup
        $logicalGroup = array(
            'condition' => 'AND',
            'logicalOperand' => array()
        );
        foreach ($targetListIds as $key => $targetListId) {
            if ($key != 0) {
                $logicalGroup['logicalOperand'][] = array(
                    'targetListId' => $targetListId
                );
            }
        }

        // Create operands
        $operands = array(
            array(
                'accountId' => $accountId,
                'targetListType' => 'LOGICAL',
                'targetListName' => 'SampleLogicalTargetList_CreateOn_' . SoapUtils::getCurrentTimestamp(),
                'targetListDescription' => 'SampleLogicalTargetList',
                'logicalGroup' => array(
                    array(
                        'condition' => 'NOT',
                        'logicalOperand' => array(
                            array(
                                'targetListId' => $targetListIds[0]
                            )
                        )
                    ),
                    $logicalGroup
                )
            )
        );

        // Set xsi:type
        $operands[0] = new SoapVar($operands[0], SOAP_ENC_OBJECT, 'LogicalTargetList', API_NS, null, XMLSCHEMANS);

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
     * @param array $retargetingListValues RetargetingListValues entity.
     * @return RetargetingListOperation entity.
     */
    public function createSampleSetRequest($accountId, $retargetingListValues)
    {

        // Get targetListIds
        $targetListIds = array();
        foreach ($retargetingListValues as $retargetingListKey => $retargetingListValue) {
            if (isset($retargetingListValue->targetList) && $retargetingListValue->targetList->targetListType != 'LOGICAL') {
                $targetListIds[] = $retargetingListValue->targetList->targetListId;
            }
        }

        // Create operands
        $operands = array();
        foreach ($retargetingListValues as $retargetingListKey => $retargetingListValue) {

            // Create operand
            $operand = array(
                'accountId' => $retargetingListValue->targetList->accountId,
                'targetListId' => $retargetingListValue->targetList->targetListId,
                'targetListType' => $retargetingListValue->targetList->targetListType,
                'targetListName' => $retargetingListValue->targetList->targetListName
            );

            switch ($retargetingListValue->targetList->targetListType) {

                // Create DefaultTargetList
                case 'DEFAULT' :
                    $operand['targetListName'] = 'SampleDefaultTargetList_UpdateOn_' . $retargetingListKey . '_' . SoapUtils::getCurrentTimestamp();
                    $operand['targetListDescription'] = 'SampleDefaultTargetList_Update';

                    // Set xsi:type
                    $operand = new SoapVar($operand, SOAP_ENC_OBJECT, 'DefaultTargetList', API_NS, null, XMLSCHEMANS);
                    break;

                // Create RuleBaseTargetList
                case 'RULE' :
                    $operand['targetListName'] = 'SampleRuleBaseTargetList_UpdateOn_' . $retargetingListKey . '_' . SoapUtils::getCurrentTimestamp();
                    $operand['targetListDescription'] = 'SampleRuleBaseTargetList_Update';
                    $operand['reachStorageStatus'] = 'CLOSED';
                    $operand['reachStorageSpan'] = '100';
                    $operand['isAllVisitor'] = 'TRUE';
                    $operand['isDateSpecific'] = 'FALSE';

                    // Set xsi:type
                    $operand = new SoapVar($operand, SOAP_ENC_OBJECT, 'RuleBaseTargetList', API_NS, null, XMLSCHEMANS);
                    break;

                // Create LogicalTargetList
                case 'LOGICAL' :

                    // Create logicalGroup
                    $logicalGroup = array(
                        'condition' => 'OR',
                        'logicalOperand' => array()
                    );
                    foreach ($targetListIds as $key => $targetListId) {
                        $logicalGroup['logicalOperand'][] = array(
                            'targetListId' => $targetListId
                        );
                    }

                    $operand['targetListName'] = 'SampleLogicalTargetList_UpdateOn_' . $retargetingListKey . '_' . SoapUtils::getCurrentTimestamp();
                    $operand['targetListDescription'] = 'SampleLogicalTargetList_Update';
                    $operand['logicalGroup'] = $logicalGroup;

                    // Set xsi:type
                    $operand = new SoapVar($operand, SOAP_ENC_OBJECT, 'LogicalTargetList', API_NS, null, XMLSCHEMANS);
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

    /**
     * create sample request.
     *
     * @param long $accountId AccountID
     * @param array $retargetingListValues RetargetingListValues entity.
     * @return RetargetingListSelector entity.
     */
    public function createSampleGetRequest($accountId, $retargetingListValues)
    {

        // Get targetListIds
        $targetListIds = array();
        foreach ($retargetingListValues as $retargetingListKey => $retargetingListValue) {
            if (isset($retargetingListValue->targetList)) {
                $targetListIds[] = $retargetingListValue->targetList->targetListId;
            }
        }

        // Create selector
        $selector = array(
            'selector' => array(
                'accountId' => $accountId,
                'targetListIds' => $targetListIds,
                'targetListTypes' => array(
                    'DEFAULT',
                    'RULE',
                    'LOGICAL'
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
 * execute RetargetingListServiceSample.
 */
try {
    $retargetingListServiceSample = new RetargetingListServiceSample();

    $accountId = SoapUtils::getAccountId();

    // =================================================================
    // RetargetingListService ADD(DefaultTargetList)
    // =================================================================
    // Create operands for defaultTargetList
    $operation = $retargetingListServiceSample->createSampleAddDefaultTargetListRequest($accountId);

    // Run
    $retargetingListValues = $retargetingListServiceSample->mutate($operation, 'ADD');

    // =================================================================
    // RetargetingListService ADD(RuleBaseTargetList)
    // =================================================================
    // Create operands for ruleBaseTargetList
    $operation = $retargetingListServiceSample->createSampleAddRuleBaseTargetListRequest($accountId);

    // Run
    $retargetingListValues = array_merge($retargetingListValues, $retargetingListServiceSample->mutate($operation, 'ADD'));

    // =================================================================
    // RetargetingListService ADD(LogicalTargetList)
    // =================================================================
    // Create operands for logicalTargetList
    $operation = $retargetingListServiceSample->createSampleAddLogicalTargetListRequest($accountId, $retargetingListValues);

    // Run
    $retargetingListValues = array_merge($retargetingListValues, $retargetingListServiceSample->mutate($operation, 'ADD'));

    // =================================================================
    // RetargetingListService GET
    // =================================================================
    // Create selector
    $selector = $retargetingListServiceSample->createSampleGetRequest($accountId, $retargetingListValues);

    // Run
    $retargetingListValues = $retargetingListServiceSample->get($selector);

    // =================================================================
    // RetargetingListService SET
    // =================================================================
    // Create operands
    $operation = $retargetingListServiceSample->createSampleSetRequest($accountId, $retargetingListValues);

    // Run
    $retargetingListServiceSample->mutate($operation, 'SET');

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
