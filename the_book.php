<!DOCTYPE html>
<html>
    <head>
        <title>Онлайн кинотеатр</title>
        <link rel="shortcut icon" href="/image/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="css/display_the_films.css">
        <!-- <link rel="stylesheet" type="text/css" href="css/display_films.css"> -->

    </head>
    <body>

        <div class="my_container">
            <?php
            include 'config.php'; // Adjust this path as needed
            // Проверяем, есть ли параметр 'id' в запросе
            if (isset($_GET['id'])) {
                // Получаем значение 'id'
                $movieId = $_GET['id'];

                // Ваш код для выполнения запроса и получения информации о фильме
                $query = "SELECT id, rating_kp, rating_imdb, rating_filmCritics, movieLength, name, description, year, poster_url, poster_previewUrl, genres, countries, alternativeName, names, shortDescription, logo_url, trailer FROM `Movies_update` WHERE id = $movieId";

                $result = $conn->query($query);
                // Выполните запрос и обработайте результаты
                if ($result === false) {
                    die('Error, query failed: ' . $conn->error);
                }
                if ($result->num_rows == 0) {
                    echo '<div class="">Database is empty</div>';
                } 
                else {
                    while ($row = $result->fetch_assoc()) {

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
                        $trailer = $row['trailer'];
                        // https://www.imdb.com/video/vi2101135129/?playlistId=tt10676048&ref_=tt_pr_ov_vi

                        // Display each file with cover image and name on the site
                        echo '<div class="about_films">';
                            echo '<div class="container_poster">';
                                echo '<div class="poster_image">';
                                    if ($poster_url !== null) {
                                        echo '<img src="'.$poster_url.'" alt="Cover Image" width="1000" class="my_item_image">';
                                    }
                                echo '</div>';
                            echo '</div>';

                            echo '<div class="container_info">';
                                echo '<div class="info_film">'; 
                                    
                                    echo '<div class="name_side">';
                                        echo '<div class="my_name-on-site">'.$name.'</div>';    
                                    echo '</div>';

                                    echo  '<div class="info_side">';
                                        echo '<div class="">';

                                            echo '<div class="item_info">Производство: ' . $countries . '</div>';
    
                                        echo '</div>';

                                        echo '<div class="">';

                                            echo '<div class="item_info">Жанр: '.$genres.'</div>';

                                        echo '</div>';

                                        echo '<div class="">';

                                            echo '<div class="item_info">Рейтинг на Kino Poisk: '.$rating_kp.'</div>';

                                        echo '</div>';

                                        echo '<div class="">';

                                            echo '<div class="item_info">Рейтинг на imdb: '.$rating_imdb.'</div>';

                                        echo '</div>';

                                        echo '<div class="">';

                                            echo '<div class="item_info">Рейтинг на Фильм критика: '.$rating_filmCritics.'</div>';

                                        echo '</div>';
                                        echo '<div class="">';

                                            echo '<div class="item_info">Длительность: '.$movieLength.' минут</div>';

                                        echo '</div>';

                                    echo  '</div>';

                                echo '</div>';
                            echo '</div>';

                        echo '</div>';

                        
                        echo '<div class="about_films">';
                        echo '<div class="des_text">'.$description.'</div>';

                        echo '</div>';
                        echo  $trailer;
                        echo '<style>
                            iframe {
                                width: 1240px !important;
                                height: 800px !important;
                            }
                            </style>';

                            
                            echo '<div class="comment-section">';
                            echo '<h2>Оставь комментарию</h2>';
                            echo '<div class="comment-form">';
                                echo '<textarea placeholder="Напиши тут"></textarea>';
                                echo '<button>Отправить</button>';
                            echo '</div>';
                    
                            // Assume you have an array of comments
                            $comments = array("Омов-то она любит, но у их трупов глаза вырезать ей эта любовь не мешает... Враги убили её отца и перебили половину народа, а она приказывает их простить и им подчиниться... Пацифизм 100-й лвл. Не могу 10 поставить, ставлю 9", "Какая озвучка лучше дубляж или новый дубляж???", "Здравствуйте. На Рутрекере появились казахские субтитры к данному фильму, добавьте их к вашему сайту, пожалуйста.");
                    
                            // Display existing comments
                            foreach ($comments as $comment) {
                                echo '<div class="comment">' . $comment . '</div>';
                            }
                        echo '</div>';

                    }

                }
            } 
            else {
                // Если 'id' отсутствует в запросе, обработайте этот случай по вашему усмотрению
                echo "No movie id provided.";
            }
            ?>
        </div>
    </body>
</html>