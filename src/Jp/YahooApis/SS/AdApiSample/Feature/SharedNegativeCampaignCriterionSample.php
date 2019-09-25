<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Feature;

require_once __DIR__ . '/../../../../../../vendor/autoload.php';

use Exception;
use Jp\YahooApis\SS\AdApiSample\Basic\{
    AccountShared\AccountSharedServiceSample,
    Campaign\CampaignServiceSample,
    CampaignSharedSet\CampaignSharedSetServiceSample,
    SharedCriterion\SharedCriterionServiceSample
};
use Jp\YahooApis\SS\AdApiSample\Repository\ValuesRepositoryFacade;
use Jp\YahooApis\SS\AdApiSample\Util\SoapUtils;
use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201909\{
    AccountShared\Operator as AccountSharedOperator,
    Campaign\CampaignType,
    Campaign\Operator as CampaignOperator,
    CampaignSharedSet\Operator as CampaignSharedSetOperator,
    SharedCriterion\Operator as SharedCriterionOperator
};

/**
 * example SharedNegativeCampaignCriterion operation and Utility method collection.
 */
class SharedNegativeCampaignCriterionSample
{

    /**
     * example SharedNegativeCampaignCriterion operation.
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
        $sharedListIds = [];
        $criterionIds = [];

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
                ]
            );
            $addResponseCampaign = CampaignServiceSample::mutate($addRequestCampaign);

            $valuesHolder->setCampaignValuesList($addResponseCampaign->getRval()->getValues());
            $campaignId = $valuesRepositoryFacade->getCampaignValuesRepository()->findCampaignId(CampaignType::STANDARD);

            // =================================================================
            // AccountSharedService
            // =================================================================
            // ADD
            $addRequestAccountShared = AccountSharedServiceSample::buildExampleMutateRequest(
                AccountSharedOperator::ADD, $accountId, [AccountSharedServiceSample::createExampleAccountShared()]
            );
            $addResponseAccountShared = AccountSharedServiceSample::mutate($addRequestAccountShared);

            $valuesHolder->setAccountSharedValuesList($addResponseAccountShared->getRval()->getValues());
            $sharedListIds = $valuesRepositoryFacade->getAccountSharedValuesRepository()->getSharedListIds();

            // SET
            $setRequestAccountShared = AccountSharedServiceSample::buildExampleMutateRequest(
                AccountSharedOperator::SET, $accountId,
                AccountSharedServiceSample::createSampleSetRequest($valuesRepositoryFacade->getAccountSharedValuesRepository()->getAccountShareds())
            );

            // run
            AccountSharedServiceSample::mutate($setRequestAccountShared);

            // GET
            $getRequestCampaignSharedSet = AccountSharedServiceSample::buildExampleGetRequest($accountId, $sharedListIds);
            AccountSharedServiceSample::get($getRequestCampaignSharedSet);

            // =================================================================
            // CampaignSharedSetService
            // =================================================================
            // ADD
            $addRequestCampaignSharedSet = CampaignSharedSetServiceSample::buildExampleMutateRequest(
                CampaignSharedSetOperator::ADD, $accountId, [
                CampaignSharedSetServiceSample::createExampleCampaignSharedSet($sharedListIds[0], $campaignId)
            ]);
            $addResponseCampaignSharedSet = CampaignSharedSetServiceSample::mutate($addRequestCampaignSharedSet);

            $campaignSharedSets = [];
            foreach ($addResponseCampaignSharedSet->getRval()->getValues() as $campaignSharedSetValues) {
                $campaignSharedSets[] = $campaignSharedSetValues->getCampaignSharedSet();
            }

            // GET
            $getRequestCampaignSharedSet = CampaignSharedSetServiceSample::buildExampleGetRequest($accountId, $sharedListIds, [$campaignId]);
            CampaignSharedSetServiceSample::get($getRequestCampaignSharedSet);

            // =================================================================
            // SharedCriterionService
            // =================================================================
            // ADD
            $addRequestSharedCriterion = SharedCriterionServiceSample::buildExampleMutateRequest(
                SharedCriterionOperator::ADD, $accountId, [
                SharedCriterionServiceSample::createExampleSharedCriterion($sharedListIds[0])
            ]);
            $addResponseSharedCriterion = SharedCriterionServiceSample::mutate($addRequestSharedCriterion);

            foreach ($addResponseSharedCriterion->getRval()->getValues() as $sharedCriterionValues) {
                $criterionIds[] = $sharedCriterionValues->getSharedCriterion()->getCriterionId();
            }

            // GET
            $getRequestSharedCriterio = SharedCriterionServiceSample::buildExampleGetRequest($accountId, $sharedListIds, $criterionIds);
            SharedCriterionServiceSample::get($getRequestSharedCriterio);

            // =================================================================
            // CampaignSharedSetService
            // =================================================================
            // REMOVE
            $removeRequestCampaignSharedSet = CampaignSharedSetServiceSample::buildExampleMutateRequest(
                CampaignSharedSetOperator::REMOVE, $accountId, $campaignSharedSets
            );
            CampaignSharedSetServiceSample::mutate($removeRequestCampaignSharedSet);

            // =================================================================
            // AccountSharedService
            // =================================================================
            // REMOVE
            $removeRequestAccountShared = AccountSharedServiceSample::buildExampleMutateRequest(
                AccountSharedOperator::REMOVE, $accountId,
                $valuesRepositoryFacade->getAccountSharedValuesRepository()->getAccountShareds()
            );
            AccountSharedServiceSample::mutate($removeRequestAccountShared);

        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
            throw $e;

        } finally {
            // =================================================================
            // Cleanup
            // =================================================================
            CampaignServiceSample::cleanup($valuesHolder);
        }
    }
}

if (__FILE__ != realpath($_SERVER['PHP_SELF'])) {
    return;
}

try {
    SharedNegativeCampaignCriterionSample::runExample();
} catch (Exception $e) {
    print $e->getMessage() . PHP_EOL;
}
