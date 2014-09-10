<html>
<head>




</head>
<body>


<?php

$json_string = file_get_contents('http://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=sky'); ##今回のキモ
$obj = json_decode($json_string, true);


//echo $obj[0];
 // var_dump($obj);

//var_dump($obj[responseData][results][0][unescapedUrl]);
$url = $obj[responseData][results][0][unescapedUrl];
echo $url;

$str = "<img height=150px src=".$url.">";
// echo $str;

$str2 = "<p>".$str."</p>";
echo $str2;
// $str.="<p>";

/*
foreach($obj[responseData][results] as $rec){
    // $str.="<img height=150px src=".$rec[unescapedUrl].">";
    // echo $rec[unescapedUrl];
    print $rec[unescapedUrl];
}
// $str.="</p>";
*/
// echo $str;
//print $str;

?>


</body>
</html>
