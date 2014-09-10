<html>
<head>
<meta charset="utf-8">



</head>
<body>




<?php





echo google_image('sky');

//単語によるgoogle画像検索
function google_image($word) {
	//検索結果をJSONで取得
	$json_string = file_get_contents('http://ajax.googleapis.com/ajax/services/search/images?v=1.0&q='.$word);
	//配列にデコード
	$obj = json_decode($json_string, true);
	//配列の要素数
	$num = count($obj[responseData][results]);
	//ランダムに一つ選択
	$selectednum= mt_rand(0,$num-1);
	$str.="<img height=150px src=".$obj[responseData][results][$selectednum][unescapedUrl].">";
	return $str;
}
?>


</body>
</html>
