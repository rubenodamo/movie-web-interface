<!-- php page that creates html page for deleting a movie from the database -->
<html> 
    <head>
        <title>Delete Movie</title>
        <link rel = 'stylesheet' type = 'text/css' href = '../css/dbicw.css'>
        <link rel = 'stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type = "text/javascript" src = "../js/dbicw.js"></script>
        <script src = "../js/navbar.js"></script>
    </head>
    <body>
        <div class="container">
            <navbar-component></navbar-component>

            <div class="center">
                <?php
                    // establishes database connection
                    $db_host = // host server;
                    $db_name = // database name;
                    $db_user = // database username;
                    $db_pass = // database password;

                    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
                    if ($conn->connect_erno) die("failed to connect to database\n</body>\n</html>");

                    // sql statement to get all the actors in the database
                    $sql  = "SELECT mvID,mvTitle FROM Movie";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $stmt->bind_result($mvID,$mvTitle);
                ?>

                <h1>Delete a Movie</h1>
                <br>

                <form action = "../pages/delete_movie_result.php" onSubmit = "return validate(this)">
                    <div class="select-container">
                        <select class="select-box" name="movie" id="movie">
                            <option hidden selected>Select Movie</option>
                            <?php
                                // dynamic drop down filled with elements from the movie table
                                while($stmt->fetch()){
                                    echo "<option value='".htmlentities($mvID)."'>".htmlentities($mvTitle)."</option>";
                                }
                                $stmt->close();
                            ?>
                        </select>
                        <div class="icon-container">
                            <i class="fa fa-caret-down"></i>
                        </div>
                    </div>
                    
                    <br>
                    <input type="submit" value="Delete">
                    <div>
                        <br><br>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>