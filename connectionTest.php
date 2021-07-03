<?php
    //Simple script to test DB Connection

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'ics199greengrocerdb';

    $dbc = mysqli_connect($server,$user,$password,$db);

    echo "<h1> Testing Database Connection <h1>";
    echo "server = $server <br>";
    echo "user = $user <br>";
    echo "pswd = $password<br>";
    echo "db = $db";

    if ($dbc) {
        print " connected successfully to the database " . $db . "<BR><BR>";
        mysqli_close($dbc);
        print "connection closed";
    }
    else{
        print"MySQL Error:" . mysqli_connect_error();
    }

    ?>