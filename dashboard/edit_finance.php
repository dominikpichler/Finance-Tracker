<?php session_start() ?>
<?php include "../include/db.php"?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600" rel="stylesheet" type="text/css">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <title>Budget Planer</title>
</head>
<body>

<div class="top">
    <div class="budget">
        <div class="budget__value">+ 2,345.64</div>

        <div class="budget__income clearfix">
            <div class="budget__income--text">Einnahmen</div>
            <div class="right">
                <div class="budget__income--value">+ 4,300.00</div>
                <div class="budget__income--percentage">&nbsp;</div>
            </div>
        </div>

        <div class="budget__expenses clearfix">
            <div class="budget__expenses--text">Ausgaben</div>
            <div class="right clearfix">
                <div class="budget__expenses--value">- 1,954.36</div>
                <div class="budget__expenses--percentage">45%</div>
            </div>
        </div>
    </div>
</div>



<div class="bottom">
    <div class="add">
        <!--  <form action="index.php" method="post"> -->
        <div class="add__container">
            <select class="data-type btn-new add__type custom-select mr-sm-2" name="type" id="inlineFormCustomSelect">
                <option value="inc" selected> + </option>
                <option value="exp"> - </option>
            </select>
            <input type="text" class="add__description" name="description" placeholder="Beschreibung einfügen">
            <input type="number" class="add__value" name="trans_value" placeholder="Wert">
            <button class="add__btn" name="submit" type="submit"><i class="ion-ios-checkmark-outline"></i></button>
        </div>
        <!--  </form> -->
    </div>

    <div class="container clearfix">
        <div class="income">
            <h2 class="icome__title">Einnahmen</h2>
            <div class="income__list">

            </div>
        </div>



        <div class="expenses">
            <h2 class="expenses__title">Ausgaben</h2>
            <div class="expenses__list">


            </div>
        </div>
    </div>


</div>

<script src="js/app.js"></script>

<?


// ====================== FETCH EXPENSES FROM DATABASE ======================


$table = "klickbar.transactions_" . $_SESSION['user_id'];
$query_inc = "SELECT * FROM $table WHERE typ = 'exp'";

$selected_exp_query = mysqli_query($connection, $query_inc);

if(!$selected_exp_query){
    die('Leere Datenbank!');
}

$j = 0;
while ($row = mysqli_fetch_assoc($selected_exp_query)) {

    $exp_month = $row['month'];
    $exp_value = $row['amout'];
    $exp_descr = $row['text'];

    echo "<script type=\"text/javascript\">
                newItem = budgetController.addItem('exp','$exp_descr',$exp_value);
                controller.updateAfterDBImport(newItem,'exp');
     
                </script>";

}


// ====================== FETCH INCOME FROM DATABASE ======================

$table = "klickbar.transactions_" . $_SESSION['user_id'];
$query_inc = "SELECT * FROM $table WHERE typ = 'inc'";

$selected_income_query = mysqli_query($connection, $query_inc);

while ($row = mysqli_fetch_assoc($selected_income_query)){

    $income_month = $row['month'];
    $income_value = $row['amout'];
    $income_descr = $row['text'];

    echo "<script type=\"text/javascript\">
                newItem = budgetController.addItem('inc','$income_descr',$income_value);
                controller.updateAfterDBImport(newItem,'inc');
     
                </script>";



}

?>
<script>
    $.ajax({
        url: 'index.php',
        type: 'post', // performing a POST request
        data : {
            data :  budgetController.getData()
        },


</script>


</body>
</html>