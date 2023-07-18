<!-- php page that performs the query to delete a movie from to the database -->
<html>
    <head>
        <title>Delete Movie Result</title>
        <link rel = 'stylesheet' type = 'text/css' href = '../css/dbicw.css'>
    </head>
    <body>
        <?php
            // retrieves variables
            $mvID = $_GET['movie'];

            // establishes database connection
            $db_host = // host server;
            $db_name = // database name;
            $db_user = // database username;
            $db_pass = // database password;

            $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
            if ($conn->connect_erno) die("failed to connect to database\n</body>\n</html>");
            
            // sql statement to delete a movie from the table
            $sql = "DELETE FROM Movie WHERE mvID = '$mvID';";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // checks that the query has executed correctly and ouptuts alert
            $count = mysqli_stmt_affected_rows($stmt);

            if ($stmt->error || $count > 0) {
                echo "<script>
                alert('Movie deleted successfully'); 
                window.location.href='../pages/delete_movie.php'
                </script>";
                
            } else {
                echo "<script>
                alert('Error deleting movie'); 
                window.location.href='../pages/delete_movie.php'
                </script>";
            }
        ?>
    </body>
</html>