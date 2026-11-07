<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gry Komputerowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Ranking gier komputerowych</h1>
    </header>
    <section id="lewy">
        <h3>Top 5 gier w tym miesiącu</h3>
        <?php
            $link = mysqli_connect("localhost", "root", "", "gry");

            $sql = mysqli_query($link, "SELECT nazwa, punkty FROM gry ORDER BY punkty DESC LIMIT 5;");
            
            echo "<ul>";
            foreach($sql as $row){
                echo "<li>".$row["nazwa"]."<div class='punkty'>".$row["punkty"]."</div></li>";
            };
            echo "</ul>";
        ?>
        <h3>Nasz sklep</h3>
        <a href="http://sklep.gry.pl">Tu kupisz gry</a>
        <h3>Strone wykonal: </h3>
        <p>aris</p>
    </section>
    <section id="srodek">
        <?php
        $sql2 = mysqli_query($link, "SELECT id, nazwa, zdjecie FROM GRY;");

        foreach($sql2 as $row){
            echo "<div class='zdj_srodkowe'><img src='./zdjecia/".$row["zdjecie"]."' alt='".$row["nazwa"]."' title='".$row["id"]."'>
            <p>".$row["nazwa"]."</p></div>";
        };
        ?>
    </section>
    <section id="prawy">
        <h3>Dodaj nową grę</h3>
        <form action="gry.php" method="post">
            nazwa<br>
            <input type="text" name="nazwa"><br>
            opis<br>
            <input type="text" name="opis"><br>
            cena<br>
            <input type="text" name="cena"><br>
            zdjecie<br>
            <input type="text" name="zdjecie"><br><br>
            <input type="submit" value="DODAJ">
            <?php
                if(isset($_POST["nazwa"])){
                    $nazwa = $_POST["nazwa"];
                    $opis = $_POST["opis"];
                    $cena = $_POST["cena"];
                    $zdjecie = $_POST["zdjecie"];

                    $sql5 = mysqli_query($link, "INSERT INTO gry(nazwa, opis, punkty ,cena, zdjecie) VALUES('$nazwa', '$opis', 0, $cena, '$zdjecie')");
                }

            ?>
        </form>
    </section>
    <footer>
        <form action="gry.php" method="post">
            <input type="text" name="id">
            <input type="submit" value="Dodaj opis">
            <?php
                if(isset($_POST["id"])){
                    $id = $_POST['id'];
                    $sql4 = mysqli_query($link, "SELECT nazwa, LEFT(opis, 100) AS opis, punkty, cena FROM gry WHERE id=$id;");

                    foreach($sql4 as $row){
                        echo "<h2>".$row["nazwa"].", ".$row["punkty"].", ".$row["cena"]."zl</h2>";
                        echo "<p>".$row["opis"]."</p>";
                    };
                }
            ?>
        </form>
    </footer>
</body>
</html>

<?php
    mysqli_close($link);

?>