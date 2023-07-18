<!-- php page that creates html page for editing a movie in the database -->
<html> 
    <head>
        <title>Edit Movie</title>
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

                    // sql statement to get all the movies in the database
                    $sql  = "SELECT mvID,actID,mvTitle,mvPrice,mvYear,mvGenre FROM Movie";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $stmt->bind_result($mvID,$actID,$mvTitle,$price,$year,$genre);
                ?>

                <h1>Edit a Movie</h1>

                <form method="post" action = "../pages/edit_movie_result.php" onSubmit = "return validate(this)">
                    <br>

                    <div class="select-container">
                        <select class="select-box" name="movie" id="movie">
                            <option hidden selected>Select Movie To Update</option>
                            <?php
                                // dynamic drop down filled with elements from the movie table
                                while($stmt->fetch()){
                                    echo "<option value='".htmlentities($mvID)."'>".htmlentities($mvID).' - '.htmlentities($mvTitle)."</option>";
                                }
                                $stmt->close();
                            ?>
                        </select>
                        <div class="icon-container">
                            <i class="fa fa-caret-down"></i>
                        </div>
                    </div>
                    
                    <div class="txt_field">
                        <input type = "text" name = "mvTitle" id = "mvTitle" required autocomplete="off">
                        <span></span>
                        <label>Updated Movie Title</label>
                    </div>

                    <div class="select-container">
                        <select class="select-box" name="actor" id="actor">
                            <option hidden selected>Updated Actor</option>
                            <?php
                                // establishes database connection
                                $db_host = 'mysql.cs.nott.ac.uk';
                                $db_name = 'psyro3_COMP1004';
                                $db_user = 'psyro3_COMP1004';
                                $db_pass = '91C41232e3##15';

                                $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
                                if ($conn->connect_errno) die("failed to connect to database\n</body>\n</html>");

                                // sql statement to get all the actors in the database
                                $sql  = "SELECT actID,actName FROM Actor";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $stmt->bind_result($actID,$actName);

                                // dynamic drop down filled with elements from the actor table
                                while($stmt->fetch()){
                                    echo "<option value='".htmlentities($actID)."'>".htmlentities($actName)."</option>";
                                }
                                $stmt->close();
                            ?>
                        </select>
                        <div class="icon-container">
                            <i class="fa fa-caret-down"></i>
                        </div>
                    </div>
                    
                    <br>

                    <div class="select-container">
                        <select class="select-box" name="genre" id="genre">
                            <option hidden selected>Updated Genre</option>
                            <option>Action</option>
                            <option>Drama</option>
                            <option>Sci-Fi</option>
                            <option>Comedy</option>
                            <option>Thriller</option>
                            <option>Horror</option>
                            <option>Documentary</option>
                            <option>Romance</option>
                        </select>
                        <div class="icon-container">
                            <i class="fa fa-caret-down"></i>
                        </div>
                    </div>

                    <div class="txt_field">
                        <input type = "number" min="0.01" step="0.01" name = "price" id = "price" required autocomplete="off">
                        <span></span>
                        <label>Updated Price</label>
                    </div>

                    <div class="txt_field">
                        <input type = "number" min="1940" max="2023" name = "year" id = "year" required autocomplete="off">
                        <span></span>
                        <label>Updated Year</label>
                    </div>

                    <input type = "submit"  value ="Update">
                    <div>
                        <br><br>
                    </div>
                </form>
            </div> 
        </div>
    </body>
</html>