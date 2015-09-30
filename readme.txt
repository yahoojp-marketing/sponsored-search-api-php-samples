--------------------------------
【License】
--------------------------------
本ライブラリおよびサンプルコード等は MIT License にて提供しています。
詳しくは LICENSE をご覧ください。

--------------------------------
【Pull request に関して】
--------------------------------
頂いたPull requestに対して、全てを必ず受け付けられるわけではございません。
ご了承ください。

--------------------------------
【バージョン】
--------------------------------
Ver5.2.0

■変更履歴
-----------
2015/5/20:
- Version5.2に対応しました。

2014/6/13:
- Version5.1に対応しました。

2013/12/15:
- Version5.0に対応しました。

2013/08/28:
- Version4.2追加API：AdGroupBidMultiplierServiceに対応しました。

2013/07/22:
- Version4.2に対応しました。V4.0からの変更点は以下になります。
-- AdDisplayOptionSample.phpの追加

--------------------------------
【概要】
--------------------------------
このサンプルプログラムは、PHPを使用して各APIを呼び出す処理サンプルです。
PHPのSoapClientライブラリを使用してAPIを呼び出す形になっています。

--------------------------------
【内容物】
--------------------------------
■confディレクトリ
サンプルプログラム実行時の各種設定を記述するPHPファイルが格納されています。

- api_config.php：各種IDを記述する設定ファイルです。


■srcディレクトリ
以下の各プログラムが格納されています。

・以下は直接実行できるサンプルプログラムです。

- accountSample/AccountSample.php                     :AccountServiceによるアカウント参照、更新処理のサンプルです。
- adCustomizerSample/AdCustomizerSample               :AdGroupAdService/FeedItemService/FeedFolderService/AdGroupCriterionService/AdGroupService/CampaignServiceによるデータ自動挿入機能の登録、参照、更新、削除処理のサンプルです。
- adCustomizerSample/FeedFolderServiceSample.php      :FeedFolderServiceによるフィードフォルダーの登録、参照、更新、削除処理のサンプルです。
- adCustomizerSample/FeedItemServiceSample.php        :FeedItemServiceによるフィードアイテムの登録、参照、更新、削除処理のサンプルです。
- adDisplayOptionSample/AdDisplayOptionSample.php     :FeedItemService/CampaignFeedService/AdGroupFeedServiceによる広告表示オプションの登録、参照、更新処理のサンプルです。
- adSample/AdSample.php                               :BiddingStrategyService/CampaignService/CampaignTargetService/CampaignCriterionService/AdGroupService/AdGroupCriterionService/AdGroupAdService/AdGroupBidMultiplierServiceによる入稿処理のサンプルです。
- adSample/BiddingStrategyServiceSample.php           :BiddingStrategyServiceによる自動入札設定の登録、参照、更新、削除処理のサンプルです。
- adSample/CampaignServiceSample.php                  :CampaignServiceによるキャンペーンの登録、参照、更新、削除処理のサンプルです。
- adSample/CampaignTargetServiceSample.php            :CampaignTargetServiceによるキャンペーンターゲティング設定の登録、参照、更新、削除処理のサンプルです。
- adSample/CampaignCriterionServiceSample.php         :CampaignCriterionServiceによるキャンペーン除外クライテリアの登録、参照処理のサンプルです。
- adSample/AdGroupServiceSample.php                   :AdGroupServiceによる広告グループの登録、参照、更新、削除処理のサンプルです。
- adSample/AdGroupCriterionServiceSample.php          :AdGroupCriterionServiceによる広告グループクライテリアの登録、参照、更新、削除処理のサンプルです。
- adSample/AdGroupBidMultiplierServiceSample.php      :AdGroupBidMultiplierServiceによる広告グループ入札価格調整率の参照、更新処理のサンプルです。
- adSample/AdGroupAdServiceSample.php                 :AdGroupAdServiceによる広告の登録、参照、更新、削除処理のサンプルです。
- balanceSample/BalanceSample.php                     :BalanceServiceによるアカウント残高を参照する処理のサンプルです。
- bidLandscapeSample/BidLandscapeSample.php           :BidLandscapeServiceによるビットのシュミレート情報を参照する処理のサンプルです。
- bulkDownloadSample/BulkDownloadSample.php           :BulkServiceによるダウンロード処理のサンプルです。
- bulkUploadSample/BulkUploadSample.php               :BulkServiceによるアップロード処理のサンプルです。
- customerSyncSample/CustomerSyncSample.php           :CustomerSyncServiceによるアカウント、キャンペーン情報の更新履歴参照処理のサンプルです。
- conversionTrackerSample/ConversionTrackerSample.php :ConversionTrackerServiceによるコンバージョントラック情報の登録、参照、更新処理のサンプルです。
- dictionarySample/DictionarySample.php               :DictionaryServiceによる審査否認理由の参照、地域コード参照処理のサンプルです。
- keywordEstimatorSample/KeywordEstimatorSample.php   :KeywordEstimatorServiceによるキャンペーン及び広告グループのキーワードのクリック単価や掲載順位などの予測値を参照する処理のサンプルです。
- reportDownloadSample/ReportDownloadSample.php       :ReportDefinitionService, ReportServiceを使用したレポートダウンロード処理のサンプルです。
- targetingIdeaSample/TargetingIdeaSample.php         :TargetingIdeaServiceによる推奨キーワードを参照する処理のサンプルです。
- trafficEstimatorSample/TrafficEstimatorSample.php   :TrafficEstimatorServiceによる指定キーワードのクリック単価や掲載順位などの予測値を参照する処理のサンプルです。

・以下は各サンプルプログラムから利用されるクラスです。

- Service.class.php        ：SoapClientを拡張してRequestHeaderの設定処理を追加したクラスのサンプルです。
- SoapUtils.class.php      ：LocationServiceを使用したリクエスト先の取得処理のサンプル及びその他共通処理です。


■downloadディレクトリ
ReportDownloadSample、BulkDownloadSample、BulkUploadSampleを実行した際に、
ダウンロードしたデータがファイルとして格納されるディレクトリです。

■uploadディレクトリ
BulkUploadSampleでアップロードするファイルをあらかじめ格納しておくディレクトリです。


--------------------------------
【環境設定】
--------------------------------
ご使用のオペレーティング・システムが、Unix系OSまたはWindowsに拘わらず、
PHPの動作環境を構築するために、以下のものをインストールしてください。

・PHP 5.3.13、またはそれ以上のバージョンをインストールします。
・また、インストールする際は、以下のオプションが有効になるようにしてください。
　(1)日本語の使用
　(2)SOAP拡張モジュールの使用
　(3)openssl


confディレクトリ配下にあるapi_config.phpに各IDを記述します。

LOCATION            : リクエスト先毎にコメントアウトを外してください。
LICENSE             : APIライセンスを記述(必須)
APIACCOUNTID        : APIアカウントIDを記述(必須)
APIACCOUNTPASSWORD  : APIアカウントパスワードを記述(必須)
ONBEHALFOFACCOUNTID : 代行アカウントを記述(任意)
ONBEHALFOFPASSWORD  : 代行アカウントパスワードを記述(任意)
ACCOUNTID           : アカウントIDを記述(必須)

以下、IDはBidLandscapeSampleを動作させる際に必要となります。
BIDDINGSTRATEGYID   : 自動入札IDを記述（必須）
CAMPAIGNID          : キャンペーンIDを記述（必須）
ADGROUPID           : 広告グループIDを記述（必須）
ADGROUPCRITERIONIDS : 広告グループのクライテリアIDを記述（任意）
                      カンマ区切りで複数IDを指定することができます。

以下、IDはAdCustomizerSampleを動作させる際に必要となります。
FEEDFOLDERID           : フィードフォルダーIDを記述（必須）
INTEGERFEEDATTRIBUTEID : PlaceholderFieldがAD_CUSTOMIZER_INTEGERで登録されたフィードアトリビュートIDを記述（必須）
PRICEFEEDFOLDERID      : PlaceholderFieldがAD_CUSTOMIZER_PRICEで登録されたフィードアトリビュートIDを記述（必須）
DATEFEEDFOLDERID       : PlaceholderFieldがAD_CUSTOMIZER_DATEで登録されたフィードアトリビュートIDを記述（必須）
STRINGFEEDFOLDERID     : PlaceholderFieldがAD_CUSTOMIZER_STRINGで登録されたフィードアトリビュートIDを記述（必須）

--------------------------------
【実行】
--------------------------------
サンプルプログラムのzipを展開したディレクトリに移動します。
各サンプルプログラムを実行します。

■実行例
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

データをダウンロードする処理を実行した場合には、
downloadディレクトリにファイルが格納されます。

データをアップロードする処理を実行する場合には
実行前にあらかじめuploadディレクトリ配下にアップロードしたい
ファイルをuploadディレクトリ配下に格納しておく必要があります。
サンプルプログラムごとにファイル名は固定です。

・BulkUploadSample.phpの場合：SampleBulkUpload.csv

