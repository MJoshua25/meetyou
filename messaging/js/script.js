$(document).ready(function() {

  $('.sender').submit(function(){

    var message = $('.mes').val();

    $.post('php/sendmessages.php',{message: message},function(data){
      $('.return').html(data).slideDown().delay(1000).slideUp();
      $('.mes').val('');
    });

    return false;
  });
});
