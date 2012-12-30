<?php

/**
* 
*/
class LoginController
{
  static public function display($app, $twig) {
    if (isset($_SESSION['username'])) {
      $app->redirect('/dashboard');
    }   
    echo $twig->render('login.html', 
        array());
  } 
  
  static public function displayRegister($twig) {    
    echo $twig->render('register.html', 
        array(
          // 'error'=>'Username or password is incorrect.',
          ));
  }
  
  static public function logout($app) {   
    session_destroy();
    $_SESSION = array(); 
    $app->redirect('/');
  }
  
  static public function login($app, $twig) {
    if (User::authenticate($_POST['username'], $_POST['password'])) {
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['password'] = $_POST['password'];
      $app->redirect('/dashboard');
    } else {
      echo $twig->render('login.html', 
          array(
            'error'=>'Username or password is incorrect.',
            ));
    }
  }
  
}

?>