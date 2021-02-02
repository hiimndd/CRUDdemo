<?php 
if(isset($_GET['id'])) {
	$products = simplexml_load_file('sinhvien.xml');
	$id = $_GET['id'];
	$index = 0;
	$i = 0;
	foreach($products->ttsv as $sv){
		if($sv['id']==$id){
			$index = $i;
			break;
		}
		$i++;
	}
	unset($products->ttsv[$index]);
    file_put_contents('sinhvien.xml', $products->asXML());
    header("Location: index.php");

}

?>