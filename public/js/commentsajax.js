$(document).ready(function() {
  $('.ajaxaddbtn').click(function(e) {
    e.preventDefault();
    //get closest li > next all find first form
    // $(this).hide();//if you need to hide button  which is clicked
    $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: $('.ajaxaddform').attr('action'),
    type: 'POST',
    dataType: 'JSON',
    success: function(response) {
      $('.comm_user').html(response.comm_user);
      $('.comm_user_img').attr('src', response.comm_user_img);
      $('.comm_created_at').html(response.comm_created_at);
      $('.comm_content').html(response.comm_content);
      $('.subcomm_user').html(response.subcomm_user);
      $('.subcomm_user_img').attr('src', response.subcomm_user_img);
      $('.subcomm_created_at').html(response.subcomm_created_at);
      $('.subcomm_content').html(response.subcomm_content);
    }
    });
    return false;
  });

});
