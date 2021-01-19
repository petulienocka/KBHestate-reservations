<?php
  
if($_POST) {
    $client_FirstName = "";
    $client_LastName = "";
    $client_email = "";
    $subject = "";
    $message = "";
    $email_body = "<div>";
      
    if(isset($_POST['client_FirstName'])) {
        $client_FirstName = filter_var($_POST['client_FirstName'], FILTER_SANITIZE_STRING);
        $client_LastName = filter_var($_POST['client_LastName'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Name:</b></label>&nbsp;<span>".$client_FirstName .$client_LastName."</span>
                        </div>";
    }
 
    if(isset($_POST['client_email'])) {
        $client_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['client_email']);
        $client_email = filter_var($client_email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
                           <label><b>Email:</b></label>&nbsp;<span>".$client_email."</span>
                        </div>";
    }
      
    if(isset($_POST['subject'])) {
        $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Subject:</b></label>&nbsp;<span>".$subject."</span>
                        </div>";
    }
    
      
    if(isset($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
        $email_body .= "<div>
                           <label><b>Message:</b></label>
                           <div>".$message."</div>
                        </div>";
    }
      
    if($concerned_department == "billing") {
        $recipient = "girlcodescopenhagen@gmail.com";
    }
 
    else {
        $recipient = "girlcodescopenhagen@gmail.com";
    }
      
    $email_body .= "</div>";
 
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $client_email . "\r\n";
      
    if(mail($recipient, $subject, $email_body, $headers)) {
        echo "<h2>Hey $client_FirstName $client_LastName , Thank you for your message. We will get back to you soon as possible</h2>
        <p><a href='./index.php'> GO BACK</a></p>";
    } else {
        echo '<p>Oops! Something went wrong. Try again</p>';
    }
      
} else {
    echo "<h2>Request didnt went through </h2>
    <p><a href='./index.php'> GO BACK</a></p>";
}
?>

<style>
p {
    justify-content: center;
}
</style>