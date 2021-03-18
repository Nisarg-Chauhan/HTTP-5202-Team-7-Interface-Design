<?php
    
    class Coach
    {
        public function getCoachClients($db, $coachId){
            
            $query = "SELECT users.* FROM users 
                      JOIN coaches ON users.coach_id = coaches.id 
                      WHERE coaches.id = :coach_id";
            
            $statement = $db->prepare($query);
            $statement->bindValue(':coach_id', $coachId, PDO::PARAM_STR);
            $statement->execute();
            $selectedUsers = $statement->fetchAll(PDO::FETCH_OBJ);
            return $selectedUsers;
        }
        
        public function getCoachById($id, $db){
            
            $sql = "SELECT * FROM coaches WHERE id = :id";
            $statement = $db->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ);
        }
        
        public function getAllCoaches($dbcon){
            
            $sql = "SELECT* FROM coaches";
            $statement = $dbcon->prepare($sql);
            $statement->execute();
            
            $coaches = $statement->fetchAll(PDO::FETCH_OBJ);
            return $coaches;
        }
        
        public function addCoach($fname, $lname, $experience, $speciality, $advice, $email, $picture, $db)
        {
            $sql = "INSERT INTO coaches (first_name,last_name, experience, speciality, advice, email, picture) 
            VALUES (:fname, :lname,:experience, :speciality,:advice, :email,:picture)";
            $statement = $db->prepare($sql);
            
            $statement->bindParam(':fname', $fname);
            $statement->bindParam(':lname', $lname);
            $statement->bindParam(':experience', $experience);
            $statement->bindParam(':speciality', $speciality);
            $statement->bindParam(':advice', $advice);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':picture', $picture);
            
            $count = $statement->execute();
            return $count;
        }
        
        public function deleteCoach($id, $db){
            
            $sql = "DELETE FROM coaches WHERE id = :id";
            
            $statement = $db->prepare($sql);
            $statement->bindParam(':id', $id);
            $count = $statement->execute();
            return $count;
            
        }
        
        public function updateCoach($id, $fname, $lname, $experience, $speciality, $advice, $email, $picture, $db){
            
            $sql = "UPDATE coaches
            SET first_name = :fname,
                last_name = :lname,
                experience = :experience,
                speciality = :speciality,
                advice = :advice,
                email= :email,
                picture= :picture
            WHERE id = :id";
            
            $statement =  $db->prepare($sql);
            
            
            $statement->bindParam(':fname', $fname);
            $statement->bindParam(':lname', $lname);
            $statement->bindParam(':experience', $experience);
            $statement->bindParam(':speciality', $speciality);
            $statement->bindParam(':advice', $advice);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':picture', $picture);
            
            $statement->bindParam(':id', $id);
            
            
            $count = $statement->execute();
            
            return $count;
        }
    }
?>