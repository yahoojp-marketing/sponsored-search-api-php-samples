--------------------------------
<<Version>>
--------------------------------
Ver5.2.0

[Change history]
-----------
2015/5/20:
- Correspond to V5.2.

2014/6/13:
- Correspond to V5.1.

2013/12/15:
- Correspond to V5.0.

2013/08/28:
- Additional API from V4.2: Correspond to AdGroupBidMultiplierService.

2013/07/22:
- Correspond to V4.2. The change from V4.0 is as below.
-- Added AdDisplayOptionSample.php

--------------------------------
<<Overview>>
--------------------------------
This sample program uses PHP to call each services in API. 
SoapClient library of PHP is required.

--------------------------------
<<Contents>>
--------------------------------
[conf directory]
PHP file is stored in order to describe each setting used in the sample program execution.
- api_config.php: It is the config file to describe each Id.

[src directory]
The following programs are stored.

* Sample programs can be executed directly. 
- accountSample/AccountSample.php                     : Sample of Get and Mutate operation for account information via AccountService.
- adCustomizerSample/AdCustomizerSample               : Sample of Get and Mutate operation for data auto insertion via AdGroupAdService/FeedItemService/FeedFolderService/AdGroupCriterionService/AdGroupService/CampaignService.
- adCustomizerSample/FeedFolderServiceSample.php      : Sample of Get and Mutate operation for feed (data auto insertion) folder via FeedFolderService.
- adCustomizerSample/FeedItemServiceSample.php        : Sample of Get and Mutate operation for feed item via FeedItemService.
- adDisplayOptionSample/AdDisplayOptionSample.php     : Sample of Get and Mutate operation of Ad Display Option via FeedItemService/CampaignFeedService/AdGroupFeedService.
- adSample/AdSample.php                               : Sample of Ad submission via  BiddingStrategyService/CampaignService/CampaignTargetService/CampaignCriterionService/AdGroupService/AdGroupCriterionService/AdGroupAdService/AdGroupBidMultiplierService.
- adSample/BiddingStrategyServiceSample.php           : Sample of Get and Mutate operation for auto bidding via BiddingStrategyService.
- adSample/CampaignServiceSample.php                  : Sample of Get and Mutate operation for campaign via CampaignService.
- adSample/CampaignTargetServiceSample.php            : Sample of Get and Mutate operation for target setting via CampaignTargetService.
- adSample/CampaignCriterionServiceSample.php         : Sample of Get and Mutate operation for negative criteria in campaign-level via CampaignCriterionService.
- adSample/AdGroupServiceSample.php                   : Sample of Get and Mutate operation for adgroup via AdGroupService.
- adSample/AdGroupCriterionServiceSample.php          : Sample of Get and Mutate operation for criteria (such as keyword) via AdGroupCriterionService.
- adSample/AdGroupBidMultiplierServiceSample.php      : Sample of Get and Mutate operation for bid multiplier information via AdGroupBidMultiplierService.
- adSample/AdGroupAdServiceSample.php                 : Sample of Get and Mutate operation for ad information via AdGroupAdService.
- balanceSample/BalanceSample.php                     : Sample of Get account balance via BalanceService.
- bidLandscapeSample/BidLandscapeSample.php           : Sample of Get bid landscape via BidLandscapeService.
- bulkDownloadSample/BulkDownloadSample.php           : Sample of download bulksheet via BulkService.
- bulkUploadSample/BulkUploadSample.php               : Sample of upload bulksheet via BulkService.
- customerSyncSample/CustomerSyncSample.php           : Sample of Get data of the operation history of account or campaign via CustomerSyncService.
- conversionTrackerSample/ConversionTrackerSample.php : Sample of Get and Mutate operation for conversion via ConversionTrackerService.
- dictionarySample/DictionarySample.php               : Sample of Get the list of EditorialReason snd Geo code via DictionaryService.
- keywordEstimatorSample/KeywordEstimatorSample.php   : Sample of Get the estimate keyword data from the existing campaign via KeywordEstimatorService.
- reportDownloadSample/ReportDownloadSample.php       : Sample of Get report via ReportDefinitionService/ReportService
- targetingIdeaSample/TargetingIdeaSample.php         : Sample of Get the related keywords based on the specified value via TargetingIdeaService.
- trafficEstimatorSample/TrafficEstimatorSample.php   : Sample of Get the estimate keyword data of the selected keyword via KeywordEstimatorService.

* Class is called from sample programs.
- Service.class.php   : It is a sample class added setting process in RequestHeader by extending SoapClient.
- SoapUtils.class.php : It is a sample for the process via LocationService and the common process.

[download directory]
It stores the downloded file when you execute ReportDownloadSample, BulkDownloadSample, or BulkUploadSample.

[upload directory]
It stores the upload file when you execute BulkUploadSample.

--------------------------------
<<Preparation>>
--------------------------------
Please install followings to build operation environment for PHP regardless of whether the OS is Unix or Windows.

PHP 5.3.13 or later version with the following options enabled:
 (1) Japanese language module(php_mbstring)
 (2) SOAP module(php_soap,php_xmlrpc)
 (3) openssl module(php_openssl)

Change authentication information of api_config.php under the conf directory.

LOCATION            : Comment out the unnecessary line.
LICENSE             : Required item
APIACCOUNTID        : Required item
APIACCOUNTPASSWORD  : Required item
ONBEHALFOFACCOUNTID : Optional item
ONBEHALFOFPASSWORD  : Optional item
ACCOUNTID           : Required item

The following ID is necessary to use BidLandscapeSample.
BIDDINGSTRATEGYID   : Required item
CAMPAIGNID          : Required item
ADGROUPID           : Required item
ADGROUPCRITERIONIDS : Optional item
                      You can set plural ID in Comma Separated Value.

The following ID is necessary to use AdCustomizerSample.
FEEDFOLDERID           : Required item
INTEGERFEEDATTRIBUTEID : Required item
PRICEFEEDFOLDERID      : Required item
DATEFEEDFOLDERID       : Required item
STRINGFEEDFOLDERID     : Required item

--------------------------------
<<Execution>>
--------------------------------
Move to the directory stored the zip of sample program.
Execute each sample program.

[e.g.]
---------------------------------------
$ php src/accountSample/AccountSample.php
$ php src/adCustomizerSample/AdCustomizerSample.php
$ php src/adCustomizerSample/FeedFolderServiceSample.php
$ php src/adCustomizerSample/FeedItemServiceSample.php
$ php src/adDisplayOptionSample/AdDisplayOptionSample.php
$ php src/adSample/AdSample.php
$ php src/balanceSample/BalanceSample.php
$ php src/bidLandscapeSample/BidLandscapeSample.php
$ php src/bulkDownloadSample/BulkDownloadSample.php
$ php src/bulkUploadSample/BulkUploadSample.php
$ php src/customerSyncSample/CustomerSyncSample.php
$ php src/conversionTrackerSample/ConversionTrackerSample.php
$ php src/dictionarySample/DictionarySample.php
$ php src/keywordEstimatorSample/KeywordEstimatorSample.php
$ php src/reportDownloadSample/ReportDownloadSample.php
$ php src/targetingIdeaSample/TargetingIdeaSample.php
$ php src/trafficEstimatorSample/TrafficEstimatorSample.php
---------------------------------------

1. When the operation for data download is executed, a file will be stored in the directory of download.

2. When the data upload process is executed, it is necessary to store the file to be uploaded to advance under the upload directory.
 In addition, the file name is fixed for each sample program.
 * In case of BulkUploadSample.php: SampleBulkUpload.csv
