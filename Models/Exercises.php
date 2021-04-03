<?php
    
    class Exercise
    {
              
        public function getExerciseById($id, $db){
            
            $sql = "SELECT * FROM exercises WHERE id = :id";
            $statement = $db->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ);
        }
        
        public function getAllExercises($dbcon){
            
            $sql = "SELECT* FROM exercises";
            $statement = $dbcon->prepare($sql);
            $statement->execute();
            
            $exercises = $statement->fetchAll(PDO::FETCH_OBJ);
            return $exercises;
        }
        
        public function addExercise($exName, $exDescription,$calories, $db)
        {
            $sql = "INSERT INTO exercises (exercise_name,exercise_description,calorie_burnt) 
            VALUES (:exName, :exDescription,:calorie_burnt)";
            $statement = $db->prepare($sql);
            
            $statement->bindParam(':exName', $exName);
            $statement->bindParam(':exDescription', $exDescription);
            $statement->bindParam(':calorie_burnt', $calories);
            $count = $statement->execute();
            return $count;
        }
        
        public function deleteExercise($id, $db){
            
            $sql = "DELETE FROM exercises WHERE id = :id";
            
            $statement = $db->prepare($sql);
            $statement->bindParam(':id', $id);
            $count = $statement->execute();
            return $count;
            
        }
        
        public function updateExercise($id, $exName, $exDescription, $calorie,$db){
            
            $sql = "UPDATE exercises
            SET exercise_name = :exName,
                exercise_description = :exDescription
                calorie_burnt = :calorie
            WHERE id = :id";
            
            $statement =  $db->prepare($sql);
           
            $statement->bindParam(':exName', $exName);
            $statement->bindParam(':exDescription', $exDescription);
            $statement->bindParam(':calorie', $calorie);
            $statement->bindParam(':id', $id);
            
            $count = $statement->execute();
            
            return $count;
        }
    }
?>