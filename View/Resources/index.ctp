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
            <div id="map_canvas" style="width: 700px; height: 400px"></div>
            <div id="radios" class="item gradient rounded shadow" style="margin:5px;padding:5px 5px 5px 10px; background:white;"></div>
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

                            var organizations = '<?php echo json_encode($organizations); ?>';
                            var resourceTypes = '<?php echo json_encode($resource_types); ?>';
                            var jsonOrganizations = $.parseJSON(organizations);
                            var jsonResourceTypes = $.parseJSON(resourceTypes);

                            var tags = [];

                            $.each(jsonResourceTypes, function() {
                                tags.push(this.ResourceType.name);
                            }); 

                            tags.push("Organizations");

                            $.each(tags, function(i, tag) {
                                $('#radios').append(('<label style="margin-right:5px;display:block;"><input type="checkbox" style="margin-right:3px" value="{0}" checked="true"/>{1}</label>').format(tag, tag));
                            });
                            
                            $.each(jsonOrganizations, function() {
                                var orgName = this.Organization.org_name;
                                var address = this.Organization.address_one + "\n" 
                                                + this.Organization.address_two + ", \n" 
                                                + this.Organization.city + ", " + this.Organization.state + "\n"
                                                + this.Organization.zip;
                                var orgId = this.Organization.id;
                                var currResources = this.Resource;

                                var orgsResourcesStr = "";
                                var resourcePointer;
                                var count = 0;

                                var rId = 0;
                                var rName = "";

                                $.each(currResources, function(){
                                    var resource_id = this.id;
                                    var resource_name = this.resource_name;
                                    var address = this.street_address + ", "
                                                    + this.city + ", " + this.state + " "
                                                    + this.zip;
                                    orgsResourcesStr = orgsResourcesStr + '<a href="' + global.base_url + '/resources/view/' + this.id + '">' + this.resource_name + '</a> ';
                                    
                                    if( this.lat != null && this.lat != '' && this.lng != null && this.lng != '' )
                                    {
                                        var tagNum = [];

                                        for(var q = 0; q<tags.length; q++){

                                            if(this.resource_name === tags[q]){
                                                tagNum.push(this.resource_name);
                                            }
                                        }

                                        var latlng = new google.maps.LatLng(this.lat, this.lng);
                                        $('#map_canvas').gmap('addMarker', { 'icon': images[7], 'tags':tagNum, 'bound':true, 'position': latlng} ).click(function() {

                                            $('#map_canvas').gmap('openInfoWindow', { 'content': ' <a href="https://localhost/mission_columbia_baked/resources/view/' + resource_id + '">' + resource_name + '</a> ' + '<br/> Address: ' + address + '<br/> Resource managed by: ' +  '<a href="' + global.base_url + '/organizations/view/' + orgId + '">' + orgName + '</a> '}, this);
                                        });
                                    }
                                });

                                if( this.Organization.lat != null && this.Organization.lat != '' && this.Organization.lng != null && this.Organization.lng != '' )
                                {
                                    var latlng = new google.maps.LatLng(this.Organization.lat, this.Organization.lng);
                                    $('#map_canvas').gmap('addMarker', { 'icon': images[1], 'tags':['Organizations'], 'bound':true, 'position': latlng} ).click(function() {

                                        $('#map_canvas').gmap('openInfoWindow', { 'content': '<a href="' + global.base_url + '/organizations/view/' + orgId + '">' + orgName + '</a> ' + '<br/> Address: ' + address + '<br/>resources: ' + orgsResourcesStr }, this);

                                    });
                                }
                               
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



