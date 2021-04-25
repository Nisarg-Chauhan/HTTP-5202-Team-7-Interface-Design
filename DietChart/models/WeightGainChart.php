<?php
    class WeightGainChart{
        public function getWeightGainChart($db){
            $query = "SELECT * FROM weight_gain_chart";
            $pdostm = $db->prepare($query);
            $pdostm->execute();

            //fetch results
            $results = $pdostm->fetchAll(PDO::FETCH_OBJ);
            return $results;
        }

        public function getWeightGainChartById($id, $db){
            $sql = "SELECT * FROM weight_gain_chart where id = :id";
            $pst = $db->prepare($sql);
            $pst->bindParam(':id', $id);
            $pst->execute();
            return $pst->fetch(PDO::FETCH_OBJ);
        }

        public function addWeightGainMeal($day1, $day2, $day3, $day4, $day5, $day6, $day7, $db){
            $sql = "INSERT INTO weight_gain_chart (day1, day2, day3, day4, day5, day6, day7)
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

        public function deleteWeightGainMeal($id, $db){
            $sql = "DELETE FROM weight_gain_chart where id = :id";

            $pst = $db->prepare($sql);
            $pst->bindParam(':id', $id);
            $count = $pst->execute();
            return $count;
        }

        public function updateWeightGainMeal($day1, $day2, $day3, $day4, $day5, $day6, $day7, $db){
            $sql = "UPDATE weight_gain_chart
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