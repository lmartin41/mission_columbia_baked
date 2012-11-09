<?php echo $this->Html->script('http://maps.google.com/maps/api/js?sensor=true', false); ?>
<!-- my key is: AIzaSyC22n51FklMDzv3wwoc7kH4nxKO0fo2wTI 
if needed, just add it between js and sensor; example: ...js?key=MYAPIKEY&sensor...-->

<!-- the helper used for the gMap: https://github.com/marcferna/CakePHP-GoogleMapHelper -->

<div class="welcome index no-border">
	<strong>Home</strong><br /><br />
	
	Welcome, <?php echo $current_user['username']; ?>.<br /><br />
	
	<p>Mission Columbia allows users to create, read, update, delete and track <br />clients, resource streams, and 
	the organizations responsible for those resource streams.</p>

	<!--<?= $this->GoogleMap->map(); ?>-->

	<?php
	  // Override any of the following default options to customize your map
	  $map_options = array(
	    'id' => 'map_canvas',
	    'width' => '600px',
	    'height' => '400px',
	    'style' => 'text-align: center; margin-left:auto; margin-left:auto; border-radius: 5px;',
	    'zoom' => 7,
	    'type' => 'ROADMAP',
	    'custom' => null,
	    'localize' => true,
	    'latitude' => 34.042489,
	    'longitude' => -81.128335,
	    'address' => '2723 Ashland Road, Columbia SC',
	    'marker' => true,	
	    'markerTitle' => 'This is my position',
	    'markerIcon' => 'http://google-maps-icons.googlecode.com/files/home.png',
	    'markerShadow' => 'http://google-maps-icons.googlecode.com/files/shadow.png',
	    'infoWindow' => true,
	    'windowText' => 'Your current location'
	  );
	?>

	<?php echo $this->GoogleMap->map($map_options); ?>

	<?php //var_dump($theResult); ?>	

	<?php 
		foreach($theResult as &$val){
			var_dump($val);
		}
		unset($val);

		foreach( $theResult as $key => $obj)
		{
		    echo $key;
		    echo $obj['org_name'];
		    echo $obj['org_address'];

		    // Override any of the following default options to customize your marker
		  	$marker_options = array(
			    'showWindow' => true,
			    'windowText' => $obj['org_name'],
			    'markerTitle' => $obj['org_name'],
			    'markerIcon' => 'http://labs.google.com/ridefinder/images/mm_20_purple.png',
				'markerShadow' => 'http://labs.google.com/ridefinder/images/mm_20_purpleshadow.png',
			);

		    echo $this->GoogleMap->addMarker("map_canvas", 2, $obj['org_address'], $marker_options);
		}

	?>
	
	<!--incomplete stubbed ajax thingie -->
	<!--
	<script>
		//testMarkers();
		$(document).ready(function(){  
		    $("p").click(function () {
		      alert("clicked");

		    });
		});
    
	</script>
	-->

	<!--below needs to be adding markers that are queried from the organizations address1, city, and state vals 
	<?php echo $this->GoogleMap->addMarker("map_canvas", 2, "2723 Ashland Road, Columbia SC"); ?>

	<?php echo $this->GoogleMap->addMarker("map_canvas", 3, array('latitude' => 40.69847, 'longitude' => -73.9514)); ?>
	
	-->

</div>