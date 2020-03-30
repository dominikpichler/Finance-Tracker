<?php include "../include/db.php"?>




<?php

//Object to store all high-level-ifornmation for each month
class monthlyOverview {
    // Properties
    private $month;
    private $year;
    private $total_income;
    private $total_exp;

    // Methods

    public function __construct($month, $year, $total_income, $total_exp)
    {
        $this->month = $month;
        $this->year = $year;
        $this->total_income = $total_income;
        $this->total_exp = $total_exp;
    }

    /**
     * @return mixed
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return mixed
     */
    public function getTotalIncome()
    {
        return $this->total_income;
    }

    /**
     * @return mixed
     */
    public function getTotalExp()
    {
        return $this->total_exp;
    }
}

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




$table = "klickbar.total_amounts_" . $_SESSION['user_id'];
$query_totals = "SELECT * FROM $table WHERE year = $yearToDisplay";
$selected_totals = mysqli_query($connection,$query_totals);


if($selected_totals){

    $totalFinance = array();
    $xAxis = ""; //Axis for x-Axis
    $yAxis_income = "";
    $yAxis_expenses = "";




    while ($row = mysqli_fetch_assoc($selected_totals)){

        $total_income = $row['total_income'];
        $total_exp = $row['total_exp'];
        $month = $row['month'];
        $year = $row['year'];

        $overview = new monthlyOverview($month,$year,$total_income,$total_exp);
        array_push($totalFinance,$overview);


        $xAxis = $xAxis . "'" .ucfirst($overview->getMonth()) . "', ";
        $yAxis_income = $yAxis_income .$overview->getTotalIncome() . ", ";
        $yAxis_expenses = $yAxis_expenses .$overview->getTotalExp() . ", ";
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
                    backgroundColor: 'rgba(0,0,255,0.1)',

                    borderColor: '#4e73df',
                    data: [<?echo $yAxis_income ?>],
                    label:['Income'],
                },
                {
                    backgroundColor: 'rgba(240,128,128,0.1)',
                    borderColor: '#F0706A',
                    data: [<?echo $yAxis_expenses ?>],
                    label: ['Expenses'],

                }
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


