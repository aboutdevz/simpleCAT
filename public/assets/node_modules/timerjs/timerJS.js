(function(root, factory, undefined) {

    // if AMD loaded
   if(typeof define == 'function' && define.amd) {
       define(factory);
   }
   else {

     var hasModule = (typeof module !== 'undefined' && module.exports); // true is we are in nodeJS env

     if (hasModule) { 
	     module.exports = factory();
     }
     else { // browser env
	     root.timerJS = factory();
      }

   }

})(this, function() {

   timerJS = function(callback, time) {
      var called = false;

      var func = function() {
        if(!called) {
          clearTimeout(timeout);
          called = true;
          callback.apply(this, arguments);
        }
      }

      var timeout = setTimeout(func, time);

      return func;

   }


   return timerJS;


});