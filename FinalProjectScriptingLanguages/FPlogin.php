<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "Registered";


    $con = mysqli_connect($servername, $username, $password, $dbname);

    if ($con->connect_error) 
    {
        die("Connection failed: " . $con->connect_error);
    }

    $user = $_POST["un"];
    $pass = $_POST["pw"];

    if(empty($user)||empty($pass))
    {
        echo "Both fields are required";
        return false;
    }
    else
    {
        $q = mysqli_query($con, "SELECT * FROM Student") or die(mysqli_error($con));        
        if($q->num_rows > 0)
        {
            while($row = $q->fetch_assoc())
            {
                $dbuser = $row["sname"];
                $dbpass = $row["lpassword"];

                if($user == $dbuser)
                {
                    if($pass == $dbpass)
                    {
                        header("Location: MainPage.html");
                    }
                    else
                    {
                        header("Location: FPlogin.html");
                    }
                }
            }
        }
        
    }

      

    mysqli_close($con);
?>