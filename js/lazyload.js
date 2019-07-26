import {
  ElementObserver, // Use this to observe when an element enters and exits the viewport
} from 'viewprt';

function lazyLoad() {
  var lazyload = function lazyload() {
    var imgs = document.querySelectorAll('img');
    imgs.forEach(function(image) {
      var elementObserver = ElementObserver(image, {
        onEnter: function onEnter(image, viewport) {
          var imgSrc = image.dataset.src;
          if (imgSrc) {
            image.src = imgSrc;
          }
        },
        // callback when the element enters the viewport
        offset: 100,
        // offset from the edges of the viewport in pixels
        once: true, // if true, observer is detroyed after first callback is triggered
      });
    });

    var client_logos = document.querySelectorAll('.client_logos_selector');
    client_logos.forEach(function(client_logos) {
      var elementObserver3 = ElementObserver(client_logos, {
        onEnter: function onEnter(client_logos, viewport) {
          const imgs = client_logos.querySelectorAll('img');
          imgs.forEach(img => {
            var imgSrc = img.dataset.src;
            if (imgSrc) {
              img.src = imgSrc;
            }
          });
        },
        // callback when the element enters the viewport
        offset: 100,
        // offset from the edges of the viewport in pixels
        once: true, // if true, observer is detroyed after first callback is triggered
      });
    });

    var imgbg = document.querySelectorAll('.background-image-holder');
    imgbg.forEach(function(imagebg) {
      var elementObserver2 = ElementObserver(imagebg, {
        onEnter: function onEnter(imagebg, viewport) {
          const img = imagebg.querySelector('img');
          var imgSrc = img.dataset.src;
          if (imgSrc) {
            imagebg.style.background = 'url("' + imgSrc + '")';
          }
          imagebg.style.opacity = 1;
        },
        // callback when the element enters the viewport
        offset: 100,
        // offset from the edges of the viewport in pixels
        once: true, // if true, observer is detroyed after first callback is triggered
      });
    });
  };

  lazyload();
}

export default lazyLoad;
