<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for TargetingIdeaService.
 * Copyright (C) 2012 Yahoo Japan Corporation. All Rights Reserved.
 */
class TargetIdeaSample
{

    private $serviceName = 'TargetingIdeaService';

    /**
     * Sample Program for TargetingIdeaService GET.
     *
     * @param array $selector TargetingIdeaSelector entity.
     * @return array TargetingIdeaValues entity.
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
            if (!isset($returnValue->data)) {
                throw new Exception('Fail to get ' . $this->serviceName . '.');
            }
        }

        return $returnValues;
    }

    /**
     * create sample request.
     *
     * @return TargetingIdeaSelector entity.
     */
    public function createSampleGetRequest()
    {

        // Create selector
        $selector = array(
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
                        'searchParameterUse' => 'RELATED_TO_URL',
                        'url' => 'http://yahoo.co.jp'
                    )
                ),
                'paging' => array(
                    'startIndex' => 1,
                    'numberResults' => 20
                )
            )
        );

        // xsi:type for searchParameter[0] of RelatedToKeywordSearchParameter
        $selector['selector']['searchParameter'][0] = new SoapVar($selector['selector']['searchParameter'][0], SOAP_ENC_OBJECT, 'RelatedToKeywordSearchParameter', API_NS, 'searchParameter', XMLSCHEMANS);

        // xsi:type for searchParameter[1] of RelatedToUrlSearchParameter
        $selector['selector']['searchParameter'][1] = new SoapVar($selector['selector']['searchParameter'][1], SOAP_ENC_OBJECT, 'RelatedToUrlSearchParameter', API_NS, 'searchParameter', XMLSCHEMANS);

        return $selector;
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

/**
 * execute TargetIdeaSample.
 */
try {
    $targetIdeaSample = new TargetIdeaSample();

    // =================================================================
    // TargetingIdeaService GET
    // =================================================================
    // Create selector
    $selector = $targetIdeaSample->createSampleGetRequest();

    // Run
    $targetIdeaSample->get($selector);

} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
