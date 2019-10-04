<?php


	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['email'])){
		$email = stripslashes($_REQUEST['email']); // removes backslashes
		$email = mysqli_real_escape_string($con,$email); //escapes special characters in a string
		$username = stripslashes($_REQUEST['username']);
		$username = mysqli_real_escape_string($con,$username);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);


		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `twitusers` ( email,username, password, trn_date) VALUES ('$email','$username',  '".md5($password)."',  '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form-group'><h3>You are registered successfully.</h3><br/>Click here to <a href='signin.php'>Login</a></div>";
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
    <title>Nemesis Twitter Bot Sign Up Page</title>

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
          <!-- <a href="signin.html"><button class="loginrdr">Login</button></a> -->
          <form method="post" action="">
            <div class="form-group">
              <h3>Create an account</h3>

              <label for="exampleinputusername">Username</label>
              <input
                name="username"
                type="text"
                class="form-control input-box"
                id="exampleinputusername"
                aria-describedby="textHelp"
                required
              />
            </div>
            <div class="form-group">
              <label for="exampleinputemail">Email</label>
              <input
                name="email"
                type="email"
                class="form-control"
                id="exampleinputemail"
                aria-describedby="textHelp"
                required
              />
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input
                name="password"
                type="password"
                class="form-control"
                id="exampleInputPassword1"
                required
              />
            </div>
            <div class="form-group">
              <label for="examplerepeatpassword">Repeat password</label>
              <input
                type="password"
                class="form-control"
                id="examplerepeatpassword"
                required
              />
            </div>
            <button type="submit" class="btn btn-primary btn-block">
              <a href="signup.php">Signup</a>
            </button>
            <button type="submit" class="btn btn-primary btn-block">
              <a href="https://www.twitter.com"
                >Signup with your twitter account</a
              >
            </button>
            <span>
              <p>Already have an account?</p>
              <button id="button" class="btn btn-primary btn-block">
                <a href="signin.php">Login</a>
              </button></span
            >
          </form>
        </div>
      </div>
    </div>
    <?php } ?>
  </body>

</html>
