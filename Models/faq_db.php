<<?php
    
    class Faq
    {

         //Get Faq by ID
            
        public function getFaqById($id, $db){
            
            $sql = "SELECT * FROM faq where id = :id";
            $statement = $db->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_OBJ);
        }
        
            //Get all FAQ
        public function getAllFaqs($dbcon){
            
            $sql = "SELECT * FROM faq";
            $statement = $dbcon->prepare($sql);
            $statement->execute();
            
            $faq = $statement->fetchAll(PDO::FETCH_OBJ);
            return $faq;
        }
        
        
        public function addFaq($question, $answer, $db)
        {
            $sql = "INSERT INTO faq (question, answer) 
            VALUES (:question, :answer )";
            $statement = $db->prepare($sql);            
            $statement->bindParam(':question', $question);
            $statement->bindParam(':answer', $answer);        
            
            $count = $statement->execute();
            return $count;
        }
        
               
        
        public function updateFaq($id, $question, $answer, $db){
            
            $sql = "UPDATE faq
            SET question = :question,
                answer = :answer
                WHERE id = :id";
            
            $statement =  $db->prepare($sql);
            $statement->bindParam(':question', $question);
            $statement->bindParam(':answer', $answer);
            $statement->bindParam(':id', $id);
            $count = $statement->execute();
            
            return $count;
        }
        
                
        public function deleteFaq($id, $db){
            
            $sql = "DELETE FROM faq WHERE id = :id";
            
            $statement = $db->prepare($sql);
            $statement->bindParam(':id', $id);
            $count = $statement->execute();
            return $count;
            
        }
        
         
    }
?>
