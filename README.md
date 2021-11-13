# RDFグラフデータベースにPHPで接続するプログラム

* getStatLOD.php<br>
上記は統計LODに接続するものです。ちゃんと動きます。

* getOracleRDF.php<br>
上記は Oracle の RDF Graph Server に接続するために書きましたがうまく動きません。
どなたかご教授いただけると幸いです。


なお、ブラウザのURL入力フォームに以下のURLを入力します。

```bash
https://140.83.84.199:8001/orardf/api/v1/datasets/query?query=select ?s ?p ?o where { ?s ?p ?o} limit 10&datasource=OLACLEMIRKODB2&datasetDef={"metadata":[{"networkOwner":"ADMIN","networkName":"SEMNET01","models":["data1980"]}]}
```
 
