Ngn.DdoTitleSlider = new Class({
  Implements: Options,

  options: {
    subscriptFields: []
  },

  backBtn: null,

  initialize: function(framesSlider, options) {
    this.setOptions(options);
    this.framesSlider = framesSlider;
    document.getElement('.header').setStyle('width', this.framesSlider.frameWidth + 'px');
    //this.initMainMenu();
    this.initBackBtn();
    this.toggleBackBtn();
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
  },

  toggleBackBtn: function() {
    this.backBtn.setStyle('visibility', this.framesSlider.frameN == 0 ? 'hidden' : 'visible');
  },

  initDdoNavigation: function() {
    var secondPages = {};
    this.framesSlider.pushFrame('');
    //this.framesSlider.next();
    document.getElements('.ddItems .item').each(function(eItem) {
      var id = eItem.get('data-id');
      eItem.addEvent('click', function() {
        var title = eItem.getElement('.f_title').get('text')
        this.framesSlider.setFrameHtml(1, '<div class="bookmarks">' + title + '</div><div class="cBodyPad">' + secondPages[id].get('html') + '</div>');
        this.framesSlider.next(this.toggleBackBtn.bind(this));
      }.bind(this));
      var pageContainer = new Element('div', {'class': 'pageContainer'});
      var els = eItem.getElements('.element');
      for (var i=0; i<els.length; i++) {
        if (els[i].hasClass('f_title')) continue;
        if (this.isSubscriptField(els[i])) {
          els[i].clone().inject(pageContainer);
          els[i].addClass('subscript');
          continue;
        }
        els[i].inject(pageContainer);
      }
      secondPages[id] = pageContainer;
    }.bind(this));
  },

  isSubscriptField: function(el) {
    for (var j=0; j<this.options.subscriptFields.length; j++) {
      if (el.hasClass('f_' + this.options.subscriptFields[j])) return true;
    }
    return false;
  }

});