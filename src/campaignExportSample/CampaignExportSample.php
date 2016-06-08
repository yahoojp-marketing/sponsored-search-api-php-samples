<?php
require_once (dirname(__FILE__) . '/../../conf/api_config.php');
require_once (dirname(__FILE__) . '/../util/SoapUtils.class.php');

/**
 * Sample Program for CampaingExportService.
 * Copyright (C) 2016 Yahoo Japan Corporation. All Rights Reserved.
 */

class CampaignExportSample{
   private $serviceName = 'CampaignExportService';
   
   private $service;
   
   private $jodId;
   
   private $jobName;
   
   private $downloadUrl;
   
   public function __construct(){
      $this->service = SoapUtils::getService($this->serviceName);
      
   }

   /**
    * execute CampaignExportService::addJob
    * @param array $exportSetting
    * @throws Exception
    */
   public function addJob($exportSetting){
      $response = $this->service->invoke('addJob', $exportSetting);
      
      if(isset($response->rval->values)){
         if(isset($response->rval->values->job) && !isset($response->rval->values->error)){
           $this->jodId = $response->rval->values->job->jobId;
           $this->jobName = $response->rval->values->job->jobName;
         }else{
           throw new Exception('addJob Error. ' . $this->serviceName);
         }
      }else{
      	throw new Exception('No response of addJob ' . $this->serviceName . '.');
      }
   }
   
   /**
    * execute CampaignExportService::get
    * @param array $selector
    * @throws Exception
    */
   public function get($selector){
     
     for($i = 0; $i < 30; $i++){
       $response = $this->service->invoke('get', $selector);
       if(isset($response->rval->values)){
          if(isset($response->rval->values->job) && !isset($response->rval->values->error)){
            $status = $response->rval->values->job->status;
            if($status === 'COMPLETED'){
               $this->jodId = $response->rval->values->job->jobId;
               $this->jobName = $response->rval->values->job->jobName;
               $this->downloadUrl = $response->rval->values->job->downloadUrl;
               break;
            }else if($status === 'SYSTEM_ERROR'){
               throw new Exception('export job Error. ' . $this->serviceName);
            }
          }else{
            throw new Exception('get Error. ' . $this->serviceName);
          }
       }else{
          throw new Exception('No response of get ' . $this->serviceName . '.');
       }
       
       // sleep 10 second.
       echo "\n***** sleep 10 seconds for Export Job *****\n";
       sleep(10);
     }
     
     if(is_null($this->downloadUrl)){
       throw new Exception('export job Timeout. ' . $this->serviceName);
     }
   
   }
   
   /**
    * execute CampaignExportService::download
    */
   public function download(){
      $fileName = 'CampaignExport_' .  $this->jobName . '_' . $this->jodId . '.csv';
      SoapUtils::download($this->downloadUrl, $fileName);
   }
   
   public function getJobId(){
      return $this->jodId;
   }
   
   public function getJobName(){
      return $this->jobName;
   }
   
   public function getDownloadUrl(){
      return $this->downloadUrl;
   }

}

if(__FILE__ != realpath($_SERVER['PHP_SELF'])){
	return;
}

/**
 * execute CampaignExportServiceSample.
 */
try{
   $campaignExportSample = new CampaignExportSample();
   
   // =================================================================
   // CampaignExportService addJob
   // =================================================================
   $exportSetting = array(
       'setting' => array(
            'accountId'   => SoapUtils::getAccountId(),
            'jobName'     => 'sampleExport',
            'advanced'    => 'FALSE',
            'entityTypes' => array('CAMPAIGN','BIDDABLE_AD_GROUP_CRITERION'),
            'lang'        => 'EN',
            'output'      => 'CSV',
            'encoding'    => 'UTF-8'
       )
   );
   
   $campaignExportSample->addJob($exportSetting);
   
   
   // =================================================================
   // CampaignExportService get
   // =================================================================
   $selector = array(
       'selector' => array(
          'accountId' => SoapUtils::getAccountId(),
          'jobIds'    => array($campaignExportSample->getJobId())
       )
   );  
   
   $campaignExportSample->get($selector);

   
   // =================================================================
   // CampaignExportService download
   // =================================================================
   $campaignExportSample->download();
   
   
}catch (Exception $e){
   printf($e->getMessage() . "\n");
}
