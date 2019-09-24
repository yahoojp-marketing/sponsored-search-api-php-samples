<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Repository;

use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201909\FeedItem\FeedItem;
use Jp\YahooApis\SS\V201909\FeedItem\FeedItemPlaceholderType;

/**
 * Utility method collection for PHP Sample Program.
 */
class FeedItemValuesRepository
{

    /**
     * @var ValuesHolder
     */
    private $valuesHolder;

    /**
     * FeedItemValuesRepository constructor.
     * @param ValuesHolder $valuesHolder
     */
    public function __construct(ValuesHolder $valuesHolder)
    {
        $this->valuesHolder = $valuesHolder;
    }

    /**
     * @return FeedItem[]
     */
    public function getFeedItems(): array
    {
        $feedItems = [];
        if (is_null($this->valuesHolder->getFeedItemValuesList())) {
            return $feedItems;
        }
        foreach ($this->valuesHolder->getFeedItemValuesList() as $feedItemValues) {
            $feedItems[] = $feedItemValues->getFeedItem();
        }
        return $feedItems;
    }

    /**
     * @return int[]
     */
    public function getFeedItemIds(): array
    {
        $feedItemIds = [];
        if (is_null($this->valuesHolder->getFeedItemValuesList())) {
            return $feedItemIds;
        }
        foreach ($this->valuesHolder->getFeedItemValuesList() as $feedItemValues) {
            $feedItemIds[] = $feedItemValues->getFeedItem()->getFeedItemId();
        }
        return $feedItemIds;
    }

    /**
     * @param FeedItemPlaceholderType $feedItemPlaceholderType
     * @return FeedItem|null
     */
    public function findFeedItem(string $feedItemPlaceholderType): ?FeedItem
    {
        if (is_null($this->valuesHolder->getFeedItemValuesList())) {
            return null;
        }
        foreach ($this->valuesHolder->getFeedItemValuesList() as $feedItemValues) {
            if ($feedItemValues->getFeedItem()->getPlaceholderType() === $feedItemPlaceholderType) {
                return $feedItemValues->getFeedItem();
            }
        }
        return null;
    }

    /**
     * @param FeedItemPlaceholderType $feedItemPlaceholderType
     * @return int|null
     */
    public function findFeedItemId(string $feedItemPlaceholderType): ?int
    {
        if (is_null($this->valuesHolder->getFeedItemValuesList())) {
            return null;
        }
        foreach ($this->valuesHolder->getFeedItemValuesList() as $feedItemValues) {
            if ($feedItemValues->getFeedItem()->getPlaceholderType() === $feedItemPlaceholderType) {
                return $feedItemValues->getFeedItem()->getFeedItemId();
            }
        }
        return null;
    }
}
