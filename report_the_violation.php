<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Connect to database
  $conn = mysqli_connect("localhost", "root", "", "eye_wita");
  if(!$conn) {
    die("ERROR: could not connect." . mysqli_connect_error());
  }

  // Sanitize and retrieve form data
  $crimeType = mysqli_real_escape_string($conn, $_POST["crime-type"]);
  $crimeFile = mysqli_real_escape_string($conn, $_POST["crime-photo"]);
  $crimeLocation  = mysqli_real_escape_string($conn, $_POST["crime-location"]);
  $crimeDate = mysqli_real_escape_string($conn,$_POST["crime-date"]);
  $crimeDescription = mysqli_real_escape_string($conn,$_POST[ "crime-description"]);
  // Prepare and execute SQL query to insert data into student table
  $sql = "INSERT INTO report_a_crime (violation, file, location, date2, description) VALUES ('$crimeType', '$crimeFile', '$crimeLocation', '$crimeDate','$crimeDescription')";
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  // Close database connection
  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EYE WITA - Report the Violation</title>
   <style>
    /* General styles */
    header{
  background-color: #fff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  position: fixed;
  width: 100%;
  z-index: 1000;
}
nav{
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 80px;
} 
nav .logo {
  font-size: 24px;
  font-weight: 700;
  color: #333;
  text-transform: uppercase;
  letter-spacing: 2px;
}

nav ul{
  display: flex;
  list-style: none;
}
nav ul li{
  margin-left: 40px;
}

nav ul li:first-child{
  margin-left: 0;
}
nav ul li a{
  font-size: 16px;
  font-weight: 600;
  color: #333;
  text-decoration: none;
  text-transform: uppercase;
  transition: all 0.2s ease-in-out;
}
nav ul li a:hover{
  color: #007bff;
}

/* Reset default styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  /* Set body background color */
  body {
    background-color: #f9f9f9;
    font-family: Arial, sans-serif;
  }
  

  
  /* Main styles */
  main {
    max-width: 800px;
    margin: 0 auto;
    padding: 40px;
  }
  
  h2 {
    font-size: 2.5rem;
    font-weight: bold;
    color: #555;
    margin-bottom: 20px;
  }
  
  .username {
    color: #ff6600;
  }
  
  p {
    font-size: 1.2rem;
    color: #777;
    line-height: 1.5;
    margin-bottom: 40px;
  }
  
  h3 {
    font-size: 2rem;
    font-weight: bold;
    color: #555;
    margin-bottom: 20px;
  }
  
  form {
    margin-bottom: 40px;
  }
  
  label {
    font-size: 1.2rem;
    color: #555;
    margin-bottom: 10px;
    display: block;
  }
  
  select,
  input[type="file"],
  input[type="text"],
  input[type="date"],
  textarea {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #f2f2f2;
    margin-bottom: 20px;
  }
  
  textarea {
    height: 150px;
  }
  
  button[type="submit"] {
    background-color: #ff6600;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1.2rem;
    transition: all 0.3s ease-in-out;
  }
  
  button[type="submit"]:hover {
    background-color: #e65c00;
  }
  
  /* Footer styles */
  footer {
    text-align: center;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0px -5px 5px rgba(0, 0, 0, 0.1);
  }
  
  footer p {
    font-size: 1rem;
    color: #777;
  }
  
   </style>
</head> 
<body>
<header>
<div class="container">
            <nav>
                <a href="userdashboard.php" class="logo">EYE WITA</a>
                <ul>
                  <li><a href="userdashboard.php">Dashboard</a></li>
                  <li><a href="report_the_violation.php">Report a Violations</a></li>
                  <li><a href="view_reports.php">View Reports</a></li>
                  <li><a href="stations.php">Station Details</a></li>
                  <li><a href="index.php">Log Out</a></li>
                </ul>
            </nav>
</div>
    </header>
    <pre> 




    </pre>
<h3>Report a Violation</h3>
        <form action="#" method="post">
            <label for="crime-type">Select Violation:</label>
            <select id="crime-type" name="crime-type">
            <option value="">-- Select the violation --</option>
                <option> Driving under the influence (DUI)</option>
                <option>Reckless driving</option>
                <option>Drag racing</option>
                <option>Hit and Run</option>
                <option>Texting or using a phone while driving</option>
                <option>Failure to obey traffic signals or traffic control devices</option>
                <option>Driving on the wrong side of the road</option>
                <option>Motor vehicle driven by minor</option>
                <option>Carrying protruding load</option>
                <option>Without Helmet by Rider</option>
                <option>Without Helmet by Pillion Rider</option>
                <option>Over loading passengers in Auto rickshaw</option>
                <option>Over loading school students in Auto rickshaw</option>
            </select>
            <br>
            <label for="crime-photo">Upload Photo:</label>
            <input type="file" id="crime-photo" name="crime-photo">
            <br>
            <label for="crime-location">Location:</label>
            <input type="text" id="crime-location" name="crime-location">
            <br>
            <label for="crime-date">Date:</label>
            <input type="date" id="crime-date" name="crime-date">
            <br>
            <label for="crime-description">Description:</label>
            <textarea id="crime-description" name="crime-description"></textarea>
            <br>
            <button type="submit">Submit</button>
        </form>
</body>
</html>