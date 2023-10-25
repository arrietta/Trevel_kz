<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "diplomka";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// проверка соеденения
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <!-- стили -->
    <style>
      
        body {
            margin: 0;
            padding: 0;
        }

        .card {
            margin-bottom: 1.5rem;
        }

        .card-body {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
    </style>
</head>

<body>
<nav class="navbar navbar-expand-sm navbar-light bg-faded site-navigation">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-second" aria-controls="navbar-second" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-second">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="main.php#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="main.php#region_atlas">Atlas of regions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="main.php#attraction_map">Map of attractions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="main.php#infoatlas">Infoatlas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="main.php#slider">Gallery</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="##" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        For tourists
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="hotels.php">Hotels</a>
                        <a class="dropdown-item" href="links.html">Useful links</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

        <!-- php код который делает запрос на базу данных и получает список отелей -->
    <div class="container mt-4">
        <div class="row">
            <?php
            // SQL Запрос
            $sql = "SELECT * FROM hotels";

            // получение результата
            $result = $conn->query($sql);

            // проверка на совподения
            if ($result->num_rows > 0) {
                // Вывод данных
                while ($row = $result->fetch_assoc()) {
                    // Получение данных с каждой колонки с информацией
                    $hotelName = $row["hotel_name"];
                    $roomNumber = $row["room_number"];
                    $priceTenge = $row["price_tenge"];
                    $phoneNumbers = $row["phone_numbers"];
                    $address = $row["address"];
                    $website = $row["website"];

                    // Вывод на HTML
                    echo '<div class="col-md-4 my-4">';
                    echo '<div class="card h-100">';
                    echo '<div class="card-body">';
                    echo "<h5 class='card-title'>$hotelName</h5>";
                    echo "<p class='card-text'>Room Number: $roomNumber</p>";
                    echo "<p class='card-text'>Price (Tenge): $priceTenge</p>";
                    echo "<p class='card-text'>Phone Numbers: $phoneNumbers</p>";
                    echo "<p class='card-text'>Address: $address</p>";
                    echo "<a href='$website' class='btn btn-primary'>Visit Website</a>";
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No data available";
            }

            // закрыть соедениние
            $conn->close();
            ?>
        </div>
    </div>
    <div class="footer">
        <div class="container-fluid">
            <div class="row">	
                <div class="col-xs-6 col-md-8">
                    <div class="copyright">
                        <p style="text-transform:uppercase;">Our contacts</p>
                        <p>Author: Байжанов Нурсат   </p>
                        <p>Tel.: +77472594843</p>
                        <p>Add Tel: +77472594843</p>
                        <p>Email: nursatbaijanov5@gmail.com </p>
                    </div>
                </div>
            <div class="col-xs-4 col-md-2"> 
                <div style="padding-right:20px;">
                    <a class="weatherwidget-io" href="https://forecast7.com/ru/43d2276d85/almaty/" data-font="Arial" data-mode="Current" data-theme="original" data-basecolor="#00bbff; style="display: block; position: relative; height: 144px; padding: 0px; overflow: hidden; text-align: left; text-indent: -299rem;">АЛМАТЫ<iframe id="weatherwidget-io-0" class="weatherwidget-io-frame" title="Weather Widget" scrolling="no" frameborder="0" width="100%" src="saved_resource.html" style="display: block; position: absolute; top: 0px; height: 144px;"></iframe></a>
                        <script>
                            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                        </script>
                </div>   
            </div>			
            </div>
        </div>
    </div>

   
    <script src="jquery-1.12.4.min.js.download"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
