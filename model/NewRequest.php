<?php
//ToDo: make newrequest work in the API
  require_once 'model/Persistable.php';
  require_once 'config.php';
  
/**
* New Member model
*/
class NewRequest implements Persistable
{
  
  public $username;
  public $reason;
  
  static public function init($details) {
    $newRequest = new NewRequest;
    
    foreach ($details as $key => $value) {
      $newMember->$key = $value;
    }
    
    return $newRequest;
    
  }
  
  static public function get($id){
   //Not used, might be used to get info about the current status (no idea.... :S)
    global $conf;
    
    $user = $_SESSION['username'];
    $password = $_SESSION['password'];
    $curl = new Curl;
    
    $url = $conf['api_protocol'] . "://$user:$password@".$conf['api_url'] ."/newrequest/";
    $response = $curl->get($url, $vars = array());
    $result = json_decode($response, true);
    
    if ($response->headers['Status'] != "200 OK") {
      return null;
    } else {
      return self::init($result);
    }
  }
  
  
  public function save() {
    //create a new request
    global $conf;
    
    if ($this->id == null) {   
      $details = get_object_vars($this);
      
      $curl = new Curl;

      $url = $conf['api_protocol'] . "://".$conf['api_url'] ."/newrequest/$user";
      $response = $curl->post($url, json_encode($details));

      if ($response->headers['Status'] != "200 OK") {
        return false;
      } else {
        return true;
      }
    } else {
      return false;
    }
  }
  
  
  
}
?>