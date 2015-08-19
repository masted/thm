Ngn.FramesSlider.MapContents = new Class({
  Extends: Ngn.FramesSlider,

  options: {
    map: {} // хэш, где ключ - это селектор контейнера с HTML-кодом, а значение - селектор контейнера, для размещения в нём этого HTML-кода
  },

  initialize: function(rootContainer, framesContainer, options) {
    this.parent(framesContainer, options);
    this.rootContainer = rootContainer;
    this.fx.addEvent('start', function() {
      this.setTargetHtml();
    }.bind(this));
  },

  sourceStorage: {},

  _getSourceHtml: function(frameN, sourceSelector, force) {
    var id = frameN + sourceSelector;
    if (!force && this.sourceStorage[id] !== undefined) {
      return this.sourceStorage[id];
    }
    var el = this.frames[frameN].getElement(sourceSelector);
    if (!el) {
      return this.sourceStorage[id] = false;
    }
    this.sourceStorage[id] = el.get('html');
    el.dispose();
    return this.sourceStorage[id];
  },

  getSourceHtml: function(sourceSelector) {
    return this._getSourceHtml(this.frameN, sourceSelector, false);
  },

  setTargetHtml: function() {
    for (var selector in this.options.map) {
      this.__setTargetHtml(
        this.rootContainer.getElement(this.options.map[selector]),
        this.getSourceHtml(selector)
      );
    }
  },

  _setTargetHtml: function(frameN) {
    for (var selector in this.options.map) {
      this.__setTargetHtml(
        this.rootContainer.getElement(this.options.map[selector]),
        this._getSourceHtml(frameN, selector, true)
      );
    }
  },

  __setTargetHtml: function(target, html) {
    target.set('html', html === false ? '' : html);
  },

  setFrameHtml: function(frameN, html) {
    this.frames[frameN].set('html', html);
    this._setTargetHtml(frameN);
  }

});
