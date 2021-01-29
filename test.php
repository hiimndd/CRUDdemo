<?php
// $xml = new DOMDocument('1.0','utf-8');

// $sinhvien = $xml->createElement("sinhvien");
// $xml->appendChild($sinhvien);

// $ttsv =$xml->createElement("ttsv");
// $ttsv->setAttribute("id",1);
// $sinhvien->appendChild($ttsv);

// $name =$xml->createElement("name","Phạm Trung Thịnh");
// $ttsv->appendChild($name);

// $mssv =$xml->createElement("mssv","333333333");
// $ttsv->appendChild($mssv);

// $ngaysinh =$xml->createElement("ngaysinh","09-08-1998");
// $ttsv->appendChild($ngaysinh);

// $sinhvien->insertBefore($ttsv,$sinhvien->childNodes->item(1));



// $xml->save("sinhvien.xml");

?>
<?php
// // load XML, create XPath object
// $xml = new DomDocument();
// $xml->preserveWhitespace = false;
// $xml->load('sinhvien.xml');
// $xpath = new DOMXPath($xml);

// // get node eva, which we will append to
// $sinhvien = $xpath->query('/sinhvien/ttsv')->item(0);

// // create node john

// $ttsv =$xml->createElement("ttsv");
// $sinhvien->appendChild($ttsv);

// $name =$xml->createElement("name","Phạm Trung Thịnh");
// $ttsv->appendChild($name);

// $mssv =$xml->createElement("mssv","333333333");
// $ttsv->appendChild($mssv);

// $ngaysinh =$xml->createElement("ngaysinh","09-08-1998");
// $ttsv->appendChild($ngaysinh);

// // insert john after eva
// //   "in eva's parent node (=contacts) insert
// //   john before eva's next node"
// // this also works if eva would be the last node
// $sinhvien->parentNode->insertBefore($ttsv, $sinhvien->nextSibling);
// $xml->save("sinhvien.xml");


?>