<?php
    
    class Workout
    {
        public function getUserWorkout($db, $userId){
            
            $query = "SELECT exercise_name,workouts_exercises.id AS workout_id,users.id,users.first_name,users.last_name FROM workouts_exercises 
                      JOIN users ON workouts_exercises.user_id = users.id 
                      JOIN exercises ON workouts_exercises.exercise_id = exercises.id 
                      WHERE users.id =:user_id
                      ORDER by week,day_number";
                      
            
            $statement = $db->prepare($query);
            $statement->bindValue(':user_id', $userId, PDO::PARAM_STR);
            $statement->execute();
            $selectedWorkout = $statement->fetchAll(PDO::FETCH_OBJ);
            return $selectedWorkout;
        }
        
        public function getAllWorkouts($dbcon){
            
            $sql = "SELECT exercise_name,calorie_burnt, users.id,users.first_name,users.last_name FROM workouts_exercises 
                      JOIN users ON workouts_exercises.user_id = users.id 
                      JOIN exercises ON workouts_exercises.exercise_id = exercises.id 
                      ORDER by users.id,week,day_number";
            $statement = $dbcon->prepare($sql);
            $statement->execute();
            
            $workouts = $statement->fetchAll(PDO::FETCH_OBJ);
            return $workouts;
        }
        
        public function addWorkout($week, $day, $day_number, $exercise_id, $user_id, $db)
        {
            $sql = "INSERT INTO workouts_exercises (week,day, day_number, exercise_id, user_id) 
            VALUES (:week, :day,:day_number, :exercise_id,:user_id)";
            $statement = $db->prepare($sql);
            
            $statement->bindParam(':week', $week);
            $statement->bindParam(':day', $day);
            $statement->bindParam(':day_number', $day_number);
            $statement->bindParam(':exercise_id', $exercise_id);
            $statement->bindParam(':user_id', $user_id);
                        
            $count = $statement->execute();
            return $count;
        }
        
        public function deleteWorkout($id, $db){
            
            $sql = "DELETE FROM workouts_exercises WHERE id = :id";
            
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