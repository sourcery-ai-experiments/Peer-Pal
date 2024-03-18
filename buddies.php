<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PeerPal | My Buddies</title>
  <link rel="stylesheet" href="./css/navbar.css">
  <link rel="stylesheet" href="./css/match-request.css">
  <link rel="stylesheet" href="./css/footer.css">
</head>
<body>
  <!-- Navbar -->
  <?php include("./components/navbar.php"); ?>
  <!-- Navbar -->
  <?php
   include("./components/get_buddies.php");
  ?>
  <!-- FOOTER -->
  <?php include("./components/footer.php"); ?>
</body>
</html>