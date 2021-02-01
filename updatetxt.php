<!DOCTYPE html>
 <html>
 <body>

  <?php
  $myfile = fopen("addcourse.txt", "a+") or die("Unable to open file!");
  // Output one line until end-of-file
   while(!feof($myfile)) {

        echo fgets($myfile) . '<form id="h1" class="rounded" action="final.php" target="" method="post"/>
    <input type="submit" name="submit"  class="button" value="Register" /> </form>' ."<br>";

       }
  fclose($myfile);
   ?>

</body>
</html>


 <?php
 if(isset($_POST['submit'])) {
$data = $_POST['field1'];
$ret = file_put_contents('/addcourse.txt', $data, FILE_APPEND | LOCK_EX);
if($ret === false) {
    die('There was an error writing this file');
}
else {
    echo "$ret bytes written to file";
}
}
 else {
  die('no post data to process');
  }
?>