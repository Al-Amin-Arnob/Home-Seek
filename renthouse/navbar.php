<!DOCTYPE html>
<html lang="en">
<head>
  <title>RentHouse</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link
    rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
  >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script
    src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
  ></script>
  <style>
    .navbar .dropdown-menu.search-form {
      padding: 15px;
      min-width: 300px;
    }
    .navbar .search-form .form-group {
      margin-bottom: 10px;
      width: 100%;
    }
    .navbar .search-form select,
    .navbar .search-form button {
      width: 100%;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-default" style="background:#e3f2fd; margin-bottom:0;">
  <div class="container-fluid">
    <!-- Mobile toggle & brand -->
    <div class="navbar-header">
      <button 
        type="button"
        class="navbar-toggle collapsed"
        data-toggle="collapse"
        data-target="#main-navbar"
      >
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">
        <img src="images/logo.png" alt="logo" style="height:35px;">
      </a>
    </div>

    <div class="collapse navbar-collapse" id="main-navbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="about-us.php">About Us</a></li>
        <li><a href="contact-us.php">Contact Us</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <!-- Search Dropdown -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-search"></span>
          </a>
          <ul class="dropdown-menu search-form">
            <form action="search-property.php" method="GET">
              <div class="form-group">
                <label for="division">Division:</label>
                <select id="division" name="division" class="form-control" required>
                  <option value="">Select Division</option>
                  <option>Dhaka</option>
                  <option>Chattogram</option>
                  <option>Khulna</option>
                  <option>Rajshahi</option>
                  <option>Barisal</option>
                  <option>Sylhet</option>
                  <option>Rangpur</option>
                  <option>Mymensingh</option>
                </select>
              </div>
              <div class="form-group">
                <label for="district">District:</label>
                <select id="district" name="district" class="form-control" required>
                  <option value="">Select District</option>
                </select>
              </div>
              <div class="form-group">
                <label for="thana">Thana:</label>
                <select id="thana" name="thana" class="form-control" required>
                  <option value="">Select Thana</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Search</button>
            </form>
          </ul>
        </li>

        <!-- Authentication Links -->
        <?php if(isset($_SESSION["email"]) && !empty($_SESSION['email'])): ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-user"></span> My Profile <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="profile.php">Profile</a></li>
            <li><a href="booked-property.php">Booked Property</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
        <?php else: ?>
        <li><a href="how-to-register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
        <li><a href="how-to-login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>

<script>
$(function() {
  var locations = {};

  // Load combined locations.json
  $.getJSON('locations.json')
   .done(function(data) {
     locations = data;
   })
   .fail(function() {
     console.error('Could not load locations.json');
   });

  // Populate District when Division changes
  $('#division').change(function() {
    var div = $(this).val();
    var dList = locations[div] ? Object.keys(locations[div]) : [];
    var $dist = $('#district').empty().append('<option value="">Select District</option>');
    dList.forEach(function(d) {
      $dist.append('<option>' + d + '</option>');
    });
    $('#thana').empty().append('<option value="">Select Thana</option>');
  });

  // Populate Thana when District changes
  $('#district').change(function() {
    var div = $('#division').val();
    var dist = $(this).val();
    var tList = (locations[div] && locations[div][dist]) || [];
    var $th = $('#thana').empty().append('<option value="">Select Thana</option>');
    tList.forEach(function(t) {
      $th.append('<option>' + t + '</option>');
    });
  });
});
</script>

</body>
</html>