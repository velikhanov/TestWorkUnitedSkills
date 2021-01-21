$(document).ready(function () {
  $('#logout-link').click(function (event) {
    $('#logout-form').submit();
    event.preventDefault();
  });
});
$(document).ready(function () {
  $('.deletecommbtn').click(function (event) {
    $('.deletecommform').submit();
    event.preventDefault();
  });
});
$(document).ready(function () {
  $('.deletesubcommbtn').click(function (event) {
    $('.deletesubcommform').submit();
    event.preventDefault();
  });
});
$(document).ready(function() {
  $('.addsubcomment').click(function(e) {
    e.preventDefault();
    //get closest li > next all find first form
    $(this).closest('li').find('.hideform').addClass('customflex').removeClass('hideform');
    $(this).hide();//if you need to hide button  which is clicked
  });
});
$(document).ready(function() {
  $('.editcomment').click(function(e) {
    e.preventDefault();
    //get closest li > next all find first form
    $(this).closest('li').find('.mainpostcommnets').hide();
    $(this).closest('li').find('.editcommentblock').removeClass('hideclass');
    // $(this).hide();//if you need to hide button  which is clicked
  });
  $('.fas.fa-times').click(function(e) {
    e.preventDefault();
    //get closest li > next all find first form
    $(this).closest('li').find('.mainpostcommnets').show();
    $(this).closest('li').find('.editcommentblock').addClass('hideclass');
    // $(this).hide();//if you need to hide button  which is clicked
  });
});
$(document).ready(function() {
  $('.editsubcomment').click(function(e) {
    e.preventDefault();
    //get closest li > next all find first form
    $(this).closest('li').find('.mainpostsubcommnets').hide();
    $(this).closest('li').find('.editsubcommentblock').removeClass('hideclass');
    // $(this).hide();//if you need to hide button  which is clicked
  });
  $('.fas.fa-times').click(function(e) {
    e.preventDefault();
    //get closest li > next all find first form
    $(this).closest('li').find('.mainpostsubcommnets').show();
    $(this).closest('li').find('.editsubcommentblock').addClass('hideclass');
    // $(this).hide();//if you need to hide button  which is clicked
  });
});
// $(document).ready(function(){
//   $('.deletecommbtn').click(function(e){
// 		let anchor = $('input[name=anchor]');
// 		$('html, body').stop().animate({
//     			scrollTop: $(anchor.attr('href')).offset().top
// 		}, 777);
// 		e.preventDefault();
// 		return false;
// });
// });
