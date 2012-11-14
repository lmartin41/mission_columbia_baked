<?php echo $this->Html->script('http://maps.google.com/maps/api/js?sensor=true', false); ?>
<?php echo $this->Html->script('jquery.ui.map.min.js'); ?>

<!--the below js file aids the filter functionality -->
<?php echo $this->Html->script('demo.js'); ?>

<!--The below script allows the ability to find the current location -->

<!-- my key is: AIzaSyC22n51FklMDzv3wwoc7kH4nxKO0fo2wTI 
if needed, just add it between js and sensor; example: ...js?key=MYAPIKEY&sensor...-->

<!-- the helper used for the gMap: https://github.com/marcferna/CakePHP-GoogleMapHelper -->

<div class="welcome index no-border">
	<strong>Home</strong><br /><br />
	
	Welcome, <?php echo $current_user['username']; ?>.<br /><br />
	
	<p>Mission Columbia allows users to create, read, update, delete and track <br />clients, resource streams, and 
	the organizations responsible for those resource streams.</p>

	<!--<body onload="initialize()" onunload="GUnload()"> -->
	<body>
    	<div id="map_canvas" style="width: 800px; height: 300px"></div>
    	<div id="radios" class="item gradient rounded shadow" style="margin:5px;padding:5px 5px 5px 10px; background:white;"></div>
  	</body>


	<!--<?= $this->GoogleMap->map(); ?>-->

	<script>
	
		$('#map_canvas').gmap().bind('init', function(ev, map) {
			$('#map_canvas').gmap('addMarker', {'position': '57.7973333,12.0502107', 'bounds': true}).click(function() {
				$('#map_canvas').gmap('openInfoWindow', {'content': 'Hello World!'}, this);
			});
		});

		// In the callback you can use "this" to call a function (e.g. this.get('map') instead of $('#map_canvas').gmap('get', 'map'))
		$('#map_canvas').gmap({'callback': function() {
			var self = this; // we can't use "this" inside the click function (that refers to the marker object in this example)
			self.addMarker({'position': '57.7973333,12.0502107', 'bounds': true}).click(function() {
				self.openInfoWindow({'content': 'Hello World!'}, this);
			});
		}});

		$('#map_canvas').gmap({'some_option':'some_value'}); // Add the contructor
		// addMarker returns a jQuery wrapped google.maps.Marker object 
		var $marker = $('#map_canvas').gmap('addMarker', {'position': '57.7973333,12.0502107', 'bounds': true});
		$marker.click(function() {
			$('#map_canvas').gmap('openInfoWindow', {'content': 'Hello World!'}, this);
		});

		// If you dont add a constructor ($('#map_canvas').gmap({'some_option':'some_value'});) the plugin will auto initialize 
		$('#map_canvas').gmap('addMarker', {'position': '57.7973333,12.0502107', 'bounds': true}).click(function() {
			$('#map_canvas').gmap('openInfoWindow', {'content': 'Hello World!'}, this);
		});
	

	/*
	$('#map_canvas').gmap().bind('init', function() { 
        $('#map_canvas').gmap('addMarker', { 'tags':'foo', 'position': '42.345573,-71.098326', 'bounds':true });
        $('#map_canvas').gmap('find', 'markers', { 'property': 'tags', 'value': 'foo' }, function(marker, isFound) {
                if ( isFound ) {
                        marker.setVisible(true);
                } else {
                        marker.setVisible(false);
                }
        });
	});
	$('#map_canvas').gmap({'callback':function() {
	        this.addMarker({ 'tags':'foo', 'position': '42.345573,-71.098326', 'bounds':true });
	        this.find('markers', { 'property': 'tags', 'value': 'foo' }, function(marker, isFound) {
	                if ( isFound ) {
	                        marker.setVisible(true);
	                } else {
	                        marker.setVisible(false);
	                }
	        });
	}});
	$('#map_canvas').gmap('addMarker', { 'tags':'foo', 'position': '42.345573,-71.098326', 'bounds':true });
	$('#map_canvas').gmap('find', 'markers', { 'property': 'tags', 'value': 'foo' }, function(marker, isFound) {
	        if ( isFound ) {
	                marker.setVisible(true);
	        } else {
	                marker.setVisible(false);
	        }
	});

	$('#map_canvas').gmap().bind('init', function() { 
        $('#map_canvas').gmap('addMarker', { 'tags':'foo, bar, baz', 'position': '42.345573,-71.098326', 'bounds':true });
        $('#map_canvas').gmap('find', 'markers', { 'property': 'tags', 'value': ['foo', 'bar'], 'operator': 'AND'}, function(marker, isFound) {
                if ( isFound ) {
                        marker.setVisible(true);
                } else {
                        marker.setVisible(false);
                }
        });
	});

	$('#map_canvas').gmap({'callback':function() {
        this.addMarker({ 'tags':'foo, bar, baz', 'position': '42.345573,-71.098326', 'bounds':true });
        this.find('markers', { 'property': 'tags', 'value': ['foo', 'bar'], 'operator': 'AND'}, function(marker, isFound) {
                if ( isFound ) {
                        marker.setVisible(true);
                } else {
                        marker.setVisible(false);
                }
        });
	}});

	$('#map_canvas').gmap('addMarker', { 'tags':'foo, bar, baz', 'position': '42.345573,-71.098326', 'bounds':true });
	$('#map_canvas').gmap('find', 'markers', { 'property': 'tags', 'value': ['foo', 'bar'], 'operator': 'AND'}, function(marker, isFound) {
	        if ( isFound ) {
	                marker.setVisible(true);
	        } else {
	                marker.setVisible(false);
	        }
	});
	*/
	</script>


	<script type="text/javascript">
			$(function() { 
				demo.add(function() {			
					$('#map_canvas').gmap({'disableDefaultUI':true}).bind('init', function(evt, map) { 
						//$('#map_canvas').gmap('addControl', 'tags-control', google.maps.ControlPosition.TOP_LEFT);
						$('#map_canvas').gmap('addControl', 'radios', google.maps.ControlPosition.TOP_LEFT);
						var southWest = map.getBounds().getSouthWest();
						var northEast = map.getBounds().getNorthEast();
						var lngSpan = northEast.lng() - southWest.lng();
						var latSpan = northEast.lat() - southWest.lat();
						var images = ['http://google-maps-icons.googlecode.com/files/friends.png', 'http://google-maps-icons.googlecode.com/files/home.png', 'http://google-maps-icons.googlecode.com/files/girlfriend.png', 'http://google-maps-icons.googlecode.com/files/dates.png', 'http://google-maps-icons.googlecode.com/files/realestate.png', 'http://google-maps-icons.googlecode.com/files/apartment.png', 'http://google-maps-icons.googlecode.com/files/family.png'];
						var tags = ['A', 'B', 'C', 'D', 'E', 'F'];
						//$('#tags').append('<option value="all">All</option>');
						$.each(tags, function(i, tag) {
							//$('#tags').append(('<option value="{0}">{1}</option>').format(tag, tag));
							$('#radios').append(('<label style="margin-right:5px;display:block;"><input type="checkbox" style="margin-right:3px" value="{0}"/>{1}</label>').format(tag, tag));
						});
						
						for ( i = 0; i < 100; i++ ) {
							var temp = [];
							for ( j = 0; j < Math.random()*5; j++ ) {
								temp.push(tags[Math.floor(Math.random()*10)]);
							}
							$('#map_canvas').gmap('addMarker', { 'icon': images[(Math.floor(Math.random()*7))], 'tags':temp, 'bound':true, 'position': new google.maps.LatLng(southWest.lat() + latSpan * Math.random(), southWest.lng() + lngSpan * Math.random()) } ).click(function() {
								var visibleInViewport = ( $('#map_canvas').gmap('inViewport', $(this)[0]) ) ? 'I\'m visible in the viewport.' : 'I\'m sad and hidden.';
								$('#map_canvas').gmap('openInfoWindow', { 'content': $(this)[0].tags + '<br/>' +visibleInViewport }, this);
							});
						}
						
						$('input:checkbox').click(function() {
							$('#map_canvas').gmap('closeInfoWindow');
							$('#map_canvas').gmap('set', 'bounds', null);
							var filters = [];
							$('input:checkbox:checked').each(function(i, checkbox) {
								filters.push($(checkbox).val());
							});
							if ( filters.length > 0 ) {
								$('#map_canvas').gmap('find', 'markers', { 'property': 'tags', 'value': filters, 'operator': 'OR' }, function(marker, found) {
									if (found) {
										$('#map_canvas').gmap('addBounds', marker.position);
									}
									marker.setVisible(found); 
								});
							} else {
								$.each($('#map_canvas').gmap('get', 'markers'), function(i, marker) {
									$('#map_canvas').gmap('addBounds', marker.position);
									marker.setVisible(true); 
								});
							}
						});
					});
				}).load();
			});

    </script>

	<?php
	  // Override any of the following default options to customize your map
	/*
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
			//var_dump($val);
		}
		//unset($val);

		foreach( $theResult as $key => $obj)
		{
			

		    // Override any of the following default options to customize your marker
		  	$marker_options = array(
			    'showWindow' => true,
			    'windowText' => $obj['org_name'],
			    'markerTitle' => $obj['org_name'],
			    'markerIcon' => 'http://labs.google.com/ridefinder/images/mm_20_purple.png',
				'markerShadow' => 'http://labs.google.com/ridefinder/images/mm_20_purpleshadow.png',
			);

		    echo $this->GoogleMap->addMarker("map_canvas", $key, $obj['org_address'], $marker_options);
		}

	?>
	
	<!--incomplete stubbed ajax thingie -->
	
	<script>
		//testMarkers();
		$(document).ready(function(){  
		    $("p").click(function () {
		      alert("clicked");
		      
		    });
		});
    
	</script>
	

	<!--below needs to be adding markers that are queried from the organizations address1, city, and state vals 
	<?php echo $this->GoogleMap->addMarker("map_canvas", 2, "2723 Ashland Road, Columbia SC"); ?>

	<?php echo $this->GoogleMap->addMarker("map_canvas", 3, array('latitude' => 40.69847, 'longitude' => -73.9514)); ?>
	
	-->
	*/ ?>

</div>