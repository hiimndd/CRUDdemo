
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('sinhvien.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["sinhvien"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('sinhvien.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["sinhvien"];
    $jsonfile = $jsonfile[$id];

    $post["hoten"] = isset($_POST["hoten"]) ? $_POST["hoten"] : "";
    $post["mssv"] = isset($_POST["mssv"]) ? $_POST["mssv"] : "";
    $post["ngaysinh"] = isset($_POST["ngaysinh"]) ? $_POST["ngaysinh"] : "";



    if ($jsonfile) {
        unset($all["sinhvien"][$id]);
        $all["sinhvien"][$id] = $post;
        $all["sinhvien"] = array_values($all["sinhvien"]);
        file_put_contents("sinhvien.json", json_encode($all));
    }
    header("Location: index.php");
}
?>


<div class="container">
    <h2>sửa thông tin sinh viên</h2>
    <?php if (isset($_GET["id"])): ?>
  <form action="edit.php" method="POST">
    <div class="form-group">
    <input type="hidden" value="<?php echo $id ?>" name="id"/>
      <label for="hoten">Họ Tên :</label>
      <input type="text" class="form-control" value="<?php echo $jsonfile["hoten"] ?>" id="hoten" placeholder="Họ tên sinh viên" name="hoten">
    </div>
    <div class="form-group">
        <label for="mssv">Mã số sinh viên :</label>
        <input type="text" class="form-control" id="mssv" value="<?php echo $jsonfile["mssv"] ?>" placeholder="mã số sinh viên" name="mssv">
      </div>
      <div class="form-group">
        <label for="ngaysinh">Ngày sinh :</label>
        <input type="date" class="form-control" id="ngaysinh"  value="<?php echo $jsonfile["ngaysinh"] ?>" name="ngaysinh">
      </div>
    <button type="submit" class="btn btn-default" name="luu">Lưu</button>


  </form>
  <?php endif; ?>


  
</div>
</body>
</html>