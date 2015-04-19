Ngn.DdoTitleSlider = new Class({

  initialize: function(framesSlider) {
    // back button
    var backBtn = new Element('div', {
      'class': 'hBackBtn'
    }).inject(document.getElement('.header .container')).addEvent('click', function() {
      this.setStyle('visibility', 'hidden');
      framesSlider.prev(function() {
        framesSlider.popFrame();
      });
    });
    document.getElement('.header').setStyle('width', framesSlider.frameWidth + 'px');
    //backBtn.setStyle('visibility', 'hidden');
    // titles navigation
    var secondPages = {};
    document.getElements('.ddItems .item').each(function(eItem) {
      var id = eItem.get('data-id');
      eItem.addEvent('click', function() {
        backBtn.setStyle('visibility', 'visible');
        framesSlider.pushFrame(secondPages[id].get('html'));
        framesSlider.next();
      });
      var pageContainer = new Element('div', {'class': 'pageContainer'});
      var els = eItem.getElements('.element');
      for (var i=0; i<els.length; i++) {
        if (els[i].hasClass('f_title')) continue;
        els[i].inject(pageContainer);
      }
      secondPages[id] = pageContainer;
    });
  }
    
});
