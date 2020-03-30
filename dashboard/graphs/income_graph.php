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
    <script type="text/javascript" src="../../calculations/linear_regression.js"></script>


    <title>My Chart</title>
</head>
<body>


<canvas id="myChart"></canvas>


<?


//$yearToDisplay = $GLOBALS['year'];
$yearToDisplay = 2020;
$quaterToDisplay = 'Q1';
$timeSpan = $GLOBALS['timespan'];

$xValue = array();
$yValue = array();
$xIndex = 0;



if($timeSpan == "month"){

    $table = "klickbar.transactions_" . $_SESSION['user_id'];
    $query_month = "SELECT * FROM $table WHERE month = 'March' AND typ ='inc'";
    $selected_month = mysqli_query($connection,$query_month);

    if($selected_month){

        $xAxis = ""; //Axis for x-Axis
        $yAxis_income = "";
        $yAxis_expenses = "";

        $xIndex = 0;
        while ($row = mysqli_fetch_assoc($selected_month)){

            $income = $row['amout'];
            $date = $row['date'];
            $year = $row['year'];


            $xAxis = $xAxis . "'" .ucfirst($date) . "', ";
            $yAxis_income = $yAxis_income .$income . ", ";

            array_push($xValue,$xIndex);
            array_push($yValue,$income);
            $xIndex++;

        }
    }

} else if ($timeSpan == "year" ){

    $table = "klickbar.total_amounts_" . $_SESSION['user_id'];
    $query_totals = "SELECT * FROM $table WHERE year = $yearToDisplay";
    $selected_totals = mysqli_query($connection,$query_totals);

    if($selected_totals){

        $totalFinance = array();
        $xAxis = ""; //Axis for x-Axis
        $yAxis_income = "";
        $yAxis_expenses = "";

        $xIndex = 0;
        while ($row = mysqli_fetch_assoc($selected_totals)){

            $income = $row['total_income'];
            $exp = $row['total_exp'];
            $month = $row['month'];
            $year = $row['year'];


            $xAxis = $xAxis . "'" .ucfirst($month) . "', ";
            $yAxis_income = $yAxis_income .$income . ", ";

            array_push($xValue,$xIndex);
            array_push($yValue,$income);
            $xIndex++;

        }

    }



} else if($timeSpan === "max"){


    $table = "klickbar.transactions_" . $_SESSION['user_id'];
    $query_month = "SELECT * FROM $table WHERE typ ='inc'";
    $selected_month = mysqli_query($connection,$query_month);

    if($selected_month){

        $xAxis = ""; //Axis for x-Axis
        $yAxis_income = "";
        $yAxis_expenses = "";

        $xIndex = 0;
        while ($row = mysqli_fetch_assoc($selected_month)){

            $income = $row['amout'];
            $date = $row['date'];
            $year = $row['year'];


            array_push($xValue,$xIndex);
            array_push($yValue,$income);



            $xAxis = $xAxis . "'" .ucfirst(substr($date,0,10)) . "', ";
            $yAxis_income = $yAxis_income .$income . ", ";

            $xIndex++;
        }

    }

}


?>






</body>




<script>



     xArray = [];
     yArray = [];
     xArray = <?php echo json_encode($xValue); ?>;
     yArray = <?php echo json_encode($yValue); ?>;




     for(var i = 0; i < xArray.length; i++){
         xArray[i] = parseFloat(xArray[i]);
         yArray[i] = parseFloat(yArray[i]);
     }


    y_linReg = [];
    y_linReg = findLineByLeastSquares(xArray,yArray);




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
                    backgroundColor: 'rgba(2, 94, 220,0.1)',
                    borderColor: 'rgb(2, 94, 220)',
                    data: [<?echo $yAxis_income ?>],
                    label:['Income'],


                },
                {
                    backgroundColor: 'rgba(255,255,255,0)',
                    borderColor: 'rgb(255,0,0)',
                    data: y_linReg,
                    borderDash: [10,5],
                    label:['Linear Regression'],
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
            },



        }
    });

</script>
</html>


