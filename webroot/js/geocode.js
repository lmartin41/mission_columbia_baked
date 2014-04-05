Geocode = function(model, formObjects){
  this.model = model;
  this.formObjects = formObjects;
}

Geocode.prototype.model = '';
Geocode.prototype.formObjects = Array();

Geocode.prototype.setupBlurEvents = function()
{
  var model = this.model;
  var formObjects = this.formObjects;
  $.each(this.formObjects, function()
  {
    $('#' + model + this.toString()).on('blur', function(event){
      onBlurEvent(event, model, formObjects)
    });
  });
}

Geocode.prototype.geocodeAddress = function(address)
{
  var model = this.model;
  var geocoder = new google.maps.Geocoder();

  geocoder.geocode( { 'address': address}, function(results, status) 
  {
    if (status == google.maps.GeocoderStatus.OK) 
    {
        geoLocation = results[0].geometry.location.toString().split(',');

        $('#' + model + 'Lat').val(geoLocation[0].replace('(','').trim());
        $('#' + model + 'Lng').val(geoLocation[1].replace(')','').trim());
    } 
    else 
    {
      $('#' + model + 'Lat').val('');
      $('#' + model + 'Lng').val('');
      alert("Geocode was not successful for the following reason: " + status);
    }
    
  });
}

Geocode.prototype.getAddressFromForm = function()
{
  return $('#' + this.model + 'AddressOne').val() + ', ' + $('#' + this.model + 'City').val() + ', ' + $('#' + this.model + 'State').val() + ', ' + $('#' + this.model + 'Zip').val();
}


Geocode.prototype.addressProperlyInputed = function()
{
  var retBool = true;
  var model = this.model;
  $.each(this.formObjects, function(){
    if( !$('#' + model + this.toString()).val().match(/\w/) )
    {
      retBool = false;
    }
  });
  
  return retBool;
}

var onBlurEvent = function(event, model, formObjects)
{
  var geocode = new Geocode(model, formObjects);
  if( geocode.addressProperlyInputed() )
  {
    geocode.geocodeAddress(geocode.getAddressFromForm());
  }
}