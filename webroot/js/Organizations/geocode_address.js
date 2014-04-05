$(document).ready(function(){
  var geocode = new Geocode('Organization', ['AddressOne', 'City', 'State', 'Zip']);
  geocode.setupBlurEvents();
});