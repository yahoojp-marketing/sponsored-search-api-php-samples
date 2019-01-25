<?php


 function autoload_e7b872dc8b4d5532ba4c623ac5354ed1($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemService' => __DIR__ .'/PageFeedItemService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\BulkLang' => __DIR__ .'/BulkLang.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\BulkOutput' => __DIR__ .'/BulkOutput.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\BulkEncoding' => __DIR__ .'/BulkEncoding.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemUploadType' => __DIR__ .'/PageFeedItemUploadType.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemUploadUrl' => __DIR__ .'/PageFeedItemUploadUrl.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemUploadUrlOperation' => __DIR__ .'/PageFeedItemUploadUrlOperation.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemUploadUrlPage' => __DIR__ .'/PageFeedItemUploadUrlPage.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemUploadUrlValues' => __DIR__ .'/PageFeedItemUploadUrlValues.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemJobStatusSelector' => __DIR__ .'/PageFeedItemJobStatusSelector.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemJobType' => __DIR__ .'/PageFeedItemJobType.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemJobStatusPage' => __DIR__ .'/PageFeedItemJobStatusPage.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemJobValues' => __DIR__ .'/PageFeedItemJobValues.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemDownloadJobReturnValue' => __DIR__ .'/PageFeedItemDownloadJobReturnValue.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemDownloadJobValues' => __DIR__ .'/PageFeedItemDownloadJobValues.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemJob' => __DIR__ .'/PageFeedItemJob.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemUploadJob' => __DIR__ .'/PageFeedItemUploadJob.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemDownloadJobOperation' => __DIR__ .'/PageFeedItemDownloadJobOperation.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemDownloadJob' => __DIR__ .'/PageFeedItemDownloadJob.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemUploadJobStatus' => __DIR__ .'/PageFeedItemUploadJobStatus.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemDownloadJobStatus' => __DIR__ .'/PageFeedItemDownloadJobStatus.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemReviewSummarySelector' => __DIR__ .'/PageFeedItemReviewSummarySelector.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemReviewSummaryPage' => __DIR__ .'/PageFeedItemReviewSummaryPage.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemReviewSummaryValues' => __DIR__ .'/PageFeedItemReviewSummaryValues.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemReviewSummary' => __DIR__ .'/PageFeedItemReviewSummary.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemSelector' => __DIR__ .'/PageFeedItemSelector.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedUrl' => __DIR__ .'/PageFeedUrl.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedUrlMatchType' => __DIR__ .'/PageFeedUrlMatchType.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemPage' => __DIR__ .'/PageFeedItemPage.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemReturnValues' => __DIR__ .'/PageFeedItemReturnValues.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItem' => __DIR__ .'/PageFeedItem.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemApprovalStatus' => __DIR__ .'/PageFeedItemApprovalStatus.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\addDownloadJob' => __DIR__ .'/addDownloadJob.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\addDownloadJobResponse' => __DIR__ .'/addDownloadJobResponse.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\getUploadUrl' => __DIR__ .'/getUploadUrl.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\getUploadUrlResponse' => __DIR__ .'/getUploadUrlResponse.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\getJobStatus' => __DIR__ .'/getJobStatus.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\getJobStatusResponse' => __DIR__ .'/getJobStatusResponse.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\getReviewSummary' => __DIR__ .'/getReviewSummary.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\getReviewSummaryResponse' => __DIR__ .'/getReviewSummaryResponse.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\PageFeedItem\getResponse' => __DIR__ .'/getResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_e7b872dc8b4d5532ba4c623ac5354ed1');

// Do nothing. The rest is just leftovers from the code generation.
{
}
