<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Repository;

use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201909\Campaign\AppStore;
use Jp\YahooApis\SS\V201909\Campaign\Campaign;
use Jp\YahooApis\SS\V201909\Campaign\CampaignType;

/**
 * Utility method collection for PHP Sample Program.
 */
class CampaignValuesRepository
{

    /**
     * @var ValuesHolder
     */
    private $valuesHolder;

    /**
     * CampaignValuesRepository constructor.
     * @param ValuesHolder $valuesHolder
     */
    public function __construct(ValuesHolder $valuesHolder)
    {
        $this->valuesHolder = $valuesHolder;
    }

    /**
     * @return Campaign[]
     */
    public function getCampaigns(): array
    {
        $campaigns = [];
        if (is_null($this->valuesHolder->getCampaignValuesList())) {
            return $campaigns;
        }
        foreach ($this->valuesHolder->getCampaignValuesList() as $campaignValues) {
            $campaigns[] = $campaignValues->getCampaign();
        }
        return $campaigns;
    }

    /**
     * @return int[]
     */
    public function getCampaignIds(): array
    {
        $campaignIds = [];
        if (is_null($this->valuesHolder->getCampaignValuesList())) {
            return $campaignIds;
        }
        foreach ($this->valuesHolder->getCampaignValuesList() as $campaignValues) {
            $campaignIds[] = $campaignValues->getCampaign()->getCampaignId();
        }
        return $campaignIds;
    }

    /**
     * @param CampaignType $campaignType
     * @param AppStore|null $appStore
     * @return int|null
     */
    public function findCampaignId(string $campaignType, string $appStore = null): ?int
    {
        if ($campaignType === CampaignType::MOBILE_APP && !is_null($appStore)) {
            return $this->findCampaignIdByAppStore($appStore);
        } else {
            return $this->findCampaignIdByCampaignType($campaignType);
        }
    }

    /**
     * @param CampaignType $campaignType
     * @return int|null
     */
    private function findCampaignIdByCampaignType(string $campaignType): ?int
    {
        if (is_null($this->valuesHolder->getCampaignValuesList())) {
            return null;
        }
        foreach ($this->valuesHolder->getCampaignValuesList() as $campaignValues) {
            if ($campaignValues->getCampaign()->getCampaignType() === $campaignType) {
                return $campaignValues->getCampaign()->getCampaignId();
            }
        }
        return null;
    }

    /**
     * @param AppStore $appStore
     * @return int|null
     */
    private function findCampaignIdByAppStore(string $appStore): ?int
    {
        if (is_null($this->valuesHolder->getCampaignValuesList())) {
            return null;
        }
        foreach ($this->valuesHolder->getCampaignValuesList() as $campaignValues) {
            if ($campaignValues->getCampaign()->getCampaignType() === CampaignType::MOBILE_APP
                && $campaignValues->getCampaign()->getAppStore() === $appStore) {
                return $campaignValues->getCampaign()->getCampaignId();
            }
        }
        return null;
    }

    /**
     * @param int $campaignId
     * @return null|string
     */
    public function findAppId(int $campaignId): ?string
    {
        if (is_null($this->valuesHolder->getCampaignValuesList())) {
            return null;
        }
        foreach ($this->valuesHolder->getCampaignValuesList() as $campaignValues) {
            if ($campaignValues->getCampaign()->getCampaignId() === $campaignId) {
                return $campaignValues->getCampaign()->getAppId();
            }
        }
        return null;
    }
}
