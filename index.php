<!DOCTYPE html>
<html>
<head>
    <title>Онлайн кинотеатр</title>
    <link rel="shortcut icon" href="/image/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/display_films.css">
</head>
<body>
<!--  -->
<div>    
    
    <div class="my_container">

        <ul class="my_main">
            <?php
            // Database connection using MySQLi (Assuming you have a connection established)
            include 'config.php'; // Adjust this path as needed
////////////////////
            $query = "SELECT id, rating_kp, rating_imdb, rating_filmCritics, movieLength, name, description, year, poster_url, poster_previewUrl, genres, countries, alternativeName,names, shortDescription, logo_url
            FROM `Movies_update` WHERE 1";
            $result = $conn->query($query);
////////////////////
            if ($result === false) {
                die('Error, query failed: ' . $conn->error);
            }

            if ($result->num_rows == 0) {
                echo '<div class="">Database is empty</div>';
            } else {

                while ($row = $result->fetch_assoc()) {
////////////////
                    $id = $row['id'];
                    $name = $row['name'];
                    $poster_url = $row['poster_url'];
                    $genres = $row['genres'];
                    $shortDescription = $row['shortDescription'];
                    $description = $row['description'];
                    $rating_kp = $row['rating_kp'];
                    $rating_imdb = $row['rating_imdb'];
                    $rating_filmCritics = $row['rating_filmCritics'];
                    $movieLength = $row['movieLength'];
                    $countries = $row['countries'];

////////////////
                    // Display each file with cover image and name on the site
                    echo '<div class="my_item">';
                        
                        
                        echo '<div class="my_name-on-site">'.$name.'</div>';
                        
                        if ($poster_url !== null) {
                            echo '<img src="'.$poster_url.'" alt="Cover Image" width="1000" class="my_item_image">';
                        }
                        echo '<div class="description_film">'.$shortDescription.'</div>';
                        
                        echo '<a href="the_book.php?id='.$id.'"class="my_details-button">More details</a>';
                        
                    echo '</div>';
                    
                }
            }

            $result->close();
            $conn->close();
            ?>
        </ul>
    </div>
        
</body>
</html>