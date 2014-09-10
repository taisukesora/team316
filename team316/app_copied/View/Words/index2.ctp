
<?php

//9つの単語を表示
// var_dump($words);

//3合成単語用配列を容易
$wordlist = array(" ", " ", " ");
$i = 0;

//単語連結
foreach($words as $id => $word){
	switch($i % 3){
		case 0:
			$wordlist[0] .= $word . "+";
			break;
		case 1:
			$wordlist[1] .= $word . "+";
			break;
		case 2:
			$wordlist[2] .= $word . "+";
	}
	$i++;
}


// $imgurl = array();
//連結単語で画像表示
foreach($wordlist as $list){
	$word1 = trim($list);
	$word2 = substr($list, 0, -1);
	$word3 = trim($word2);
	echo $word3;
	//$imgurl[] = google_image_curl($word3);
}

// print_r($imgurl);



$imgurl = array("http://guamfiesta.up.n.seesaa.net/guamfiesta/image/kesiki.jpg", "http://blog-imgs-17.fc2.com/k/u/m/kumayoga/DSCF8678.jpg", "http://www.ogpress.com/2011524kesiki.JPG");
// var_dump($imgurl);



?>

<div class="container">
	<div class="hero-unit">
		<h1>発想支援ツール</h1>
	    <p>発想は常にインプットから生まれる。<br/>
		本ページでは、外界からのインプットとして無作為に画像を3つ提示します。<br/>
		あなたの思考、経験と上手く融合して、3つの画像のつながりを考えてください。<br/>
		</p>
	</div>
	<div class="row">
		<div class="span12">

		</div>
	</div>
</div>


<div class="container" style="margin-top:30px">
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-6"><img class="img-responsive" src="<?php echo $imgurl[0]; ?>" /></div>
        <div class="col-md-4 col-sm-4 col-xs-6"><img class="img-responsive" src="<?php echo $imgurl[1]; ?>"/></div>
       <div class="col-md-4 col-sm-4 col-xs-6"><img class="img-responsive" src="<?php echo $imgurl[2]; ?>"/></div>
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






