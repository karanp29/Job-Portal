<?php
class customLoginError extends Exception {
  public function errorMessage() {
    //error message
    $errorMsg = 'Login Credentials doesn\'t match. Please try agian';
    return $errorMsg;
  }
}

class AnotherError extends Exception {
    public function errorMessage() {
      //error message
      $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
      .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
      return $errorMsg;
    }
  }

// try {
//     //call this line when you want to throw error
//     throw new customLoginError();
// }
// catch (customLoginError $e) {
//   //display custom message
//   echo $e->errorMessage();
// }
?>