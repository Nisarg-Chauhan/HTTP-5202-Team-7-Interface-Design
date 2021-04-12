<?php
    
    class User
    {
       
        
        public function addUser($fname, $lname, $email, $password, $age, $db)
        {
            $sql = "INSERT INTO users (first_name, last_name, email, password, age) 
            VALUES (:fname, :lname, :email, :password, :age)";
            $statement = $db->prepare($sql);
            
            $statement->bindParam(':fname', $fname);
            $statement->bindParam(':lname', $lname);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':password', $password);
            $statement->bindParam(':age', $age);
            
            
            $count = $statement->execute();
            return $count;
        }
        
        public function deleteUser($id, $db){
            
            $sql = "DELETE FROM users WHERE id = :id";
            
            $statement = $db->prepare($sql);
            $statement->bindParam(':id', $id);
            $count = $statement->execute();
            return $count;
            
        }
        
        public function updateUser($id, $fname, $lname, $email, $phone, $password, $age, $db){
            
            $sql = "UPDATE users
            SET first_name = :fname,
                last_name = :lname,
                email = :email,
                password = :password,
                age = :age,
            WHERE id = :id";
            
            $statement =  $db->prepare($sql);
            
            
            $statement->bindParam(':fname', $fname);
            $statement->bindParam(':lname', $lname);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':password', $password);
            $statement->bindParam(':age', $age);
            
            $statement->bindParam(':id', $id);
            
            
            $count = $statement->execute();
            
            return $count;
        }
    }
?>