<!-- php page that creates html page for editing an actor to the database -->
<html> 
    <head>
        <title>Edit Actor</title>
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

                <h1>Edit an Actor</h1>
                <br>

                <form action = "../pages/edit_actor_result.php" method = "post" onSubmit = "return validate(this)">
                    <div class="select-container">
                        <select class="select-box" name="actor" id="actor" required>
                            <option hidden selected>Select Actor</option>
                            <?php
                                // dynamic drop down filled with elements from the actor table
                                while($stmt->fetch()){
                                    echo "<option value='".htmlentities($actName)."'>".htmlentities($actID).' - '.htmlentities($actName)."</option>";
                                }
                            ?>
                        </select>
                        <div class="icon-container">
                            <i class="fa fa-caret-down"></i>
                        </div>
                    </div>
                    <br>
                    <div class="txt_field">
                        <input type="text" name = "update" id = "update" required autocomplete="off">
                        <span></span>
                        <label>Updated Actor Name</label>
                    </div>
                    <input type="submit" value="Update">
                    <div>
                        <br><br>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>