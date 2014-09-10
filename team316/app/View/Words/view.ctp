
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
			$wordlist[0] .= $word . "%20";
			break;
		case 1:
			$wordlist[1] .= $word . "%20";
			break;
		case 2:
			$wordlist[2] .= $word . "%20";
	}
	$i++;
}


$imgurl = array();
//連結単語で画像表示
foreach($wordlist as $list){
	$word1 = trim($list);
	$word2 = substr($list, 0, -3);
	$word3 = trim($word2);
	$imgurl[] = google_image_curl($word3);
}

print_r($imgurl);
echo count($imgurl);
?>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-6"><img class=<?php echo $imgurl[0]; ?>/></div>
        <div class="col-md-4 col-sm-4 col-xs-6"><img class=<?php echo $imgurl[1]; ?>/></div>
       <div class="col-md-4 col-sm-4 col-xs-6"><img class=<?php echo $imgurl[2]; ?>/></div>
    </div>
</div>

<?php
// <div class="container">
// 	<div class="row">
// 		<div class="col-md-4 col-sm-4 col-xs-6"><img class="img-responsive" src="http://2.bp.blogspot.com/-H6MAoWN-UIE/TuRwLbHRSWI/AAAAAAAABBk/89iiEulVsyg/s400/Free%2BNature%2BPhoto.jpg" /></div>
//         <div class="col-md-3 col-sm-4 col-xs-6"><img class="img-responsive" src="http://www.virginia.org/uploadedImages/virginiaorg/Images/OrgImages/H/HamptonConventionVisitorBureau/Grandview_Nature_Preserve.jpg?width=300&height=200&scale=upscalecanvas" /></div>
//         <div class="col-md-3 col-sm-4 col-xs-6"><img class="img-responsive" src="http://blog.arborday.org/wp-content/uploads/2013/02/NEC1-300x200.jpg" /></div>
//         <div class="col-md-3 col-sm-4 col-xs-6"><img class="img-responsive" src="http://th03.deviantart.net/fs70/200H/f/2010/256/0/9/painting_of_nature_by_dhikagraph-d2ynalq.jpg" /></div>
//     	<div class="col-md-3 col-sm-4 col-xs-6"><img class="img-responsive" src="http://www.virginia.org/uploadedImages/virginiaorg/Images/OrgImages/H/HamptonConventionVisitorBureau/Grandview_Nature_Preserve.jpg?width=300&height=200&scale=upscalecanvas" /></div>
//         <div class="col-md-3 col-sm-4 col-xs-6"><img class="img-responsive" src="http://th03.deviantart.net/fs70/200H/f/2010/256/0/9/painting_of_nature_by_dhikagraph-d2ynalq.jpg" /></div>
// 	    <div class="col-md-3 col-sm-4 col-xs-6"><img class="img-responsive" src="http://2.bp.blogspot.com/-H6MAoWN-UIE/TuRwLbHRSWI/AAAAAAAABBk/89iiEulVsyg/s400/Free%2BNature%2BPhoto.jpg" /></div>
//         <div class="col-md-3 col-sm-4 col-xs-6"><img class="img-responsive" src="http://blog.arborday.org/wp-content/uploads/2013/02/NEC1-300x200.jpg" /></div>
//     </div>
// </div>

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
	while(true){
		$body = curl_get_contents($word);
		$obj = json_decode($body, true);
		// var_dump($obj);
		//配列の要素数
		$num = count($obj['responseData']['results']);
		//ランダムに一つ選択
		$selectednum= mt_rand(0,$num-1);
		if($num > 0){break;}
		$word = str_shuffle($word);
	}
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






