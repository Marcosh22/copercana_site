window.onload = function () {

  let backtotop = document.querySelector('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop);
    document.addEventListener('scroll', toggleBacktotop);
  }

    $('.gallery__carousel').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 7,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow: '<button class="custom-slick-arrow custom-slick-arrow--prev" aria-label="Previous Slide" type="button"><svg style="transform: rotate(90deg);" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down fa-w-14" role="img" viewBox="0 0 448 512" width="60" height="37.5"><path fill="#B6B6B6" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"/></svg></button>',
        nextArrow: '<button class="custom-slick-arrow custom-slick-arrow--next" aria-label="Next Slide" type="button"><svg style="transform: rotate(-90deg);" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down fa-w-14" role="img" viewBox="0 0 448 512" width="60" height="37.5"><path fill="#B6B6B6" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"/></svg></button>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                  slidesToShow: 6,
                }
              },
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 5,
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 4,
              }
            },
            {
              breakpoint: 576,
              settings: {
                slidesToShow: 2,
              }
            }
          ]
    });

    let galleries = document.querySelectorAll('.light-gallery');

    if(galleries) galleries.forEach((el) => {
        let $lg = $(el);
        $lg.lightGallery({
            selector: '.slick-slide .gallery-item',
            mode: 'lg-fade',
            cssEasing: 'cubic-bezier(0.25, 0, 0.25, 1)',
            download: false,
            dynamic: false,
        });
    })

    $('.videos__carousel').slick({
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
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
            }
          },
          {
            breakpoint: 576,
            settings: {
              slidesToShow: 2,
            }
          }
        ]
   });

    $('.files__carousel').slick({
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      prevArrow: '<button class="custom-slick-arrow custom-slick-arrow--prev" aria-label="Previous Slide" type="button"><svg style="transform: rotate(90deg);" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down fa-w-14" role="img" viewBox="0 0 448 512" width="60" height="37.5"><path fill="#B6B6B6" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"/></svg></button>',
      nextArrow: '<button class="custom-slick-arrow custom-slick-arrow--next" aria-label="Next Slide" type="button"><svg style="transform: rotate(-90deg);" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down fa-w-14" role="img" viewBox="0 0 448 512" width="60" height="37.5"><path fill="#B6B6B6" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"/></svg></button>',
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 4,
          }
        },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 3,
            }
          },
          {
            breakpoint: 576,
            settings: {
              slidesToShow: 2,
            }
          }
        ]
  });

  let activeVideoIframe = document.getElementById('active-video-iframe');
  let activeVideoTitle = document.getElementById('active-video-title');
  let activeVideoSubtitle = document.getElementById('active-video-subtitle');

  let videos = document.querySelectorAll('.video-item');

  if(videos) videos.forEach((video) => {
    video.addEventListener('click', function(evt) {
      let href = video.getAttribute('data-href');
      let title = video.getAttribute('data-title');
      let subtitle = video.getAttribute('data-subtitle');

      activeVideoIframe.setAttribute('src', href);
      activeVideoTitle.innerText = title;
      activeVideoSubtitle.innerText = subtitle;
    })
  })
};

