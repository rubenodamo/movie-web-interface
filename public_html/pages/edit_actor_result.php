<!-- php page that performs the query to edit an actor in the database -->
<html>
    <head>
        <title>Edit Actor Result</title>
        <link rel = 'stylesheet' type = 'text/css' href = '../css/dbicw.css'>
    </head>
    <body>
        <?php
            // establishes database connection
            $db_host = // host server;
            $db_name = // database name;
            $db_user = // database username;
            $db_pass = // database password;

            $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
            if ($conn->connect_erno) die("failed to connect to database\n</body>\n</html>");
            
            // retrieves variables and checks if they are empty
            if(isset($_POST['actor']) && isset($_POST['update'])) {
                // retrieves variables
                $actName = $_POST['actor'];
                $update = $_POST['update'];

                // sql statement to update an actor in the table
                $sql = "UPDATE Actor SET actName='$update' WHERE actName='$actName'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                
                // checks that the query has executed correctly and ouptuts alert
                $count = mysqli_stmt_affected_rows($stmt);

                if ($stmt->error || $count > 0) {
                    echo "<script>
                    alert('Actor updated successfully');
                    window.location.href='../pages/edit_actor.php' 
                    </script>";
                }
                else {
                    echo "<script>
                    alert('Error updating actor');
                    window.location.href='../pages/edit_actor.php' 
                    </script>";
                }
            }
            else {
                echo "<script>
                alert('Empty field please fill all values');
                window.location.href='../pages/edit_actor.php'
                </script>";
            }

            //closes connection
            $conn->close();
        ?>
    </body>
</html>

