function show(){
		$.ajax({
			url:"showMsg.php",
            timeout: 10000,
			success:function(html){
				$('#messages').html(html);
			}, 
            error: function(){
                $('#messages').html('Could not retrieve messages');
            }
		});
}

$(function() {

	//Послать сообщение
	$('#btnSend').click(function(event){
		var msg = $('#txtMessage').val();
		if(msg.length > 0){
            $.ajax({
                    type:"POST",
                    url:"saveMessage.php",
                    timeout: 10000,
                    data: ({name:name, msg:msg}),
                    success:function(){
                        $('#txtMessage').val('');
                        show();
                    },
                    error: function() {
                        alert('Failed to send message!');
                    }

                });
        } else if(msg.length == 0){
            alert('You must write a message!');
        }
	});
	
});
 
show();
setInterval('show()', 1000);