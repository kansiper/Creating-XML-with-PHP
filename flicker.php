<?php
	$FLICKR_URL = 'http://api.flickr.com/services/feeds/photos_public.gne';
	$xml = new SimpleXMLElement($FLICKR_URL,null,true);
	foreach ($xml->entry as $flickr){
	  $title = $flickr->title;
	  $link = $flickr->link[0]['href'];
	  $photo = $flickr->link[1]['href'];
	  $photo=str_replace('_b.jpg','_s.jpg',$photo);
	   echo '<a href="'.$link.'" title="'.$title.'">';
	   echo '<img src="'.$photo.'" alt="'.$title.'"/>';
	   echo '</a> ';
	}
	?>
