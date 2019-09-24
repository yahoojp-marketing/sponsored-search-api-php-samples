<?php


 function autoload_e62ab57b28a2e7cb3df43aa2efa9081e($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemService' => __DIR__ .'/PageFeedItemService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\BulkLang' => __DIR__ .'/BulkLang.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\BulkOutput' => __DIR__ .'/BulkOutput.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\BulkEncoding' => __DIR__ .'/BulkEncoding.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemUploadType' => __DIR__ .'/PageFeedItemUploadType.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemUploadUrl' => __DIR__ .'/PageFeedItemUploadUrl.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemUploadUrlOperation' => __DIR__ .'/PageFeedItemUploadUrlOperation.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemUploadUrlPage' => __DIR__ .'/PageFeedItemUploadUrlPage.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemUploadUrlValues' => __DIR__ .'/PageFeedItemUploadUrlValues.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemJobStatusSelector' => __DIR__ .'/PageFeedItemJobStatusSelector.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemJobType' => __DIR__ .'/PageFeedItemJobType.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemJobStatusPage' => __DIR__ .'/PageFeedItemJobStatusPage.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemJobValues' => __DIR__ .'/PageFeedItemJobValues.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemDownloadJobReturnValue' => __DIR__ .'/PageFeedItemDownloadJobReturnValue.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemDownloadJobValues' => __DIR__ .'/PageFeedItemDownloadJobValues.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemJob' => __DIR__ .'/PageFeedItemJob.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemUploadJob' => __DIR__ .'/PageFeedItemUploadJob.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemDownloadJobOperation' => __DIR__ .'/PageFeedItemDownloadJobOperation.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemDownloadJob' => __DIR__ .'/PageFeedItemDownloadJob.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemUploadJobStatus' => __DIR__ .'/PageFeedItemUploadJobStatus.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemDownloadJobStatus' => __DIR__ .'/PageFeedItemDownloadJobStatus.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemReviewSummarySelector' => __DIR__ .'/PageFeedItemReviewSummarySelector.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemReviewSummaryPage' => __DIR__ .'/PageFeedItemReviewSummaryPage.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemReviewSummaryValues' => __DIR__ .'/PageFeedItemReviewSummaryValues.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemReviewSummary' => __DIR__ .'/PageFeedItemReviewSummary.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemSelector' => __DIR__ .'/PageFeedItemSelector.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedUrl' => __DIR__ .'/PageFeedUrl.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedUrlMatchType' => __DIR__ .'/PageFeedUrlMatchType.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemPage' => __DIR__ .'/PageFeedItemPage.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemReturnValues' => __DIR__ .'/PageFeedItemReturnValues.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItem' => __DIR__ .'/PageFeedItem.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\PageFeedItemApprovalStatus' => __DIR__ .'/PageFeedItemApprovalStatus.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\addDownloadJob' => __DIR__ .'/addDownloadJob.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\addDownloadJobResponse' => __DIR__ .'/addDownloadJobResponse.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\getUploadUrl' => __DIR__ .'/getUploadUrl.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\getUploadUrlResponse' => __DIR__ .'/getUploadUrlResponse.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\getJobStatus' => __DIR__ .'/getJobStatus.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\getJobStatusResponse' => __DIR__ .'/getJobStatusResponse.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\getReviewSummary' => __DIR__ .'/getReviewSummary.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\getReviewSummaryResponse' => __DIR__ .'/getReviewSummaryResponse.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\PageFeedItem\getResponse' => __DIR__ .'/getResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_e62ab57b28a2e7cb3df43aa2efa9081e');

// Do nothing. The rest is just leftovers from the code generation.
{
}
