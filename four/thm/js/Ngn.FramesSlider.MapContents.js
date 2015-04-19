Ngn.FramesSlider.MapContents = new Class({
  Extends: Ngn.FramesSlider,

  options: {
    map: {}
  },

  initialize: function(rootContainer, framesContainer, options) {
    this.parent(framesContainer, options);
    this.fx.addEvent('start', function() {
      c('MOVE TO: ' + this.frameN);
    }.bind(this));
  }

});