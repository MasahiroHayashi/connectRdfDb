<?php
	// SPARQLクエリを配列に
	$param = array(
		'query' => 'select * where {?s ?p ?o.}limit 10' ,
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
	$url = "http://data.e-stat.go.jp/lod/sparql/alldata/query";

	// データ取得
	$contents = file_get_contents($url, false, $context);
	
	echo "<pre>";
	echo $contents ;
	echo "</pre>";
?>
