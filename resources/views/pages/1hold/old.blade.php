<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<!-- select2 css -->
<link href='EasyAutocomplete/easy-autocomplete.min.css' rel='stylesheet' type='text/css'>

<!-- select2 script -->
<script src='EasyAutocomplete/jquery.easy-autocomplete.min.js'></script>

<style>
.eac-icon-right .eac-item img {
 top: auto;
}
</style>
<script>
$(document).ready(function(){
 var options = {
  data: [ {name: "Facebook", icon: "img/pic6.jpg"},
      {name: "Twitter", icon: "img/pic6.jpg"},
      {name: "Linkedin", icon: "images/linkedin.png"},
      {name: "Google Plus", icon: "images/google_plus.png"},
      {name: "Vimeo", icon: "images/vimeo.png"}],
  getValue: 'name',
  template: {
   type: "iconLeft",
   fields: {
    iconSrc: "icon"
   }
  }
 };

 $("#social").easyAutocomplete(options);
});

</script>

<input type='text' id='social'>