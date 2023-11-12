function YesOrNo(id){
        $.ajax({
            url: "../ScriptPhpAdmin/switchInS.php?id=" +id + "" ,
            type: "GET",
            success: function(){
                switchof(id);
            }
        });

  }

function switchof(id){
    if($('#'+id).val() == "Oui"){
        $('#'+id).removeClass();
        $('#'+id).addClass("btn btn-danger");
        $('#'+id).val("Non");

    }else{
        $('#'+id).removeClass();
        $('#'+id).addClass("btn btn-success");
        $('#'+id).val("Oui");
    }
}