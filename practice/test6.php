<html>
<head>
<?php
//初期設定
$users = array(
	"taro" => "pass123",
	"zoro" => "pass234"
);

session_start();
if(!isset($_SESSION["user"])){
	if($_POST["action"] == "trylogin"){
		checkLogin();
	}
	showLoginForm();
}
else{
	if($_GET["action"] == "logoff"){
		ogOff();
	}

	showContents();
}

function showLoginForm($errors = null){
	echo <<< EOS
	<form action="{$_SERVER['SCRIPT_NAME']}" method="POST">
	User ID:<input type="text" name="userid" /><br/>
	Password:<input type="password" name="password" /><br/>
	<input type="hidden" name="action" value="trylogin" />
	<input type="submit" value="ログイン" />
	</form>
EOS;

	if($errors){
		echo "<div>".implode("<br/>", $errors)."</div>";
	}
	exit;
}
/*
function checkLogin(){
	global $users;
	$errors = array();
	$userid = trim($_POST["userid"]);
	$password = trim($_POST["password"]);

	if(strlen($userid) < 2){
		$errors[] = "正しいID、パスワードくれ";
	}
	if(!array_key_exists($userid, $users)){
		$errors[] = "tadashi";
	}
	if($users[$userid] !== $password){
		$errors[] = "boooo";
	}
	if($errors){
		showLoginForm($errors);
	}

	$_SESSION["user"] = $userid;
	echo "ログイン成功しました";
	echo "<a href='{$_SERVER['SCRIPT_NAME']}'>次へ</a>";
	exit;
}

function showContents(){
	echo "<h1>コンテンツのサンｐｒ</h1>";
	echo "こんにちは{$_SESSION['user']}さん<br/>"
	echo "<a href='{$_SERVER['SCRIPT_NAME']}?action=logoff'>->ログオフする</a>";
	exit;
}


function logOff(){
	unset($_SESSION["user"]);
	echo "ログオフしました";
	exit;
}
*/
?>
</head>

<body>

<?php echo "hello"; ?>

</body>
</html>