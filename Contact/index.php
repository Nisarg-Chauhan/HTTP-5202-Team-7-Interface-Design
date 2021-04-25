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
	$contacts =  $contact->addContactInfo($name, $email, $subject, $content, $dbcon);

	$message = "Your query has been received. We will get back to you soon! ";
	$type = "success";
}
require_once "contact-view.php";
