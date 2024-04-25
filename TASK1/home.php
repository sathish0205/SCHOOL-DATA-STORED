<?php
include 'DBCONNECTION.PHP';
session_start();

if (!isset($_SESSION['email'])) {
  header("location: login.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['Employee_Id'];
  $name = $_POST['Employee_name'];
  $email = $_POST['EmployeeEmail'];
  $empl_no = $_POST['empl_no'];
  // Check if file was uploaded successfully
  if (isset($_FILES['Picture']) && $_FILES['Picture']['error'] === UPLOAD_ERR_OK) {
    $image = $_FILES['Picture']['tmp_name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["Picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is an actual image
    $check = getimagesize($image);
    if ($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }



    // Check file size



    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    } else {
      // Move the uploaded file to the specified directory
      if (move_uploaded_file($_FILES["Picture"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["Picture"]["name"])) . " has been uploaded.";

        // Insert other data into database
        $stmt = $conn->prepare("INSERT INTO employee_details (Employee_Id, Employee_name, EmployeeEmail, empl_no, Picture) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $id, $name, $email, $empl_no, $target_file);

        if ($stmt->execute()) {
          echo "<div class='alert alert-primary'>Registration successfully </div>";
        } else {
          echo "Error: " . $stmt->error;
        }

        $stmt->close();
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  } else {
    echo "No file uploaded or an error occurred during upload.";
  }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home|| page</title>
 

  <!-- include headr.php -->
  <?php include 'header.php'; ?>


  <!-- import jquery -->
  <script src="jquery-3.7.1.min.js"></script>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


  <!-- icon link cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- boostrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</head>

<style>
body{
 background-color: wheat;
}
h1{
 cursor: pointer;
 color: orangered;

}


.register{
  background-color: green;
  color: white;
 
}
.form{

 border-bottom: 5px;
 display: flexbox;
 font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
 font-weight: 600;
 font-size: x-large;
 margin-left: 50px;
 
 
}

#h1{

  text-align: center;
  color: green;
  text-transform: uppercase;
}
.split{
  
  margin-top: 20px;
  text-align:start;
  margin-right: 500px;
 width: 800px;
 height: fit-content;


}
</style>



<body>
  
<h1>Lead Integrate Ateendance !</h1>

<h4>welcome to Home Dashboard</h4>










         <h1 id="h1">User Registration Form </h1>
   <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form</title>
<style>
  .split {
    display:grid;
    flex-direction: column;
  }
  
  .split input[type="text"],
  .split input[type="file"],
  .split button {
    margin-bottom: 10px;
  }
#image{
 
  width: 550px;
  height: 469px;
  float: right;
  top: 100px;
  

  }
</style>
</head>
<body>

<form class="form" method="post" enctype="multipart/form-data">
  <div class="split">
    <label for="Employee_Id">Employee Id:</label>
    <input type="text" id="Employee_Id" name="Employee_Id" >
    
    <label for="Employee_name">Employee Name:</label>
    <input type="text" id="Employee_name" name="Employee_name" required placeholder="Employee Name">
    
    <label for="EmployeeEmail">Employee Email:</label>
    <input type="text" id="EmployeeEmail" name="EmployeeEmail" required placeholder="Employee Email">
    
    <label for="empl_no">Employee Phone Number:</label>
    <input type="text" id="empl_no" name="empl_no" required placeholder="Phone number">
    
    <label for="Picture">Picture:</label>
    <input type="file" id="Picture" name="Picture" required>
    
    <button class="register" name="register" type="submit">Register</button>
    
  </div>

</form>

</body>
</html>

 
</body>
</html>
  <?php include 'footer.php'; ?>