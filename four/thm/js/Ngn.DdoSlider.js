Ngn.DdoSlider = new Class({
  Implements: Options,

  options: {
    firstPageElementNames: [],
    bothPagesElementNames: []
  },

  backBtn: null,

  initialize: function(framesSlider, options) {
    this.setOptions(options);
    this.framesSlider = framesSlider;
    document.getElement('.header').setStyle('width', this.framesSlider.frameWidth + 'px');
    //this.initMainMenu();
    this.initBackBtn();
    this.framesSlider.fx.addEvent('start', this.toggleBackBtn.bind(this));
    this.initDdoNavigation();
    this.framesSlider._setTargetHtml(0);
  },

  initMainMenu: function() {
    this.framesSlider.frames[0].getElements('a').each(function(el){
      el.addEvent('click', function(e) {
        e.preventDefault();
        this.framesSlider.next(this.toggleBackBtn.bind(this));
      }.bind(this));
    }.bind(this));
  },

  initBackBtn: function() {
    this.backBtn = new Element('div', {
      'class': 'hBackBtn'
    }).inject(document.getElement('.header .container')).addEvent('click', function() {
      this.framesSlider.prev();
    }.bind(this));
    this.toggleBackBtn();
  },

  toggleBackBtn: function() {
    this.backBtn.setStyle('visibility', this.framesSlider.frameN == 0 ? 'hidden' : 'visible');
  },

: [],

  initDdoNavigation: function() {
    var secondPages = {};
    this.framesSlider.pushFrame('');
    //this.framesSlider.next();
    document.getElements('.ddItems .item').each(function(eItem) {
      var id = eItem.get('data-id');
      eItem.addEvent('click', function() {
        var title = this.getTitle(eItem);
        this.framesSlider.setFrameHtml(1, '<div class="bookmarks">' + title + '</div><div class="cBodyPad">' + secondPages[id].get('html') + '</div>');
        this.framesSlider.next(this.toggleBackBtn.bind(this));
      }.bind(this));
      var pageContainer = new Element('div', {'class': 'pageContainer'});
      var els = eItem.getElements('.element');
      for (var i=0; i<els.length; i++) {
        if (this.isFirstPageElement(els[i])) continue;
        if (this.isBothPagesElement(els[i])) {
          els[i].clone().inject(pageContainer);
          //els[i].addClass('subscript');
          continue;
        }
        els[i].inject(pageContainer);
      }
      secondPages[id] = pageContainer;
    }.bind(this));
  },

  isFirstPageElement: function(el) {
    for (var j=0; j<this.options.firstPageElementNames.length; j++) {
      if (el.hasClass('f_' + this.options.firstPageElementNames[j])) return true;
    }
    return false;
  },

  isBothPagesElement: function(el) {
    for (var j=0; j<this.options.bothPagesElementNames.length; j++) {
      if (el.hasClass('f_' + this.options.bothPagesElementNames[j])) return true;
    }
    return false;
  }

  getTitle: function() {}

});
