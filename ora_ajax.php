<?php
// SPARQLクエリを配列化
$query = array('query' => $_POST['data']);

// 配列からURLエンコードされたクエリ文字列を生成
$query = http_build_query($query, "", "&");

// DBアクセスに必要なその他のパラメータ記述
$datasource = 'datasource=********';
$datasetDef = 'datasetDef={"metadata":[{"networkOwner":"********","networkName":"********","models":["********"]}]}';

// パラメータの合体
$param = '?'.$datasource.'&'.$datasetDef.'&'.$query ;

// ヘッダーの作成（BASIC認証のユーザ名とパスワードはここに書き込む）
$header  = array(
	"Content-Type: application/x-www-form-urlencoded; charset=UTF-8",
	'Authorization: Basic ' . base64_encode('********' . ':' . '********'),
	"Accept: application/sparql-results+json"
);

// コンテキスト作成
$context = array(
	"http" => array(
		"method"  => "GET",
		"header"  => implode("\r\n", $header),
	)
);

// ストリームコンテキストに変換
$context = stream_context_create($context);

// アクセスするURLにパラメータ付加
$url = 'https://*******.***/orardf/api/v1/datasets/query'.$param;

// データ取得
$contents = file_get_contents($url, false, $context);

echo $contents
?>
