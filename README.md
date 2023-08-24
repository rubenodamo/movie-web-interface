# Movie Web Interface
A web development of a front-end interface for an SQL movie databse of two related tables (Movie and Actor). The goal of the project was to develop a user-friendly interface utilising HTML, CSS, JavaScript, PHP, and SQL functionalities; that enables users to add, search for, and remove movies and actors from the database.

## Solution & Approach
The solution took the form of a web-based application (going by the name of “Clubhouse Cinemas”). This was done using the programming languages mentioned in project description above. More specifically,
- HTML was used to create the webpage itself;
- CSS was used to control and change the presentation of HTML documents, applying styling and layout rules to specific elements;
- JavaScript was used for the client-side webpage interaction features;
- PHP in conjunction with SQL was used for form handling, file processing, and database access.[^fn]

When all four languages are used together, communication between the user and the database is made easier. Each language listed includes a wide range of features that were specifically useful for this project. 

### Entity-Relationship Diagram
<p align="center">
  <img src="https://github.com/rubenodamo/movie-web-interface/assets/93412774/4ee3bc25-0ee0-4122-87cc-8408c8a528f8" />
</p>

The database used in the back-end development of the website was based on the structure depicted in figure above. This figure conveys an entity-relationship diagram, which gives a conceptual view of the database. This diagram aided certain design features and functionality understanding when being applied to the problem approach.

## Webpage Structure

### Folder Layout
<p align="center">
  <img src="https://github.com/rubenodamo/movie-web-interface/assets/93412774/3b7708a3-79b7-40ac-8565-8ffe696b2d74" />
</p>

### File Information
The table below details the specific content information about the folders and their relevant files.
| Folder | Function |
| :-----: | :--- |
| css | This contains the CSS file available to all pages within the website. Files: ```dbicw.css``` |
| images | This includes every standard image that is used on the web page.
Files: ```background.jpeg```, ```image-01.jpeg```, ```image-02.jpg```, ```image-03.jpeg```, ```image-04.jpeg```, ```logo.png``` |
| js | This contains two standard script files two run on every web page, to implement for validation and a navigation bar that appears at the top of every page.
Files: ```dbicw.js```, ```navbar.js``` |
| pages | This includes every php and html page that are required for the user interface and sql querying functions.
Files: ```add_actor.html```, ```add_home.html```, ```delete_home.html```, ```edit_home.html```, ```index.html```, ```search_actor.html```, ```search_home.html```, ```search_movie.html```, ```add_actor.php```, ```add_movie_result.php```, ```delete_actor_result.php```, ```delete_actor.php```, ```delete_movie_result.php```, ```delete_movie.php```, ```edit_actor_result.php```, ```edit_actor.php```, ```edit_movie_result.php```, ```edit_movie.php```, ```search_actor.php```, ```search_movie.php``` |


[^fn]: This is a skeleton front-end with the hosts/usernames/passwords replaced with placeholders.
