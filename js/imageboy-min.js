var e, t;
(e = this),
  (t = function() {
    var e,
      t,
      o = ((function(e, t) {
        var o;
        ((o = t).imageboy = function() {
          document
            .querySelectorAll('.background-image-holder')
            .forEach(function(e) {
              var t = e.children[0].dataset.src;
              (e.style.backgroundPosition = 'initial'),
                (e.style.opacity = '1'),
                (e.dataset.src = t);
            });
        }),
          Object.defineProperty(o, '__esModule', { value: !0 });
      })((e = { exports: {} }), e.exports),
      e.exports);
    return (t = o) &&
      t.__esModule &&
      Object.prototype.hasOwnProperty.call(t, 'default')
      ? t.default
      : t;
  }),
  'object' == typeof exports && 'undefined' != typeof module
    ? (module.exports = t())
    : 'function' == typeof define && define.amd
    ? define(t)
    : ((e = e || self).imageboy_min = t());
