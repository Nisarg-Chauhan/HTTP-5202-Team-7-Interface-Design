<?php

class Contact
{

    public function addContactInfo($user_name, $user_email, $subject, $content, $db)
    {
        $sql = "INSERT INTO contacts (username, useremail, subject,content) 
            VALUES (:user_name, :user_email,:subject,:content )";
        $statement = $db->prepare($sql);

        $statement->bindParam(':user_name', $user_name);
        $statement->bindParam(':user_email', $user_email);
        $statement->bindParam(':subject', $subject);
        $statement->bindParam(':content', $content);

        $count = $statement->execute();
        return $count;
    }
}
