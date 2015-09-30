<?php
//-----------------------------------------------------------------
// common defines
//-----------------------------------------------------------------
define('API_VERSION', 'V5.2');
define('API_NS',      'http://ss.yahooapis.jp/V5');
define('XMLSCHEMANS', 'http://www.w3.org/2001/XMLSchema-instance');

//-----------------------------------------------------------------
// location
//-----------------------------------------------------------------
define('LOCATION',    'sandbox.ss.yahooapis.jp');  //for sandbox
//define('LOCATION',    'ss.yahooapis.jp'); //for production

//-----------------------------------------------------------------
// API Account
//-----------------------------------------------------------------
define('LICENSE',             'xxxx-xxxx-xxxx-xxxx');
define('APIACCOUNTID',        'xxxx-xxxx-xxxx-xxxx');
define('APIACCOUNTPASSWORD',  'xxxxxx');

//-----------------------------------------------------------------
// Onbehalf Account (if sandbox, can not use these params.)
//-----------------------------------------------------------------
define('ONBEHALFOFACCOUNTID', '');
define('ONBEHALFOFPASSWORD',  '');

//-----------------------------------------------------------------
// Account
//-----------------------------------------------------------------
define('ACCOUNTID',           'xxxxxxxx');

// for BidLandscapeSample
//-----------------------------------------------------------------
// BiddingStrategy
//-----------------------------------------------------------------
define('BIDDINGSTRATEGYID',   'xxxxxxxx');

//-----------------------------------------------------------------
// Campaign
//-----------------------------------------------------------------
define('CAMPAIGNID',          'xxxxxxxx');

//-----------------------------------------------------------------
// AdGroup
//-----------------------------------------------------------------
define('ADGROUPID',           'xxxxxxxx');

//-----------------------------------------------------------------
// AdGroupCriterions(optional)
//-----------------------------------------------------------------
//define('ADGROUPCRITERIONIDS', 'xxxxxxxx,xxxxxxxx');

// for adCustomizer
//-----------------------------------------------------------------
// FeedFolder
//-----------------------------------------------------------------
define('FEEDFOLDERID',           'xxxxxxxx');
define('INTEGERFEEDATTRIBUTEID', 'xxxxxxxx');
define('PRICEFEEDFOLDERID',      'xxxxxxxx');
define('DATEFEEDFOLDERID',       'xxxxxxxx');
define('STRINGFEEDFOLDERID',     'xxxxxxxx');