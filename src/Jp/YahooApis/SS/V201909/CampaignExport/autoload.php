<?php


 function autoload_a8a69593b5ca1e1c2ca7d44ce3b4dcb3($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201909\CampaignExport\CampaignExportService' => __DIR__ .'/CampaignExportService.php',
        'Jp\YahooApis\SS\V201909\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201909\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201909\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201909\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201909\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201909\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201909\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201909\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\UserStatus' => __DIR__ .'/UserStatus.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\ApprovalStatus' => __DIR__ .'/ApprovalStatus.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\EntityType' => __DIR__ .'/EntityType.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\Lang' => __DIR__ .'/Lang.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\Output' => __DIR__ .'/Output.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\Encoding' => __DIR__ .'/Encoding.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\JobStatus' => __DIR__ .'/JobStatus.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\CampaignExportPage' => __DIR__ .'/CampaignExportPage.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\CampaignExportReturnValue' => __DIR__ .'/CampaignExportReturnValue.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\CampaignExportValues' => __DIR__ .'/CampaignExportValues.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\Job' => __DIR__ .'/Job.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\ExportSetting' => __DIR__ .'/ExportSetting.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\JobSelector' => __DIR__ .'/JobSelector.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\CampaignExportFieldAttribute' => __DIR__ .'/CampaignExportFieldAttribute.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\CampaignExportFieldValue' => __DIR__ .'/CampaignExportFieldValue.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\addJob' => __DIR__ .'/addJob.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\addJobResponse' => __DIR__ .'/addJobResponse.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\getExportFields' => __DIR__ .'/getExportFields.php',
        'Jp\YahooApis\SS\V201909\CampaignExport\getExportFieldsResponse' => __DIR__ .'/getExportFieldsResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_a8a69593b5ca1e1c2ca7d44ce3b4dcb3');

// Do nothing. The rest is just leftovers from the code generation.
{
}
