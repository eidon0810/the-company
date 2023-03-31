<?php

include "../classes/User.php";

// instantiate the class User
$user_obj = new User;

// call the method
$user_obj->update($_POST,$_FILES);
// $_FILES holds an array of items upleaded to the current script via the HTTP POST method.

?>