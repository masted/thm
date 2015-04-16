Ngn.PageSlider = new Class({
  Implements: [Options, Events],
  options: {
    frames: '.frame',
    startFrame: 0,
    transition: Fx.Transitions.Linear,
    duration: 700
  },
  initialize: function(options) {
    this.setOptions(options);
    this.parent = document.getElement('.frames');
    this.xxx = this.parent.getSize().x;
    this.setFrameSize();
    this.slider = new Element('div', {
      id: 'Slider',
      styles: {
        width: '100%',
        height: '100%',
        overflow: 'hidden'
      }
    }).inject(document.body);
    this.frameContainer = new Element('div', {
      id: 'frameContainer',
      styles: {
        width: $$(this.options.frames).length * this.xxx
      }
    }).inject(this.slider).adopt($$(this.options.frames));
    this.status = 0;
    this.fx = new Fx.Tween(this.frameContainer, {
      property: 'margin-left',
      duration: this.options.duration,
      transition: this.options.transition,
      link: 'ignore',
      onStart: (function(){this.status=1;}).bind(this),
      onComplete: (function(){this.status=0;}).bind(this)
    });
    this.parent.onresize = this.updateframeContainer.bind(this);
  },
  setFrameSize: function() {
    console.trace();
    var winSize = this.parent.getSize();
    console.log(winSize);
    $$(this.options.frames).each(function(i) {
      this.setOverflow(i);
      i.setStyles({width: winSize.x, height: winSize.y});
    }, this);
    return winSize.x;
  },
  showPrev: function() {
    if (Math.abs(this.getCurrPos().toInt()) == 0) {
      this.options.startFrame = 0;
    } else {
      if (this.status == 0) {
        this.fx.start(this.getCurrPos(), (parseInt(this.getCurrPos()) + parseInt(this.setFrameSize())) );
        this.options.startFrame = this.options.startFrame - 1;
      }
    }
  },
  showNext: function() {
    if ((this.frameContainer.getStyle('width').toInt() - this.setFrameSize()) <= Math.abs(this.getCurrPos().toInt())) {
      this.options.startFrame = 4;
    } else {
      if (this.status == 0) {
        this.options.startFrame = this.options.startFrame + 1;
        this.fx.start(this.getCurrPos(), (parseInt(this.getCurrPos()) - parseInt(this.setFrameSize())));
      }
    }
  },
  getCurrPos: function() {
    return (this.frameContainer.getStyle('margin-left'));
  },
  jumpToFrame: function(p) {
   this.setFrameSize();
   this.frameContainer.setStyle('margin-left', -(p*this.setFrameSize()));
  },
  goToFrame: function(i) {
    if (this.status == 1) {
    } else {
      if (i < this.options.startFrame) {
        var x = this.options.startFrame - i;
        this.fx.start(this.getCurrPos(), (parseInt(this.getCurrPos()) + (x*parseInt(this.setFrameSize()))) );
        this.options.startFrame = i;
      } else if (this.options.startFrame < i) {
        var x = i - this.options.startFrame;
        this.fx.start(this.getCurrPos(), (parseInt(this.getCurrPos()) - (x*parseInt(this.setFrameSize()))) );
        this.options.startFrame = i;
      }
    }
  },
  setOverflow: function(elem) {
    if (this.parent.getSize()['y'] < elem.getSize()['y']) elem.setStyle('overflow-y', 'scroll');
  },
  updateframeContainer: function() {
    this.jumpToFrame(this.options.startFrame);
    $$(this.options.frames).each(function(i) {
      this.setOverflow(i);
    }, this);
    this.frameContainer.setStyles({width: ($$(this.options.frames).length * this.setFrameSize())});
  }
});
