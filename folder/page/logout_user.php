<?php
session_start();
unlink("name.txt");
unset($_SESSION["user_id"]);
session_destroy();
?>