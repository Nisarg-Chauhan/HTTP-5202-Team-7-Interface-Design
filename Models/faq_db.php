<?php
    
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
        
         
    }
?>