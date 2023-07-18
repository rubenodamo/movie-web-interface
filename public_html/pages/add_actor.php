<!-- php page that performs the query to add an actor to the database -->
<html>
    <head>
        <title>Add Actor Result</title>
        <link rel = 'stylesheet' type = 'text/css' href = '../css/dbicw.css'>
        <script type = "text/javascript" src = "../js/dbicw.js"></script>
    </head>
    <body>
        <?php
            // retrieves variables
            $actName = $_GET['name'];
            $actID = $_GET['actID'];
            
            // establishes database connection
            $db_host = // host server;
            $db_name = // database name;
            $db_user = // database username;
            $db_pass = // database password;

            $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
            if ($conn->connect_erno) die("failed to connect to database\n</body>\n</html>");
            
            // sql statement to add an actor to the table
            $sql = "INSERT INTO Actor (actID, actName) VALUES ('$actID', '$actName')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->bind_result($actName, $actID);

            // checks that the query has executed correctly and ouptuts alert
            $count = mysqli_stmt_affected_rows($stmt);

            if ($stmt->error || $count > 0) {
                echo "<script>
                alert('Actor added successfully'); 
                window.location.href='../pages/add_actor.html'
                </script>";
                
            } else {
                echo "<script>
                alert('Error adding actor'); 
                window.location.href='../pages/add_actor.html'
                </script>";
            }

            //closes connection
            $conn->close();
        ?>
    </body>
</html>