<?php
    class Veganchart{
        public function getVeganChart($db){
            $query = "SELECT * FROM vegan_chart";
            $pdostm = $db->prepare($query);
            $pdostm->execute();

            //fetch all results
            $results = $pdostm->fetchAll(PDO::FETCH_OBJ);
            return $results;
        }

        public function getVeganChartById($id, $db){
            $sql = "SELECT * FROM vegan_chart where id = :id";
            $pst = $db->prepare($sql);
            $pst->bindParam(':id', $id);
            $pst->execute();
            return $pst->fetch(PDO::FETCH_OBJ);
        }

        public function addMeal($day1, $day2, $day3, $day4, $day5, $day6, $day7, $db){
            $sql = "INSERT INTO vegan_chart (day1, day2, day3, day4, day5, day6, day7)
                    VALUES (:day1, :day2, :day3, :day4, :day5, :day6, :day7)";
            $pst = $db->prepare($sql);

            $pst->bindParam(':day1', $day1);
            $pst->bindParam(':day2', $day2);
            $pst->bindParam(':day3', $day3);
            $pst->bindParam(':day4', $day4);
            $pst->bindParam(':day5', $day5);
            $pst->bindParam(':day6', $day6);
            $pst->bindParam(':day7', $day7);

            $count = $pst->execute();
            return $count;
        }

        public function deleteMeal($id, $db){
            $sql = "DELETE FROM vegan_chart where id = :id";

            $pst = $db->prepare($sql);
            $pst->bindParam(':id', $id);
            $count = $pst->execute();
            return $count;
        }

        public function updateMeal($day1, $day2, $day3, $day4, $day5, $day6, $day7, $db){
            $sql = "UPDATE vegan_chart
                    set day1 = :day1,
                    day2 = :day2,
                    day3 = :day3,
                    day4 = :day4,
                    day5 = :day5,
                    day6 = :day6,
                    day7 = :day7
                    WHERE id = :id";
            
            $pst = $db->prepare($sql);

            $pst->bindParam(':day1', $day1);
            $pst->bindParam(':day2', $day2);
            $pst->bindParam(':day3', $day3);
            $pst->bindParam(':day4', $day4);
            $pst->bindParam(':day5', $day5);
            $pst->bindParam(':day6', $day6);
            $pst->bindParam(':day7', $day7);
            $pst->bindParam(':id', $id);

            $count = $pst->execute();
            return $count;
        }
    }
?>