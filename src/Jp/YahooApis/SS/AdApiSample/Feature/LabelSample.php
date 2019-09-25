<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Feature;

require_once __DIR__ . '/../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\{
    AdGroup\AdGroupServiceSample,
    AdGroupAd\AdGroupAdServiceSample,
    AdGroupAdLabel\AdGroupAdLabelServiceSample,
    AdGroupCriterion\AdGroupCriterionServiceSample,
    AdGroupCriterionLabel\AdGroupCriterionLabelServiceSample,
    AdGroupLabel\AdGroupLabelServiceSample,
    Campaign\CampaignServiceSample,
    CampaignLabel\CampaignLabelServiceSample,
    Label\LabelServiceSample
};
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201909\{
    AdGroup\ContainsLabelId as AdGroupContainsLabelId,
    AdGroup\Operator as AdGroupOperator,
    AdGroupAd\AdType,
    AdGroupAd\ContainsLabelId as AdGroupAdContainsLabelId,
    AdGroupAd\Operator as AdGroupAdOperator,
    AdGroupAdLabel\Operator as AdGroupAdLabelOperator,
    AdGroupCriterion\AdGroupCriterionUse,
    AdGroupCriterion\ContainsLabelId as AdGroupCriterionContainsLabelId,
    AdGroupCriterion\Operator as AdGroupCriterionOperator,
    AdGroupCriterionLabel\Operator as AdGroupCriterionLabelOperator,
    AdGroupLabel\Operator as AdGroupLabelOperator,
    Campaign\CampaignType,
    Campaign\ContainsLabelId as CampaignContainsLabelId,
    Campaign\Operator as CampaignOperator,
    CampaignLabel\Operator as CampaignLabelOperator,
    Label\Operator as LabelOperator
};

/**
 * example Label operation and Utility method collection.
 */
class LabelSample
{

    /**
     * example Ad operation.
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
        $campaignId = null;
        $adGroupId = null;
        $criterionId = null;
        $adId = null;
        $labelId = null;

        try {
            // =================================================================
            // CampaignService
            // =================================================================
            // ADD
            $addRequestCampaign = CampaignServiceSample::buildExampleMutateRequest(
                CampaignOperator::ADD, $accountId,
                [
                    CampaignServiceSample::createExampleStandardCampaign(
                        'SampleStandardCampaign_', CampaignServiceSample::createManualBiddingCampaignBiddingStrategy()
                    ),
                ]
            );
            $addResponseCampaign = CampaignServiceSample::mutate($addRequestCampaign);

            $valuesHolder->setCampaignValuesList($addResponseCampaign->getRval()->getValues());
            $campaignId = $valuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(CampaignType::STANDARD);

            // GET
            $getRequestCampaign = CampaignServiceSample::buildExampleGetRequest($accountId, [$campaignId]);
            $getRequestCampaign->getSelector()->setContainsLabelId(CampaignContainsLabelId::TRUE);
            CampaignServiceSample::get($getRequestCampaign);

            // =================================================================
            // AdGroupService
            // =================================================================
            // ADD
            $addRequestAdGroup = AdGroupServiceSample::buildExampleMutateRequest(
                AdGroupOperator::ADD, $accountId,
                [AdGroupServiceSample::createExampleStandardAdGroup($campaignId)]
            );
            $addResponseAdGroup = AdGroupServiceSample::mutate($addRequestAdGroup);

            $valuesHolder->setAdGroupValuesList($addResponseAdGroup->getRval()->getValues());
            $adGroupId = $valuesRepositoryFacade->getAdGroupValuesRepository()->findAdGroupId($campaignId);

            // GET
            $getRequestAdGroup = AdGroupServiceSample::buildExampleGetRequest($accountId, $valuesRepositoryFacade->getAdGroupValuesRepository()->getAdGroups());
            $getRequestAdGroup->getSelector()->setContainsLabelId(AdGroupContainsLabelId::TRUE);
            AdGroupServiceSample::get($getRequestAdGroup);

            // =================================================================
            // AdGroupCriterionService
            // =================================================================
            // ADD
            $addRequestAdGroupCriterion = AdGroupCriterionServiceSample::buildExampleMutateRequest(
                AdGroupCriterionOperator::ADD, $accountId,
                [AdGroupCriterionServiceSample::createExampleBiddableAdGroupCriterion($campaignId, $adGroupId),]
            );
            $addResponseAdGroupCriterion = AdGroupCriterionServiceSample::mutate($addRequestAdGroupCriterion);

            $valuesHolder->setAdGroupCriterionValuesList($addResponseAdGroupCriterion->getRval()->getValues());
            $criterionId = $valuesRepositoryFacade->getAdGroupCriterionValuesRepository()->findCriterionId($campaignId, $adGroupId, AdGroupCriterionUse::BIDDABLE);

            // GET
            $getRequestAdGroupCriterion = AdGroupCriterionServiceSample::buildExampleGetRequest($accountId, AdGroupCriterionUse::BIDDABLE,
                $valuesRepositoryFacade->getAdGroupCriterionValuesRepository()->getAdGroupCriterions()
            );
            $getRequestAdGroupCriterion->getSelector()->setContainsLabelId(AdGroupCriterionContainsLabelId::TRUE);
            AdGroupCriterionServiceSample::get($getRequestAdGroupCriterion);

            // =================================================================
            // AdGroupAdService
            // =================================================================
            // ADD
            $addRequestAdGroupAd = AdGroupAdServiceSample::buildExampleMutateRequest(
                AdGroupAdOperator::ADD, $accountId,
                [AdGroupAdServiceSample::createExampleExtendedTextAd($campaignId, $adGroupId),]
            );
            $addResponseAdGroupAd = AdGroupAdServiceSample::mutate($addRequestAdGroupAd);

            $valuesHolder->setAdGroupAdValuesList($addResponseAdGroupAd->getRval()->getValues());
            $adId = $valuesRepositoryFacade->getAdGroupAdValuesRepository()->findAdId($campaignId, $adGroupId, AdType::EXTENDED_TEXT_AD);

            // GET
            $getRequestAdGroupAd = AdGroupAdServiceSample::buildExampleGetRequest($accountId, $valuesRepositoryFacade->getAdGroupAdValuesRepository()->getAdGroupAds());
            $getRequestAdGroupAd->getSelector()->setContainsLabelId(AdGroupAdContainsLabelId::TRUE);
            AdGroupAdServiceSample::get($getRequestAdGroupAd);

            // =================================================================
            // LabelService
            // =================================================================
            // ADD
            $addRequestLabel = LabelServiceSample::buildExampleMutateRequest(LabelOperator::ADD, $accountId, [LabelServiceSample::createLabel()]);
            $addResponseLabel = LabelServiceSample::mutate($addRequestLabel);

            $valuesHolder->setLabelValuesList($addResponseLabel->getRval()->getValues());
            $labelId = $valuesRepositoryFacade->getLabelValuesRepository()->getLabelIds()[0];

            // SET
            $setRequestLabel = LabelServiceSample::buildExampleMutateRequest(LabelOperator::SET, $accountId,
                LabelServiceSample::createExampleSetRequest($valuesRepositoryFacade->getLabelValuesRepository()->getLabels())
            );
            LabelServiceSample::mutate($setRequestLabel);

            // GET
            $getRequestLabel = LabelServiceSample::buildExampleGetRequest($accountId, $valuesRepositoryFacade->getLabelValuesRepository()->getLabelIds());
            LabelServiceSample::get($getRequestLabel);

            // =================================================================
            // CampaignLabelService
            // =================================================================
            // ADD
            $addRequestCampaignLabel = CampaignLabelServiceSample::buildExampleMutateRequest(CampaignLabelOperator::ADD, $accountId,
                [CampaignLabelServiceSample::createCampaignLabel($campaignId, $labelId)]
            );
            CampaignLabelServiceSample::mutate($addRequestCampaignLabel);

            // =================================================================
            // CampaignService
            // =================================================================
            // GET
            CampaignServiceSample::get($getRequestCampaign);

            // =================================================================
            // AdGroupLabelService
            // =================================================================
            // ADD
            $addRequestAdGroupLabel = AdGroupLabelServiceSample::buildExampleMutateRequest(AdGroupLabelOperator::ADD, $accountId,
                [AdGroupLabelServiceSample::createAdGroupLabel($campaignId, $adGroupId, $labelId)]
            );
            AdGroupLabelServiceSample::mutate($addRequestAdGroupLabel);

            // =================================================================
            // AdGroupService
            // =================================================================
            // GET
            AdGroupServiceSample::get($getRequestAdGroup);

            // =================================================================
            // AdGroupCriterionLabelService
            // =================================================================
            // ADD
            $addRequestAdGroupCriterionLabel = AdGroupCriterionLabelServiceSample::buildExampleMutateRequest(AdGroupCriterionLabelOperator::ADD, $accountId,
                [AdGroupCriterionLabelServiceSample::createAdGroupCriterionLabel($campaignId, $adGroupId, $criterionId, $labelId)]
            );
            AdGroupCriterionLabelServiceSample::mutate($addRequestAdGroupCriterionLabel);

            // =================================================================
            // AdGroupCriterionService
            // =================================================================
            // GET
            AdGroupCriterionServiceSample::get($getRequestAdGroupCriterion);

            // =================================================================
            // AdGroupAdLabelService
            // =================================================================
            // ADD
            $addRequest = AdGroupAdLabelServiceSample::buildExampleMutateRequest(AdGroupAdLabelOperator::ADD, $accountId,
                [AdGroupAdLabelServiceSample::createAdGroupAdLabel($campaignId, $adGroupId, $adId, $labelId)]
            );
            AdGroupAdLabelServiceSample::mutate($addRequest);

            // =================================================================
            // AdGroupAdService
            // =================================================================
            // GET
            AdGroupAdServiceSample::get($getRequestAdGroupAd);

            // =================================================================
            // LabelService
            // =================================================================
            // GET
            LabelServiceSample::get($getRequestLabel);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;

        } finally {
            // =================================================================
            // Cleanup
            // =================================================================
            LabelServiceSample::cleanup($valuesHolder);
            AdGroupAdServiceSample::cleanup($valuesHolder);
        }
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    LabelSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
