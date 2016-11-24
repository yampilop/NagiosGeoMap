<?php
	// Get icons
	$icons = explode(",",$_GET["icon"]);
	foreach($icons as &$icon) {
		$icon = "/usr/local/nagios/share/images/logos/".$icon;
		
		// Encode icons as base64
		$type = pathinfo($icon, PATHINFO_EXTENSION);
		$data = file_get_contents($icon);
		$icon = 'data:image/' . $type . ';base64,' . base64_encode($data);
	}
	
	$iconscount = count($icons);
	
	// Get label
	$label = $_GET["label"];
	$adjust = "textLength='100' lengthAdjust='spacing'";
	if (strlen($label)<16) {
		$adjust = "";
	}
	
	// SVG header
	header('Content-type: image/svg+xml');
	
	// Print SVG code
	echo "<?xml version='1.0' encoding='UTF-8' standalone='no'?>
<svg
   xmlns:dc='http://purl.org/dc/elements/1.1/'
   xmlns:cc='http://creativecommons.org/ns#'
   xmlns:rdf='http://www.w3.org/1999/02/22-rdf-syntax-ns#'
   xmlns:svg='http://www.w3.org/2000/svg'
   xmlns='http://www.w3.org/2000/svg'
   xmlns:xlink='http://www.w3.org/1999/xlink'
   width='100'
   height='50'
   viewBox='0 0 100 50'
   id='svg2'
   version='1.1'>
  <metadata
     id='metadata7'>
    <rdf:RDF>
      <cc:Work
         rdf:about=''>
        <dc:format>image/svg+xml</dc:format>
        <dc:type
           rdf:resource='http://purl.org/dc/dcmitype/StillImage' />
        <dc:title></dc:title>
      </cc:Work>
    </rdf:RDF>
  </metadata>
  <defs>
    <filter x='0' y='0' width='1' height='1' id='solid'>
      <feFlood flood-color='#FFFFFF'/>
      <feComposite in='SourceGraphic'/>
    </filter>
  </defs>
  <rect x='30' y='0' width='40' height='40' rx='10' ry='10' fill='#BBFFBB' fill-opacity='1.0' stroke='#000000' stroke-width='1'/>";
	// Draw icons
	if ($iconscount == 1) {
		echo "
  <image xlink:href='".$icons[0]."' x='35' y='5' height='30px' width='30px'/>";
	} else {
		$ang = 2 * M_PI / $iconscount;
		for ($i = 0; $i < $iconscount; $i++) {
			$x = 35 + 15 + intval(10 * cos($i * $ang) - 7.5);
			$y = 5 + 15 + intval(10 * sin($i * $ang) - 7.5);
			
			echo "
  <image xlink:href='".$icons[$i]."' x='$x' y='$y' height='15px' width='15px'/>";
		}
	}
	echo "
  <text filter='url(#solid)' x='50' y='46' fill='#000000' $adjust text-anchor='middle' alignment-baseline='middle' font-size='8' font-family='Verdana' font-weight='bold'>$label</text>
</svg>";
?>
