<?php

namespace Jp\YahooApis\SS\V201901\CampaignExport;

class ExportSetting
{

    /**
     * @var int $accountId
     */
    protected $accountId = null;

    /**
     * @var long[] $campaignIds
     */
    protected $campaignIds = null;

    /**
     * @var long[] $campaignCriterionIds
     */
    protected $campaignCriterionIds = null;

    /**
     * @var long[] $adGroupIds
     */
    protected $adGroupIds = null;

    /**
     * @var long[] $adIds
     */
    protected $adIds = null;

    /**
     * @var long[] $adGroupCriterionIds
     */
    protected $adGroupCriterionIds = null;

    /**
     * @var UserStatus[] $campaignUserStatuses
     */
    protected $campaignUserStatuses = null;

    /**
     * @var UserStatus[] $adGroupUserStatuses
     */
    protected $adGroupUserStatuses = null;

    /**
     * @var UserStatus[] $adGroupAdUserStatuses
     */
    protected $adGroupAdUserStatuses = null;

    /**
     * @var UserStatus[] $adGroupCriterionUserStatuses
     */
    protected $adGroupCriterionUserStatuses = null;

    /**
     * @var ApprovalStatus[] $adGroupAdApprovalStatuses
     */
    protected $adGroupAdApprovalStatuses = null;

    /**
     * @var ApprovalStatus[] $adGroupCriterionApprovalStatuses
     */
    protected $adGroupCriterionApprovalStatuses = null;

    /**
     * @var EntityType[] $entityTypes
     */
    protected $entityTypes = null;

    /**
     * @var string $jobName
     */
    protected $jobName = null;

    /**
     * @var Lang $lang
     */
    protected $lang = null;

    /**
     * @var Output $output
     */
    protected $output = null;

    /**
     * @var Encoding $encoding
     */
    protected $encoding = null;

    /**
     * @var string[] $exportFields
     */
    protected $exportFields = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int
     */
    public function getAccountId()
    {
      return $this->accountId;
    }

    /**
     * @param int $accountId
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\ExportSetting
     */
    public function setAccountId($accountId)
    {
      $this->accountId = $accountId;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getCampaignIds()
    {
      return $this->campaignIds;
    }

    /**
     * @param long[] $campaignIds
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\ExportSetting
     */
    public function setCampaignIds(array $campaignIds = null)
    {
      $this->campaignIds = $campaignIds;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getCampaignCriterionIds()
    {
      return $this->campaignCriterionIds;
    }

    /**
     * @param long[] $campaignCriterionIds
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\ExportSetting
     */
    public function setCampaignCriterionIds(array $campaignCriterionIds = null)
    {
      $this->campaignCriterionIds = $campaignCriterionIds;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getAdGroupIds()
    {
      return $this->adGroupIds;
    }

    /**
     * @param long[] $adGroupIds
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\ExportSetting
     */
    public function setAdGroupIds(array $adGroupIds = null)
    {
      $this->adGroupIds = $adGroupIds;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getAdIds()
    {
      return $this->adIds;
    }

    /**
     * @param long[] $adIds
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\ExportSetting
     */
    public function setAdIds(array $adIds = null)
    {
      $this->adIds = $adIds;
      return $this;
    }

    /**
     * @return long[]
     */
    public function getAdGroupCriterionIds()
    {
      return $this->adGroupCriterionIds;
    }

    /**
     * @param long[] $adGroupCriterionIds
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\ExportSetting
     */
    public function setAdGroupCriterionIds(array $adGroupCriterionIds = null)
    {
      $this->adGroupCriterionIds = $adGroupCriterionIds;
      return $this;
    }

    /**
     * @return UserStatus[]
     */
    public function getCampaignUserStatuses()
    {
      return $this->campaignUserStatuses;
    }

    /**
     * @param UserStatus[] $campaignUserStatuses
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\ExportSetting
     */
    public function setCampaignUserStatuses(array $campaignUserStatuses = null)
    {
      $this->campaignUserStatuses = $campaignUserStatuses;
      return $this;
    }

    /**
     * @return UserStatus[]
     */
    public function getAdGroupUserStatuses()
    {
      return $this->adGroupUserStatuses;
    }

    /**
     * @param UserStatus[] $adGroupUserStatuses
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\ExportSetting
     */
    public function setAdGroupUserStatuses(array $adGroupUserStatuses = null)
    {
      $this->adGroupUserStatuses = $adGroupUserStatuses;
      return $this;
    }

    /**
     * @return UserStatus[]
     */
    public function getAdGroupAdUserStatuses()
    {
      return $this->adGroupAdUserStatuses;
    }

    /**
     * @param UserStatus[] $adGroupAdUserStatuses
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\ExportSetting
     */
    public function setAdGroupAdUserStatuses(array $adGroupAdUserStatuses = null)
    {
      $this->adGroupAdUserStatuses = $adGroupAdUserStatuses;
      return $this;
    }

    /**
     * @return UserStatus[]
     */
    public function getAdGroupCriterionUserStatuses()
    {
      return $this->adGroupCriterionUserStatuses;
    }

    /**
     * @param UserStatus[] $adGroupCriterionUserStatuses
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\ExportSetting
     */
    public function setAdGroupCriterionUserStatuses(array $adGroupCriterionUserStatuses = null)
    {
      $this->adGroupCriterionUserStatuses = $adGroupCriterionUserStatuses;
      return $this;
    }

    /**
     * @return ApprovalStatus[]
     */
    public function getAdGroupAdApprovalStatuses()
    {
      return $this->adGroupAdApprovalStatuses;
    }

    /**
     * @param ApprovalStatus[] $adGroupAdApprovalStatuses
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\ExportSetting
     */
    public function setAdGroupAdApprovalStatuses(array $adGroupAdApprovalStatuses = null)
    {
      $this->adGroupAdApprovalStatuses = $adGroupAdApprovalStatuses;
      return $this;
    }

    /**
     * @return ApprovalStatus[]
     */
    public function getAdGroupCriterionApprovalStatuses()
    {
      return $this->adGroupCriterionApprovalStatuses;
    }

    /**
     * @param ApprovalStatus[] $adGroupCriterionApprovalStatuses
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\ExportSetting
     */
    public function setAdGroupCriterionApprovalStatuses(array $adGroupCriterionApprovalStatuses = null)
    {
      $this->adGroupCriterionApprovalStatuses = $adGroupCriterionApprovalStatuses;
      return $this;
    }

    /**
     * @return EntityType[]
     */
    public function getEntityTypes()
    {
      return $this->entityTypes;
    }

    /**
     * @param EntityType[] $entityTypes
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\ExportSetting
     */
    public function setEntityTypes(array $entityTypes = null)
    {
      $this->entityTypes = $entityTypes;
      return $this;
    }

    /**
     * @return string
     */
    public function getJobName()
    {
      return $this->jobName;
    }

    /**
     * @param string $jobName
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\ExportSetting
     */
    public function setJobName($jobName)
    {
      $this->jobName = $jobName;
      return $this;
    }

    /**
     * @return Lang
     */
    public function getLang()
    {
      return $this->lang;
    }

    /**
     * @param Lang $lang
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\ExportSetting
     */
    public function setLang($lang)
    {
      $this->lang = $lang;
      return $this;
    }

    /**
     * @return Output
     */
    public function getOutput()
    {
      return $this->output;
    }

    /**
     * @param Output $output
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\ExportSetting
     */
    public function setOutput($output)
    {
      $this->output = $output;
      return $this;
    }

    /**
     * @return Encoding
     */
    public function getEncoding()
    {
      return $this->encoding;
    }

    /**
     * @param Encoding $encoding
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\ExportSetting
     */
    public function setEncoding($encoding)
    {
      $this->encoding = $encoding;
      return $this;
    }

    /**
     * @return string[]
     */
    public function getExportFields()
    {
      return $this->exportFields;
    }

    /**
     * @param string[] $exportFields
     * @return \Jp\YahooApis\SS\V201901\CampaignExport\ExportSetting
     */
    public function setExportFields(array $exportFields = null)
    {
      $this->exportFields = $exportFields;
      return $this;
    }

}
