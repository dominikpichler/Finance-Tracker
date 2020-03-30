<?php include "../include/db.php"?>



<?php

//Object to store all high-level-ifornmation for each month

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <title>My Chart</title>
</head>
<body>


<canvas id="myChart"></canvas>


<?


//$yearToDisplay = $GLOBALS['year'];
$yearToDisplay = 2020;
$quaterToDisplay = 'Q1';
$timeSpan = $GLOBALS['timespan'];


if($timeSpan == "month"){

    $table = "klickbar.transactions_" . $_SESSION['user_id'];
    $query_month = "SELECT * FROM $table WHERE month = 'March' AND typ ='exp'";
    $selected_month = mysqli_query($connection,$query_month);

    if($selected_month){

        $xAxis = ""; //Axis for x-Axis
        $yAxis_expenses = "";

        while ($row = mysqli_fetch_assoc($selected_month)){

            $expenses = $row['amout'];
            $date = $row['date'];
            $year = $row['year'];


            $xAxis = $xAxis . "'" .ucfirst($date) . "', ";
            $yAxis_expenses = $yAxis_expenses .$expenses . ", ";

        }
    }

} else if ($timeSpan == "year" ){

    $table = "klickbar.total_amounts_" . $_SESSION['user_id'];
    $query_totals = "SELECT * FROM $table WHERE year = $yearToDisplay";
    $selected_totals = mysqli_query($connection,$query_totals);

    if($selected_totals){

        $totalFinance = array();
        $xAxis = ""; //Axis for x-Axis
        $yAxis_expenses = "";

        while ($row = mysqli_fetch_assoc($selected_totals)){

            $total_income = $row['total_income'];
            $total_exp = $row['total_exp'];
            $month = $row['month'];
            $year = $row['year'];

            $overview = new monthlyOverview($month,$year,$total_income,$total_exp);
            array_push($totalFinance,$overview);


            $xAxis = $xAxis . "'" .$month . "', ";
            $yAxis_expenses = $yAxis_expenses .$total_exp . ", ";

        }

    }



} else if($timeSpan === "max"){



    $table = "klickbar.transactions_" . $_SESSION['user_id'];
    $query_month = "SELECT * FROM $table WHERE typ ='exp'";
    $selected_month = mysqli_query($connection,$query_month);

    if($selected_month){

        $xAxis = ""; //Axis for x-Axis
        $yAxis_income = "";
        $yAxis_expenses = "";

        while ($row = mysqli_fetch_assoc($selected_month)){

            $income = $row['amout'];
            $date = $row['date'];
            $year = $row['year'];


            $xAxis = $xAxis . "'" .ucfirst($date) . "', ";
            $yAxis_income = $yAxis_income .$income . ", ";

        }
    }

}








?>






</body>




<script>


    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            //labels:  ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            labels:  [<? echo $xAxis?>],
            datasets: [
                {
                    backgroundColor: 'rgba(50,205,50,0.1)',

                    borderColor: 'rgb(50,205,50)',
                    data: [<?echo $yAxis_income ?>],
                    label:['Einnahmen'],
                },

            ]
        },

        // Configuration options go here
        options:{

            legend: {
                display: true
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem) {
                        return tooltipItem.yLabel;
                    }
                }
            },




            hover: {
                // Overrides the global setting
                mode: 'index'
            }


        }
    });

</script>
</html>


