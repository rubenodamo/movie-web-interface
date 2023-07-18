<!-- php page that performs the query to search for a movie in the database -->
<html>
    <head>
        <title>Search Movie Result</title>
        <link rel = 'stylesheet' type = 'text/css' href = '../css/dbicw.css'>
        <script src = "../js/navbar.js"></script>
    </head>
    <body>
        <div class="container">
            <navbar-component></navbar-component>

            <div class="search">
                <h1>Actor Search Result</h1>
            </div>
        
            <?php
                // retrieves variable
                $titlesearch = $_GET['name'];

                // establishes database connection
                $db_host = // host server;
                $db_name = // database name;
                $db_user = // database username;
                $db_pass = // database password;

                $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
                if ($conn->connect_erno) die("failed to connect to database\n</body>\n</html>");
                
                /* sql statement to get all the movies that match the search in the database 
                and their corresponding actors */
                $sql = "SELECT Actor.actID, Actor.actName, Movie.mvID, Movie.mvTitle FROM Actor 
                LEFT JOIN Movie ON Actor.actID = Movie.actID WHERE Actor.actName LIKE '%$titlesearch%'";
                //$sql = "SELECT * FROM Movie WHERE mvTitle LIKE '%$titlesearch%'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $stmt->bind_result($actID, $actName, $mvID, $mvTitle);
            ?>

            <div class="table-container">
                <table>
                    <thead>
                        <tr> 
                            <th>ID</th> 
                            <th>Actor</th> 
                            <th>Stars In</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            // tracks if any results are found
                            $found = false; 

                            // displays table of results
                            while($stmt->fetch()) {
                                // set to true if at least one row is found
                                $found = true;
                                echo "<tr>";
                                echo "<td>".htmlentities($actID)."</td>";
                                echo "<td>".htmlentities($actName)."</td>";
                                echo "<td>".htmlentities($mvID).' - '.htmlentities($mvTitle)."</td>";
                                echo "</tr>";
                            }
                            
                            // check if no results are found
                            if (!$found) { 
                                echo "<td colspan='3'>No results found.</td>";
                            }

                            $stmt->close();
                        ?>
                    </tbody>
                </table> 
            </div>
        </div>
    </body>
</html>
