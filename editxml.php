
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
$products = simplexml_load_file('sinhvien.xml');



if(isset($_POST['submitSave'])) {

	foreach($products->ttsv as $product){
		if($product['id']==$_POST['id']){
			$product->name = $_POST['name'];
			$product->price = $_POST['price'];
			break;
		}
	}
	file_put_contents('data.xml', $products->asXML());
	header('location:index.php');
}

$id = $_GET["id"];
$sum = $id +2;
echo $sum;
$idInt = (int)$id;
foreach($products->ttsv as $sv ) {
	
	$hoten = $sv->hoten[$idInt];
	$mssv = $sv->mssv[$_GET["id"]];
	$ngaysinh = $sv->ngaysinh[$_GET["id"]];
	echo $hoten;
	break;

}



?>


<div class="container">
    <h2>sửa thông tin sinh viên</h2>
    <?php if (isset($_GET["id"])):  ?>
	<input type="hidden" value="<?php echo $id ?>" name="da"/>
  <form action="editxml.php" method="POST">
    <div class="form-group">
    
      <label for="hoten">Họ Tên :</label>
      <input type="text" class="form-control" value="<?php echo $hoten  ?>" id="hoten" placeholder="Họ tên sinh viên" name="hoten">
    </div>
    <div class="form-group">
        <label for="mssv">Mã số sinh viên :</label>
        <input type="text" class="form-control" id="mssv" value="<?php echo $mssv ?>" placeholder="mã số sinh viên" name="mssv">
      </div>
      <div class="form-group">
        <label for="ngaysinh">Ngày sinh :</label>
        <input type="date" class="form-control" id="ngaysinh"  value="<?php echo $ngaysinh ?>" name="ngaysinh">
      </div>
    <button type="submit" class="btn btn-default" name="submitSave">Lưu</button>


  </form>
  <?php endif; ?>


  
</div>
</body>
</html>


