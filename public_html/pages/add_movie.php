<!-- php page that creates html page for adding a movie to the database -->
<html> 
    <head>
        <title>Add Movie</title>
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
                    $sql  = "SELECT actID,actName FROM Actor";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $stmt->bind_result($actID,$actName);
                ?>

                <h1>Add a Movie</h1>

                <form action = "../pages/add_movie_result.php" onSubmit = "return validate(this)">
                    <div class="txt_field">
                        <input type = "text" name = "mvTitle"required autocomplete="off">
                        <span></span>
                        <label>Movie Title</label>
                    </div>

                    <div class="select-container">
                        <select class="select-box" name="actor" id="actor">
                            <option hidden selected>Select Actor</option>
                            <?php
                                // dynamic drop down filled with elements from the actor table
                                while($stmt->fetch()) {
                                    echo "<option value='".htmlentities($actID)."'>".htmlentities($actID).' - '.htmlentities($actName)."</option>";
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
                            <option hidden selected>Select Genre</option>
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
                        <input type = "number" min="0.01" step="0.01" name = "price"required autocomplete="off">
                        <span></span>
                        <label>Price</label>
                    </div>

                    <div class="txt_field">
                        <input type = "number" min="1940" max="2023" name = "year"required autocomplete="off">
                        <span></span>
                        <label>Year</label>
                    </div>

                    <input type = "submit"  value ="Add">
                    <div>
                        <br><br>
                    </div>
                </form>
            </div> 
        </div>
    </body>
</html>