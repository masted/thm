Ngn.DdoTitleSlider = new Class({

  backBtn: null,

  initialize: function(framesSlider) {
    this.framesSlider = framesSlider;
    document.getElement('.header').setStyle('width', this.framesSlider.frameWidth + 'px');
    this.initMainMenu();
    this.initBackBtn();
    this.toggleBackBtn();
    this.initDdoNavigation();
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
      // this.setStyle('visibility', 'hidden');
      this.framesSlider.prev(function() {
        // this.framesSlider.popFrame();
      }.bind(this));
    }.bind(this));
  },

  toggleBackBtn: function() {
    this.backBtn.setStyle('visibility', this.framesSlider.frameN == 0 ? 'hidden' : 'visible');
  },

  initDdoNavigation: function() {
    var secondPages = {};
    this.framesSlider.pushFrame('');
    document.getElements('.ddItems .item').each(function(eItem) {
      var id = eItem.get('data-id');
      eItem.addEvent('click', function() {
        this.framesSlider.frames[2].set('html', '<div class="cBodyPad">' + secondPages[id].get('html') + '</div>');
        this.framesSlider.next(this.toggleBackBtn.bind(this));
      }.bind(this));
      var pageContainer = new Element('div', {'class': 'pageContainer'});
      var els = eItem.getElements('.element');
      for (var i=0; i<els.length; i++) {
        if (els[i].hasClass('f_title')) continue;
        els[i].inject(pageContainer);
      }
      secondPages[id] = pageContainer;
    }.bind(this));
  }

});
