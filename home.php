<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css ">
  <link rel="stylesheet" href="/css/homepage.css">
  <link rel="stylesheet" href="./css/footer.css">
  <link rel="stylesheet" href="./css/navbar.css">

  <title>PeerPal | HomePage</title>
</head>
<body>
  <!-- HEADER / NAVBAR -->
  <?php include("./components/navbar.php") ?>
  <!-- MAIN -->
  <div class="hero">
    <div class="hero__content">
      <h1 class="hero__title">BuddyConnect: Forge Connections, Foster Growth</h1>
      <p class="hero__subtitle">Discover Your Perfect Study Buddy and Thrive Together</p>
      <a href="/login.php" class="hero__button">Browse</a>
    </div>
  </div>

  <!-- POTENTIAL BUDDIES -->
  <?php

  include("./components/potential_buddy_list.php");
  ?>

  <!-- MATCHED BUDDY -->
  <?php

  // include("./components/matched_buddy.php");
  ?>



  <!-- FOOTER -->

  <?php include("./components/footer.php") ?>
</body>
</html>
