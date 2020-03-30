<?


/* ============== REGISTER NEW USER ============== */

$connection = mysqli_connect('127.0.0.1','root','Dominik1#','klickbar',3306);

    if(isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['eMail'];
        $company = $_POST['company'];
        $password = $_POST['password'];

        $username = mysqli_real_escape_string($connection,$username);
        $email = mysqli_real_escape_string($connection,$email);
        $company = mysqli_real_escape_string($connection,$company);
        $password = mysqli_real_escape_string($connection,$password);


        $query = "INSERT INTO Kunden(Name,EMail,Unternehmen, Passwort) ";
        $query .= "VALUES ('$username','$email','$company','$password') ";
        $result = mysqli_query($connection,$query);
    }

?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>

        Klickbar - Finance meets Technology

    </title>


      <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic|Work+Sans:300,400,500,600' rel='stylesheet' type='text/css'>
      <link href="assets/css/toolkit-startup.css" rel="stylesheet">
      <link href="assets/css/custom.css" rel="stylesheet">
   <link href="assets/css/particles.css" rel="stylesheet">

    <link href="assets/css/application-startup.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->



    <style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
      /* …curses ios, etc… */
      @media (max-width: 768px) and (-webkit-min-device-pixel-ratio: 2) {
        body {
          width: 1px;
          min-width: 100%;
          *width: 100%;
        }
        #stage {
          height: 1px;
          overflow: auto;
          min-height: 100vh;
          -webkit-overflow-scrolling: touch;
        }
      }
    </style>
  </head>


<body>

<div class="stage-shelf stage-shelf-right hidden" id="sidebar">
  <ul class="nav nav-bordered nav-stacked flex-column">
    <li class="nav-header">Menue</li>
    <li class="nav-item">
      <a class="nav-link active whiteHover" href="#Angebot">Our Offer</a>
    </li>
    <li class="nav-item">
      <a class="nav-link whiteHover" href="#Ueber_uns">About us</a>
    </li>

    <li class="nav-item">
      <button type="button" class="btn btn-primary RequestButton buttonBurger" data-toggle="modal" data-target="#loginModal">Login</button>
    </li>

  </ul>
</div>



<div class="stage" >

    <div class ="block canvas backgroud_main" style=" height: 90vh" id="">
        <div class="container py-4 fixed-top app-navbar">
            <nav class="navbar navbar-transparent navbar-padded navbar-toggleable-sm">
                <button
                        class="navbar-toggler navbar-toggler-right hidden-md-up"
                        type="button"
                        data-target="#stage"
                        data-toggle="stage"
                        data-distance="-250">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="navbar-brand mr-auto  " href="">

                    <strong style="font-size: 30px; background: transparent; padding: 12px; border-radius: 4px; color: #ffffff;">Klickbar</strong>
                </a>

                <div class="hidden-md-down text-uppercase">
                    <ul class="navbar-nav">
                        <li class="nav-item px-1 ">
                            <a class="nav-link whiteHover" href="#Angebot">Our Offer</a>
                        </li>
                        <li class="nav-item px-1 ">
                            <a class="nav-link whiteHover" href="#Ueber_uns">About us</a>
                        </li>

                        <button type="button" class="btn btn-primary RequestButton" data-toggle="modal" data-target="#loginModal">Login</button>
                        </li>

                    </ul>
                </div>
            </nav>
          </div>
        <div class="container container_head">
            <div class="row">
                <div style="margin: 0 auto">
                    <h1 class="block-titleData frequency heading-primary ">Finance meets Technology</h1>
                    <p class="lead mb-4 text-muted heading-secondary" style="text-align: center ">Analye your Cashflows like never before!.</p>
                    <a href="include/register.html"><button class="btn btn-primary btn-lg RequestButton" id="RequestButton">Sign Up now</button> </a>
                </div>
            </div>
        </div>
        </div>


    </div>




<div class="block block-secondary app-iphone-block" id="Ueber_uns">
  <div class="container">
    <div class="row app-align-center">

      <div class="col-sm-5 hidden-sm-down">
        <img class="app-iphone" src="assets/img/startup-2.jpg" style="width: 100%;">
      </div>

      <div class="col-md-6 offset-md-1 col-sm-12 offset-sm-0">
        <h6 class="text-muted text-uppercase">DIGITAL</h6>
        <h3>The Digital Revolution</h3>


        <p class="lead mb-4"> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
        <div class="row hidden-md-down">
          <div class="col-sm-6 mb-3">
            <h5>Big Data</h5>
            <p>M Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
          </div>
          <div class="col-sm-6">
            <h5>Analytics &amp; Reporting</h5>
            <p>N Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="block block-inverse block-secondary app-code-block" id="Angebot">
  <div class="container">
    <div class="row app-align-center">
      <div class="col-md-5 push-md-7">
        <pre class="app-code">
<span>1</span> <span>Klickbar</span> “who are the latest 3 users?”
<span>2</span>
<span>3</span>  {
<span>4</span>    "Dave": {
<span>5</span>      "fullName": "Dave Gamache",
<span>6</span>      "twitterHandle": "@dhg",
<span>7</span>    }
<span>8</span>    "Mark": {
<span>9</span>      "fullName": "Mark Otto",
<span>10</span>      "twitterHandle": "@mdo",
<span>11</span>    }
<span>12</span>    "Jacob": {
<span>13</span>      "fullName": "Jacob Thornton",
<span>14</span>      "twitterHandle": "@fat",
<span>15</span>    }
<span>16</span>  }</pre>
      </div>

      <div class="col-md-6 pull-md-5">
        <h6 class="text-muted text-uppercase">Budgeting</h6>
        <h3> Lorem ipsum dolor sit amet, consetetur sadipscing elitr</h3>
        <p class="lead mb-4 text-muted"> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore </p>

        </button>
      </div>
    </div>
  </div>
</div>


<div class="block block-inverse app-high-praise"  id="Referenzen"
     style="background-image: url(assets/img/startup-3.jpg); display: none">
    <div class="container">
      <div class="row app-align-center py-3">
        <div class="col-sm-5 push-sm-7 py-5">
          <h6 class="text-muted text-uppercase mb-2">Ou</h6>
          <h3 class="mb-4">“Durch den neuen Webshop konnte ich meinen Umsatz im letzen Monat um 500% steigern ”</h3>
          <p class="mb-4 text-muted">Sandra A., Geschäftsführerin - VP-Power.at</p>
        </div>
      </div>
  </div>
</div>


<div class="block app-ribbon py-5">
    <h3 class="customer-heading">A Selection of Our Customers</h3>
  <div class="container text-xs-center">
    <img src="assets/img/startup-5.svg">
    <img src="assets/img/startup-6.svg">
    <img src="assets/img/startup-7.svg">
    <img src="assets/img/startup-8.svg">
  </div>
</div>

<div class="block block-secondary app-block-marketing-grid">
  <div class="container text-xs-center">

    <div class="row mb-5">
      <div class="col-xs-10 offset-xs-1 col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
        <h6 class="text-muted text-uppercase mb-2">Data Analytics</h6>
        <h3  class="mb-4">We make your life simpler again.<br> Promised.</h3>
      </div>
    </div>

    <div class="row app-marketing-grid">
      <div class="col-md-4 px-4 mb-5">
        <img class="mb-1" src="assets/img/startup-9.svg">
        <p><strong>24/7 Support.</strong> Lorem ipsum dolor sit amet, consetetur sadipscing elitr</p>
      </div>
      <div class="col-md-4 px-4 mb-5">
        <img class="mb-1" src="assets/img/startup-10.svg">
        <p><strong>E-commerce.</strong> Lorem ipsum dolor sit amet, consetetur sadipscing elitr</p>
      </div>
      <div class="col-md-4 px-4 mb-5">
        <img class="mb-1" src="assets/img/startup-11.svg">
        <p><strong>High-Speed.</strong> Lorem ipsum dolor sit amet, consetetur sadipscing elitr</p>
      </div>
    </div>

    <div class="row app-marketing-grid">
      <div class="col-md-4 px-4 mb-5">
        <img class="mb-1" src="assets/img/startup-12.svg">
        <p><strong>Analytics.</strong> Lorem ipsum dolor sit amet, consetetur sadipscing elitr</p>
      </div>
      <div class="col-md-4 px-4 mb-5">
        <img class="mb-1" src="assets/img/startup-13.svg">
        <p><strong>Mobil Applications.</strong> Lorem ipsum dolor sit amet, consetetur sadipscing elitr</p>
      </div>
      <div class="col-md-4 px-4 mb-5">
        <img class="mb-1" src="assets/img/startup-14.svg">
        <p><strong>Cyber-Security.</strong> Lorem ipsum dolor sit amet, consetetur sadipscing elitr</p>
      </div>
    </div>
  </div>
</div>

<div class="block app-price-plans">
  <div class="container text-center">

    <div class="row mb-5">
      <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <h6 class="text-muted text-uppercase mb-2">Business Talk</h6>
        <h3> Lorem ipsum dolor sit amet, consetetur sadipscing <br>  Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </h3>
      </div>
    </div>


  </div>
</div>


<div class="block block-inverse app-footer">
 <div class="container">
    <div class="row">
      <div class="col-md-5 mb-5">
        <ul class="list-unstyled list-spaced">
          <li class="mb-2"><h6 class="text-uppercase">Über uns</h6></li>
          <li class="text-muted">
              Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore<br>  Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
           <br>
              <a href="mailto: office@klickbar.at"> office@klickbar.at</a>.
          </li>
        </ul>
      </div>
      <div class="col-md-3 offset-md-2 mb-5">
        <ul class="list-unstyled list-spaced">
          <li class="mb-2"><h6 class="text-uppercase">Our Product</h6></li>
          <li class="text-muted">About Us</li>
          <li class="text-muted">Imprint</li>
          <li class="text-muted">Legal</li>
        </ul>
      </div>
  </div>
</div>



</div>



<!-- Button trigger modal Login-->
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModallabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalTitel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="include/login.php" method="post">

          <!-- LogIn-->
        <div id="loginForm">

              <label for="username">Name</label>
              <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name = "username" placeholder="Username">
                <br>
              <label for="loginPassword">Password</label>
              <input type="password" class="form-control" name="password" id="loginPassword" placeholder="Password">

            <br><br><span aria-hidden="true"></span>

        </div>

        <div class = "hideElement" id="signUpForm">

                <div class="form-group">
                     <label for="InputName">Name</label>
                     <input type="email" class="form-control" id="signUpName" aria-describedby="nameHelp" placeholder=" ">
               </div>

                <div class="form-group">
                    <label for="InputCompany">Unternehmen</label>
                    <input type="email" class="form-control" id="signUpCompany" aria-describedby="companyHelp" placeholder=" ">
                </div>

                <div class="form-group">
                    <label for="InputEmail">E-Mail Addresse</label>
                    <input type="email" class="form-control" id="signUpEmail" aria-describedby="emailHelp" placeholder=" ">
                </div>

                <div class="form-group">
                     <label for="SignUpPassword">Password</label>
                     <input type="password" class="form-control" id="signUpPassword" aria-describedby="passwordHelp" placeholder=" ">
                </div>

             </div>


            <div class="modal-footer">

                <button class="btn btn-primary RequestButton" type="submit" id="loginActive login" name ="login" value="Login">Login</button>
                <a href="include/register.html"><button class="btn btn-primary RequestButton" type="button"  name ="loginActive" value="Registrieren">Registrieren </button></a>



            </div>
        </form>


      </div>

    </div>
  </div>
</div>
<!-- Modal Kostenlos Registrieren-->

<!-- Modal -->
<div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrieren</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>

      <div class="modal-body">
        <form method="post" action="index.php">
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name = "username" id="RequestName" aria-describedby="emailHelp" placeholder="">
          </div>
          <div class="form-group">
            <label for="eMail">E-Mail</label>
            <input type="email" class="form-control" name ="eMail" id="RequestEmail" placeholder="">
          </div>
           <div class="form-group">
               <label for="eMail">Company</label>
               <input type="text" class="form-control" name ="company" id="RequestEmail" placeholder="">
           </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Password</label>
            <input type="password" class="form-control" name ="password" id="yourRequest">
          </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
      </div>


    </div>
  </div>
</div>

    <!-- particle scripts -->

    <!-- scripts -->
    <script src="assets/particleLib/particles.js"></script>
    <script src="assets/js/app.js"></script>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/tether.min.js"></script>
    <script src="assets/js/toolkit.js"></script>
    <script src="assets/js/application.js"></script>
    <script src="assets/js/custom.js"></script>

  </body>

</html>

