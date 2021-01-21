$(document).ready(function() {
        $('.slider').slick( {

                arrows: true,
                dots: true,
                infinite: false,
                speed: 300,
                slidesToShow: 2,
                slidesToScroll: 2,
                variableWidth: true,
                adaptiveHeight: false,
                autoplay: false,
                autoplayspeed: 5000,
                responsive: [ {

                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                }

                ]
            }

        );
    }

);
