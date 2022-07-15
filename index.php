<?php
include 'config.php';
$msg ="";

if(isset($_SESSION['username']))
{
    echo '<script>windows.location.href="dash.php"</script>';
}

if(isset($_POST['submit']))
{
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  if(empty($username)||empty($password))
  {
    $msg = "Please fill all your login credentials";
  }
  else
  {
    $sql = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
      session_start();
      $_SESSION['username'] = $username;
      $_SESSION['sl_no'] = $sl;
      $_SESSION['loggedin'] = TRUE; 
      echo '<script>window.location.href="dash.php"</script>';
    }
    else
    {
      $msg = "Incorrect username or password";
    }
  }
  $conn->close();

}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
  </head>
  <body>
 <div class="container">
 <center><h1>To-do-List</h1></center>
 <form action="#" method="POST">
  <div class="mb-3 mt-3">
    <label for="username" class="form-label">Username<span style="color:red;">*</span>:</label>
    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" width="50%" required>
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Password <span style="color:red;">*</span>:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
  </div>
  <div class="form-check mb-3">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" name="remember"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Log In</button>
   

</form>
If you don't have account Click .
   <a href="signup.php">Create Account</a>
   <br>
   <?php echo $msg;?>
 </div>

 
 

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    
  </body>
</html>