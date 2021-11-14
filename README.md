# RDFグラフデータベースにPHPで接続するプログラム

## １　PHPのソースコード
**getStatLOD.php**<br>
　こちらはe-Statの統計LODに接続するものです。ちゃんと動きます。<br>
　デモ：　https://www.mirko.jp/test/getStatLOD.php

**getOracleRDF.php**<br>
　こちらは上記の統計LODに接続するプログラムをベースとして、Oracle の RDF Graph Server に接続するために書きましたがうまく動きません。この形を基本としてWEBプログラムを作りたいのですが動作せずに困っています。<br>
　デモ：　https://www.mirko.jp/test/getOracleRDF.php
<br><br>
## ２　悩んでいる点
なお、ブラウザのURL入力フォームに以下のようにクエリを渡しますと・・・
```bash
https://140.83.84.199:8001/orardf/api/v1/datasets/query?query=select ?s ?p ?o where { ?s ?p ?o} limit 10&datasource=OLACLEMIRKODB2&datasetDef={"metadata":[{"networkOwner":"ADMIN","networkName":"SEMNET01","models":["data1980"]}]}
```
<br>
以下の認証画面が出ます。これに自分のユーザー名とパスワードを入力して突破するとブラウザからはしばらくはデータが取得できます。<br>

![123](https://user-images.githubusercontent.com/39124856/141647549-9fde362d-591c-4957-8bf3-cae11ac01ed2.png)

<br>
こんな感じでJSONで取得できます。<br>

![444](https://user-images.githubusercontent.com/39124856/141662587-636e73b1-ec0d-4b04-b0a6-4a1fb9ec2c5d.png)


<br>
ですが、外部サーバーに設置したPHPプログラムからはこの認証が突破できず困っています。<br><br>

## ３　やりたいこと
オラクルのRDFグラフデータベースの使い方として想定している方法が２種類あります。<br>
ひとつは、特定のWEBアプリからの限定アクセス。<br>
もうひとつは、公開エンドポイントとして誰でもデータのロードができるようにする。<br>
（更新系クエリはダメ。もし可能であればCORSを許可したい。）<br><br>
ネットでいろいろ調べましたが自分には分かりませんでした。
もし方法をご存じであればご教授いただけると幸いです。<br>


