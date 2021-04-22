<?php
    
    class User
    {
       
        
        public function addUser($fname, $lname, $email, $password, $age, $role, $db)
        {
            $sql = "INSERT INTO users (first_name, last_name, email, password, age, role) 
            VALUES (:fname, :lname, :email, :password, :age, :role)";
            $statement = $db->prepare($sql);
            
            $statement->bindParam(':fname', $fname);
            $statement->bindParam(':lname', $lname);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':password', $password);
            $statement->bindParam(':age', $age);
            $statement->bindParam(':role', $role);
            
            
            $count = $statement->execute();
            return $count;
        }
        
       public function getCurrentUser($email,$password,$dbcon){
            
            $sql = "SELECT * FROM users WHERE email=:email AND password=:password";
            $statement = $dbcon->prepare($sql);
            
            $statement->bindParam(':email', $email);
            $statement->bindParam(':password', $password);
            $statement->execute();
            
            $user = $statement->fetch(PDO::FETCH_OBJ);
            return $user;
        }
        
        
        /*public function getUser($email, $password, $db){
        
        $sql = "select *from login where email = '$email' and password = '$password'";  
        $result = mysqli_query($db, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        
        }*/
        
        
        public function updateUser($id, $fname, $lname, $email, $phone, $password, $age, $db){
            
            $sql = "UPDATE users
            SET first_name = :fname,
                last_name = :lname,
                email = :email,
                password = :password,
                age = :age
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
