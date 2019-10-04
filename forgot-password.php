<?php
include('db.php');
if(isset($_POST["email"]) && (!empty($_POST["email"]))){
$email = $_POST["email"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
  	$error .="<p>Invalid email address please type a valid email address!</p>";
	}else{
	$sel_query = "SELECT * FROM `twitusers` WHERE email='".$email."'";
	$results = mysqli_query($con,$sel_query);
	$row = mysqli_num_rows($results);
	if ($row==""){
		$error .= "<p>No user is registered with this email address!</p>";
		}
	}
	if($error!=""){
	echo "<div class='error'>".$error."</div>
	<br /><a href='javascript:history.go(-1)'>Go Back</a>";
		}else{
	$expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
  $expDate = date("Y-m-d H:i:s",$expFormat);
  
	$key = md5(2418*2+$email);
	$addKey = substr(md5(uniqid(rand(),1)),3,10);
	$key = $key . $addKey;
// Insert Temp Table
mysqli_query($con,
"INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
VALUES ('".$email."', '".$key."', '".$expDate."');");

$output='<p>Dear user,</p>';
$output.='<p>Please click on the following link to reset your password.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p><a href="http://localhost/Team-NEMESIS-twitterbot/forgot-password/reset-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">http://localhost/Team-NEMESIS-twitterbot/forgot-password/reset-password.php?key='.$key.'&email='.$email.'&action=reset</a></p>';		
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.</p>';
$output.='<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';   	
$output.='<p>Thanks,</p>';
$output.='<p>Nemesis Team</p>';
$body = $output; 
$subject = "Password Recovery";

//mail server settings
$email_to = $email;
$fromserver = "noreply@yourwebsite.com"; 
require("PHPMailer/PHPMailerAutoload.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "mail.tobychuks.com.ng"; // Enter your host here
$mail->SMTPAuth = true;
$mail->Username = "twitterbot@tobychuks.com.ng"; // Enter your email here
$mail->Password = "@Password@1."; //Enter your passwrod here
$mail->Port = 26;
$mail->IsHTML(true);
$mail->From = "twitterbot@tobychuks.com.ng";
$mail->FromName = "TWITTERBOT";
$mail->Sender = $fromserver; // indicates ReturnPath header
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);
if(!$mail->Send()){
echo "Mailer Error: " . $mail->ErrorInfo;
}else{
echo "<div class='error'>
<p>An email has been sent to you with instructions on how to reset your password.</p>
</div><br /><br /><br />";
	}

		}	

}else{
?>


<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<?php } ?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Forgot Password</title>

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="forgot-password.css" />
  </head>
  <body>
    <div class="container">
      <div class="card card1">
        <div class="card-body">
          <div id="title">
            <img
              src="https://res.cloudinary.com/dzwnhcpep/image/upload/v1569341483/Team%20Nemesis_twitterBot/twitter_icon_pzp2pk.svg"
              alt="twitter logo"
            />
            <h3>Nemesis Tweetbot</h3>
          </div>
          <h2>Forgot your password?</h2>
          <p>
            Please input the email address associated with your account and a
            password reset link would be sent to the email address.
          </p>
          
                 
          
          
          <form action=""" method="POST" name reset>
          <div class="form-control-lg">
            <label for="name" class="control-label">Enter Email</label>
            <input
              type="email"
              name="email"
              class="form-control"
              aria-label="email"
              aria-describedby="addon-wrapping"
            />
          </div>
          <div class="form-group my-5">
            <input
              
              name="submit_email"
              class="btn btn-lg"
              value="Reset Password"
              type="submit"
              data-toggle="modal"
              data-target="#exampleModalCenter"
            />
          </div>
          </form>


        </div>
      </div>
      <div class="card card2">
        <div class="card-body">
          <img src="images/forgot-password.svg" alt="forgot password" />
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModalCenter"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div style="text-align: center;" class="modal-content">
          <!-- <div style="font-size: 23px; margin: 1em;" class="modal-body">
            <!-- Email sent successfully. Please check your inbox. -->
          <!--</div> -->
        </div>
      </div>
    </div>

    <script
      src="https://kit.fontawesome.com/2534cfc66b.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
<!-- name="recover-submit"  -->