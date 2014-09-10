
<?php

//連結単語で画像表示
foreach($words as $list){
	$imgurl[] = pixabay_image($list);
}

?>

<div class="container">
	<div class="hero-unit">
		<h1>発想支援ツール</h1>
	    <p>発想は常にインプットから生まれる。<br/>
		本ページでは、外界からのインプットとして無作為に画像を3つ提示します。<br/>
		あなた自身の記憶や経験と上手く融合させて、3つの画像のつながりを考えてみてください。<br/>
		</p>
	</div>
	<div class="row">
		<div class="span12">

		</div>
	</div>
</div>

<!-- <p class="trimming"><img src="" alt="ユーザー名" width="100%"></p> -->



<div class="container" style="margin-top:30px">
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-6">
			<p class="trimming">
				<img class="img-responsive" width="100%" src="<?php echo $imgurl[0]; ?>" />
			</p>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-6">
			<p class="trimming">
				<img class="img-responsive" width="100%" src="<?php echo $imgurl[1]; ?>" />
			</p>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-6">
			<p class="trimming">
				<img class="img-responsive" width="100%" src="<?php echo $imgurl[2]; ?>" />
			</p>
		</div>
    </div>
</div>

<?php

//curlを使ってjson形式で取得
function curl_get_contents($word){
	$url = "http://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=" . $word;
	// sendRequest
	// note how referer is set manually
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_REFERER, "http://yusuke-ujitoko.hatenablog.com/");
	$body = curl_exec($ch);
	curl_close($ch);
	return $body;
}

//画像urlを返す関数
function google_image_curl($word){
	// while(true){
		while(true){
			$body = curl_get_contents($word);
			if(empty($body)){
				break;
			}
			$word = "sky";
		}
		$obj = json_decode($body, true);
		// var_dump($obj);
		//配列の要素数
		$num = count($obj['responseData']['results']);
		//ランダムに一つ選択
		$selectednum= mt_rand(0,$num-1);
		// if($num > 0){break;}
		$word = str_shuffle($word);
	// }s
	// $str = "<img height=150px src=".$obj['responseData']['results'][$selectednum]['unescapedUrl'].">";
	// return $str;
	return $obj['responseData']['results'][$selectednum]['unescapedUrl'];
}

//単語によるgoogle画像検索
function google_image($word) {
	//検索結果をJSONで取得
	$json_string = file_get_contents('http://ajax.googleapis.com/ajax/services/search/images?v=1.0&q='.$word);
	//配列にデコード
	$obj = json_decode($json_string, true);
	// var_dump($obj);
	//配列の要素数
	$num = count($obj['responseData']['results']);
	//ランダムに一つ選択
	$selectednum= mt_rand(0,$num-1);
	$str = "<img height=150px src=".$obj['responseData']['results'][$selectednum]['unescapedUrl'].">";
	return $str;
}

//単語によるgoogle画像検索
function pixabay_image($word) {
	//検索結果をJSONで取得
	$json_string = file_get_contents('http://pixabay.com/api/?username=yusuke314&key=83ac8ea7bc90625fdf2d&search_term='.$word);
	//配列にデコード
	$obj = json_decode($json_string, true);
	// var_dump($obj);
	//配列の要素数
	$num = count($obj['hits']);
	//ランダムに一つ選択
	$selectednum= mt_rand(0,$num-1);
	$str = $obj['hits'][$selectednum]['webformatURL'];
	return $str;
}






