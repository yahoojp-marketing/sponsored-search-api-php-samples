<?php
require_once(dirname(__FILE__) . '/../../conf/api_config.php');
require_once(dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for AuditLogService.
 * Copyright (C) 2017 Yahoo Japan Corporation. All Rights Reserved.
 */
class AuditLogSample
{

    private $serviceName = 'AuditLogService';

    private $service;

    private $jodId;

    private $jobName;

    private $downloadUrl;

    public function __construct()
    {
        $this->service = SoapUtils::getService($this->serviceName);

    }

    /**
     * execute AuditLogService::addJob
     * @param array $addJobRequest
     * @throws Exception
     */
    public function addJob($addJobRequest)
    {
        $response = $this->service->invoke('addJob', $addJobRequest);

        if (isset($response->rval->values)) {
            if (isset($response->rval->values->job) && !isset($response->rval->values->error)) {
                $this->jodId = $response->rval->values->job->jobId;
                $this->jobName = $response->rval->values->job->jobName;
            } else {
                throw new Exception('addJob Error. ' . $this->serviceName);
            }
        } else {
            throw new Exception('No response of addJob ' . $this->serviceName . '.');
        }
    }

    /**
     * execute AuditLogService::get
     * @param array $selector
     * @throws Exception
     */
    public function get($selector)
    {

        for ($i = 0; $i < 30; $i++) {
            $response = $this->service->invoke('get', $selector);
            if (isset($response->rval->values)) {
                if (isset($response->rval->values->job) && !isset($response->rval->values->error)) {
                    $status = $response->rval->values->job->jobStatus;
                    if ($status === 'COMPLETED') {
                        $this->jodId = $response->rval->values->job->jobId;
                        $this->jobName = $response->rval->values->job->jobName;
                        $this->downloadUrl = $response->rval->values->job->downloadUrl;
                        break;
                    } else {
                        if ($status === 'SYSTEM_ERROR') {
                            throw new Exception('export job Error. ' . $this->serviceName);
                        }
                    }
                } else {
                    throw new Exception('get Error. ' . $this->serviceName);
                }
            } else {
                throw new Exception('No response of get ' . $this->serviceName . '.');
            }

            // sleep 10 second.
            echo "\n***** sleep 10 seconds for Export Job *****\n";
            sleep(10);
        }

        if (is_null($this->downloadUrl)) {
            throw new Exception('export job Timeout. ' . $this->serviceName);
        }

    }

    /**
     * execute AuditLogService::download
     */
    public function download()
    {
        $fileName = 'AuditLog_' . $this->jobName . '_' . $this->jodId . '.csv';
        SoapUtils::download($this->downloadUrl, $fileName);
    }

    public function getJobId()
    {
        return $this->jodId;
    }

    public function getJobName()
    {
        return $this->jobName;
    }

    public function getDownloadUrl()
    {
        return $this->downloadUrl;
    }

}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

/**
 * execute AuditLogServiceSample.
 */
try {
    $auditLogSample = new AuditLogSample();

    // =================================================================
    // AuditLogService addJob
    // =================================================================
    // Set Operand
    $addOperand = array(
        'dateRange' => array(
            'startDate' => '20171001000000',
            'endDate' => '20171001000000'
        ),
        'eventSelector' => array(
            array(
                'entityType' => 'ALL',
                'eventTypes' => array('ALL')
            )
        ),
        'jobName' => 'sampleAuditLog',
        'lang' => 'EN',
        'output' => 'CSV',
        'encoding' => 'UTF_8',
    );

    // Set Request
    $addRequest = array(
        'operations' => array(
            'accountId' => SoapUtils::getAccountId(),
            'operand' => $addOperand
        )
    );

    $auditLogSample->addJob($addRequest);

    // =================================================================
    // AuditLogService get
    // =================================================================
    $selector = array(
        'selector' => array(
            'accountId' => SoapUtils::getAccountId(),
            'jobIds' => array($auditLogSample->getJobId())
        )
    );

    $auditLogSample->get($selector);

    // =================================================================
    // AuditLogService download
    // =================================================================
    $auditLogSample->download();


} catch (Exception $e) {
    printf($e->getMessage() . "\n");
}
