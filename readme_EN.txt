--------------------------------
<<Version>>
--------------------------------
Version 6.2.0

[Change history]
-----------
2016/11/24:
- Correspond to Version 6.2.

2016/08/31:
- Correspond to Version 6.1.

2016/05/13:
- Add CampaignExportSample at Version 6.0.

2016/04/13:
- Correspond to Version 6.0.

2015/09/16:
- Correspond to Version 5.3.

2015/05/20:
- Correspond to Version 5.2.

2014/06/13:
- Correspond to Version 5.1.

2013/12/15:
- Correspond to Version 5.0.

2013/08/28:
- Additional API from Version 4.2: Correspond to AdGroupBidMultiplierService.

2013/07/22:
- Correspond to Version 4.2. The change from Version 4.0 is as below.
#NAME?

--------------------------------
<<Overview>>
--------------------------------
This sample program can call each services in API, using PHP. 
SoapClient library of PHP is used to call API.

--------------------------------
<<Contents>>
--------------------------------
[conf directory]
PHP file is stored that describes each setting when the sample program executed.

=- api_config.php: Config file to describe each ID.

[src directory]
The following programs are stored.

* Sample programs can be executed directly. 

- accountSample/AccountSample.php                                           : Sample of Get and Mutate operation for account information via AccountService.
- accountTrackingURLSample/AccountTrackingUrlSample.php                     : Sample of Get and Mutate operation for Tracking URL in account level via AccountTrackingUrlService.
- adCustomizerSample/adCustomizerSample                                     : Sample of Get and Mutate operation for Data Auto Insertion via BiddingStrategyService/CampaignService/AdGroupService/AdGroupCriterionService/FeedFolderService/FeedItemService/AdGroupAdService.
- adCustomizerSample/FeedFolderServiceSample.php                            : Sample of Get and Mutate operation for feed (Data Auto Insertion) folder via FeedFolderService.
- adCustomizerSample/FeedItemServiceSample.php                              : Sample of Get and Mutate operation for feed item via FeedItemService.
- adDisplayOptionSample/AdDisplayOptionSample.php                           : Sample of Get and Mutate operation of Ad Display Option via FeedItemService/CampaignFeedService/AdGroupFeedService.
- adSample/AdGroupAdServiceSample.php                                       : Sample of Get and Mutate operation for Ad information via AdGroupAdService.
- adSample/AdGroupBidMultiplierServiceSample.php                            : Sample of Get and Mutate operation for bid multiplier information via AdGroupBidMultiplierService.
- adSample/AdGroupCriterionServiceSample.php                                : Sample of Get and Mutate operation for criteria (such as keyword) via AdGroupCriterionService.
- adSample/AdGroupServiceSample.php                                         : Sample of Get and Mutate operation for adgroup via AdGroupService.
- adSample/AdSample.php                                                     : Sample of Ad submission via  BiddingStrategyService/CampaignService/CampaignTargetService/CampaignCriterionService/AdGroupService/AdGroupCriterionService/AdGroupAdService/AdGroupBidMultiplierService.
- adSample/BiddingStrategyServiceSample.php                                 : Sample of Get and Mutate operation for Auto bidding via BiddingStrategyService.
- adSample/CampaignCriterionServiceSample.php                               : Sample of Get and Mutate operation for negative criteria in campaign-level via CampaignCriterionService.
- adSample/CampaignServiceSample.php                                        : Sample of Get and Mutate operation for campaign via CampaignService.
- adSample/CampaignTargetServiceSample.php                                  : Sample of Get and Mutate operation for target setting via CampaignTargetService.
- advancedURLSample/advancedURLSample.php                                   : Sample of Mutate using the Advanced URL system via AccountTrackingUrlService/CampaignService/AdGroupService/AdGroupCriterionService/AdGroupAdService/FeedItemService.
- balanceSample/BalanceSample.php                                           : Sample of Get account balance via BalanceService.
- bidLandscapeSample/BidLandscapeSample.php                                 : Sample of Get bid landscape via BidLandscapeService.
- conversionTrackerSample/ConversionTrackerSample.php                       : Sample of Get and Mutate operation for conversion via ConversionTrackerService.
- customerSyncSample/CustomerSyncSample.php                                 : Sample of Get Data of the operation history of account or campaign via CustomerSyncService.
- dictionarySample/DictionarySample.php                                     : Sample of Get the list of EditorialReason snd Geo code via DictionaryService.
- keywordEstimatorSample/KeywordEstimatorSample.php                         : Sample of Get the estimate keyword Data from the existing campaign via KeywordEstimatorService.
- reportDownloadSample/ReportDownloadSample.php                             : Sample of Get report via ReportDefinitionService/ReportService
- sharedCriterionSample/AccountSharedServiceSample.php                   : Sample of Get and Mutate operation for shared Negative Keyword List in campaign-level of the account via AccountSharedService.
- sharedCriterionSample/CampaignSharedSetServiceSample.php               : Sample of Get and Mutate operation for shared Negative Keyword List in campaign-level of the account via AccountSharedService/CampaignService/CampaignSharedSetService.
- sharedCriterionSample/SharedCriterionServiceSample.php                 : Sample of Get and Mutate operation for shared Negative Keyword List in campaign-level of the account via AccountSharedService/SharedCriterionService.
- siteRetargetingSample/AdGroupRetargetingListServiceSample.php             : Sample of Get and Mutate operation for Ad group retargeting list via AdGroupRetargetingListService.
- siteRetargetingSample/NegativeCampaignRetargetingListServiceSample.php    : Sample of Get and Mutate operation for campaign retargeting list via NegativeCampaignRetargetingListService.
- siteRetargetingSample/RetargetingListServiceSample.php                    : Sample of Get and Mutate operation for retargeting list via RetargetingListService.
- siteRetargetingSample/SiteRetargetingSample.php                           : Sample of Get and Mutate operation for site retargeting function via RetargetingListService/BiddingStrategyService/CampaignService/NegativeCampaignRetargetingListService/AdGroupService/AdGroupRetargetingListService.
- targetingIdeaSample/TargetingIdeaSample.php                               : Sample of Get the related keywords based on the specified value via TargetingIdeaService.
- CampaignExportSample/CampaignExportSample.java                            : Sample of Add the export job and Download via CampaignExportService.

* Class is used from sample programs below.

- Service.class.php   : It is a Sample class Added setting process in RequestHeader by extending SoapClient.
- SoapUtils.class.php : It is a Sample for the process via LocationService and the common process.

[download directory]
It stores the downloded file when you execute ReportDownloadSample,CampaignExportSample.

[upload directory]
Currently not available.


--------------------------------
<<Preparation>>
--------------------------------
Please install followings to build operation environment for PHP regardless of whether the OS is Unix or Windows.

- PHP 5.3.13 or later version 
*When installing, please enable the following:
 (1) Japanese language
 (2) SOAP extension module
 (3) openssl

Input each ID below to api_config.properties under the conf directory.
LOCATION            : Comment out the unnecessary line
LICENSE             : API license (Required)
APIACCOUNTID        : API account ID (Required)
APIACCOUNTPASSWORD  : API account password (Required)
ONBEHALFOFACCOUNTID : Application account ID (Optional)
ONBEHALFOFPASSWORD  : Application account password (Optional)
ACCOUNTID           : Account ID (Required)

The following ID is required to use BidLandscapeSample.
BIDDINGSTRATEGYID         : Bidding Strategy ID (Required)
CAMPAIGNID,APPCAMPAIGNID  : Campaign ID (Required)
ADGROUPID,APPADGROUPID    : Ad group ID (Required)
ADGROUPCRITERIONIDS       : Ad group criterion ID (Required)
                            *Can set multiple ID by using comma.

The following ID is required to use AdCustomizerSample.
FEEDFOLDERID            : Feed Folder ID (Required)
INTEGERFEEDATTRIBUTEID  : Feed attribute ID from registered AD_CUSTOMIZER_INTEGER in PlaceholderField (Required)
PRICEFEEDFOLDERID       : Feed attribute ID from registered AD_CUSTOMIZER_PRICE in PlaceholderField (Required)
DATEFEEDFOLDERID        : Feed attribute ID from registered AD_CUSTOMIZER_DATE in PlaceholderField (Required)
STRINGFEEDFOLDERID      : Feed attribute ID from registered AD_CUSTOMIZER_STRING in PlaceholderField (Required)

The following ID is required to use SiteRetargetingSample.
TARGETLISTID  : Target list ID (Optional/New list created if it does not exist)


--------------------------------
<<Execution>>
--------------------------------
Move to the directory that deployed the zip of sample program.
Then execute each sample program.

[e.g.]
---------------------------------------
php src/accountSample/AccountSample.php
php src/accountTrackingURLSample/AccountTrackingUrlSample.php
php src/adCustomizerSample/AdCustomizerSample.php
php src/adCustomizerSample/FeedFolderServiceSample.php
php src/adCustomizerSample/FeedItemServiceSample.php
php src/adDisplayOptionSample/AdDisplayOptionSample.php
php src/adSample/AdGroupAdServiceSample.php
php src/adSample/AdGroupBidMultiplierServiceSample.php
php src/adSample/AdGroupCriterionServiceSample.php
php src/adSample/AdGroupServiceSample.php
php src/adSample/AdSample.php
php src/adSample/BiddingStrategyServiceSample.php
php src/adSample/CampaignCriterionServiceSample.php
php src/adSample/CampaignServiceSample.php
php src/adSample/CampaignTargetServiceSample.php
php src/advancedURLSample/advancedURLSample.php
php src/balanceSample/BalanceSample.php
php src/bidLandscapeSample/BidLandscapeSample.php
php src/conversionTrackerSample/ConversionTrackerSample.php
php src/customerSyncSample/CustomerSyncSample.php
php src/dictionarySample/DictionarySample.php
php src/keywordEstimatorSample/KeywordEstimatorSample.php
php src/reportDownloadSample/ReportDownloadSample.php
php src/sharedCriterionSample/AccountSharedServiceSample.php
php src/siteRetargetingSample/AdGroupRetargetingListServiceSample.php
php src/sharedCriterionSample/SharedCriterionServiceSample.php
php src/siteRetargetingSample/AdGroupRetargetingListServiceSample.php
php src/siteRetargetingSample/NegativeCampaignRetargetingListServiceSample.php
php src/siteRetargetingSample/RetargetingListServiceSample.php
php src/siteRetargetingSample/SiteRetargetingSample.php
php src/targetingIdeaSample/TargetingIdeaSample.php
php src/campaignExportSample/CampaignExportSample.php
---------------------------------------

When the operation for data download is executed, the file will be stored in the directory of download.
