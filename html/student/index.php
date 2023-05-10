<!doctype html>
<html lang="en">

<head>
  <link rel="icon" href="../../images/iiita_logo.png">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/style.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Student Dashboard</title>
</head>

<body>
  <?php
  require('../../php/gen_id.php');
  session_start();
  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_unset();
    session_destroy();
    erase_cookies();
    echo "
        <script>
        function logout() {
            alert('You have been logged in for more than 30 minutes, Timeout!');
            window.location.replace('../../');
        };
        logout();
        </script>";
  }
  ?>
  <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true || $_SESSION['userid'] != 'student') {
    session_unset();
    session_destroy();
    erase_cookies();
    echo "<script> alert('You are not authorised to this page'); window.location.replace('../../')</script>";
  }
  ?>
  <div class="container-fluid fixed-top" style="margin:0;padding:0;">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
      <div class="container-fluid">
        <a class="navbar-brand" href="../../"><img src="../../images/iiita_logo.png" alt="IIITA" width="60vw" height=auto class="align-text-middle" style='display:block;margin: 0 auto;max-width: 100%;'></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active text-success" aria-current="page" href="../../" style="font-size:1.5rem;text-align:center">Welcome to Student Feedback Portal</a>
            </li>
          </ul>
          <form class="d-flex">
            <a href="../../php/logout.php"><button class="btn btn-outline-primary" id="liveAlertn" type="button">Log Out</button></a>
          </form>
        </div>
      </div>
    </nav>
    <nav class="bg-white py-1" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item" style="text-decoration: none;"><a href="../../">Home</a></li>
        <li class="breadcrumb-item" style="text-decoration: none;"><a href="login_student.php">Log In</a></li>
        <li class="breadcrumb-item active" aria-current="page">Student</li>
      </ol>
    </nav>
  </div>
  <div id="top" style="margin-top:200px">
    <div class="jumbotron">
      <h2 class="display-4">Hello, IIIT Student!</h2>
      <p class="lead">This is the student feedback portal, designed to collect the feedbacks from the students regarding
        the courses they are enrolled in.</p>
      <hr class="my-4">
    </div>
  </div>
  <div id="group">
    <div class="card-group" style="padding: 10%; background-color: rgba(0, 0, 0, 0.558);">
      <div class="row mt-4">
        <div class="col">
          <div class="card">
            <img src="../../images/feedback.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">View Feedback</h5>
              <p class="card-text">View your given Feedbacks.</p>
              <a class="btn btn-primary" href="view_feedback/" role="button">View Feedback</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="../../images/givefeedback.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Give Feedback</h5>
              <p class="card-text">Give your Feedback</p>
              <a class="btn btn-primary" href="give_feedback/" role="button">Give Feedback</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="text-center text-white bg-primary">
    <h6 class="text-uppercase fw-bold py-4 text-center">Contact</h6>
    <div class="container-fluid text-center d-block">
      <p><i class="fas fa-home me-1 text-white"></i>Indian Institute of Information Technology, Allahabad</p>
      <p><i class="fas fa-envelope me-1 text-white"></i>contact@iiita.ac.in</p>
        <p><i class="fas fa-phone me-1 text-white"></i>+91 5322 922000</p>
    </div>
    <div class="text-center py-4">
      © 2023 Copyright: <a class="text-reset fw-bold" href="../../index.php">Group-1</a>
    </div>
  </footer>
  <script src="https://kit.fontawesome.com/10950362e3.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>