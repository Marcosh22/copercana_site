function initialize(lat, long) {

    'use strict';

    let latlng = new google.maps.LatLng(lat, long);
    let myOptions = { zoom: 16, center: latlng, mapTypeId: google.maps.MapTypeId.ROADMAP, scrollwheel: false };
    let map = new google.maps.Map(document.getElementById("map"), myOptions);
    let m = new google.maps.Marker({ position: latlng, title: '', icon: '/_assets/images/maker.svg' });
    m.setMap(map);
    let oM = new google.maps.StyledMapType([{ featureType: 'all', stylers: [{ saturation: -1 }] }, { featureType: "road.arterial", elementType: "geometry", stylers: [{ hue: "#f8f5c0" }, { saturation: 500 }, { lightness: -30 }, { gamma: 1.50 }] }], { name: "" });
    map.mapTypes.set('s', oM);
    map.setMapTypeId('s');

};

window.onload = function () {

    let map = document.getElementById("map");
    let lat_input = document.getElementById("lat");
    let long_input = document.getElementById("long");
    let lat;
    let long;

    if (lat_input) lat = lat_input.value;
    if (long_input) long = long_input.value;

    if (map && lat && long) {
        initialize(lat, long)
    }

    $('.gallery__carousel').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow: '<button class="custom-slick-arrow custom-slick-arrow--prev" aria-label="Previous Slide" type="button"><svg style="transform: rotate(90deg);" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down fa-w-14" role="img" viewBox="0 0 448 512" width="60" height="37.5"><path fill="#B6B6B6" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"/></svg></button>',
        nextArrow: '<button class="custom-slick-arrow custom-slick-arrow--next" aria-label="Next Slide" type="button"><svg style="transform: rotate(-90deg);" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down fa-w-14" role="img" viewBox="0 0 448 512" width="60" height="37.5"><path fill="#B6B6B6" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"/></svg></button>',
        responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 3,
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 2,
              }
            },
            {
              breakpoint: 576,
              settings: {
                slidesToShow: 1,
              }
            }
          ]
    });

    let galleries = document.querySelectorAll('.light-gallery');

    if(galleries) galleries.forEach((el) => {
        //lightGallery(el, {thumbnail: true});

        let $lg = $(el);
        $lg.lightGallery({
            mode: 'lg-fade',
            cssEasing: 'cubic-bezier(0.25, 0, 0.25, 1)',
            download: false,
            dynamic: false,
            dynamicEl: [{
                src: 'img/1.jpg',
                thumb: 'img/thumb-1.jpg',
            },]
        });
    })

    let go_btn = document.getElementById("go");

    if(go_btn) go_btn.addEventListener('click', function () {
        let origin_input = document.getElementById('origin_');
        let origin;

        if(origin_input) origin = origin_input.value;

        if (origin && origin.replace(/ {1}/gi, "").length > 0) {
            direction(origin)
        }
    });
};

function direction(o) {

    let geocoder;
    let map;
    let marker;
    let latlng = "";
    let myOptions = {
        zoom: 9,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.TERRAIN,
        scrollwheel: false
    };

    map = new google.maps.Map(document.getElementById("map"), myOptions);
    let rendererOptions = {
        map: map
    };

    directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);

    let wps = [];

    let org = o;
    let dest = "Rua Dr. Pio Dufles, 510 Sertãozinho/SP ";

    let address_input = document.getElementById("address_input");
    if (address_input) dest = address_input.value;

    console.log(dest);

    let request = {
        origin: org,
        destination: dest,
        waypoints: wps,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
    };
    directionsService = new google.maps.DirectionsService();
    
    directionsService.route(request, function (response, status) {
        console.log(response);
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        } else {
            alert("Verifique o endereço e tente novamente");
            direction(dest);
        }

    });

};