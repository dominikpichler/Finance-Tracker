
<?


/* ============== SENDING TO DATABASE ============== */
//Database
$connection = mysqli_connect('127.0.0.1','root','Dominik1#','loginApp',3306);

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    }

//AVOID SQL INJECTIONS!
    $username = mysqli_real_escape_string($connection,$username);
    $password = mysqli_real_escape_string($connection,$password);

//Save password (Hashpassword)

    $hashFormat = "$2y$10$";
    $salt = "iusesomecrazystrings22";
    $hash_and_salt = $hashFormat . $salt;


//    $password = crypt($password,$hash_and_salt);

$query = "INSERT INTO users(user,password) ";
$query .= "VALUES ('$username','$password') ";
$result = mysqli_query($connection,$query);





/* ============== READING FROM DATABASE ============== */


$queryRead = "SELECT * FROM users";
$resultRead  = mysqli_query($connection,$queryRead);

/* ============== UPDATE DATABASE ============== */








?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>

<div class="container">

    <div class="col-xs-6 col-md-6">
        <form action="login.php" method ="post">
            <div class="form-group">
                <label for="username" class="username">Username</label>
                <input type="text" name="username" class="form-control">
            </div>



            <div class="form-group">
                <label for="password" class="username"> Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <input class="btn-primary btn" type="submit" name ="submit" value="Submit">

        </form>

    </div>

</div>



<div class="container">

    <div class="col-sm-6">

        <?
        while ($row  =mysqli_fetch_assoc($resultRead)){
            print_r($row);
        }
        ?>

    </div>

</div>

</body>
</html>