<?php

require_once('user.class.php');


$tom = new User("tom", "dummy@dumm.com");
$bob = new SuperUser("bob", "dummy@bob.com");

//echo $tom->email;
$tom->sayHi();
$bob->superSayHi();



//セッション

//session_start();

//$_SESSION['userName'] = "ujitoko";

//unset($_SESSION['userName']);

//echo $_SESSION['userName'];



//Cookie

//setcookie('userName','', time()-60);

//echo $_COOKIE['userName'];

/*
try{
	$dbh = new PDO('mysql:host=localhost;dbname=team316','dbuser','team316');
} catch (PDOException $e){
	var_dump($e->getMessage());
	exit;
}



//処理

$sql = "select * from users";
$stmt = $dbh->query($sql);
foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $user){
	var_dump($user['name']);
	var_dump($user['email']);
}

//$stmt = $dbh->prepare("update users set email = :email where name like :name");
//$stmt->execute(array(":email" => "dummy", ":name" => "n%"));

$stmt = $dbh->prepare("delete from users where password = :password");
$stmt->execute(array(":password" => "p10"));

echo $stmt->rowCount()."records deleted";






//echo $dbh->query("select count(*) from users")->fetchColumn();
//$stmt = $dbh->prepare("insert into users (name, email, password) values(?,?,?)");
/*
$stmt = $dbh->prepare("insert into users(name,email,password) values
	(:name,:email,:password)");
$stmt->bindParam(":name", $name);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":password", $password);

$name = "n10";
$email = "e10";
$password = "p10";

$stmt->execute();

$name = "n10x";

$stmt->execute();

echo $dbh->lastInsertId();
*/

//$stmt->execute(array(":name" => "n2", ":email" => "e2", ":password" => "p2"));

//

//$dbh = null;



