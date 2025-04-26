import $ from 'jquery';
import whatInput from 'what-input';

window.$ = $;

import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
//import './lib/foundation-explicit-pieces';
import './lib/swiper';
import './lib/loadmore';

$(function () {


  $(".sbi_imgLiquid_bgSize").imgLiquid({
    fill: false,
    horizontalAlign: "center",
    verticalAlign: "90%"
  });

});

$(document).foundation();
