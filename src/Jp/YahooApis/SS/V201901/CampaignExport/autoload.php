<?php


 function autoload_aa6e6aa629138628102e569183891a21($class)
{
    $classes = array(
        'Jp\YahooApis\SS\V201901\CampaignExport\CampaignExportService' => __DIR__ .'/CampaignExportService.php',
        'Jp\YahooApis\SS\V201901\SoapHeader' => __DIR__ .'/../SoapHeader.php',
        'Jp\YahooApis\SS\V201901\SoapResponseHeader' => __DIR__ .'/../SoapResponseHeader.php',
        'Jp\YahooApis\SS\V201901\Paging' => __DIR__ .'/../Paging.php',
        'Jp\YahooApis\SS\V201901\Error' => __DIR__ .'/../Error.php',
        'Jp\YahooApis\SS\V201901\ErrorDetail' => __DIR__ .'/../ErrorDetail.php',
        'Jp\YahooApis\SS\V201901\Page' => __DIR__ .'/../Page.php',
        'Jp\YahooApis\SS\V201901\ReturnValue' => __DIR__ .'/../ReturnValue.php',
        'Jp\YahooApis\SS\V201901\ListReturnValue' => __DIR__ .'/../ListReturnValue.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\UserStatus' => __DIR__ .'/UserStatus.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\ApprovalStatus' => __DIR__ .'/ApprovalStatus.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\EntityType' => __DIR__ .'/EntityType.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\Lang' => __DIR__ .'/Lang.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\Output' => __DIR__ .'/Output.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\Encoding' => __DIR__ .'/Encoding.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\JobStatus' => __DIR__ .'/JobStatus.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\CampaignExportPage' => __DIR__ .'/CampaignExportPage.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\CampaignExportReturnValue' => __DIR__ .'/CampaignExportReturnValue.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\CampaignExportValues' => __DIR__ .'/CampaignExportValues.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\Job' => __DIR__ .'/Job.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\ExportSetting' => __DIR__ .'/ExportSetting.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\JobSelector' => __DIR__ .'/JobSelector.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\CampaignExportFieldAttribute' => __DIR__ .'/CampaignExportFieldAttribute.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\CampaignExportFieldValue' => __DIR__ .'/CampaignExportFieldValue.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\get' => __DIR__ .'/get.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\getResponse' => __DIR__ .'/getResponse.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\addJob' => __DIR__ .'/addJob.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\addJobResponse' => __DIR__ .'/addJobResponse.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\getExportFields' => __DIR__ .'/getExportFields.php',
        'Jp\YahooApis\SS\V201901\CampaignExport\getExportFieldsResponse' => __DIR__ .'/getExportFieldsResponse.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_aa6e6aa629138628102e569183891a21');

// Do nothing. The rest is just leftovers from the code generation.
{
}
