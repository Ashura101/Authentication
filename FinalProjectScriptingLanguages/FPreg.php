<?php
    $con = mysqli_connect("localhost:3306", "root", "");
    if(mysqli_connect_errno())
    {
        echo "Failed to connect".mysqli_connect_errno();
    }

    $sql = "CREATE DATABASE Registered";
    if(mysqli_query($con, $sql))
    {
        echo "Database created <br><br>";
    }
    else
    {
        echo "Error creating database: ".mysqli_error($con);
        echo "<br><br>";
    }
    mysqli_close($con);
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "Registered";


    $con = mysqli_connect($servername, $username, $password, $dbname);

    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    }
    
    $std = "CREATE TABLE Student( 
        sname VARCHAR(30), 
        lpassword VARCHAR(50),  
        Age INT(10), 
        pnumber VARCHAR(10)
        )";
    if(mysqli_query($con, $std))
    {
        echo "Student table created <br><br>";
    }
    else{
        echo "Error: ".mysqli_error($con);
        echo "<br><br>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = $_POST["un"];
        $pass = $_POST["pw"];
        $age = $_POST["age"];
        $phone = $_POST["pn"];

        $insertstd = "INSERT INTO Student(sname, lpassword, Age, pnumber)
            VALUES('$name', '$pass', '$age', '$phone')";

        if (mysqli_query($con, $insertstd)) 
        {
            echo "New record for Student has been added successfully! <br><br>";
        } 
        else 
        {
            echo "Error: " . $insertstd . ":-" . mysqli_error($con);
        }
        header("Location: AfterReg.html");
    }
    mysqli_close($con);

?>