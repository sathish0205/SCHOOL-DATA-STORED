<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- script link -->
    <script src="header.js"></script>

    <!-- icon link cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- boostrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>


<style>
    .nav {

    width: 100%;
        background-color: lightblue;
        padding: 10px;
        height: 90px;
        justify-content: center;
        cursor: pointer;
        position: -webkit-sticky; 
        position: sticky;
        top: 0;
    }

    .vetrical {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
    }

    .vetrical li {
        margin-right: 150px;
        margin-top: 20px;
        font-weight: 300;
        font-weight: bold;
       
    }

    .vetrical li:last-child {
        margin-right: 0;
    }

    .vetrical li a {
        color:white;
        text-decoration: none;


    }

    .vetrical li a:hover {
        text-decoration:underline;
        background-color: #000000;

    }

    .fa-solid {
        margin-right: 5px;
    }

    @media screen and (max-width: 768px) {
        .vertical li {
            margin-right: 10px;
            margin-top: 10px;
        }
    }
</style>

<body>

    <!-- boostrap navibar -->
    <nav class="nav">
        <div>
            <ul class="vetrical">
                <li>Lead Integrate Solution</li>
                <li><i class="fa-solid fa-house"></i><a href="home.php">Home</a></li>
                <li><i class="fa-solid fa-id-card"></i><a href="Register.php">Register</a></li>
                <li><i class="fa-solid fa-right-to-bracket"></i><a href="login.php">Login</a></li>
                <li><i class="fa-solid fa-user-tie"></i><a href="user.php">User</a></li>
             
                <li><i class="fa-solid fa-right-to-bracket"></i><a href="logout.php">Log out</a></li>
            </ul>
        </div>
    </nav>








</body>

</html>
