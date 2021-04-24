<?php

require_once '../Models/Database.php';
require_once '../Models/Contact.php';


$dbcon = Database::getDb();
$contact = new Contact();



if (!empty($_POST["send"])) {
	$name = $_POST["userName"];
	$email = $_POST["userEmail"];
	$subject = $_POST["subject"];
	$content = $_POST["content"];

	//$conn = mysqli_connect("localhost", "root", "", "test") or die("Connection Error: " . mysqli_error($conn));
	$contacts =  $contact->addContactInfo($name, $email, $subject, $content, $dbcon);
	//mysqli_query($conn, "INSERT INTO contact (user_name, user_email,subject,content) VALUES ('" . $name . "', '" . $email . "','" . $subject . "','" . $content . "')");
	//$insert_id = mysqli_insert_id($conn);
	//if(!empty($insert_id)) {
	$message = "Your query has been received. We will get back to you soon! ";
	$type = "success";
	//}
}
require_once "contact-view.php";
//require_once "send_contact_mail.php";  
