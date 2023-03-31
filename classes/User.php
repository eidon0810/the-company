<?php

require_once "Database.php";

// extends - is the kyeword for inheriting parent class
class User extends Database
{
    public function store($request)
    {
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $password = $request['password'];
        // ENCRYPT THE PASSWORD
        $password = password_hash($password, PASSWORD_DEFAULT);

        // sql command
        $sql ="INSERT INTO `users`(`first_name`,`last_name`,`username`,`password`) VALUES('$first_name','$last_name','$username','$password')";

        if($this->conn->query($sql))
        {
            // success
            // go to login page
            header("location: ../views");
            exit;
        }else{
            // if fail or sql command has error
            die("Error creating the user: " .$this->conn->error);
        }

    }

    public function login($request)
    {
        $username = $request['username'];
        $password = $request['password'];
        $full_name = $request['first_name'] . " " . $request['last_name'];

        // sql command
        $sql = "SELECT * FROM `users` WHERE `username` = '$username'";

        // sxecute the sql command
        // $result will hold the selected rows from database
        if($result = $this->conn->query($sql))
        {
            print_r($result);
            // if success
            // check if username exist
            if($result->num_rows ==1)
            {
                // num_rouw if a mysql property the hold the number of rows selected from th database

                $user_details = $result->fetch_assoc();
                // fetch->assoc() will transform object to associative array
                // so we can collect or call data from the row

                // check if password is the same
                if(password_verify($password,$user_details['password']))
                {
                    session_start();
                    // create session variables

                    $_SESSION['user_id'] = $user_details['id'];
                    $_SESSION['username'] = $user_details['username'];

                    // go to dashboard
                    header('location: ../views/dashboard.php');
                    exit;

                }else{
                    die('Password is incorrect');
                }


            }else{
                // if does not exist
                die("Username not Found.");
            }


        }else{
            // if fail
            die('Error logging in: '.$this->conn->error);
        }

    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        header('location: ../views'); // return to login
        exit;
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM `users`";

        if($result = $this->conn->query($sql))
        {
            return $result;
        }else{
            die('Error retrieving all users: ' .$this->conn->error);
        }
    }

    public function getUser()
    {
        $id = $_SESSION['user_id'];

        $sql = "SELECT * FROM `users` WHERE `id`='$id'";

        if($result = $this->conn->query($sql))
        {
            return $result->fetch_assoc();
        }else{
            die('Error retrieving User: '.$this->conn->error);
        }

    }


    public function update($request,$files)
    {
        session_start();
        $id = $_SESSION['user_id'];

        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];

        $photo = $files['photo']['name'];
        $photo_tmp = $files['photo']['tmp_name'];

        $sql = "UPDATE `users` SET `first_name` = '$first_name',`last_name` = '$last_name',`username` = '$username' WHERE `id` = '$id'";

        if($this->conn->query($sql))
        { // if success update the session variable
            $_SESSION['username'] = $username;

            // if the user will update the photo
            if($photo)
            {
                // second sql command for updating only the phpoto
                $sql2 = "UPDATE `users` SET `photo` = '$photo' WHERE `id` = '$id'";

                // execute the second command
                if($this->conn->query($sql2))
                {
                    // move the photo to the directory
                    //to the assets/images folder
                    $destination = "../assets/images/$photo";
                    if(move_uploaded_file($photo_tmp,$destination))
                    {
                        header('location: ../views/dashboard.php');
                        exit;
                    }else{
                        die('Error Moving the photo');
                    }

                }else{
                    die('Error Updating the photo: '.$this->conn->error);
                }

            }else{
                header('location: ../views/dashboard.php');
                exit;
            }

        }else{
            die('Error Updating the user: '.$this->conn->error);
        }

    }

    public function deleteUser()
    {
        session_start();
        $id = $_SESSION['user_id'];
        $sql = "DELETE FROM users WHERE `id` = $id";

        if($this->conn->query($sql)){
            $this->logout();
        } else {
            die("Error deleting user: " . $this->conn->error);
        }
    }


}

?>