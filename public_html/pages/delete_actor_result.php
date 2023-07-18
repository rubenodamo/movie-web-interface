<!-- php page that performs the query to delete an actor from the database -->
<html>
    <head>
        <title>Delete Actor Result</title>
        <link rel = 'stylesheet' type = 'text/css' href = '../css/dbicw.css'>
    </head>
    <body>
        <?php
            // retrieves variables
            $actID = $_GET['actor'];

            // establishes database connection
            $db_host = // host server;
            $db_name = // database name;
            $db_user = // database username;
            $db_pass = // database password;

            $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
            if ($conn->connect_erno) die("failed to connect to database\n</body>\n</html>");
            
            // sql statement to delete an actor from the table
            $sql = "DELETE FROM Actor WHERE actID = '$actID';";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // checks that the query has executed correctly and ouptuts alert
            $count = mysqli_stmt_affected_rows($stmt);

            if ($conn->query($sql) == TRUE && $count > 0) {
                echo "<script>
                alert('Actor deleted successfully'); 
                window.location.href='../pages/delete_actor.php'
                </script>";
                
            } else {
                echo "<script>
                alert('Error deleting actor'); 
                window.location.href='../pages/delete_actor.php'
                </script>";
            }

            $conn->close();
        ?>


    </body>
</html>