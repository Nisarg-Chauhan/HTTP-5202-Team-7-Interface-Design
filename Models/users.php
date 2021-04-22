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
        
        
        public function getAllUsers($dbcon){
            
            $sql = "SELECT* FROM users
                    ORDER by users.id";
            $statement = $dbcon->prepare($sql);
            $statement->execute();
            
            $users = $statement->fetchAll(PDO::FETCH_OBJ);
            return $users;
        }
         public function getUserById($id, $db){
            
            $sql = "SELECT * FROM users WHERE id = :id";
            $statement = $db->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ);
        }
        
        
        public function updateUser($id, $fname, $lname, $email, $age, $db){
            
            $sql = "UPDATE users
            SET first_name = :fname,
                last_name = :lname,
                email = :email,
                age = :age
                WHERE id = :id";
            
            $statement =  $db->prepare($sql);
            
            
            $statement->bindParam(':fname', $fname);
            $statement->bindParam(':lname', $lname);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':age', $age);
            
            $statement->bindParam(':id', $id);
            $count = $statement->execute();
            
            return $count;
        }
        
        public function updateUserAdmin($id, $fname, $lname, $email, $age, $role, $db){
            
            $sql = "UPDATE users
            SET first_name = :fname,
                last_name = :lname,
                email = :email,
                age = :age,
                role= :role
                WHERE id = :id";
            
            $statement =  $db->prepare($sql);
            
            
            $statement->bindParam(':fname', $fname);
            $statement->bindParam(':lname', $lname);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':age', $age);
            $statement->bindParam(':role', $role);
            
            $statement->bindParam(':id', $id);
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
    }
?>
