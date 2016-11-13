<?php
 
if(isset($_POST['email'])) {
 
     
 
    // Email and email subject where the information will be sent.
 
    $email_to = "dorsn.play@gmail.com";
 
    $email_subject = ($_POST['product_service']);
 
     
 
     
 
   function died($error) {
 
        // Error code
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. <br> ";
 
      	echo "These errors appear below.<br><br>"; 
 
        echo $error."<br><br>";
 
        echo "Please go back and fix these errors.<br><br>";
 
        die();
 
    }

     
 
    // validation expected data exists
 
	if(!isset($_POST['full_name'])){ 
		
		died('A full name must be submitted.');       
	} 
       
        if (!isset($_POST['company'])){ 
		
		died('A company name must be submitted.');       
 } 
       
        if(!isset($_POST['emailfrom'])){ 
		
		died('An email address must be submitted.');       
 } 
 
        if(!isset($_POST['product_service']))
			{ 
		
		died('A service or product must be submitted.');       
 } 
 
        if(!isset($_POST['inquiry'])) { 
		
		died('Some detail information must be submitted.');       
 } 
 
     
 
    $full_name = $_POST['full_name']; // d
 
    $company = $_POST['company']; // d
 
    $email_from = $_POST['email']; // d
 
    $product_service = $_POST['product_service']; // d
 
    $inquiry = $_POST['inquiry']; // d
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$full_name)) {
 
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
 
  }
 
  if(!preg_match($string_exp,$company)) {
 
    $error_message .= 'The company name you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($inquiry) < 2) {
 
    $error_message .= 'The inquiry you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Inquiry details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Full Name: ".clean_string($full_name)."\n";
 
    $email_message .= "Company Name: ".clean_string($company)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Service / Product: ".clean_string($service_product)."\n";
 
    $email_message .= "Inquiry: ".clean_string($inquiry)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 

 echo $full_name;
 
 
	/*--  html here */
 
 
 
echo "Thank you for contacting us. We will be in touch with you very soon".
	
}?>
