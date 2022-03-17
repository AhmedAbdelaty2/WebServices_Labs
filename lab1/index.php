<?php
require("autoload.php");
ini_set('memory_limit', '-1');
$weather = new Weather();
$egyption_cities = $weather->get_cities();
if (isset($_POST["submit"])) {
    $weather->get_current_time();

    $inData=$weather->get_weather($_POST["city"]);
    echo "<h1>".$inData["name"]."</h1></br>";
    echo $inData['weather'][0]["description"];
    echo "</br>min temp:" .$inData['main']['temp_min']."C</br>";
    echo "max temp:".$inData['main']['temp_max']."C</br>";
    echo "humidity:". $inData['main']['humidity']."% </br>";
    echo "wind:". $inData['wind']['speed']."Km/h";
    
    
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Please, choose the city.</h2>
        <form method="POST">
            <select name="city">
             <?php 
                foreach($egyption_cities as $item) {
                    echo '<option name="' .$item["id"]. '">' . $item["name"] . '</option>';
                }
            ?>
            </select>
            <input type="submit" value="Get Weather" name="submit">
        </form>

    </body>
</html>
