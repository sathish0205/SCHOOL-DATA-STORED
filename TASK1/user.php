<?php
session_start();
include('DBCONNECTION.PHP');

if (!isset($_SESSION['email'])) {
    header("location: login.php");
    exit();
}
?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User|| Page</title>


    <!-- include headr.php -->
    <?php include 'header.php'; ?>



    <!-- import jquery -->
    <script src="jquery-3.7.1.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <!-- icon link cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- icon link cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- boostrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filterable Table</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .image_size {
            height: 100px;
            width: 100px;
            border-radius: 50%;
            margin-left: 20px;
        }

        .search {
           
            height: 60px;
            text-decoration: overline;
            margin-right: 60px;
            margin-right: 50px;
            border-radius: 10px;
            font-size: xx-large;

        }

        tr {
            background-color: lightslategray;
        }

        th {
            background-color: lightgreen;
            font-size: larger;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        table {
            margin-top: 50px;
        }
    </style>



    <!-- edite form popup style -->

    <style>
        /* CSS for form layout */
        .form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form img {
            display: block;
            margin: 0 auto;
            width: 200px;
            height: auto;
            margin-bottom: 20px;
        }

        .split {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>






</head>

<body>

    <h2>Filterable Table</h2>

    <input class="search" id="myInput" type="text" placeholder="Search..">

    <table>
        <thead>
            <tr>
                <th>Employee_Id</th>
                <th>Employee_name</th>
                <th>EmployeeEmail</th>
                <th>Employee_pnonenumber</th>
                <th>Picture</th>
                <th>Edite</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody id="myTable">
            <?php
            // SQL query to fetch data
            $sql = "SELECT * FROM employee_details";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['Employee_Id'] . "</td>";
                    echo "<td>" . $row['Employee_name'] . "</td>";
                    echo "<td>" . $row['EmployeeEmail'] . "</td>";
                    echo "<td>" . $row['empl_no'] . "</td>";
                    echo "<td><img class='image_size' src='" . $row['Picture'] . "' alt=''></td>";
                    // Edit button
                    echo "<td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal" . $row['Employee_Id'] . "'>Edit</button></td>";
                    // Delete button
                    echo "<td>
        <form method='post'>
            <input type='hidden' name='employee_id' value='" . $row['Employee_Id'] . "'>
            <button type='submit' name='delete_employee' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this employee?\")'>Delete</button>
        </form>
      </td>";

                    echo "</tr>";

                    // boostrap popup update and edite

                    echo "<div class='modal fade' id='exampleModal" . $row['Employee_Id'] . "'  tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-md'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLabel'>Employee Details Update</h5>
              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>
      
          <!-- my update  form -->
          <form class='form' method='post' enctype='multipart/form-data'>
      <img id='image' src='uploads/lead logo.png' alt=''>
        <div class='split'>
          <label for='Employee_Id'>Employee Id:</label>
          <input type='text' id='Employee_Id' name='Employee_Id' >
          
          <label for='Employee_name'>Employee Name:</label>
          <input type='text' id='Employee_name' name='Employee_name' required placeholder='Employee Name'>
          
          <label for='EmployeeEmail'>Employee Email:</label>
          <input type='text' id='EmployeeEmail' name='EmployeeEmail' required placeholder='Employee Email'>
          
          <label for='empl_no'>Employee Phone Number:</label>
          <input type='text' id='empl_no' name='empl_no' required placeholder='Phone number'>
          
          <label for='Picture'>Picture:</label>
          <input type='file' id='Picture' name='Picture' required>
          
          <button class='register' name='register' type='submit'>Register</button>
          
        </div>
      
      </form>
      
      
      
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
              <button type='button' class='btn btn-primary'>Save changes</button>
            </div>
          </div>
        </div>
      </div>
      ";
                }
            } else {
                echo "<tr><td colspan='7'>0 results</td></tr>";
            }
            ?>

        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>




    <?php
    // Assuming $conn is your database connection

    // Check if the form is submitted via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the delete button is clicked and if the Employee_Id is provided
        if (isset($_POST['delete_employee']) && isset($_POST['employee_id'])) {
            // Sanitize the input to prevent SQL injection
            $employee_id = mysqli_real_escape_string($conn, $_POST['employee_id']);

            // Prepare and execute the DELETE query
            $sql = "DELETE FROM employee_details WHERE Employee_Id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $employee_id);

            if ($stmt->execute()) {
                // Success message
                echo "<div class='alert alert-success'>Employee deleted successfully.</div>";
            } else {
                // Error message
                echo "<div class='alert alert-danger'>Error deleting employee: " . $stmt->error . "</div>";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Display the delete button in your HTML/PHP loop

    ?>


























</body>

</html>