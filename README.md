# Oracle の RDF Graph Server にPHPで接続するプログラム

## getOracleRDF.php
自サーバにおいたPHPプログラムで、オラクルクラウドのRDFグラフデータベースにSPARQLクエリをリクエストし、そのレスポンスを表示するものです。最もシンプルな形です。<br><br>
デモ：　https://www.mirko.jp/pyramid/ora_db/getOracleRDF.php
<br><br>

## sp.html と ora_ajax.php
sp.html と ora_ajax.php を同じディレクトリに設置してください。<br>
sp.html の入力フォームにSPARQLクエリを入力しリクエストボタンを押すと、JavascriptのAJAX通信で ora_ajax.php にクエリを渡します。
ora_ajax.php はオラクルクラウドのRDFグラフデータベースにアクセスして結果を取得し、sp.html に返して表示する、というものです。<br><br>
デモ：　https://www.mirko.jp/pyramid/ora_db/sp.html
<br><br>

## デモのデータベースに取り込んだデータ
テストデータとして、01_1_data2020.ttl と 01_2_data2020.ttl をアップロードし、バルクロードしてデータベースに取り込んでいます。
<br><br>

## Oracle RDF Graph Server の構築方法
Yuji N. さんの以下の記事を参考に構築したサーバーを利用しています。（Oracle Cloud の無料利用枠（Always Free）を利用）<br>
Oracle RDF Graph ServerをデプロイするWebサーバーとして Jetty を使い、パブリックIPアドレスにドメインを設定しSSL化して、Basic認証を利用してREST APIを呼び出す、というものです。<br>
* <a href="https://apexugj.blogspot.com/2021/12/rdf-graph-server-1.html" target="_blank">Oracle RDF Graph ServerをAutonomous Databaseで使用する(1) - 環境構築</a><br>
* <a href="https://apexugj.blogspot.com/2021/12/rdf-graph-server-4.html" target="_blank">Oracle RDF Graph ServerをAutonomous Databaseで使用する(4) - Jetty 9.xのSSL化</a><br>
* <a href="https://apexugj.blogspot.com/2021/12/rdf-graph-server-5.html" target="_blank">Oracle RDF Graph ServerをAutonomous Databaseで使用する(5) - REST APIを呼び出す</a><br>

## 今後の課題
ORACLE RDF Graph Server and Query UI を利用して自作のRDFファイルをアップロードする際、ファイルサイズが大きいと「ヒープサイズエラー」が出てアップロードできません。jetty.sh の JAVA_OPTIONS の調整でなんとかなりそうな気がしたのですが、いまいち上手くいったりいかなかったりで安定しません。
