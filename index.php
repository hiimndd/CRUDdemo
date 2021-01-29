
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
function loadtext(){
  $read = file('sinhvien.txt');
  echo "<tbody>";
  $name= "";
  $mssv ="";
  $ngaysinh = "";
    foreach ($read as $line) {
      for($i = 0 ; $i < strlen($line); $i++){
        echo "<tr>";
        if($line[$i] === ","){
          $vitri1 = $i-1 ;
          echo "<td>";
          for($i = 0;$i <= $vitri1; $i++ ){
            $name = $line[$i];
            echo $name;
          }
          echo "</td>";
          echo "<td>";
          for($i = $vitri1+2;$i < strlen($line) ; $i++ ){
            if($line[$i] === ","){
              $vitri2 = $i ;
              for($i = $vitri1+2;$i < $vitri2; $i++ ){
                $mssv = $line[$i];
                echo $mssv;
              }
              echo "</td>";
              echo "<td>";
              for($i = $vitri2+2;$i < strlen($line); $i++ ){
                $ngaysinh = $line[$i];
                echo $ngaysinh;
              }
              echo "</td>";
            }
        }
      }
      echo "</tr>";
    }
  
  }
  echo "</tbody>";
}
function loadjson(){
  $name ="";
  $mssv = "";
  $ngaysinh = "";
  $read = file('json.php');
    foreach ($read as $line) {
    // echo $line ."<br> ";
    $arr = json_decode($line, true);
    echo $arr["hoten"]."<br>";
    
    }
    
}


?>
<div class="container">
  <h2>Danh sách sinh viên</h2>
  
  <a href="student.php?type=txt"><button type="button" class="btn btn-default">Thêm vào file text</button></a> 
  <a href="student.php?type=json"><button type="button" class="btn btn-default">Thêm vào file Json</button></a> 
  <a href="student.php?type=xml"><button type="button" class="btn btn-default">Thêm vào file xml</button></a>
  
  <p>file text</p>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Họ tên</th>
        <th>Mã số sinh viên</th>
        <th>Ngày sinh</th>
        <th><th>
        <th><th>
      </tr>
    </thead>
    <?php
      loadtext();
    ?>
  </table>
  <p>file json</p>
  <table class="table table-striped">
  <thead>
      <tr>
        <th>Họ tên</th>
        <th>Mã số sinh viên</th>
        <th>Ngày sinh</th>
        <th><th>
        <th><th>
      </tr>
    </thead>
  <tbody>
  <?php 
            $read = file('json.php');
            foreach ($read as $line) {
              $arr = json_decode($line, true);
               
            
            ?>
      <tr>
        <td><?php echo $arr["hoten"]."<br>"; ?></td>
        <td><?php echo $arr["mssv"]."<br>"; ?></td>
        <td><?php echo $arr["ngaysinh"]."<br>"; ?></td>
        <?php } ?>
      </tr>
    </tbody>
  </table>

  <p>file xml</p>
  <table class="table table-striped">
  <thead>
      <tr>
        <th>Họ tên</th>
        <th>Mã số sinh viên</th>
        <th>Ngày sinh</th>
        <th><th>
        <th><th>
      </tr>
    </thead>
  <tbody>
  <?php 
           $xml=simplexml_load_file("sinhvien.xml") or die("Error: Cannot create object");
           foreach($xml->children() as $sv) {
            ?>
      <tr>
        <td><?php echo $sv->hoten."<br>"; ?></td>
        <td><?php echo $sv->mssv."<br>"; ?></td>
        <td><?php echo $sv->ngaysinh."<br>"; ?></td>
        <?php } ?>
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>
