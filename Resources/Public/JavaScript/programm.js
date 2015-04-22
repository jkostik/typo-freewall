var wall = new freewall("#freewall");
wall.reset({
    selector: '.cell',
    animate: true,
    cellW: 120,
    cellH: 120,
    onResize: function() {
        wall.refresh();
    }
});
wall.fitWidth();
// for scroll bar appear;
$(window).trigger("resize");

$('.free-wall').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
          enabled: true,
          navigateByImgClick: true,
          preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
          tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
          titleSrc: function(item) {
            return item.el.attr('title');
          }
        }
//        disableOn: function() {
//          if( $(window).width() > 992 ) {
//            return false;
//          }
//          return true;
//        }
      });