# RDFグラフデータベースにPHPで接続するプログラム

**getStatLOD.php**<br>
　こちらは統計LODに接続するものです。ちゃんと動きます。

**getOracleRDF.php**<br>
　こちらは Oracle の RDF Graph Server に接続するために書きましたがうまく動きません…。
<br><br>
---------------------------------------------------------------------------<br>
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
ですが、PHPプログラムからはこの認証が突破できず困っています。<br><br>

ちなみに、オラクルのRDFグラフデータベースの使い方として想定している方法が２種類あります。<br>
ひとつは、特定のWEBアプリからの限定アクセス。<br>
もうひとつは、公開エンドポイントとして誰でもデータのロードができるようにする。（更新系クエリはダメ。もし可能であればCORSを許可したい。）<br>
もし方法をご存じであればご教授いただけると幸いです。<br>


