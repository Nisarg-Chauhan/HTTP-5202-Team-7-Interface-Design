<?php
    
    class Testimonial
    {
        public function getUserTestimonials($db, $userId){
            
            $query = "SELECT testimonials.*,first_name,last_name 
            FROM testimonials JOIN users ON testimonials.user_id = users.id 
            WHERE testimonials.user_id = :user_id";
            
            $statement = $db->prepare($query);
            $statement->bindValue(':user_id', $userId, PDO::PARAM_STR);
            $statement->execute();
            $selectedTest = $statement->fetchAll(PDO::FETCH_OBJ);
            return $selectedTest;
        }
        
        public function getTestimonialById($id, $db){
            
            $sql = "SELECT * FROM testimonials where id = :id";
            $statement = $db->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ);
        }
        
        public function getAllTestimonials($dbcon){
            
            $sql = "SELECT testimonials.id,title,message,user_id,first_name,last_name,profile_picture FROM testimonials JOIN users ON testimonials.user_id=users.id";
            $statement = $dbcon->prepare($sql);
            $statement->execute();
            
            $testimonials = $statement->fetchAll(PDO::FETCH_OBJ);
            return $testimonials;
        }
        
        public function getAllUsers($dbcon){
            
            $sql = "SELECT * FROM users";
            $statement = $dbcon->prepare($sql);
            $statement->execute();
            
            $users = $statement->fetchAll(PDO::FETCH_OBJ);
            return $users;
        }
        
        public function addTestimonial($title, $message, $userId, $db)
        {
            $sql = "INSERT INTO testimonials (title, message, user_id) 
            VALUES (:title, :message, :user_id) ";
            $statement = $db->prepare($sql);
            
            $statement->bindParam(':title', $title);
            $statement->bindParam(':message', $message);
            $statement->bindParam(':user_id', $userId);
            
            $count = $statement->execute();
            return $count;
        }
        
        public function deleteTestimonial($id, $db){
            
            $sql = "DELETE FROM testimonials WHERE id = :id";
            
            $statement = $db->prepare($sql);
            $statement->bindParam(':id', $id);
            $count = $statement->execute();
            return $count;
            
        }
        
        public function updateTestimonial($id, $title, $message, $userId, $db){
            
            $sql = "UPDATE testimonials
            SET title = :title,
            message = :message,
            user_id = :user_id
            WHERE id = :id";
            
            $statement =  $db->prepare($sql);
            
            $statement->bindParam(':title', $title);
            $statement->bindParam(':message', $message);
            $statement->bindParam(':user_id', $userId);
            $statement->bindParam(':id', $id);
            
            $count = $statement->execute();
            
            return $count;
        }
    }
?>