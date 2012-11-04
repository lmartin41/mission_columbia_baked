<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=true', false); ?>
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

	

	<?= $this->GoogleMap->map($map_options); ?>

	<!--below needs to be adding markers that are queried from the organizations address1, city, and state vals -->
	<?= $this->GoogleMap->addMarker("map_canvas", 2, "2723 Ashland Road, Columbia SC"); ?>

	<?= $this->GoogleMap->addMarker("map_canvas", 3, array('latitude' => 40.69847, 'longitude' => -73.9514)); ?>

</div>