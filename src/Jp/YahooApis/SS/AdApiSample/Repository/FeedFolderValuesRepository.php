<?php
/**
 * Copyright (C) 2019 Yahoo Japan Corporation. All Rights Reserved.
 */

namespace Jp\YahooApis\SS\AdApiSample\Repository;

use Jp\YahooApis\SS\AdApiSample\Util\ValuesHolder;
use Jp\YahooApis\SS\V201901\FeedFolder\FeedFolder;
use Jp\YahooApis\SS\V201901\FeedFolder\FeedFolderPlaceholderField;

/**
 * Utility method collection for PHP Sample Program.
 */
class FeedFolderValuesRepository
{

    /**
     * @var ValuesHolder
     */
    private $valuesHolder;

    /**
     * FeedFolderValuesRepository constructor.
     * @param ValuesHolder $valuesHolder
     */
    public function __construct(ValuesHolder $valuesHolder)
    {
        $this->valuesHolder = $valuesHolder;
    }

    /**
     * @return FeedFolder[]
     */
    public function getFeedFolders(): array
    {
        if (is_null($this->valuesHolder->getFeedFolderValuesList())) {
            return null;
        }
        $feedFolders = [];
        foreach ($this->valuesHolder->getFeedFolderValuesList() as $feedFolderValue) {
            $feedFolders[] = $feedFolderValue->getFeedFolder();
        }
        return $feedFolders;
    }

    /**
     * @return int[]
     */
    public function getFeedFolderIds(): array
    {
        $feedFolderIds = [];
        if (is_null($this->valuesHolder->getFeedFolderValuesList())) {
            return $feedFolderIds;
        }
        foreach ($this->valuesHolder->getFeedFolderValuesList() as $feedFolderValue) {
            $feedFolderIds[] = $feedFolderValue->getFeedFolder()->getFeedFolderId();
        }
        return $feedFolderIds;
    }

    /**
     * @param FeedFolderPlaceholderType $feedFolderPlaceholderType
     * @return int|null
     */
    public function findFeedFolderId(string $feedFolderPlaceholderType): ?int
    {
        if (is_null($this->valuesHolder->getFeedFolderValuesList())) {
            return null;
        }
        foreach ($this->valuesHolder->getFeedFolderValuesList() as $feedFolderValues) {
            if ($feedFolderValues->getFeedFolder()->getPlaceholderType() === $feedFolderPlaceholderType) {
                return $feedFolderValues->getFeedFolder()->getFeedFolderId();
            }
        }
        return null;
    }

    /**
     * @param int $feedFolderId
     * @return int|null
     */
    public function findFeedFolderName(int $feedFolderId): ?string
    {
        if (is_null($this->valuesHolder->getFeedFolderValuesList())) {
            return null;
        }
        foreach ($this->valuesHolder->getFeedFolderValuesList() as $feedFolderValues) {
            if ($feedFolderValues->getFeedFolder()->getFeedFolderId() === $feedFolderId) {
                return $feedFolderValues->getFeedFolder()->getFeedFolderName();
            }
        }
        return null;
    }

    /**
     * @param int $feedFolderId
     * @param FeedFolderPlaceholderField $feedFolderPlaceholderField
     * @return int|null
     */
    public function findFeedAttributeId(int $feedFolderId, string $feedFolderPlaceholderField): ?int
    {
        if (is_null($this->valuesHolder->getFeedFolderValuesList())) {
            return null;
        }
        foreach ($this->valuesHolder->getFeedFolderValuesList() as $feedFolderValues) {
            if ($feedFolderValues->getFeedFolder()->getFeedFolderId() === $feedFolderId) {
                foreach ($feedFolderValues->getFeedFolder()->getFeedAttribute() as $feedAttribute) {
                    if($feedAttribute->getPlaceholderField() === $feedFolderPlaceholderField) {
                        return $feedAttribute->getFeedAttributeId();
                    }
                }
            }
        }
        return null;
    }

    /**
     * @param int $feedFolderId
     * @param FeedFolderPlaceholderField $feedFolderPlaceholderField
     * @return string|null
     */
    public function findFeedAttributeName(int $feedFolderId, string $feedFolderPlaceholderField): ?string
    {
        if (is_null($this->valuesHolder->getFeedFolderValuesList())) {
            return null;
        }
        foreach ($this->valuesHolder->getFeedFolderValuesList() as $feedFolderValues) {
            if ($feedFolderValues->getFeedFolder()->getFeedFolderId() === $feedFolderId) {
                foreach ($feedFolderValues->getFeedFolder()->getFeedAttribute() as $feedAttribute) {
                    if($feedAttribute->getPlaceholderField() === $feedFolderPlaceholderField) {
                        return $feedAttribute->getFeedAttributeName();
                    }
                }
            }
        }
        return null;
    }
}
