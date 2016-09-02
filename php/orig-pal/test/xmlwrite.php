<?php
	 
	$xml = new DOMDocument("1.0");
	 
	$root = $xml->createElement("data");
	$xml->appendChild($root);
	 
	$id   = $xml->createElement("id");
	$idText = $xml->createTextNode('1');
	$id->appendChild($idText);
	 
	$title   = $xml->createElement("title");
	$titleText = $xml->createTextNode('"PHP Undercover"');
	$title->appendChild($titleText);
	 
	 
	$book = $xml->createElement("book");
	$book->appendChild($id);
	$book->appendChild($title);
	 
	$root->appendChild($book);	 
	$xml->formatOutput = true;
	echo "<xmp>". $xml->saveXML() ."</xmp>";
	 
	$xml->save($_SERVER['DOCUMENT_ROOT'] . "/PAL/php/test/test.xml") or die("Error");
	 
?>