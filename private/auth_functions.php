<?php

  require_once('functions.php');

  function log_in_user($user) {
    session_start();
    session_regenerate_id();
    $_SESSION['id'] = $user['id'];
    $_SESSION['accesslevel'] = $user['userLevel'];
    return true;
  }

  function log_out_member() {
    unset($_SESSION['id']);
    unset($_SESSION['userLevel']);
    session_unset(); 
    return true;
  }

  function is_logged_in() {
    return isset($_SESSION['id']);
  }

  function require_login() {
    if(!is_logged_in()) {
      redirect_to(url_for('/user_login.php'));
    }
  }

?>