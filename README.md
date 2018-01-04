Creating XML with PHP. 
Hi friends I have been dealing with programming for 3 years in Seyda.In this article I will tell you how to create XML with PHP.XML(Extensible Markup Language) Generally used for data storage, but nowadays it is preferred to use data exchange.In this article, we will learn to read and parse XML files.


SIMPLEXML


We will use the 'simpleXMLElemtent' class to work with XML documents with Php.this class will give us documents by parse and it will be more comfortable to solve.

Save the following codes in the root directory of example.xml.

	<entry>
	 <person>
	  <name> Seyda Bozkurt </name>
	  <city> Sakarya </city>
	 </person>
	 <person>
	  <name> Mert </name>
	  <city> Türkiye </city>
	 </person>
	</entry>

I now instantiate an object in the class 'SimpleXMLElemtent' to parse the example.xml file.To see the result, use the ' print_r () ' function.

index.php:

	<?php
	$xml = new SimpleXMLElement('example.xml',null,true);
	echo "<pre>";
	print_r ($xml);
	echo "</pre>";
	?>

After you run the codes, you will see a result like this.


Finding child nodes

XML contains parent and child nodes.To find this, the ' SimpleXMLElement ' class is found using the 'children()' method.Let's find the subnodes by going to the contents of the file 'example.xml'. you can examine the following codes.

	<?php
	$xml = new SimpleXMLElement('example.xml',null,true);
	foreach($xml ->children() as $person){
	foreach($person->children() as $name){
	echo $name.'<br>'; } echo "<hr>";
	}


you need to get something like this.


Attribute Listing

In some XML data, nodes 'attribute' occurs.To access these values, use the 'attribute ()' method of the 'SimpleXMLElement' class.we will examine the following codes to better introduce the subject as well.

	<?xml version="1.0" encoding ="utf-8"?>
	<entry>
	  <person name="Seyda Bozkurt" city="Sakarya" />
	  <person name="Mert" city="Türkiye"/>
	</entry>

save it to a file with an .xml extension. now I see the code that will print it on the screen.


	<?php
	$xml = new SimpleXMLElement('example.xml',null,true);
	foreach($xml->person as $kisi){
	  foreach($kisi-> attributes() as $key=>$value)
	   { echo $key.'='.$value.'<br>';  }  
	 echo '<hr>'; }
	?>


Two nested loops have been established above. Lists all contacts with the outer ' foreach ' cycle, while listing the attributes within the inner loop and people.Each ' attribute ' is printed on the screen and the <hr> HTML tag is put to add a horizontal line between the contacts.


Flickr Example


Filck.com published the last photos that the members had added to the address "http://api.flickr.com/services/feeds/photos_public.gne".I record the following codes as flickr.php.


	<?php
	$FLICKR_URL = 'http://api.flickr.com/services/feeds/photos_public.gne';
	$xml = new SimpleXMLElement($FLICKR_URL,null,true);
	foreach ($xml->entry as $flickr){
	  $title = $flickr->title;
	  $link = $flickr->link[0]['href'];
	  $photo = $flickr->link[1]['href'];
	  $photo=str_replace('_b.jpg','_s.jpg',$foto);
	   echo '<a href="'.$link.'" title="'.$title.'">';
	   echo '<img src="'.$photo.'" alt="'.$title.'"/>';
	   echo '</a> ';
	}
	?>


I now share these images with you when I run these commands.If there are pictures on the screen there is no problem.
some pictures may not appear, some photos from flickr.com have restricted access under member privacy policy.If you click on the pictures, you will be connected to the Web page to enlarge the image.
# Creating-XML-with-PHP
