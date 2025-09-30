<?php 
session_start();
include("navbar.php");
include("config/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Search Results</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    :root {
      --card-bg: #ffffff;
      --card-shadow: rgba(0, 0, 0, 0.1);
      --btn-gradient-start: #4e54c8;
      --btn-gradient-end: #8f94fb;
      --text-primary: #333;
      --text-secondary: #666;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f0f2f5;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
      color: var(--text-primary);
      margin-bottom: 20px;
    }

    .property-wrapper {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 24px;
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    .card {
      background: var(--card-bg);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 16px var(--card-shadow);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      display: flex;
      flex-direction: column;
    }

    .card:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 8px 24px var(--card-shadow);
    }

    .card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      flex-shrink: 0;
    }

    .card-content {
      padding: 16px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .card-content h4 {
      margin: 0 0 8px;
      color: var(--text-primary);
      font-size: 1.25rem;
    }

    .card-content p {
      margin: 0 0 12px;
      color: var(--text-secondary);
      font-size: 0.95rem;
      line-height: 1.4;
    }

    .card-content .btn {
      display: inline-block;
      width: 100%;
      padding: 10px 0;
      background: linear-gradient(135deg, var(--btn-gradient-start), var(--btn-gradient-end));
      color: #fff;
      font-weight: 500;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      text-decoration: none;
      text-align: center;
      transition: opacity 0.2s ease;
      margin-top: auto;
    }

    .card-content .btn:hover {
      opacity: 0.85;
    }
  </style>
</head>
<body>

<h1>Searched Properties</h1>
<div class="property-wrapper">
  <?php 
  if (isset($_GET['division'], $_GET['district'], $_GET['thana'])) {
      $division = mysqli_real_escape_string($db, $_GET['division']);
      $district = mysqli_real_escape_string($db, $_GET['district']);
      $thana = mysqli_real_escape_string($db, $_GET['thana']);

      $sql = "SELECT * FROM add_property 
              WHERE division = '$division' 
              AND district = '$district' 
              AND thana = '$thana'";

      $query = mysqli_query($db, $sql);

      if (mysqli_num_rows($query) > 0) {
          while ($rows = mysqli_fetch_assoc($query)) {
              $property_id = $rows['property_id'];
  ?>
  <div class="card">
    <?php
    $sql2 = "SELECT * FROM property_photo WHERE property_id = '$property_id' LIMIT 1";
    $query2 = mysqli_query($db, $sql2);

    if (mysqli_num_rows($query2) > 0) {
      $row = mysqli_fetch_assoc($query2);
      $photo = $row['p_photo'];
      echo '<img src="owner/' . $photo . '" alt="Property Image">';
    } else {
      echo '<img src="images/no-image.jpg" alt="No Image Available">';
    }
    ?>
    <div class="card-content">
      <h4><?php echo htmlspecialchars($rows['property_type']); ?></h4>
      <p><?php echo htmlspecialchars($rows['thana'] . ', ' . $rows['district']); ?></p>
      <a href="view-property.php?property_id=<?php echo $property_id; ?>" class="btn">View Property</a>
    </div>
  </div>
  <?php
          }
      } else {
          echo '<p style="text-align:center; width:100%;">No properties found for the selected location.</p>';
      }
  } else {
      echo '<p style="text-align:center; width:100%;">Invalid search request.</p>';
  }
  ?>
</div>

</body>
</html>