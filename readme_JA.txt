--------------------------------
【バージョン】
--------------------------------
Version 201901

■変更履歴
-----------
2019/01/29:
- Version 201901に対応しました。

--------------------------------
【概要】
--------------------------------
このサンプルプログラムは、PHPを使用して各APIを呼び出す処理のサンプルです。
PHPのSoapClientライブラリを使用してAPIを呼び出します。


--------------------------------
【内容物】
--------------------------------
conf/
  - api_config.ini      : 各種IDを記述する設定ファイルです。
src/Jp/YahooApis/SS/
  - V201901             : 対象のAPIバージョンのPHP用EntityサンプルClassです。
  - AdApiSample/
    - Basic/            : プロモーション広告APIの各種Serviceサンプル集です。
    - Feature/          : プロモーション広告APIを利用した広告入稿、ターゲティングなどのサンプル集です。
    - Repository/       : プロモーション広告API各種サンプルを利用するための補助ユーティリティです。
    - Util/             : プロモーション広告API各種サンプルを利用するための補助ユーティリティです。
download/               : 各種Downloadサービスを実行した際に、ダウンロードしたデータがファイルとして格納されるディレクトリです。
upload/                 : 各種Uploadサービスを実行する際に、利用するデータファイルを格納するディレクトリです。


--------------------------------
【Feature説明】
--------------------------------
src/Jp/YahooApis/SS/AdApiSample/Feature/
  - AdCustomizerSample.php                      : データ自動挿入機能を利用した入稿処理のサンプルです。
  - AdDisplayOptionSample.php                   : 広告表示オプションを利用した入稿処理のサンプルです。
  - AdSample.php                                : アドバンスドURLシステムを利用した入稿処理のサンプルです。
  - DynamicAdsForSearchSample.php               : 動的検索連動型広告を利用した入稿処理のサンプルです。
  - LabelSample.php                             : ラベル機能を利用した処理のサンプルです。
  - SharedNegativeCampaignCriterionSample.php   : 対象外キーワード共有機能を利用した処理のサンプルです。
  - SiteRetargetingSample.php                   : サイトリターゲティング機能を利用した処理のサンプルです。
  - StructuredSnippetSample.php                 : カテゴリ補足オプションを利用した入稿処理のサンプルです。


--------------------------------
【環境設定】
--------------------------------
ご使用のオペレーティング・システムがUnix系OS、Windowsのいずれの場合でも、PHPの動作環境を構築するために、以下のものをインストールしてください。

1. PHP 7.2.x、またはそれ以上のバージョン
2. composer.jsonに記載されている各種エクステンション
3. confディレクトリ配下にあるapi_config.iniに各IDを記述します。
  - location            : リクエスト先ごとにコメントアウトを外してください。
  - license             : APIライセンスを記述してください。
  - apiAccountId        : APIアカウントIDを記述してください。
  - apiAccountPassword  : APIアカウントパスワードを記述してください。
  - onBehalfOfAccountId : 代行アカウントを記述してください（任意）。
  - onBehalfOfPassword  : 代行アカウントパスワードを記述してください（任意）。
  - accountId           : アカウントIDを記述してください（必須）。


--------------------------------
【実行】
--------------------------------
cloneしたサンプルプログラムのディレクトリに移動し、以下のコマンドを実行します。

■実行例
$ php ./src/Jp/YahooApis/SS/AdApiSample/Basic/Account/AccountServiceSample.php
$ php ./src/Jp/YahooApis/SS/AdApiSample/Feature/AdSample.php

※1　データをダウンロードする処理を実行した場合には、downloadディレクトリにファイルが格納されます。
※2　データをアップロードする処理を実行する場合には、あらかじめuploadディレクトリ配下にアップロードしたいファイルを格納しておく必要があります。
