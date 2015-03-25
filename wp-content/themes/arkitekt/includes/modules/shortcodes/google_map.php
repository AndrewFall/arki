
<div class="map mb30 mmb30">
	<div id="google_map"></div>
	<!-- map container -->
	<ul id="map_controls">
		<li><a id="zoom_in"><span class="icon-plus icon-white"></span></a></li>
		<li><a id="zoom_out"><span class="icon-minus icon-white"></span></a></li>
		<li><a id="reset"><span class="icon-refresh icon-white"></span></a></li>
	</ul>
</div>
<!-- End Map -->




    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/mapmarker.jquery.js" type="text/javascript"></script>
  <!-- END Google Maps code -->
  <script>
    /* ---------------------------------------------------------------------- */
  /*  Contact Map
  /* ---------------------------------------------------------------------- */
    jQuery(document).ready(function($) {
      var myMarkers = {
        "markers": [
          {
            "latitude": "45.109414",    // latitude
            "longitude":"7.641252",   // longitude
            "icon": "images/icon-pin.png" // Pin icon
          }
          /* 

          Add as plenty as you want:
          , {
            "latitude": "40.712785",
            "longitude":"-73.962708",
            "icon": "images/map_pin_1.png"
          }
          
          */
        ]
      };
      $("#google_map").mapmarker({
        zoom : 16,              // Zoom
        center: "45.109414,7.641252",   // Center of map
        type: "ROADMAP",          // Map Type
        controls: "HORIZONTAL_BAR",     // Controls style
        dragging:1,             // Allow dragging?
        mousewheel:0,           // Allow zooming with mousewheel
        markers: myMarkers,
        styling: 0,             // Bool - do you want to style the map?
        featureType:"all",
        visibility: "on",
        elementType:"geometry",
        hue:"#00AAFF",
        saturation:-100,
        lightness:0,
        gamma:1,
        navigation_control:0
        /*
        To play with the map colors and styles you can try this tool right here http://gmaps-samples-v3.googlecode.com/svn/trunk/styledmaps/wizard/index.html
        */
      });
      
    });
</script>