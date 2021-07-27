<?php
    if(!isset($_SESSION['user'])){
                header("location: /adminStory/auth/login.php");
            }
 ?>