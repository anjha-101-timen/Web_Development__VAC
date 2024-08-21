<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
    $username = ($_POST["username"]);
    $email = ($_POST["email"]);
    $password = ($_POST["password"]);
    $gender = ($_POST["gender"]);
    $mobile_number = ($_POST["mobile_number"]);
    

        $connect = new mysqli('localhost', 'root', 'root', 'ele');

        if ($connect->connect_error) 
        {
            die("Failed Connection Occurs !" .$connect->connect_error);
        }
        else
        {
            $user_detail = $connect->prepare
            ("INSERT INTO 
            registration (username, email, password, gender, mobile_number) 
            VALUES (?, ?, ?, ?, ?)");
            $user_detail->bind_param("sssss",
             $username, $email, $password, $gender, $mobile_number);
            $user_detail->execute();
            echo "Successful Registration Occurs !";
            $user_detail->close();
            $connect->close();
        }        
    }
?>