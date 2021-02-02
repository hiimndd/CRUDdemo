<?php 


if(isset($_GET['id'])) {
    
    $read = file('sinhvien.txt');
    $id = (int)$_GET['id'];
    unset($read[$id]);
    $fsinhvien = "";
    foreach($read as $sv){
        $fsinhvien .= $sv;
    }
    
    $myfilew = fopen("sinhvien.txt", "w") or die("Unable to open file!");
    fwrite($myfilew, $fsinhvien);
    fclose($myfilew);
    header("Location: index.php");

}