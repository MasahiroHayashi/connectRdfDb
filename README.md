# Oracle の RDF Graph Server にPHPで接続するプログラム

## getOracleRDF.php
自サーバにおいたPHPプログラムで、オラクルクラウドのRDFグラフデータベースにSPARQLクエリをリクエストし、そのレスポンスを表示するものです。最もシンプルな形です。<br><br>
デモ：　https://www.mirko.jp/pyramid/ora_db/getOracleRDF.php
<br><br>

## sp.html と ora_ajax.php
**sp.html** と **ora_ajax.php** を同じディレクトリに設置してください。<br>
**sp.html** の入力フォームにSPARQLクエリを入力しリクエストボタンを押すと、JavascriptのAJAX通信で **ora_ajax.php** にクエリを渡します。
**ora_ajax.php** はオラクルクラウドのRDFグラフデータベースにアクセスして結果を取得し、**sp.html** に返して表示する、というものです。<br><br>
デモ：　https://www.mirko.jp/pyramid/ora_db/sp.html
<br><br>

## デモのデータベースに取り込んだデータ
テストデータとして、以下の4ファイルをアップロードし、バルクロードしてデータベースに取り込んでいます。この4ファイルをデータベースに取り込むと、Olacle Cloud の無期限無料枠（Always Free）で使用できる20GBのストレージをほぼ100％使用することとなります。<br>
* https://www.mirko.jp/pyramid/data/data2020.ttl  （293MB　約668万トリプル）<br>
* https://www.mirko.jp/pyramid/data/data2020_J.ttl  （294MB　約668万トリプル）<br>
* https://www.mirko.jp/pyramid/data/data2020_oldMunicipal.ttl  （323MB　約721万トリプル）<br>
* https://www.mirko.jp/pyramid/data/data2020_J_oldMunicipal.ttl  （321MB　約721万トリプル）<br>
<br>
<img src="https://user-images.githubusercontent.com/39124856/149617371-83077803-5a40-452e-a5da-b8368c895d9d.png" />


## Oracle RDF Graph Server の構築方法
Yuji Nakakoshi さんの以下の記事を参考に構築したサーバーを利用しています。（Oracle Cloud の無期限無料枠（Always Free）を利用）<br>
Oracle RDF Graph ServerをデプロイするWebサーバーとして Jetty を使い、パブリックIPアドレスにドメインを設定しSSL化して、Basic認証を利用してREST APIを呼び出す、というものです。<br>
* <a href="https://apexugj.blogspot.com/2021/12/rdf-graph-server-1.html" target="_blank">Oracle RDF Graph ServerをAutonomous Databaseで使用する(1) - 環境構築</a><br>
* <a href="https://apexugj.blogspot.com/2021/12/rdf-graph-server-4.html" target="_blank">Oracle RDF Graph ServerをAutonomous Databaseで使用する(4) - Jetty 9.xのSSL化</a><br>
* <a href="https://apexugj.blogspot.com/2021/12/rdf-graph-server-5.html" target="_blank">Oracle RDF Graph ServerをAutonomous Databaseで使用する(5) - REST APIを呼び出す</a><br>
<br>

## 無期限無料枠で Oracle RDF Graph Server を立てるときのコツ
### コツ1　インスタンスのメモリー
上述のデモデータのようなサイズの大きいRDFデータを扱いたいとき、コンピュート・インスタンスのメモリが1GBだとアップロード／バルクロードの際にエラーが出て取り込めません。<br>
対応方法は、インスタンス作成の際にシェイプを選択するとき ***Ampere*** を選択しメモリー量を増やすことです。デフォルトで出てくる AMD や Intel のシェイプは、無料枠であれば 1CPU / メモリ1GB 固定ですが、***Ampere*** であれば、最大 4CPU / メモリ24GB まで無料枠内で増やすことが可能です。上述のデモでは ***Ampere*** シェイプの 3CPU / 18GB を使用していますが非常に快適です。

### コツ2　アップロードサイズの上限設定
![555](https://user-images.githubusercontent.com/39124856/149617676-b2b367f8-385c-41a7-8732-8e353f4f4c01.png)


### コツ3　ドメインの取得
REST API として外部のアプリケーションから呼び出したいときは、オラクルクラウドデータベースの制限により、ドメインとSSLを設定しないと実行できません。<br>
ドメインを取得するにあたり、上述の Yuji Nakakoshi さんの記事では  [Google Domains](https://domains.google/intl/ja_jp/) を利用するように記載がありますが、お金を一銭もかけたくない場合は  [freenom](https://www.freenom.com/)  を使うとよいです。私はこのデモで freenom の無料ドメインを利用していますが全く問題なく利用できています。
無料のSSL証明書は [ZeroSSL](https://zerossl.com/) 一択ですね。




