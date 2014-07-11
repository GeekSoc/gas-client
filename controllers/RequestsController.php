<?php
//TODO: make handleRequest
/**
* 
*/
class RequestController
{

  
  static public function displayRequest($twig) {    
    echo $twig->render('requestDevBox.html', 
        array());
  }
  
  static public function handleRequest($twig) { 
    
    $newrequest = new NewRequest;
    $newrequest->username = {{ currentuser.username }};
    $newrequest->reason = $_POST['reason'];
    
    echo $twig->render('requestDevBox.html',
		array(
		 'error'=>$error,
		));
    }else{
       
    echo $twig->render('postRequest.html', 
        array()
		);
    }
  }
  
 
}

?>
