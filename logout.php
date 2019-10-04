<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: signin.php"); // Redirecting To Home Page
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">git 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
    <title>Login Page</title>
</head>
<body>


    <div class="brand">
        <h1>Twitterbot</h1>
    </div>
    
    
</body>
</html>