function lazyLoad() {
  (function(factory) {
    typeof define === 'function' && define.amd ? define(factory) : factory();
  })(function() {
    'use strict';

    function Viewport(t, e) {
      var i = this;
      (this.container = t),
        (this.observers = []),
        (this.lastX = 0),
        (this.lastY = 0);

      var o = !1,
        n = function n() {
          o ||
            ((o = !0),
            requestAnimationFrame(function() {
              for (var t = i.observers, e = i.getState(), n = t.length; n--; ) {
                t[n].check(e);
              }

              (i.lastX = e.positionX), (i.lastY = e.positionY), (o = !1);
            }));
        },
        r = e.handleScrollResize,
        s = (this.handler = r ? r(n) : n);

      addEventListener('scroll', s, !0),
        addEventListener('resize', s, !0),
        addEventListener('DOMContentLoaded', function() {
          (i.mutationObserver = new MutationObserver(n)).observe(document, {
            attributes: !0,
            childList: !0,
            subtree: !0,
          });
        });
    }

    function Observer(t) {
      return (
        (this.offset = ~~t.offset || 0),
        (this.container = t.container || document.body),
        (this.once = Boolean(t.once)),
        (this.observerCollection =
          t.observerCollection || defaultObserverCollection),
        this.activate()
      );
    }

    function ObserverCollection(t) {
      for (var e = arguments.length, i = Array(e); e--; ) {
        i[e] = arguments[e];
      }

      if ((void 0 === t && (t = {}), !(this instanceof ObserverCollection)))
        return new (Function.prototype.bind.apply(
          ObserverCollection,
          [null].concat(i),
        ))();
      (this.viewports = new Map()),
        (this.handleScrollResize = t.handleScrollResize);
    }

    (Viewport.prototype = {
      getState: function getState() {
        var t,
          e,
          i,
          o,
          n = this.container,
          r = this.lastX,
          s = this.lastY;
        return (
          n === document.body
            ? ((t = window.innerWidth),
              (e = window.innerHeight),
              (i = window.pageXOffset),
              (o = window.pageYOffset))
            : ((t = n.offsetWidth),
              (e = n.offsetHeight),
              (i = n.scrollLeft),
              (o = n.scrollTop)),
          {
            width: t,
            height: e,
            positionX: i,
            positionY: o,
            directionX: r < i ? 'right' : r > i ? 'left' : 'none',
            directionY: s < o ? 'down' : s > o ? 'up' : 'none',
          }
        );
      },
      destroy: function destroy() {
        var t = this.handler,
          e = this.mutationObserver;
        removeEventListener('scroll', t),
          removeEventListener('resize', t),
          e && e.disconnect();
      },
    }),
      (Observer.prototype = {
        activate: function activate() {
          var t = this.container,
            e = this.observerCollection,
            i = e.viewports,
            o = i.get(t);
          o || ((o = new Viewport(t, e)), i.set(t, o));
          var n = o.observers;
          return n.indexOf(this) < 0 && n.push(this), o;
        },
        destroy: function destroy() {
          var t = this.container,
            e = this.observerCollection.viewports,
            i = e.get(t);

          if (i) {
            var o = i.observers,
              n = o.indexOf(this);
            n > -1 && o.splice(n, 1), o.length || (i.destroy(), e.delete(t));
          }
        },
      });
    var defaultObserverCollection = new ObserverCollection();

    function PositionObserver(t) {
      for (var e = arguments.length, i = Array(e); e--; ) {
        i[e] = arguments[e];
      }

      if ((void 0 === t && (t = {}), !(this instanceof PositionObserver)))
        return new (Function.prototype.bind.apply(
          PositionObserver,
          [null].concat(i),
        ))();
      (this.onTop = t.onTop),
        (this.onBottom = t.onBottom),
        (this.onLeft = t.onLeft),
        (this.onRight = t.onRight),
        (this.onMaximized = t.onMaximized),
        (this._wasTop = !0),
        (this._wasBottom = !1),
        (this._wasLeft = !0),
        (this._wasRight = !1);
      var o = Observer.call(this, t);
      this.check(o.getState());
    }

    function ElementObserver(t, e) {
      for (var i = arguments.length, o = Array(i); i--; ) {
        o[i] = arguments[i];
      }

      if ((void 0 === e && (e = {}), !(this instanceof ElementObserver)))
        return new (Function.prototype.bind.apply(
          ElementObserver,
          [null].concat(o),
        ))();
      (this.element = t),
        (this.onEnter = e.onEnter),
        (this.onExit = e.onExit),
        (this._didEnter = !1);
      var n = Observer.call(this, e);
      isElementInDOM(t) && this.check(n.getState());
    }

    function isElementInViewport(t, e, i, o) {
      var n,
        r,
        s,
        h,
        l = t.getBoundingClientRect();
      if (!l.width || !l.height) return !1;
      var a = window.innerWidth,
        c = window.innerHeight,
        v = a;
      if (o === document.body) (n = c), (r = 0), (s = v), (h = 0);
      else {
        if (!(l.top < c && l.bottom > 0 && l.left < v && l.right > 0))
          return !1;
        var d = o.getBoundingClientRect();
        (n = d.bottom), (r = d.top), (s = d.right), (h = d.left);
      }
      return (
        l.top < n + e && l.bottom > r - e && l.left < s + e && l.right > h - e
      );
    }

    function isElementInDOM(t) {
      return t && t.parentNode;
    }

    (PositionObserver.prototype = Object.create(Observer.prototype)),
      (PositionObserver.prototype.constructor = PositionObserver),
      (PositionObserver.prototype.check = function(t) {
        var e = this,
          i = e.onTop,
          o = e.onBottom,
          n = e.onLeft,
          r = e.onRight,
          s = e.onMaximized,
          h = e._wasTop,
          l = e._wasBottom,
          a = e._wasLeft,
          c = e._wasRight,
          v = e.container,
          d = e.offset,
          p = e.once,
          f = v.scrollHeight,
          b = v.scrollWidth,
          u = t.width,
          w = t.height,
          O = t.positionX,
          m = t.positionY,
          g = m - d <= 0,
          y = f > w && w + m + d >= f,
          E = O - d <= 0,
          _ = b > u && u + O + d >= b,
          C = !1;

        o && !l && y
          ? o.call(this, v, t)
          : i && !h && g
          ? i.call(this, v, t)
          : r && !c && _
          ? r.call(this, v, t)
          : n && !a && E
          ? n.call(this, v, t)
          : s && f === w
          ? s.call(this, v, t)
          : (C = !0),
          p && !C && this.destroy(),
          (this._wasTop = g),
          (this._wasBottom = y),
          (this._wasLeft = E),
          (this._wasRight = _);
      }),
      (ElementObserver.prototype = Object.create(Observer.prototype)),
      (ElementObserver.prototype.constructor = ElementObserver),
      (ElementObserver.prototype.check = function(t) {
        var e = this.container,
          i = this.onEnter,
          o = this.onExit,
          n = this.element,
          r = this.offset,
          s = this.once,
          h = this._didEnter;
        if (!isElementInDOM(n)) return this.destroy();
        var l = isElementInViewport(n, r, t, e);
        !h && l
          ? ((this._didEnter = !0),
            i && (i.call(this, n, t), s && this.destroy()))
          : h &&
            !l &&
            ((this._didEnter = !1),
            o && (o.call(this, n, t), s && this.destroy()));
      });

    var lazyload = function lazyload() {
      var imgs = document.querySelectorAll('img');
      imgs.forEach(function(image) {
        var elementObserver = ElementObserver(image, {
          onEnter: function onEnter(image, viewport) {
            var imgSrc = image.dataset.src;
            if (imgSrc) {
              image.src = imgSrc;
            }
          },
          // callback when the element enters the viewport
          offset: 100,
          // offset from the edges of the viewport in pixels
          once: true, // if true, observer is detroyed after first callback is triggered
        });
      });
      var imgbg = document.querySelectorAll('.background-image-holder');
      imgbg.forEach(function(imagebg) {
        var elementObserver2 = ElementObserver(imagebg, {
          onEnter: function onEnter(imagebg, viewport) {
            const img = imagebg.querySelector('img');
            var imgSrc = img.dataset.src;
            if (imgSrc) {
              imagebg.style.background = 'url("' + imgSrc + '")';
            }
            imagebg.style.opacity = 1;
          },
          // callback when the element enters the viewport
          offset: 100,
          // offset from the edges of the viewport in pixels
          once: true, // if true, observer is detroyed after first callback is triggered
        });
      });
    };

    lazyload();
  });
}

export default lazyLoad;
