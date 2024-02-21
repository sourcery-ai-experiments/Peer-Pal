<?php 

declare(strict_types= 1);

function check_login_errors() {
  if (isset($_SESSION["login_errors"])) {
    $errors = $_SESSION["login_errors"];

    echo "<br>";

    foreach ($errors as $error) {
      echo '<p class="form-error">'. $error .'</p>';
    }

    // clean out unneeded error variables
    unset($_SESSION["login_errors"]);
  } else if (isset($_GET['login']) && $_GET['login'] === "success") {
    echo '<br>';
    echo '<p class="form-success">Login Success</p>';
  }
}