<?php

  $to = "info@zyme-nasal.com";

  $name = $_POST['name'];
  $subject = $_POST['subject'];

  $body = stripslashes($_POST['message'] . "\n\n sent from zyme-nasal");

  $from = $_POST['email'];
  $headers = "Reply-To: " . $from;
  $error_messages = array();

  if( strlen($name) < 1 ) {
    $error_messages[] = "name required";
  }

  if( strlen($body) < 1 ) {
    $error_messages[] = "comment required";
  }

  if( strlen($from) < 1 ) {
    $error_messages[] = "email required";
  }

  if(sizeof($error_messages) == 0 && mail($to, $subject, $body, $headers)) {
    echo("success");
  } else {
    foreach( $error_messages as $error_message ) {
      echo "$error_message <br />";
    }
  }

?>
