
<?php include "db.php";?>
<?php



if(isset($_POST['register'] )) {

    $username = $_POST['username'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];

    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];



    // 1. In User-Table eintragen

    //TODO: AUTOINCREMENT FUNKTIONIERT NOCH NICHT GANZ.
    $new_user_query =  "INSERT INTO `klickbar`.`users` (`user_id`, `username`, `user_firstname`, `user_lastname`, `user_email`,`user_password`) VALUES ( 'Domdotcom', 'Dominik', 'Pichler', 'pichler.dom14@gmail.com','Daniel1#')";


    //2. User_ID aus Usertable auslesen

    $id_query = "SELECT * FROM users WHERE username = '$username'";

    while ($row = mysqli_fetch_assoc($id_query)){

        $db_user_id = $row['user_id'];

    //3. Eigenen User-spezifischen Table erstellen (mit neuer UserID)

        $query = "CREATE TABLE `klickbar`.`transactions_$db_user_id` (
            `user_id` INT NOT NULL,
            `month` VARCHAR(45) NOT NULL,
            `date` DATETIME NOT NULL,
            `typ` VARCHAR(45) NOT NULL,
            `amout` FLOAT NOT NULL,
            PRIMARY KEY (`user_id`));";


        $new_table_query = mysqli_query($connection,$query);
    }


    







}




