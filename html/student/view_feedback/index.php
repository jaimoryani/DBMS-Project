<!doctype html>
<html lang="en">

<head>
  <link rel="icon" href="../../../images/iiita_logo.png">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../../css/style.css">
  <!-- Bootstrap CSS -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Show Faculty</title>
</head>

<body>
  <?php
  session_start();
  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_unset();
    session_destroy();
    echo "
        <script>
        function logout() {
            alert('You have been logged in for more than 30 minutes, Timeout!');
            window.location.replace('http://localhost/DBMS-Project/');
        };
        logout();
        </script>";
  }
  ?>
  <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true || $_SESSION['userid'] != 'student') : echo "<script> alert('You are not authorised to this page'); window.location.replace('../../')</script>";
  endif; ?>
  <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <a class="navbar-brand" href="../../index.html"><img src="../../../images/iiita_logo.png" alt="" width="100px" height="100px" class="d-inline-block align-text-middle"></a>
      <div class="new">
        <a class="navbar-text">
          Welcome to Student Feedback Portal
        </a>
      </div>
      <a href="../../../php/logout.php"><button type="button" class="btn btn-primary" id="liveAlertn" style="margin-bottom: 1%;margin-left: -20%;">Logout</button></a>
    </div>
  </nav>
  <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item" style="text-decoration: none;"><a href="../../../">Home</a></li>
      <li class="breadcrumb-item" style="text-decoration: none;"><a href="login_student.php">Log In</a></li>
      <li class="breadcrumb-item" style="text-decoration: none;"><a href="../">Student</a></li>
      <li class="breadcrumb-item active" aria-current="page">View Faculty</li>
    </ol>
  </nav>
  <div id="top" class='table-responsive'>
    <?php
    require('../../../php/connection.php');
    setcookie('Teacher', 'destroy', time() - 10 * 60 * 5);
    $sql = "select name,id from instructor;";
    $result = $con->query($sql);
    echo "<table class='table'>";
    echo "<thead class='p-3 mb-2 bg-primary text-white'>";
    echo ("<th scope='col'>Name </th>");
    echo ("<th scope='col'>Email </th>");
    echo "<th></th>";
    echo "</thead>";
    echo "<tbody>";
    if ($result->num_rows > 0) {
      foreach ($result as $row => $val) {
        echo "<form action='view_faculty.php' method='POST'style='width:100%;'>";
        echo "<tr>";
        echo "<td>" . $val['name'] .  "</td>";
        echo "<td>" . $val['id'] .  "</td>";
        echo "<td><button name='" . $val['id'] . "' class='btn btn-primary' type='submit' value='" . $val['id'] . "'>Edit</button></td>";
        echo "</tr>";
        echo "</form>";
      }
    }
    echo "<form action='add_faculty.php' method='POST'style='width:100%;'>";
    echo "<tr><td></td><td></td><td><button name='x' class='btn btn-primary' type='submit' value=''>Add a faculty +</button></td></tr>";
    echo "</form>";
    echo "</tbody>";
    echo "</table>";

    $con->close();
    ?>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>