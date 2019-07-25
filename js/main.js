import AOS from 'aos';
import flickity from 'flickity';
import { imageboy } from '@nmacarthur/imageboy';
import parallax from './parallax';
import HomeIntro from './homeIntro';
import Swiper from 'swiper';
import lazyLoad from './lazyload';
import SmoothScroll from 'smooth-scroll';
import spectragram from 'spectragram';

imageboy();
parallax();
AOS.init();
lazyLoad();

HomeIntro();

import '../src/theme.css';

if (document.querySelector('.blog-carousel')) {
  var mySwiper = new Swiper('.blog-carousel', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,

    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
      nextEl: '.next',
      prevEl: '.prev',
    },
  });
}

if (document.querySelector('.gallery')) {
  var mySwiper = new Swiper('.gallery', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,

    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
      nextEl: '.next',
      prevEl: '.prev',
    },
  });
}

(function($) {
  $('.btn--search a').click(function() {
    $('.search-form').toggleClass('is-open');
  });
})(jQuery);

(function($) {
  $('.search-close').click(function() {
    $('.search-form').removeClass('is-open');
  });
})(jQuery);
