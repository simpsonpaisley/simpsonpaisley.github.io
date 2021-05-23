<?php

if($_POST) {
  $visitor_name="";
  $visitor_email="";
  $contact_subject="";
  $message="";
  $email_body="<div>";

  if(isset($_POST["visitor_name"])) {
    $visitor_name = filter_var($_POST ["visitor_name"], FILTER_SANITIZE_STRING);
    $email_body .="<div>
                      <label><b>Visitor Name: </b> </label> &nbsp; <span>".$visitor_name." </span>
                  </div>";
  }

  if(isset($_POST["visitor_email"])) {
    $visitor_email = str_replace(array("\r", "\n", "\%0a", "\%0d"), "", $_POST[visitor_email]);
    $visitor_email =filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    $email_body .="<div>
                      <label><b> Visitor E-Mail: </b></label> &nbsp; <span>".$visitor_email." </span>
                  </div>"
  }

  if(isset($_POST["contact_subject"])) {
    $contact_subject = filter_var($_POST["contact-subject"], FILTER_SANITIZE_STRING);
    $email_body .="<div>
                      <label><b> Subject: </b></label> &nbsp; <span> ".$contact_subject." </span>
                  </div>"
  }

  if(isset($_POST["message"])) {
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
    $email_body .="<div>
                      <label><b> Message: </b></label> &nbsp; <span> ".$message." </span>
                  <div>"
  }

  
    $recipient = "simpsonpaisley@gmail.com";
  }

  $email_body ="</div>";

  $headers = "MIME-Version: 1.0" . "\r\n"
    ."Content-type: text/html; charset=utf-8" . "\r\n"
    ."From: " .$visitor_email . "\r\n";

    if(mail($recipient, $contact_subject, $message, $headers)) {
      echo "<p> Thank you for your message. I hope to get back to you soon </p>";
    }
    else {
      echo "<p> I'm sorry, but you're message hasn't gone through. Please check and try again </p>" ;
    }
} else {
  echo "<p> Sorry, something went wrong </p>";
}
}

?>
