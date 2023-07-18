<html>
    <head>
        <title>Add Movie Result</title>
        <link rel = 'stylesheet' type = 'text/css' href = '../css/dbicw.css'>
    </head>
    <body>
        <?php
            $mvTitle = $_GET['mvTitle'];
            $mvID = $_GET['mvID'];
            $genre = $_GET['genre'];
            $price = $_GET['price'];
            $year =  $_GET['year'];
            $actID = $_GET['actor'];

            // establishes database connection
            $db_host = // host server;
            $db_name = // database name;
            $db_user = // database username;
            $db_pass = // database password;

            $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
            if ($conn->connect_erno) die("failed to connect to database\n</body>\n</html>");

            // sql statement to add a movie to the database
            $sql = "INSERT INTO Movie (mvID,actID,mvTitle,mvPrice,mvGenre,mvYear ) VALUES ('$mvID','$actID', '$mvTitle','$price','$genre','$year')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->bind_result($mvID, $actID, $mvTitle, $price, $genre, $year);

            // checks that the query has executed correctly and ouptuts alert
            $count = mysqli_stmt_affected_rows($stmt);

            if ($stmt->error || $count > 0) {
                echo "<script>
                alert('Movie added successfully'); 
                window.location.href='../pages/delete_movie.php'
                </script>";
                
            } else {
                echo "<script>
                alert('Error adding movie'); 
                window.location.href='../pages/delete_movie.php'
                </script>";
            }
            
            $stmt->close();
        ?>
        
    </body>
</html>