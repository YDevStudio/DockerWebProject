function deletedem(id){
        $.ajax({
            url: "../ScriptPhpAdmin/deleteFromHome.php",
            type: "POST",
            data : {
                idpp : id
            },
            success: function(){
                $('#div'+id).fadeOut('slow');
            }
        });

  }
