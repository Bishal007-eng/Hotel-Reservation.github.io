<?php

    $conn = mysqli_connect("localhost", "root", "", "hotel");

    if (!$conn) {
        die("Cannot connect to the database" . mysqli_connect_error());
    }


    //to filter the enter fields
    function filteration($data)
    {         //receives value in array
        foreach ($data as $key => $value) {       //
            $value = trim($value);          //removes extra spaces
            $value = stripslashes($value); //removes backward slashes
            $value = strip_tags($value);        //removes html tags 
            $value = htmlspecialchars($value);  //converts into html entities eg <, > etc into entities

           $data[$key] = $value;
        }
        return $data;
    }

    function selectAll($table)
    {
        $conn = $GLOBALS['conn'];
        $res = mysqli_query($conn, "SELECT * FROM $table");
        return $res;
    }


    //this function is to prepare the data from Select statement instead of writing code for everytinme a select operator is called.
    function select($sql, $values, $datatypes)
    {
        $conn = $GLOBALS['conn'];
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values); // ... is a splat operator used to unpack parameters to functions or to combine variables into an array
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);     //this statement closes the prepared statement
                return $res;
            } else {
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Select");
            }
        } else {
            die("Query cannot be executed - Select");
        }
    }

    function update($sql, $values, $datatypes)
    {
        $conn = $GLOBALS['conn'];
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values); // ... is a splat operator used to unpack parameters to functions or to combine variables into an array
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);     //this statement closes the prepared statement
                return $res;
            } else {
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Update");
            }
        } else {
            die("Query cannot be executed - Update");
        }
    }

    function insert($sql, $values, $datatypes)
    {
        $conn = $GLOBALS['conn'];
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values); // ... is a splat operator used to unpack parameters to functions or to combine variables into an array
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);     //this statement closes the prepared statement
                return $res;
            } else {
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Insert");
            }
        } else {
            die("Query cannot be executed - Insert");
        }
    }

    function delete($sql, $values, $datatypes)
    {
        $conn = $GLOBALS['conn'];
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values); // ... is a splat operator used to unpack parameters to functions or to combine variables into an array
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);     //this statement closes the prepared statement
                return $res;
            } else {
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Delete");
            }
        } else {
            die("Query cannot be executed - Delete");
        }
    }



?>