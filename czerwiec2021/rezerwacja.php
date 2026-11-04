<?php
    $link = mysqli_connect("localhost", "root", "", "baza");
    $data = $_POST['data'];
    $ilosc_osob = $_POST['ilosc'];
    $numer_tel = $_POST['numer_tel'];

    $sql = "INSERT INTO rezerwacje(data_rez, liczba_osob, telefon) VALUES('$data', $ilosc_osob, '$numer_tel');";

    mysqli_query($link, $sql);

    mysqli_close($link);
?>  