// JavaScript Document
(function(c) {
    var a = [ "DOMMouseScroll", "mousewheel" ];
    c.event.special.mousewheel = {
        setup : function() {
            if (this.addEventListener) {
                for ( var d = a.length; d;) {
                    this.addEventListener(a[--d], b, false)
                }
            } else {
                this.onmousewheel = b
            }
        },
        teardown : function() {
            if (this.removeEventListener) {
                for ( var d = a.length; d;) {
                    this.removeEventListener(a[--d], b, false)
                }
            } else {
                this.onmousewheel = null
            }
        }
    };
    c.fn.extend({
        mousewheel : function(d) {
            return d ? this.bind("mousewheel", d) : this.trigger("mousewheel")
        },
        unmousewheel : function(d) {
            return this.unbind("mousewheel", d)
        }
    });
    function b(f) {
        var d = [].slice.call(arguments, 1), g = 0, e = true;
        if (f.wheelDelta) {
            g = f.wheelDelta / 120
        }
        if (f.detail) {
            g = -f.detail / 3
        }
        // I had to move the following two lines down, probably because of jQuery update
        f = c.event.fix(f || window.event);
        f.type = "mousewheel";
        f.pageX = f.originalEvent.pageX;
        f.pageY = f.originalEvent.pageY;
        d.unshift(f, g);
        return c.event.handle.apply(this, d)
    }
})(jQuery);