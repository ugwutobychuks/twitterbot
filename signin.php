<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `twitusers` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: dashboard.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Email/Password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge, chrome=1" />
    <meta name="HandheldFriendly" content="true" />
    <title>Nemesis Twitter Bot Login Page</title>

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 first_column">
          <div class="content1">
            <img
              src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1569341483/Team%20Nemesis_twitterBot/twitter_icon_pzp2pk.svg"
              alt="twitter logo"
            />
            <p class="first-paragraph">Nemesis TweetBot</p>
            <img
              class="grow"
              src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1569341619/Team%20Nemesis_twitterBot/wifi_icon_mjyfgk.svg"
              alt="wifi icon"
            />
            <p>Connect twitter account</p>
            <img
              class="grow"
              src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1569341614/Team%20Nemesis_twitterBot/download_icon_njf4hm.svg"
              alt="download icon"
            />
            <p>Save Tweet directly from twitter to external drive</p>
            <img
              class="grow"
              src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1569341616/Team%20Nemesis_twitterBot/file_icon_a8sddq.svg"
              alt="file icon"
            />
            <p>Enjoy viewing favourite tweet on external drive at leisure</p>
          </div>
        </div>
        <div class="col-sm-6 second_column">
          <form method="post">
            <div class="form-group">
              <h3>Welcome</h3>
              <label for="exampleInputEmail1">Username</label>
              <input
                name="username"
                type="text"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="textHelp"
              />
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input
                name="password"
                type="password"
                class="form-control"
                id="exampleInputPassword1"
              />
            </div>
            <button type="submit" class="btn btn-primary btn-block">
              <a href="dashboard.php">Login</a>
            </button>

            <span>
              <p>Don't have an account yet?</p>
              <button id="button" class="btn btn-primary btn-block">
                <a  href="signup.php">Signup</a>
              </button></span
            >
          <a style="color: #007bff !important" href="forgot-password.php">forgot password?</a>
            </div>
          </form>
      </div>
    </div>
        <?php } ?>
  </body>
</html>
