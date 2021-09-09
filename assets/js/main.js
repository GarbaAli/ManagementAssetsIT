$('.menu-svg-icon').click(function(e){
    $(".sidenav").addClass('open');
  });

  $('.close-outside').click(function(e){
    $(".sidenav").removeClass('open');
  });

  $(document).ready(function () {
    $('.navbar .dropdown').hover(function () {
      $(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
    }, function () {
      $(this).find('.dropdown-menu').first().stop(true, true).slideUp(105)
    });
  });