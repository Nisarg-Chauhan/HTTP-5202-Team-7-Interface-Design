<?php
session_start();
session_unset();
session_destroy();
header("location: ../home.php");
exit();
       
  
//   if(session_destroy()) {
//       header("Location: ../home.php");
           
//    }
