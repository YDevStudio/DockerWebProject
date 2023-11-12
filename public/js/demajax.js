
$(function(){
 

    
});

function deleteItem(iduu,idpp){
     
     $.ajax({
            url : "../../App/Phpscript/deldemItem.php",
            type: "POST",
            data : {
                idu : iduu,
                idp :  idpp
            },
            success: function(){
                $('#btn'+idpp).fadeOut('slow');
                $('#in'+idpp).fadeOut('slow');
                $('#pn'+idpp).fadeOut('slow');
                
            }
        });
    
}