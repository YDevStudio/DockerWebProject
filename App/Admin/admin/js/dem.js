function deletedem(id){
        $.ajax({
            url: "../ScriptPhpAdmin/deletedem.php?id=" +id + "" ,
            type: "GET",
            success: function(){
                fad(id);
            }
        });

  }
function validdem(id){
        $.ajax({
            url: "../ScriptPhpAdmin/validDem.php?id=" +id + "" ,
            type: "GET",
            success: function(){
                fad(id);
            }
        });

  }
function compdem(id){
        $.ajax({
            url: "../ScriptPhpAdmin/complitedem.php?id=" +id + "" ,
            type: "GET",
            success: function(){
                fad(id);
            }
        });

  }
function fad(id){
    $("#th"+id).fadeOut("slow");
    $("#d"+id).fadeOut("slow");
}