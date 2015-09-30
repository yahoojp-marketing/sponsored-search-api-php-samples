<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for TargetingIdeaService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */

//=================================================================
// TargetingIdeaService
//=================================================================
$targetingIdeaService = SoapUtils::getService('TargetingIdeaService');

//-----------------------------------------------
// TargetingIdeaService::get
//-----------------------------------------------
//request
$getTargetingIdeaRequest = array(
    'selector' => array(
        'searchParameter' => array(
            0 => array(
                'searchParameterUse' => 'RELATED_TO_KEYWORD',
                'keywords' => array(
                    0 => array(
                        'type' => 'KEYWORD',
                        'text' => 'sample1',
                        'matchType' => 'PHRASE'
                    )
                )
            ),
            1 => array(
                'searchParameterUse' => 'EXCLUDED_KEYWORD',
                'keywords' => array(
                    0 => array(
                        'type' => 'KEYWORD',
                        'text' => 'sample2',
                        'matchType' => 'EXACT'
                    )
                )
            )
        ),
        'paging' => array(
            'startIndex' => 1,
            'numberResults' => 20
        )
    )
);

//xsi:type for searchParameter[0] of RelatedToKeywordSearchParameter
$getTargetingIdeaRequest['selector']['searchParameter'][0] =
    new SoapVar($getTargetingIdeaRequest['selector']['searchParameter'][0], SOAP_ENC_OBJECT,
        'RelatedToKeywordSearchParameter', API_NS, 'searchParameter', XMLSCHEMANS);
//xsi:type for searchParameter[1] of ExcludedKeywordSearchParameter
$getTargetingIdeaRequest['selector']['searchParameter'][1] =
    new SoapVar($getTargetingIdeaRequest['selector']['searchParameter'][1], SOAP_ENC_OBJECT,
        'ExcludedKeywordSearchParameter', API_NS, 'searchParameter', XMLSCHEMANS);


//call API
$getTargetingIdeaResponse = $targetingIdeaService->invoke('get', $getTargetingIdeaRequest);


