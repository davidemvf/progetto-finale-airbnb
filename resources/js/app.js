
require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});


function init() {
  navBar();
  writeMessage();
  showMap();
}

function navBar() {
  $( ".header-right > a" ).click(function() {
    $(".hamburger-menu").toggleClass("active");
  });
}

function writeMessage() {
  $("#write_msg").click(function() {
    $(".message-form").toggleClass("active");
  });
}

function showMap() {
  var name = $("#name").text();
  var city = $("#city").text();
  var cap = $("#cap").text();
  var address = $("#address").text();

  var query = address + ' ' + cap + ' ' + city

  $.ajax({
      method: "GET",
      url: 'https://api.tomtom.com/search/2/search/' + query + '.json?countrySet=ITA&key=VfA8Eaif2Ag7Vzd8hJ9vG7q9DIL4WzDn',
      success: function(data) {
              // Ci ritorna oggetto con latitudine e longitudine
              tomtom.searchKey("VfA8Eaif2Ag7Vzd8hJ9vG7q9DIL4WzDn");
              // Salviamo latitudine e longitudine in un array
              var Apartment = [
                  data.results[0].position.lat,
                  data.results[0].position.lon
              ];
              var map = tomtom.L.map("map", {
                  key: "VfA8Eaif2Ag7Vzd8hJ9vG7q9DIL4WzDn",
                  source: "vector",
                  basePath: "https://api.tomtom.com/maps-sdk-js/4.47.6/examples/sdk",
                  center: Apartment,
                  zoom: 15,
                  language: "it-IT"
              });
              var marker = tomtom.L.marker(Apartment).addTo(map);
              marker.bindPopup('your company name, your company address').openPopup();
              marker.bindPopup("<b>" + name + "</b><br/>" + query);
      }
  });
}

$(document).ready(init);
