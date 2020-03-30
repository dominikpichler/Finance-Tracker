<?php session_start() ?>
<?php ob_start() ?>
<?php include "db.php"; ?>



<?php


if(isset($_POST['login'] )){
    $username = $_POST['username'];
    $password = $_POST['password'];


    //SQL-INJECTIONS
    $username = mysqli_real_escape_string($connection,$username);
    $username = mysqli_real_escape_string($connection,$username);


    $query = "SELECT * FROM users WHERE username = '$username'";
    $select_user_query = mysqli_query($connection,$query);


    if(!$select_user_query){
        die("User nicht in der Datebank gefunden");


    }
     else {

         while ($row = mysqli_fetch_assoc($select_user_query)){

             $db_user_id = $row['user_id'];

             $db_username = $row['username'];

             $db_user_firstname = $row['user_firstname'];
             $db_user_lastname = $row['user_lastname'];
             $db_user_email = $row['user_email'];
             $db_user_password = $row['user_password'];

             $db_user_inc_total = $row['user_inc_total'];
             $db_user_exp_total = $row['user_exp_total'];
         }


     }

    if($username !== $db_username || $password !== $db_user_password ){


        header("Location: ../index.php?error_code=fl)");

    } else if ($username == $db_username && $password == $db_user_password ){

        $_SESSION['username'] = $db_username;
        $_SESSION['user_id'] = $db_user_id;
        $_SESSION['user_firstname'] = $db_user_firstname;
        $_SESSION['user_lastname'] = $db_user_lastname;
        $_SESSION['user_email'] = $db_user_email;

        $_SESSION['user_inc'] = $db_user_inc_total;
        $_SESSION['user_exp'] = $db_user_exp_total;


        //TODO: header
        header("Location: ../dashboard");
    } else {
        header("Location: ../index.php?error_code=fl)");

    }


}



if(isset($_POST['register'])){

}




?>

