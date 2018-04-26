'use strict';

class CreateSvgUrl {

  static getSVGUrl(selector) {
    try {
      var svg = document.querySelector(selector);
      var svgData = new XMLSerializer().serializeToString(svg);
      var blob = new Blob([svgData], {type: 'image/svg+xml'});
      return URL.createObjectURL(blob);
    }
    catch(e) {
      return null;
    }
  }
}

export default CreateSvgUrl;