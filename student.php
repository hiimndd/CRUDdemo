<?php
  include 'handing.php';
?>
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

<div class="container">

    <?php if($_GET['type'] == "txt"){ ?>
      <h2><?php echo "Đây là thêm bằng file text" ?> </h2>
    <?php } ?>
    <?php if($_GET['type'] == "json"){ ?>
      <h2><?php echo "Đây là thêm bằng file json" ?> </h2>
    <?php }?>
    
    
  <form action="#" method="post">
    <div class="form-group">
      <label for="hoten">Họ Tên :</label>
      <input type="text" class="form-control" id="hoten" placeholder="Họ tên sinh viên" name="hoten">
    </div>
    <div class="form-group">
        <label for="mssv">Mã số sinh viên :</label>
        <input type="text" class="form-control" id="mssv" placeholder="mã số sinh viên" name="mssv">
      </div>
      <div class="form-group">
        <label for="ngaysinh">Ngày sinh :</label>
        <input type="date" class="form-control" id="ngaysinh"  name="ngaysinh">
      </div>
    <button type="submit" class="btn btn-default" name="them">Thêm sinh viên</button>
  </form>
  <?php
    if(isset($_POST["them"])){
      if($_GET['type'] == "txt"){
        filetext();
        header("location: index.php");
      }else if($_GET['type'] == "json"){
        filejson();
        header("location: index.php");
      }else{
        echo "không thể xác định kiểu file!";
        exit();
      }
            
      
    }
  ?>
</div>
</body>
</html>
