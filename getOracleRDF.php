<?php
	// SPARQLクエリを配列に
	$param = array(
		'query' => 'select * where {?s ?p ?o.}limit 10' ,
		'datasource' => 'OLACLEMIRKODB2' ,
		'datasetDef' => '{"metadata":[{"networkOwner":"ADMIN","networkName":"SEMNET01","models":["data1980"]}]}'
	);
	
	// 配列からURLエンコードされたクエリ文字列を生成
	$param = http_build_query($param, "", "&");
	
	// ヘッダーの作成
	$header  = array(
		"Content-Type: application/x-www-form-urlencoded; charset=UTF-8",
		"Accept: application/sparql-results+json",
		"Content-Length: ".strlen($param)
	);
	
	// コンテキスト作成
	$context = array(
		"http" => array(
			"method"  => "POST",
			"header"  => implode("\r\n", $header),
			"content" => $param ,
		)
	);
	
	// ストリームコンテキストに変換
	$context = stream_context_create($context);
	
	// エンドポイントURL
	$url = "https://140.83.84.199:8001/orardf/api/v1/datasets/query";

	// データ取得
	$contents = file_get_contents($url, false, $context);
	
	echo "<pre>";
	echo $contents ;
	echo "</pre>";
?>
