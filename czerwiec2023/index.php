<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep dla uczniów</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>

    <header>
        <h1>Dzisiejsze promocje naszego sklepu</h1>
    </header>

    <aside id="lewy">
        <h2>Taniej o 30%</h2>

        <?php
            $link = mysqli_connect("localhost","root","","sklep");
            $sql = mysqli_query($link,"SELECT nazwa FROM towary WHERE promocja = '1';");
            echo "<ol type='1'>";
            foreach($sql as $row){
                echo "
                    <li>".$row["nazwa"]."</li>
                ";
            }
            echo "</ol>";
        ?>
        <!-- <ol type="1">
            <li></li>
        </ol> -->
    </aside>

    <aside id="srodkowy">
        <h2>
            Sprawdź cenę
        </h2>
        <form method="post" action="index.php">
            <select name="towar">
                <option>Gumka do mazania</option>
                <option>Cienkopis</option>
                <option>Pisaki 60 szt.</option>
                <option>Markery 4 szt.</option>
            </select>
            <input type="submit" value="SPRAWDZ">
        </form>
        <?php
            if(isset($_POST["towar"])){
                $costam = $_POST["towar"];
                $sql2 = mysqli_query($link, "SELECT cena FROM towary WHERE nazwa = '$costam';");
                echo "<div class='wynik'>";
                foreach($sql2 as $row){
                    echo "
                            <label>Cena regularna: ".$row["cena"]."</label><br>
                            <label>Cena w promocji 30%: ".$row["cena"] * 0.7."</label>
                    ";
                }     
                echo "</div>";          
            };
            mysqli_close($link);
        ?>
    </aside>    

    <aside id="prawy">
        <h2>Kontakt</h2>
        <p>e-mail:  <a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
        <img src="promocja.png" width="180px" alt="promocja">
    </aside>

    <footer>
        <h4>Autor  strony: brudas</h4>
    </footer>

</body>
</html>