<!DOCTYPE html PUBLIC>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" type="image/png" href="images/chat.png" sizes="96x96">
    <title>Chat</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>
    <script type="text/javascript">
        // запрашивают у пользователя имя в всплывающем окне
        var name = prompt("Введите ник для чата:", "Гость");
        // имя по умолчанию 'Гость'
    	if (!name || name === ' ') {
    	   name = "Гость";	
    	}
    	// теги полос
    	name = name.replace(/(<([^>]+)>)/ig,"");
    	// показать имя на странице
    	$("#name-area").html("You are: <span>" + name + "</span>");
    	// старт чата
        var chat =  new Chat();
    	$(function() {
    		 chat.getState();
    		 // слеженеие за textarea для нажатий
             $("#sendie").keydown(function(event) {
                 var key = event.which;
                 // возвращение всех ключей
                 if (key >= 33) {
                     var maxLength = $(this).attr("maxlength");
                     var length = this.value.length;
                     // не разрешать новый контент если длина больше нормы
                     if (length >= maxLength) {
                         event.preventDefault();
                     }
                  }
    		 																																																});
    		 // следить по нажатиям клавиша на textarea
    		 $('#sendie').keyup(function(e) {	
    		 					 
    			  if (e.keyCode == 13) {
                    var text = $(this).val();
    				var maxLength = $(this).attr("maxlength");
                    var length = text.length;
                    // отправить
                    if (length <= maxLength + 1) {
                     
    			        chat.send(text, name);
    			        $(this).val("");
                    } else {
    					$(this).val(text.substring(0, maxLength));
    					
    				}
    			  }
                });
    	});
    </script>
</head>
<body onload="setInterval('chat.update()', 1000)">
    <div id="page-wrap">
        <h2>ЧАТ</h2>
        <p id="name-area"></p>
        <div id="chat-wrap"><div id="chat-area"></div></div>
        <form id="send-message-area">
            <p>Сообщение: </p>
            <textarea id="sendie" maxlength = '100' ></textarea>
        </form>
    </div>
</body>
</html>