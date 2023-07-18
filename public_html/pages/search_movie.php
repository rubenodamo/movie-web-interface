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
                <h1>Movie Search Result</h1>
            </div>
        
            <?php
                // retrieves variable
                $titlesearch = $_GET['title'];

                // establishes database connection
                $db_host = // host server;
                $db_name = // database name;
                $db_user = // database username;
                $db_pass = // database password;

                $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
                if ($conn->connect_erno) die("failed to connect to database\n</body>\n</html>");
                
                /* sql statement to get all the movies that match the search in the database 
                and their corresponding actors */
                $sql = "SELECT Movie.mvID, Movie.mvTitle, Movie.mvPrice, Movie.mvYear, Movie.mvGenre, Actor.actID, Actor.actName 
                    FROM Movie JOIN Actor ON Movie.actID = Actor.actID WHERE Movie.mvTitle LIKE '%$titlesearch%'";
                //$sql = "SELECT * FROM Movie WHERE mvTitle LIKE '%$titlesearch%'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $stmt->bind_result($mvID, $mvTitle, $mvPrice, $mvYear, $mvGenre, $actID, $actName);
            ?>

            <div class="table-container">
                <table>
                    <thead>
                        <tr> 
                            <th>ID</th> 
                            <th>Title</th> 
                            <th>Price</th> 
                            <th>Year</th> 
                            <th>Genre</th> 
                            <th>Starring</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            // tracks if any results are found
                            $found = false; 

                            // displays table of results
                            while($stmt->fetch()) {
                                $found = true; // set to true if at least one row is found
                                echo "<tr>";
                                echo "<td>".htmlentities($mvID)."</td>";
                                echo "<td>".htmlentities($mvTitle)."</td>";
                                echo "<td>".htmlentities($mvPrice)."</td>";
                                echo "<td>".htmlentities($mvYear) ."</td>";
                                echo "<td>".htmlentities($mvGenre)."</td>";
                                echo "<td>".htmlentities($actID).' - '.htmlentities($actName)."</td>";
                                echo "</tr>";
                            }

                            if (!$found) { // check if no results are found
                                echo "<td colspan='6'>No results found.</td>";
                            }

                            $stmt->close();
                        ?>
                    </tbody>
                </table> 
            </div>
        </div>
    </body>
</html>