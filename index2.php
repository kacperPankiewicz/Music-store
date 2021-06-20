<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="container">






        <div id="head"> <img src="head.png" style="margin-left:100px;"  alt="" ></div>
        <div id="store">
        <?php 
                require "passwords.php";
                require "disc.php";
                session_start();
                $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
                $sql = "select * from produkt";
       
                $result = $polaczenie->query($sql);

                while($row = mysqli_fetch_row($result)){
                    for($i=1;$i<sizeof($row)/3;$i++)
                       echo" <div class=\"grid-item\"><img src=".$row[3]." height=\"200\" width=\"200\"><h3>".$row[0]." - ".$row[1]."</h3><button class=\"button\" onclick=\"location.href='".$row[0].".php';\">Zamów!</button></div>";
                }
               $polaczenie -> close();

               
              

?>
        </div>
        <div id="cart">
               <div id="header_cart"><h3>Koszyk</h3></div>

               <?php
               error_reporting(0);
               
               foreach ( $_SESSION["zawartosc"] as $object) {
                $suma=$suma+ $object->prize_total ;
                $counter = $counter + $object->quantity;
            }
                echo "<h3>ilosc płyt w koszyku: ".$counter."<br>";
                echo "Suma wynosi: ".$suma." zł</h3>";
                
                ?>





        </div> <div id="footer">Made by Kacper Pańkiewicz 18904</div>
</body>
</html>