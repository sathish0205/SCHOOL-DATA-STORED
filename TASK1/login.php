<?php
include 'DBCONNECTION.PHP';
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM details WHERE email = ?");
    $stmt->bind_param("s", $email);


    if (!$stmt->execute()) {
        echo "<div class='alert alert-danger'>Error executing SQL query: " . $stmt->error . "</div>";
    } else {

        $result = $stmt->get_result();


        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                echo "<div class='alert alert-success'>Login Successfully</div>";
                $_SESSION["email"] =  $email;
                header("location: home.php");
                
                exit();
            } else {
                echo "<div class='alert alert-warning'>Incorrect password</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>User not found
            
            
            </div>";
        }
    }

    // Close statement
    $stmt->close();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS LINK -->
    <link rel="stylesheet" href="login.css">

    <!--inclde header  -->
    <?php include 'header.php'; ?>

  

    <!-- JS LINK -->
    <script src="login.js"></script>

    <!-- icon link cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- boostrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body>
    <div class="box">

        <h2>Login</h2>
        <form action="" method="post">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required placeholder="Enter the email"><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required placeholder="Enter the password" ;>
            <span><i class="fa fa-eye" id="eye" onclick="togglePW('password', 'eye')" aria-hidden="true"></i></span><br>

            <button class="login" type="submit">Login</button>

            

        </form>

    </div>
</body>

</html>


