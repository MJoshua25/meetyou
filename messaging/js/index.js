function getMessages() {
    $.post('php/getmessages.php', function(data) {
        $('.messages').html(data);
    });
  }

setInterval("getMessages()", 100);
