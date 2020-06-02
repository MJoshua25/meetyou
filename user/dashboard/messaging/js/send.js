$(document).ready(function() {

  $('.msg-send').submit(function(){

    var message = $('.msg').val();
    var id_receiver = $('.id_r').val();
    var id_discussion = $('.id_d').val();

    $.post('messaging/php/sendmessages.php',
    {message: message,id_receiver: id_receiver,id_discussion: id_discussion},
    function(data){
      $('.msg').val('');
    });

    return false;
  });
});
