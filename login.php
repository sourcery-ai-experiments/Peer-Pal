<?php 

// Imports
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PeerPal Login Page</title>
    <style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  grid-area: header;
  background-color: blue;
  background-image: linear-gradient(to right, rgba(235, 237, 238, 0.443) , blue);
  padding: 30px;
  text-align: center;
  font-size: 35px;
}

.grid-container {
  display: grid;
  grid-template-areas: 
    'header header header header header header' 
    'left left left right right right';
} 

.left,
.right {
  padding: 10px;
  height: 700px;
  background-color: blue; 
  background-image: linear-gradient(to left, rgba(235, 237, 238, 0.443), blue);
}

.left {
  grid-area: left;
  background-color: blue; 
  background-image: linear-gradient(to right, rgba(235, 237, 238, 0.443), blue);
}

.right {
  grid-area: right;
  background-color: blue;
  background-image: linear-gradient(to right, rgba(235, 237, 238, 0.443), blue);
}

input[type=submit], input[type=submit], input[type=reset] {
  background-color: lightblue;
  border: none;
  color: black;
  padding: 16px 32px;
  text-decoration-thickness: 3px;
  margin: 4px 2px;
  cursor: pointer;
}

@media (max-width: 600px) {
  .grid-container  {
    grid-template-areas: 
      'header header header header header header' 
      'left left left left left left'  
      'right right right right right right';
  }
}
        </style>
</head>


<body>


<?php 
    // Only display form when user isn't signed in
      if (!isset($_SESSION["user_id"])) {}  ?>
    <div class="grid-container">
        <div class="header">
        <header>
        <img src="PeerPals.png" alt="Peerpal Logo" width="100px" height="100px">
</header>
      </div>

        <div class="left"></div>

<div class="right">
    <h2>Sign in</h2>
        <form action="includes/login.inc.php" target="_self" method="post" autocomplete="on">
  <label for="username">Username:</label><br>
  <input type="text" name="username" placeholder="Username" size="50" required autofocus><br><br>
  <label for="password">Password:</label><br>
  <input type="password" name="pwd" placeholder="Password" size="50" required><br><br>
  <input type="submit" value="Login" size="50">
  <input type="reset" value="Reset"><br>
  <input type="submit" value="Sign Up">
</form>
</div>

</body>

</html>
