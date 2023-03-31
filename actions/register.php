<?php

include "../classes/User.php";

// instantiate the class User
$user_obj = new User;


// call the method
$user_obj->store($_POST);


?>