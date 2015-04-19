Ngn.FramesSlider = new Class({
  Implements: [Options, Events],
  options: {
    frameCssClass: 'frame',
    frameWidth: null,
    transition: Fx.Transitions.Linear,
    duration: 300
  },
  oneTimeCompleteAction: false,
  initialize: function(container, options) {
    this.setOptions(options);
    this.container = container;
    this.frameWidth = this.options.frameWidth || this.container.getSize().x;
    this.frames = this.container.getElements('.' + this.options.frameCssClass);
    c(this.container);
    c(this.frames);
    this.eFrames = new Element('div', {'class': 'frames'}).
      inject(this.container).
      adopt(this.frames);
    this.initFramesWidth();
    //this.container.setStyle('width', this.frameWidth + 'px');
    //this.container.setStyle('overflow', 'hidden');
    this.status = 0;
    this.fx = new Fx.Tween(this.eFrames, {
      property: 'margin-left',
      duration: this.options.duration,
      transition: this.options.transition,
      link: 'ignore',
      onStart: (function() {
        this.status = 1;
      }).bind(this),
      onComplete: (function() {
        this.status = 0;
        if (this.oneTimeCompleteAction) {
          this.oneTimeCompleteAction();
          this.oneTimeCompleteAction = false;
        }
      }).bind(this)
    });
  },
  initFramesWidth: function(offset) {
    this.eFrames.setStyle('width', this.framesWidth(offset) + 'px');
    for (var i=0; i<this.frames.length; i++) {
      this.frames[i].setStyle('width', this.frameWidth + 'px');
    }
  },
  framesWidth: function(offset) {
    if (!offset) offset = 0;
    return this.frameWidth * (this.frames.length + offset);
  },
  // move logic
  getCurrPos: function() {
    return parseInt(this.eFrames.getStyle('margin-left'));
  },
  next: function() {
    if (this.status) return;
    this.fx.start(this.getCurrPos(), this.getCurrPos() - this.frameWidth);
  },
  prev: function(onComplete) {
    if (this.status) return;
    this.oneTimeCompleteAction = onComplete;
    this.fx.start(this.getCurrPos(), this.getCurrPos() + this.frameWidth);
  },
  // frames manager
  pushFrame: function(html) {
    this.initFramesWidth(1);
    this.frames.push(new Element('div', {
      'class': this.options.frameCssClass,
      html: html,
      styles: {
        width: this.frameWidth
      }
    }).inject(this.eFrames));
  },
  popFrame: function() {
    this.frames[this.frames.length-1].dispose();
    this.frames.pop();
    this.initFramesWidth();
  },

});
