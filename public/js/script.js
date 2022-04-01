(function ($) {
  'use strict';


    var $fuel = $('#fuel'), $engine = $('#engine'), $battery = $('#battery');
    $fuel.change(function () {
        if ($fuel.val() == '0' || $fuel.val() == '1' || $fuel.val() == '2') {
            $battery.attr('disabled', 'disabled').val('');
            $engine.removeAttr('disabled');
        } else if ($fuel.val() == '5'){
            $engine.attr('disabled', 'disabled').val('');
            $battery.removeAttr('disabled');
        } else {
            $engine.prop("disabled", false);
            $battery.prop("disabled", false);
        }
    }).trigger('change');

    $('.fa-heart').click(function() {
        $(this).toggleClass('fas far');
    })



  // bottom to top
  $('#top').click(function () {
    $('html, body').animate({
      scrollTop: 0
    }, 'slow');
    return false;
  });
  // bottom to top


    $('.menuToggle').click(function(){
        var $this = $(this);
        $this.toggleClass('menuToggle--active');
        if($this.hasClass('menuToggle--active')){
            $this.html('Hide menu');
        }else{
            $this.html('Show menu');
        }
    });
    $('.filtersToggle').click(function(){
        var $this = $(this);
        $this.toggleClass('filtersToggle--active');
        if($this.hasClass('filtersToggle--active')){
            $this.html('Hide filters');
        }else{
            $this.html('Show filters');
        }
    });
})(jQuery);

