<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
		$username = stripslashes($username);
		$username = $username;
		$password = stripslashes($password);
		$password = $password;
	//Checking is user existing in the database or not
       $sql ="SELECT * from auth_user  where username = '".$username."' ;  ";

	   $ret = pg_query($db, $sql);
	   if(!$ret){
		  echo pg_last_error($db);
		  exit;
	   } 
	   $row = pg_fetch_row($ret);
	   
        if($row[4] == $username){
			$_SESSION['username'] = $username;
			header("Location: index.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>
<div class="form">
<h1>Log In</h1>
<form action="front.php" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input type="text" name="counter" placeholder="Counter" required />
<input name="submit" type="submit" value="Login" />
</form>
</div>
<?php } ?>
</body>
</html>
