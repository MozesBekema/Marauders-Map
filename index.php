<?php
include('inc/locaties.php');

?>
    <!doctype html>
    <html>

    <head>
        <meta http-equiv="content-type" content="text/html">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="mdl/material.min.css">
        <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.brown-deep_orange.min.css" />
        <script src="mdl/material.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <title></title>
        <script src="js/artyom.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>

    <body>
        <div>
            <input type="button" onclick="startArtyom()" value="Start voice commands">
            <input type="button" onclick="stopArtyom()" value="Stop listening"> <span id="output"></span>

            <form id="formulier" action="" method="POST">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input type="text" id="txt_name" name="txt_name" class="mdl-textfield__input" required >
                    <label class="mdl-textfield__label" for="sample3">Text...</label>
                </div>
                <br/>
                <input type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="submit" value="submit" onclick="postname_location(), myclick()">
            </form>

            <button id="refresh">Refresh Map</button>
        </div>
        <script>
            $(document).ready(function(){

                startArtyom();

            });



            artyom.addCommands([
                {
                    description: "Artyom can talk too, lets say someting if we say hello"
                    , indexes: ["hello", ]
                    , action: function (i) {
                        if (i == 0) {
                            artyom.say("Welcome");
                            $("#marauder").fadeOut(2000);
                            initMap();
                        }
                    }
            }, {
                    indexes: ["goodbye"]
                    , action: function () {
                        artyom.say("See you next time")
                        $("#marauder").fadeIn(2000);
                    }
            }
        ]);
            artyom.redirectRecognizedTextOutput(function (text, isFinal) {
                var span = document.getElementById('output');
                if (isFinal) {
                    span.innerHTML = '';
                }
                else {
                    span.innerHTML = text;
                }
            });

            function startArtyom() {
                artyom.initialize({
                    lang: "en-GB"
                    , continuous: true
                    , debug: true
                    , listen: true
                });
            }

            function stopArtyom() {
                artyom.fatality();
            }
        </script>
        <div id="wrapper">
            <div id="marauder"></div>
            <div id="map"></div>
        </div>
        <script>
            // Note: This example requires that you consent to location sharing when
            // prompted by your browser. If you see the error "The Geolocation service
            // failed.", it means you probably did not give permission for the browser to
            // locate you.
            var lat;
            var lng;

            function postname_location() {
                var name = document.getElementById('txt_name').value;
                $.ajax({
                    type: "POST"
                    , url: "inc/locaties.php"
                    , data: 'x=' + lat + '&y=' + lng + '&name=' + name
                , });
            }

            function myclick() {
                $('#formulier').fadeOut(2000);
            }
            var customLabel = {
                restaurant: {
                    label: 'R'
                }
                , bar: {
                    label: 'B'
                }
            };

            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: -34.397
                        , lng: 150.644
                    }
                    , zoom: 15
                    , styles: [
                        {
                            "elementType": "geometry"
                            , "stylers": [
                                {
                                    "color": "#ebe3cd"
      }
    ]
  }
                    , {
                            "elementType": "labels.text.fill"
                            , "stylers": [
                                {
                                    "color": "#523735"
      }
    ]
  }
                    , {
                            "elementType": "labels.text.stroke"
                            , "stylers": [
                                {
                                    "color": "#f5f1e6"
      }
    ]
  }
                    , {
                            "featureType": "administrative"
                            , "elementType": "geometry.stroke"
                            , "stylers": [
                                {
                                    "color": "#c9b2a6"
      }
    ]
  }
                    , {
                            "featureType": "administrative.land_parcel"
                            , "elementType": "geometry.stroke"
                            , "stylers": [
                                {
                                    "color": "#dcd2be"
      }
    ]
  }
                    , {
                            "featureType": "administrative.land_parcel"
                            , "elementType": "labels.text.fill"
                            , "stylers": [
                                {
                                    "color": "#ae9e90"
      }
    ]
  }
                    , {
                            "featureType": "administrative.neighborhood"
                            , "stylers": [
                                {
                                    "visibility": "off"
      }
    ]
  }
                    , {
                            "featureType": "landscape.natural"
                            , "elementType": "geometry"
                            , "stylers": [
                                {
                                    "color": "#dfd2ae"
      }
    ]
  }
                    , {
                            "featureType": "poi"
                            , "elementType": "geometry"
                            , "stylers": [
                                {
                                    "color": "#dfd2ae"
      }
    ]
  }
                    , {
                            "featureType": "poi"
                            , "elementType": "labels.text"
                            , "stylers": [
                                {
                                    "visibility": "off"
      }
    ]
  }
                    , {
                            "featureType": "poi"
                            , "elementType": "labels.text.fill"
                            , "stylers": [
                                {
                                    "color": "#93817c"
      }
    ]
  }
                    , {
                            "featureType": "poi.park"
                            , "elementType": "geometry.fill"
                            , "stylers": [
                                {
                                    "color": "#a5b076"
      }
    ]
  }
                    , {
                            "featureType": "poi.park"
                            , "elementType": "labels.text.fill"
                            , "stylers": [
                                {
                                    "color": "#447530"
      }
    ]
  }
                    , {
                            "featureType": "road"
                            , "elementType": "geometry"
                            , "stylers": [
                                {
                                    "color": "#f5f1e6"
      }
    ]
  }
                    , {
                            "featureType": "road"
                            , "elementType": "labels"
                            , "stylers": [
                                {
                                    "visibility": "off"
      }
    ]
  }
                    , {
                            "featureType": "road.arterial"
                            , "elementType": "geometry"
                            , "stylers": [
                                {
                                    "color": "#fdfcf8"
      }
    ]
  }
                    , {
                            "featureType": "road.highway"
                            , "elementType": "geometry"
                            , "stylers": [
                                {
                                    "color": "#f8c967"
      }
    ]
  }
                    , {
                            "featureType": "road.highway"
                            , "elementType": "geometry.stroke"
                            , "stylers": [
                                {
                                    "color": "#e9bc62"
      }
    ]
  }
                    , {
                            "featureType": "road.highway.controlled_access"
                            , "elementType": "geometry"
                            , "stylers": [
                                {
                                    "color": "#e98d58"
      }
    ]
  }
                    , {
                            "featureType": "road.highway.controlled_access"
                            , "elementType": "geometry.stroke"
                            , "stylers": [
                                {
                                    "color": "#db8555"
      }
    ]
  }
                    , {
                            "featureType": "road.local"
                            , "elementType": "labels.text.fill"
                            , "stylers": [
                                {
                                    "color": "#806b63"
      }
    ]
  }
                    , {
                            "featureType": "transit.line"
                            , "elementType": "geometry"
                            , "stylers": [
                                {
                                    "color": "#dfd2ae"
      }
    ]
  }
                    , {
                            "featureType": "transit.line"
                            , "elementType": "labels.text.fill"
                            , "stylers": [
                                {
                                    "color": "#8f7d77"
      }
    ]
  }
                    , {
                            "featureType": "transit.line"
                            , "elementType": "labels.text.stroke"
                            , "stylers": [
                                {
                                    "color": "#ebe3cd"
      }
    ]
  }
                    , {
                            "featureType": "transit.station"
                            , "elementType": "geometry"
                            , "stylers": [
                                {
                                    "color": "#dfd2ae"
      }
    ]
  }
                    , {
                            "featureType": "water"
                            , "elementType": "geometry.fill"
                            , "stylers": [
                                {
                                    "color": "#b9d3c2"
      }
    ]
  }
                    , {
                            "featureType": "water"
                            , "elementType": "labels.text"
                            , "stylers": [
                                {
                                    "visibility": "off"
      }
    ]
  }
                    , {
                            "featureType": "water"
                            , "elementType": "labels.text.fill"
                            , "stylers": [
                                {
                                    "color": "#92998d"
      }
    ]
  }
]
                });
                var infoWindow = new google.maps.InfoWindow;
                // Change this depending on the name of your PHP or XML file
                downloadUrl('xml_output.php', function (data) {
                    var xml = data.responseXML;
                    var markers = xml.documentElement.getElementsByTagName('marker');
                    Array.prototype.forEach.call(markers, function (markerElem) {
                        var name = markerElem.getAttribute('name');
                        var address = markerElem.getAttribute('address');
                        var type = markerElem.getAttribute('type');
                        var point = new google.maps.LatLng(parseFloat(markerElem.getAttribute('lat')), parseFloat(markerElem.getAttribute('lng')));
                        var infowincontent = document.createElement('div');
                        var strong = document.createElement('strong');
                        strong.textContent = name
                        infowincontent.appendChild(strong);
                        infowincontent.appendChild(document.createElement('br'));
                        var text = document.createElement('text');
                        text.textContent = address
                        infowincontent.appendChild(text);
                        var icon = customLabel[type] || {};
                        var marker = new google.maps.Marker({
                            map: map
                            , position: point
                            , label: icon.label
                        });
                        marker.addListener('click', function () {
                            infoWindow.setContent(infowincontent);
                            infoWindow.open(map, marker);
                        });
                    });
                });

                function downloadUrl(url, callback) {
                    var request = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;
                    request.onreadystatechange = function () {
                        if (request.readyState == 4) {
                            request.onreadystatechange = doNothing;
                            callback(request, request.status);
                        }
                    };
                    request.open('GET', url, true);
                    request.send(null);
                }

                function doNothing() {}
                var infoWindow = new google.maps.InfoWindow({
                    map: map
                });
                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var pos = {
                            lat: position.coords.latitude
                            , lng: position.coords.longitude
                        };
                        infoWindow.setPosition(pos);
                        infoWindow.setContent('Location found.');
                        map.setCenter(pos);
                        lat = position.coords.latitude;
                        lng = position.coords.longitude;
                    }, function () {
                        handleLocationError(true, infoWindow, map.getCenter());
                    });
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }


                function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                    infoWindow.setPosition(pos);
                    infoWindow.setContent(browserHasGeolocation ? 'Error: The Geolocation service failed.' : 'Error: Your browser doesn\'t support geolocation.');
                }

            }



             $('#refresh').click(function(){

                initMap();

             });





        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3pDE1ovHFW6gUc3y_eXactwaFhEntIwk&callback=initMap">
        </script>
    </body>

    </html>
