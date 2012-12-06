<?php echo $this->Html->script('https://maps-api-ssl.google.com/maps/api/js?key=AIzaSyC22n51FklMDzv3wwoc7kH4nxKO0fo2wTI&sensor=true', false); ?>

<?php echo $this->Html->script('jquery.ui.map.min.js'); ?>

<!--the below js file aids the filter functionality -->
<?php echo $this->Html->script('demo.js'); ?>

<?php echo $this->Html->script('global.js'); ?>

<div class="actionsNoButton resources">
    <?php echo $this->Html->link('Add Resource', array('action' => 'add', $current_user['organization_id'])); ?>
</div>
<?php if ($isAtleastAdmin): ?>
<div class="resources form">
<?php else: ?>
<div class="resources form no-border">
<?php endif; ?>

    <div>
        <body>
            <div id="map_canvas" style="width: 700px; height: 400px"></div>
            <div id="radios" class="item gradient rounded shadow" style="margin:5px;padding:5px 5px 5px 10px; background:white;"></div>
        </body>
        <script>

        //position hardcoded to south carolina for now
        $('#map_canvas').gmap({'center': '34.0033, -81.0592' }).bind('init', function () {  });
        $('#map_canvas').gmap('option', 'zoom', 11);

        </script>

        <script type="text/javascript">
                $(function() { 
                    demo.add(function() {           
                        $('#map_canvas').gmap({'disableDefaultUI':true}).bind('init', function(evt, map) { 

                            $('#map_canvas').gmap('addControl', 'radios', google.maps.ControlPosition.TOP_LEFT);
                            var southWest = map.getBounds().getSouthWest();
                            var northEast = map.getBounds().getNorthEast();
                            var lngSpan = northEast.lng() - southWest.lng();
                            var latSpan = northEast.lat() - southWest.lat();
                            var images = ['http://google-maps-icons.googlecode.com/files/friends.png', 'http://google-maps-icons.googlecode.com/files/home.png', 'http://google-maps-icons.googlecode.com/files/girlfriend.png', 'http://google-maps-icons.googlecode.com/files/dates.png', 'http://google-maps-icons.googlecode.com/files/realestate.png', 'http://google-maps-icons.googlecode.com/files/apartment.png', 'http://google-maps-icons.googlecode.com/files/family.png'];

                            var jsonResults = '<?php echo json_encode($theResult); ?>';
                            var jsonObj = $.parseJSON(jsonResults);


                            var tags = [];
                            


                            $.each(jsonObj, function() { 

                                //console.log(this.resource_type);

                                var tempAll = this.resources;
                                var allSet = [];
                                
                                $.each(tempAll, function(){
                                    console.log(this.resource_type);
                                    //var tempName = this.resource_name;
                                    var tempName = this.resource_type;

                                    var hasDup = 0;
                                    for(var k = 0; k<tempAll.length; k++){

                                        if(tempName===tags[k]){
                                            hasDup = 1;
                                        }
                                    }
                                    if(hasDup == 0){
                                        tags.push(tempName);
                                    }
                                    
                                });
                            }); 

                            tags.push("Organizations");

                            $.each(tags, function(i, tag) {
                                $('#radios').append(('<label style="margin-right:5px;display:block;"><input type="checkbox" style="margin-right:3px" value="{0}"/>{1}</label>').format(tag, tag));
                            });
                            
                            $.each(jsonObj, function() { 

                                var geocoder = new google.maps.Geocoder();
                                var orgName = this.org_name;
                                var address = this.org_address;
                                var orgId = this.id;
                                var currResources = this.resources;

                                var orgsResourcesStr = "";
                                var resourcePointer;
                                var count = 0;

                                var rId = 0;
                                var rName = "";

                                //alert(count);
                                $.each(currResources, function(){
                                    resourcePointer = this;
                                    rId = resourcePointer.id;
                                    //rName = resourcePointer.resource_name;
                                    rName = resourcePointer.resource_type;
                                    //resName = currResources.resource_name;
                                    count++;

                                    /*
                                    if(count != currResources.length){
                                        //alert(count);
                                        orgsResourcesStr = orgsResourcesStr + resourcePointer.resource_name + ", ";
                                    }
                                    else{
                                        orgsResourcesStr = orgsResourcesStr + resourcePointer.resource_name;
                                    }
                                    */

                                    
                                    // orgsResourcesStr = orgsResourcesStr + '<a href="https://localhost/mission_columbia_baked/resources/view/' + rId + '">' + rName + '</a> ';

                                    orgsResourcesStr = orgsResourcesStr + '<a href="' + global.base_url + '/resources/view/' + rId + '">' + rName + '</a> ';

                                    //console.log(this);
                                });

                                geocoder.geocode( { 'address': address}, function(results, status) {
                                  if (status == google.maps.GeocoderStatus.OK) {
                                    $('#map_canvas').gmap('addMarker', { 'icon': images[1], 'tags':['Organizations'], 'bound':true, 'position': results[0].geometry.location} ).click(function() {

                                        /*
                                        $('#map_canvas').gmap('openInfoWindow', { 'content': 'Organization: ' + orgName + '<br/> Address: ' + address + ' <a href="http://www.w3schools.com">This is a link</a> ' + '<br/>resources: ' + orgsResourcesStr }, this);
                                        */
                                        $('#map_canvas').gmap('openInfoWindow', { 'content': '<a href="' + global.base_url + '/organizations/view/' + orgId + '">' + orgName + '</a> ' + '<br/> Address: ' + address + '<br/>resources: ' + orgsResourcesStr }, this);

                                    });
                                    
                                  } 
                                  else {
                                    alert("Geocode was not successful for the following reason: " + status + " this means that there is an invalid address input for the organization " + orgName);
                                  }
                                  
                                });
                                
                                
                               $.each(currResources, function(){
                                    resourcePointer = this;
                                    var resId = resourcePointer.id;
                                    var resOrgId = resourcePointer.organization_id;
                                    var resOrgName = resourcePointer.rOrgName;
                                    //var resName = resourcePointer.resource_name;
                                    var resName = resourcePointer.resource_type;
                                    var resAddress = resourcePointer.resource_address;


                                    geocoder = new google.maps.Geocoder();
                                    
                                    var tagNum = [];

                                    for(var q = 0; q<tags.length; q++){

                                        if(resName===tags[q]){
                                            tagNum.push(resName);
                                        }
                                    }

                                    geocoder.geocode( { 'address': resAddress}, function(results, status) {
                                      if (status == google.maps.GeocoderStatus.OK) {
                                        //map.setCenter(results[0].geometry.location);

                                        $('#map_canvas').gmap('addMarker', { 'icon': images[7], 'tags':tagNum, 'bound':true, 'position': results[0].geometry.location} ).click(function() {

                                            //$('#map_canvas').gmap('openInfoWindow', { 'content': 'Resource: ' + resName + '<br/> Address: ' + resAddress }, this);

                                            $('#map_canvas').gmap('openInfoWindow', { 'content': ' <a href="https://localhost/mission_columbia_baked/resources/view/' + resId + '">' + resName + '</a> ' + '<br/> Address: ' + resAddress + '<br/> Resource managed by: ' +  '<a href="' + global.base_url + '/organizations/view/' + resOrgId + '">' + resOrgName + '</a> '}, this);
                                        });
                                        
                                      } 
                                      else {
                                        alert("Geocode was not successful for the following reason: " + status + " this means that there is an invalid address input for the resource " + resName);
                                      }
                                      
                                    });

                               });
                               
                            }); 

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
    </div>
    <br />
    <h2><?php echo __('Resource Listing'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('resource_name'); ?></th>
            <th><?php echo $this->Paginator->sort('organization_id'); ?></th>
            <th><?php echo $this->Paginator->sort('description'); ?></th>
            <th><?php echo $this->Paginator->sort('inventory'); ?></th>
            <th class="actions"><?php echo __(''); ?></th>
        </tr>
        <?php foreach ($resources as $resource): ?>
            <tr>
                <td><?php echo h($resource['Resource']['resource_name']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($resource['Organization']['org_name'], array('controller' => 'organizations', 'action' => 'view', $resource['Organization']['id'])); ?>
                </td>
                <td><?php echo h($resource['Resource']['description']); ?>&nbsp;</td>
                <td>
                    <?php echo h($resource['Resource']['inventory']); ?>&nbsp;
                </td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View/Edit'), array('action' => 'view', $resource['Resource']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>

    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>

</div>
<?php if ($isAtleastAdmin): ?>



<?php endif; ?>



