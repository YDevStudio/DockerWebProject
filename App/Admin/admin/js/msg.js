function rmm(idf){
        $.ajax({
            url: "../ScriptPhpAdmin/rmMsg.php?idf=" +idf + "" ,
            type: "GET",
            success: function(r){

                $("#msg"+idf+"").fadeOut('slow');
            }
        });

  }