$(document).ready(function(){
  var geocode = new Geocode('Resource', ['StreetAddress', 'City', 'State', 'Zip']);
  geocode.setupBlurEvents();
});