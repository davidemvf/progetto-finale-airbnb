
require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});


function init() {
  navBar();
  writeMessage();
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


$(document).ready(init);
