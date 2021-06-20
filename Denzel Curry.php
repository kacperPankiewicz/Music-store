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

    




        <div id="head"> <img src="head.png" style="margin-left:100px;"  alt="Girl in a jacket" ></div>
        <div id="store">
            <div style="text-align:center;">
        <img src="okladki/tatoo.jpg" height="400" width="400" style="margin-top: 40px;margin-left:90px;margin-right: 40px;">
        <P style="padding-left:100px"><h3> &nbsp&nbsp&nbsp&nbsp&nbsp  Denzel Curry - TA13OO</h3></P>
        <table style="width:auto;padding-left:28%">
       <form action="Denzel Curry.php" method="GET">
       <tr>
            <td>Liczba dostepnych sztuk: </td>
            <td>90</td>
        </tr> 
       <tr>
            <td>Liczba Sztuk:</td>
            <td><input type="text" name="value"></td>
        </tr>
        <tr>
            <td>Cena:</td>
            <td>100</td>
        </tr>
        <tr>
            <td>Dodaj do koszyka: </td>
            <td><input type="submit" value ="dodaj"></td>
        </tr>
        </form>
        </table>
        <?php
         error_reporting(0);
        require "passwords.php";
            require "disc.php";
            session_start();
            $how_much = 100;
            $value = $_GET['value'];
           

?>
        
        <div style="float:right;margin-top:10%"><button class="button" onclick="location.href='index.php';">Powrót</button></div>
        <?php
              $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
              $sql = "select onstock from produkt where author='Denzel Curry'";
     
              $result = $polaczenie->query($sql);
              while($row = mysqli_fetch_row($result)){
              if($row[0]>=$value){
                if($value>0)
            {
                $order = new Disc("Denzel Curry","TA13OO",$value,$how_much);
                $_SESSION["zawartosc"][]=$order;
                echo"<p style='color:green'><b>Zamówienie dodane</b></p>";

            }
        }
            else{
                if(isset($value))
                echo"<p style='color:red'><b>Podałeś złą wartość</b></p>";
            }
              
            }

        ?>
        </div>
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

                <form action="index.php" method="get">
                                    <input type ="hidden" name="clear" value="1">
                                    <input class="button" type="submit" value="zakończ sesje">

                                
                                </form>



        </div>
        <div id="footer">Made by Kacper Pańkiewicz 18904</div>
    </div>
</body>
</html>