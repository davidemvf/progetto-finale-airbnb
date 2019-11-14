
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
  var name = $("#name").val();
  var city = $("#city").val();
  console.log(city);
  var cap = $("#cap").val();
  console.log(cap);
  var address = $("#address").val();
  console.log(address);
  var query = address + ' ' + cap + ' ' + city
  console.log(query);
  $.ajax({
      method: "GET",
      url: 'https://api.tomtom.com/search/2/search/' + query + '.json?countrySet=ITA&key=VfA8Eaif2Ag7Vzd8hJ9vG7q9DIL4WzDn',
      success: function(data) {
              
              tomtom.searchKey("VfA8Eaif2Ag7Vzd8hJ9vG7q9DIL4WzDn");
              console.log(data);

              var Apartmet = [
                  data.results[0].position.lat,
                  data.results[0].position.lon
              ];
              console.log(Apartmet);
              var map = tomtom.L.map("map", {
                  key: "VfA8Eaif2Ag7Vzd8hJ9vG7q9DIL4WzDn",
                  source: "vector",
                  basePath: "https://api.tomtom.com/maps-sdk-js/4.47.6/examples/sdk",
                  center: Apartmet,
                  zoom: 15,
                  language: "it-IT"
              });
              var marker = tomtom.L.marker(Apartmet).addTo(map);
              marker.bindPopup('your company name, your company address').openPopup();
              marker.bindPopup("<b>" + name + "</b><br/>" + query);
      }
  });
}

$(document).ready(init);
