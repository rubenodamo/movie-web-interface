<!-- php page that performs the query to edit a movie in the database -->
<html>
    <head>
        <title>Edit Movie Result</title>
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
            if(isset($_POST['movie']) || isset($_POST['mvTitle']) || isset($_POST['actor']) 
                || isset($_POST['price']) || isset($_POST['year']) || isset($_POST['genre'])) {
                // retrieves variables
                $movie = $_POST['movie'];
                $mvTitle = $_POST['mvTitle'];
                $actID = $_POST['actor'];
                $mvPrice = $_POST['price'];
                $mvYear = $_POST['year'];
                $mvGenre = $_POST['genre'];

                // sql statement to update a movie in the table
                $sql = "UPDATE Movie SET actID='$actID',mvTitle='$mvTitle',mvPrice='$mvPrice',mvYear='$mvYear',mvGenre='$mvGenre' WHERE mvID='$movie'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                
                // checks that the query has executed correctly and ouptuts alert
                $count = mysqli_stmt_affected_rows($stmt);

                if ($stmt->error || $count > 0) {
                    echo "<script>
                    alert('Movie updated successfully');
                    window.location.href='../pages/edit_movie.php' 
                    </script>";
                }
                else {
                    echo "<script>
                    alert('Error updating movie');
                    window.location.href='../pages/edit_movie.php' 
                    </script>";
                }
            }
            else {
                echo "<script>
                alert('Empty field please fill all values');
                window.location.href='../pages/edit_movie.php'
                </script>";
            }

            //closes connection
            $conn->close();
        ?>
    </body>
</html>