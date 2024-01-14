<?php

class PHP_Email_Form {

  public $to;
  public $from_name;
  public $from_email;
  public $subject;
  public $smtp;
  public $ajax;
  public $message;

  public function add_message($field, $value) {
    $this->message .= "$field: $value\n"; 
  }

  public function send() {
    
    $headers = "From: {$this->from_name} <{$this->from_email}>";

    if($this->smtp) {
      // Configure and send via SMTP
    } else {
      $sent = mail($this->to, $this->subject, $this->message, $headers);
      if($sent) {
        return 'OK';  
      } else {
        return 'Error: Email not sent';
      }
    }

  }

}

?>