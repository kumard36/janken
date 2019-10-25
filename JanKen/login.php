<?php
if(isset($_POST['cancel'])){
  header("Location: index.php");
  return;
}
$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';

$failure=false;
if(isset($_POST['who']) && isset($_POST['pass'])){
  if(strlen($_POST['who'])<1 && strlen($_POST['pass'])<1){
    $failure="User name and password are required";
  }
  else{
    $check = hash('md5', $salt.$_POST['pass']);
    if($check==$stored_hash){
      header("Location: game.php?name=".urlencode($_POST['who']));
      return;
    }
    else{
      $failure="Incorrect password";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Kumar Divyank Login Page</title>
<?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
<h1>Please Log In</h1>
<?php
if($failure!==false){
  echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
}
?>
<form method="POST">
  <label for="inp01">User Name</label>
  <input type="text" name="who" id="inp01"><br/>
  <label for="inp02">Password</label>
  <input type="password" name="pass" id="inp02"><br/>
  <input type="submit" value="Log In">
  <input type="submit" name="cancel" value="Cancel">
</form>
<p>For the password hint, view source and find a password hint in the HTML comments.
<!-- Hint: The password is the name of the programming
language used in this code (all lower case) followed by 123. -->
</p>
</div>
</body>
</html>
