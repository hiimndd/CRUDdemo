<?php

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $all = file_get_contents('sinhvien.json');
    $all = json_decode($all, true);
    $jsonfile = $all["sinhvien"];
    $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["sinhvien"][$id]);
        $all["sinhvien"] = array_values($all["sinhvien"]);
        file_put_contents("sinhvien.json", json_encode($all));
    }
    header("Location: index.php");
}