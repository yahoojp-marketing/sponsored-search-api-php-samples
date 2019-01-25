<?php

namespace Jp\YahooApis\SS\V201901\PageFeedItem;

class PageFeedItemDownloadJob extends PageFeedItemJob
{

    /**
     * @var BulkLang $lang
     */
    protected $lang = null;

    /**
     * @var BulkOutput $output
     */
    protected $output = null;

    /**
     * @var BulkEncoding $encoding
     */
    protected $encoding = null;

    /**
     * @var PageFeedItemDownloadJobStatus $downloadJobStatus
     */
    protected $downloadJobStatus = null;

    /**
     * @var string $downloadUrl
     */
    protected $downloadUrl = null;

    
    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @return BulkLang
     */
    public function getLang()
    {
      return $this->lang;
    }

    /**
     * @param BulkLang $lang
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemDownloadJob
     */
    public function setLang($lang)
    {
      $this->lang = $lang;
      return $this;
    }

    /**
     * @return BulkOutput
     */
    public function getOutput()
    {
      return $this->output;
    }

    /**
     * @param BulkOutput $output
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemDownloadJob
     */
    public function setOutput($output)
    {
      $this->output = $output;
      return $this;
    }

    /**
     * @return BulkEncoding
     */
    public function getEncoding()
    {
      return $this->encoding;
    }

    /**
     * @param BulkEncoding $encoding
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemDownloadJob
     */
    public function setEncoding($encoding)
    {
      $this->encoding = $encoding;
      return $this;
    }

    /**
     * @return PageFeedItemDownloadJobStatus
     */
    public function getDownloadJobStatus()
    {
      return $this->downloadJobStatus;
    }

    /**
     * @param PageFeedItemDownloadJobStatus $downloadJobStatus
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemDownloadJob
     */
    public function setDownloadJobStatus($downloadJobStatus)
    {
      $this->downloadJobStatus = $downloadJobStatus;
      return $this;
    }

    /**
     * @return string
     */
    public function getDownloadUrl()
    {
      return $this->downloadUrl;
    }

    /**
     * @param string $downloadUrl
     * @return \Jp\YahooApis\SS\V201901\PageFeedItem\PageFeedItemDownloadJob
     */
    public function setDownloadUrl($downloadUrl)
    {
      $this->downloadUrl = $downloadUrl;
      return $this;
    }

}
