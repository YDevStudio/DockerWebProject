$(function(){
 

    
});

 function B(id){
  $("#c"+id).removeClass('far');
  $("#c"+id).addClass('fas');
     

}
function A(id){
  $("#c"+id).removeClass('fas');
  $("#c"+id).addClass('far');   
     
   
  }
function C(id){
    var idpp=$("#c"+id).parent().attr('id'); 
     
     $.ajax({
            url : "../../App/Phpscript/deleteItemList.php",
            type: "POST",
            data : {
                idu : $('#id').val(),
                idp :  idpp
            },
            success: function(){
                $('#d'+idpp).fadeOut('slow');
                $('#nt').html(parseInt($('#nt').html())-1);
            }
        });
    
}