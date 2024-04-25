<?php
include 'DBCONNECTION.PHP';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   

    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    
    if ($password != $confirm_password) {
        echo "Passwords do not match.";
        exit; 
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $stmt = $conn->prepare("INSERT INTO details (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "<div class='alert alert-primary'>Registration successfully <a href='login.php'>Login Now</a></div>";
    } else {
        echo "Error: " . $stmt->error;
    }

    
    $stmt->close();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- CSS LINK -->
    <link rel="stylesheet" href="Register.css">

<!-- include headr.php -->
    <?php include 'header.php'; ?>

      

    <!-- script link -->
    <script src="Register.js"></script>

    <!-- icon link cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- boostrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
    <!-- import jquery -->
    <script src="jquery-3.7.1.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <!-- icon link cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <div class="box">

        <div class="container">

            <h2>REGISTRATION</h2>

            <form id="registrationForm" action="#" method="post">



                <label for="username">User Name:</label><br>
                <input type="text" id="username" name="username" required placeholder="Enter the name" oninput="validateName(this)"><br>
                <span id="name-error" style="color:red;"></span>



                <label for="email">User Email:</label><br>
                <input type="email" id="email" name="email" required placeholder="Enter the email" oninput="validateEmail(this)"><br>
                <span id="email-error" style="color: red;"></span>



                <label for="password">User Password: </label>
                <input type="password" id="password" name="password" required placeholder="Enter the password">
                <span><i class="fa fa-eye" id="eye1" onclick="togglePW1('password', 'eye1')" aria-hidden="true"></i></span>
                <span id="password-error" style="color:red;"></span><br>


                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required placeholder="Enter the confirm_password"><br><br>

                
                <button class="register" name="register" type="submit">Register</button>

        </div>

        </form>


    </div>

    </div>




</body>


</html>