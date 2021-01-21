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
$(document).ready(function () {
  $('input[name=userimg]').change(function (event) {
    $('.userpanelform').submit();
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
$(document).ready(function(){
  $('.fas.fa-edit').click(function(e){
    e.preventDefault();
  $('.useredit, .fas.fa-times').show();
  $('.fas.fa-edit, .userdata').hide();
});
  $('.fas.fa-times').click(function(e){
    e.preventDefault();
  $('.useredit, .fas.fa-times').hide();
  $('.fas.fa-edit, .userdata').show();
});
});
$(document).ready(function () {
  $('#navbarDropdown').click(function () {

   $('.nav-link.dropdown-toggle').toggleClass('open');
 });
});
