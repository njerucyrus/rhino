<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 01/06/2017
 * Time: 00:38
 */
?>
<script src="public/assets/js/vendor/respond.min.js"></script>
<script src="public/assets/js/vendor/placeholdem.min.js"></script>
<script src="public/assets/js/vendor/jquery-1.10.2.min.js"></script>
<script src="public/assets/js/vendor/bootstrap.min.js"></script>
<script src="public/assets/js/vendor/hoverIntent.js"></script>
<script src="public/assets/js/vendor/superfish.js"></script>
<script src="public/assets/js/vendor/jquery.actual.min.js"></script>
<script src="public/assets/js/vendor/jquery.elastislide.js"></script>
<script src="public/assets/js/vendor/jquery.flexslider-min.js"></script>
<script src="public/assets/js/vendor/jquery.prettyPhoto.js"></script>
<script src="public/assets/js/vendor/jquery.easing.1.3.js"></script>
<script src="public/assets/js/vendor/jquery.ui.totop.js"></script>
<script src="public/assets/js/vendor/jquery.isotope.min.js"></script>
<script src="public/assets/js/vendor/jquery.easypiechart.min.js"></script>
<script src='public/assets/js/vendor/jflickrfeed.min.js'></script>
<script src="public/assets/js/vendor/jquery.sticky.js"></script>
<script src='public/assets/js/vendor/owl.carousel.min.js'></script>
<script src='public/assets/js/vendor/jquery.nicescroll.min.js'></script>
<script src='public/assets/js/vendor/jquery.fractionslider.min.js'></script>
<script src='public/assets/js/vendor/jquery.scrollTo-min.js'></script>
<script src='public/assets/js/vendor/jquery.localscroll-min.js'></script>
<script src='public/assets/js/vendor/jquery.parallax-1.1.3.js'></script>
<script src='twitter/jquery.tweet.min.js'></script>
<script src="public/assets/js/plugins.js"></script>
<script src="public/assets/js/main.js"></script>

<!-- Map Scripts -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    var lat;
    var lng;
    var map;

    //type your address after "address="
    jQuery.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address=Northern Arizona 8088 E. State Highway 69&sensor=false', function(data) {
        lat = data.results[0].geometry.location.lat;
        lng = data.results[0].geometry.location.lng;
    }).complete(function(){
        dxmapLoadMap();
    });

    function attachSecretMessage(marker, message)
    {
        var infowindow = new google.maps.InfoWindow(
            { content: message
            });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map,marker);
        });
    }

    window.dxmapLoadMap = function()
    {
        var center = new google.maps.LatLng(lat, lng);
        var settings = {
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoom: 16,
            draggable: false,
            scrollwheel: false,
            center: center
        };
        map = new google.maps.Map(document.getElementById('map'), settings);

        var marker = new google.maps.Marker({
            position: center,
            title: 'Map title',
            map: map
        });
        marker.setTitle('Map title'.toString());
        //type your map title and description here
        attachSecretMessage(marker, '<h3>Map title</h3>Map HTML description');
    }
</script>
