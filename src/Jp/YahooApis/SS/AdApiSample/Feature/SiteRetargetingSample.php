<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Feature;

require_once __DIR__ . '/../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\{
    AdGroup\AdGroupServiceSample,
    AdGroupRetargetingList\AdGroupRetargetingListServiceSample,
    Campaign\CampaignServiceSample,
    CampaignRetargetingList\CampaignRetargetingListServiceSample,
    RetargetingList\RetargetingListServiceSample
};
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\{
    AdGroup\Operator as AdGroupOperator,
    AdGroupRetargetingList\Operator as AdGroupRetargetingListOperator,
    Campaign\AppStore,
    Campaign\CampaignType,
    Campaign\Operator as CampaignOperator,
    CampaignRetargetingList\Operator as CampaignRetargetingListOperator,
    RetargetingList\Operator as RetargetingListOperator,
    RetargetingList\TargetListType
};

/**
 * example SiteRetargeting operation and Utility method collection.
 */
class SiteRetargetingSample
{

    /**
     * example SiteRetargeting operation.
     * @throws Exception
     */
    public static function runExample(): void
    {
        // =================================================================
        // Setup
        // =================================================================
        $valuesHolder = new ValuesHolder();
        $valuesRepositoryFacade = new ValuesRepositoryFacade($valuesHolder);
        $accountId = SoapUtils::getAccountId();
        $campaignIdStandard = null;
        $campaignIdMobileApp = null;
        $adGroupIdStandard = null;
        $adGroupIdMobileApp = null;
        $targetListIdDefault = null;

        try {
            // =================================================================
            // CampaignService
            // =================================================================
            // ADD
            $addRequestCampaign = CampaignServiceSample::buildExampleMutateRequest(
                CampaignOperator::ADD, $accountId,
                [
                    CampaignServiceSample::createExampleStandardCampaign(
                        'SampleStandardCampaign_',
                        CampaignServiceSample::createManualBiddingCampaignBiddingStrategy()
                    ),
                    CampaignServiceSample::createExampleMobileAppCampaignForIOS(
                        'SampleMobileAppCampaignForIOS_',
                        CampaignServiceSample::createManualBiddingCampaignBiddingStrategy()
                    ),
                ]
            );
            $addResponseCampaign = CampaignServiceSample::mutate($addRequestCampaign);

            $valuesHolder->setCampaignValuesList($addResponseCampaign->getRval()->getValues());
            $campaignIdStandard = $valuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(CampaignType::STANDARD);
            $campaignIdMobileApp = $valuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(CampaignType::MOBILE_APP, AppStore::IOS);

            // =================================================================
            // AdGroupService
            // =================================================================
            // ADD
            $addRequestAdGroup = AdGroupServiceSample::buildExampleMutateRequest(
                AdGroupOperator::ADD, $accountId,
                [
                    AdGroupServiceSample::createExampleStandardAdGroup($campaignIdStandard),
                    AdGroupServiceSample::createExampleStandardAdGroup($campaignIdMobileApp)
                ]
            );
            $addResponseAdGroup = AdGroupServiceSample::mutate($addRequestAdGroup);

            $valuesHolder->setAdGroupValuesList($addResponseAdGroup->getRval()->getValues());
            $adGroupIdStandard = $valuesRepositoryFacade->getAdGroupValuesRepository()->findAdGroupId($campaignIdStandard);
            $adGroupIdMobileApp = $valuesRepositoryFacade->getAdGroupValuesRepository()->findAdGroupId($campaignIdMobileApp);

            // =================================================================
            // RetargetingListService
            // =================================================================
            // GET (DefaultTargetList)
            $getRequestRetargetingList = RetargetingListServiceSample::buildExampleGetRequest($accountId, []);
            $getRequestRetargetingList->getSelector()->setTargetListTypes([TargetListType::aDEFAULT]);
            $getResponseRetargetingList = RetargetingListServiceSample::get($getRequestRetargetingList);

            $valuesHolder->setRetargetingListValuesList($getResponseRetargetingList->getRval()->getValues());
            $targetListIdDefault = $valuesRepositoryFacade->getRetargetingListValuesRepository()->findTargetListId(TargetListType::aDEFAULT);

            // GetCustomKey
            $getCustomKeyRequest = RetargetingListServiceSample::buildExampleGetCustomKeyRequest($accountId);
            $getCustomKeyResponse = RetargetingListServiceSample::getCustomKey($getCustomKeyRequest);

            // ADD (RuleBaseTargetList)
            $addRequestRuleBaseTargetList = RetargetingListServiceSample::buildExampleMutateRequest(
                RetargetingListOperator::ADD, $accountId, [
                    RetargetingListServiceSample::createExampleRuleBaseTargetListUrlRuleItem($accountId),
                    RetargetingListServiceSample::createExampleRuleBaseTargetListCustomKeyRuleItem($accountId, $getCustomKeyResponse->getRval()->getCustomKeys()->getTextKey()),
                ]
            );
            $addResponseRuleBaseTargetList = RetargetingListServiceSample::mutate($addRequestRuleBaseTargetList);

            $valuesHolder->setRetargetingListValuesList($addResponseRuleBaseTargetList->getRval()->getValues());
            $ruleBaseTargetListIds = [];
            foreach ($valuesRepositoryFacade->getRetargetingListValuesRepository()->getTargetListIds() as $targetListId) {
                if ($targetListId != $targetListIdDefault) {
                    $ruleBaseTargetListIds[] = $targetListId;
                }
            }

            // ADD (LogicalTargetList)
            $addRequestLogicalTargetList = RetargetingListServiceSample::buildExampleMutateRequest(
                RetargetingListOperator::ADD, $accountId, [
                    RetargetingListServiceSample::createExampleLogicalTargetList($accountId, $targetListIdDefault, $ruleBaseTargetListIds)
                ]
            );
            $addResponseLogicalTargetList = RetargetingListServiceSample::mutate($addRequestLogicalTargetList);

            $valuesHolder->setRetargetingListValuesList($addResponseLogicalTargetList->getRval()->getValues());
            $targetListIds = $valuesRepositoryFacade->getRetargetingListValuesRepository()->getTargetListIds();

            // GET
            $getRequestRetargetingList = RetargetingListServiceSample::buildExampleGetRequest($accountId, $targetListIds);
            RetargetingListServiceSample::get($getRequestRetargetingList);

            // SET
            $setRequestCampaignRetargetingList = RetargetingListServiceSample::buildExampleMutateRequest(
                RetargetingListOperator::SET, $accountId,
                RetargetingListServiceSample::createExampleSetRequest($valuesRepositoryFacade->getRetargetingListValuesRepository()->getTargetLists())
            );
            RetargetingListServiceSample::mutate($setRequestCampaignRetargetingList);

            // =================================================================
            // CampaignRetargetingListService
            // =================================================================
            // ADD
            $addRequestCampaignRetargetingList = CampaignRetargetingListServiceSample::buildExampleMutateRequest(
                CampaignRetargetingListOperator::ADD, $accountId,
                [
                    CampaignRetargetingListServiceSample::createExampleIncludedCampaignRetargetingList($campaignIdStandard, $targetListIdDefault),
                    CampaignRetargetingListServiceSample::createExampleExcludedCampaignRetargetingList($campaignIdMobileApp, $targetListIdDefault),
                ]
            );
            $addResponseCampaignRetargetingList = CampaignRetargetingListServiceSample::mutate($addRequestCampaignRetargetingList);

            $campaignRetargetingLists = [];
            foreach ($addResponseCampaignRetargetingList->getRval()->getValues() as $campaignRetargetingListValues) {
                $campaignRetargetingLists[] = $campaignRetargetingListValues->getCampaignRetargetingList();
            }

            // SET
            $setRequestCampaignRetargetingList = CampaignRetargetingListServiceSample::buildExampleMutateRequest(
                CampaignRetargetingListOperator::SET, $accountId,
                CampaignRetargetingListServiceSample::createExampleSetRequest($campaignRetargetingLists)
            );
            CampaignRetargetingListServiceSample::mutate($setRequestCampaignRetargetingList);

            // GET
            $getRequestCampaignRetargetingList = CampaignRetargetingListServiceSample::buildExampleGetRequest(
                $accountId, [$campaignIdStandard, $campaignIdMobileApp], [$targetListIdDefault]
            );
            CampaignRetargetingListServiceSample::get($getRequestCampaignRetargetingList);

            // REMOVE
            $removeRequestCampaignRetargetingList = CampaignRetargetingListServiceSample::buildExampleMutateRequest(
                CampaignRetargetingListOperator::REMOVE, $accountId, $campaignRetargetingLists
            );
            CampaignRetargetingListServiceSample::mutate($removeRequestCampaignRetargetingList);

            // =================================================================
            // AdGroupRetargetingListService
            // =================================================================
            // ADD
            $addRequestAdGroupRetargetingList = AdGroupRetargetingListServiceSample::buildExampleMutateRequest(
                AdGroupRetargetingListOperator::ADD, $accountId,
                [
                    AdGroupRetargetingListServiceSample::createExampleIncludedAdGroupRetargetingList($campaignIdStandard, $adGroupIdStandard, $targetListIdDefault),
                    AdGroupRetargetingListServiceSample::createExampleExcludedAdGroupRetargetingList($campaignIdMobileApp, $adGroupIdMobileApp, $targetListIdDefault),
                ]
            );
            $addResponseAdGroupRetargetingList = AdGroupRetargetingListServiceSample::mutate($addRequestAdGroupRetargetingList);

            $adGroupRetargetingLists = [];
            foreach ($addResponseAdGroupRetargetingList->getRval()->getValues() as $adGroupRetargetingListValues) {
                $adGroupRetargetingLists[] = $adGroupRetargetingListValues->getAdGroupRetargetingList();
            }

            // SET
            $setRequestAdGroupRetargetingList = AdGroupRetargetingListServiceSample::buildExampleMutateRequest(
                AdGroupRetargetingListOperator::SET, $accountId,
                AdGroupRetargetingListServiceSample::createExampleSetRequest($adGroupRetargetingLists)
            );
            AdGroupRetargetingListServiceSample::mutate($setRequestAdGroupRetargetingList);

            // GET
            $getRequestAdGroupRetargetingList = AdGroupRetargetingListServiceSample::buildExampleGetRequest(
                $accountId, [$campaignIdStandard, $campaignIdMobileApp], [$adGroupIdStandard, $adGroupIdMobileApp], [$targetListIdDefault]
            );
            AdGroupRetargetingListServiceSample::get($getRequestAdGroupRetargetingList);

            // REMOVE
            $removeRequestAdGroupRetargetingList = AdGroupRetargetingListServiceSample::buildExampleMutateRequest(
                AdGroupRetargetingListOperator::REMOVE, $accountId, $adGroupRetargetingLists
            );
            AdGroupRetargetingListServiceSample::mutate($removeRequestAdGroupRetargetingList);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;

        } finally {
            // =================================================================
            // Cleanup
            // =================================================================
            AdGroupServiceSample::cleanup($valuesHolder);
        }
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    SiteRetargetingSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
