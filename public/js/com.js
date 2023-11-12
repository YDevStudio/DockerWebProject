$(function(){
    var iduu=$('#ccc1').val();
    var idpp=$('#ccc2').val();
    $('#np').change(function(){
        var v=$(this).val();
        if(v <= 0 || v=='e')
            $(this).val(1);
    });
   $('#np2').click(function(){
       var npp=$('#np').val();
       
       
       $.ajax({
            url : "../../App/Phpscript/addItemDem.php",
            type: "POST",
            data : {
                idu : iduu,
                idp : idpp,
                np :  npp
            },
            success: function(){
                window.location.replace('commande.php');
            }
        }); 
    });
    $('#heart2').hover(function(){
        if($(this).hasClass('far')){
             $(this).removeClass('far');
             $(this).addClass('fas');
        }else{
            $(this).removeClass('fas');
            $(this).addClass('far');
        }
        
    },function(){
        if($(this).hasClass('far')){
             $(this).removeClass('far');
             $(this).addClass('fas');
            
        }else{
            $(this).removeClass('fas');
             $(this).addClass('far');
        }
    });
    $('#heart').hover(function(){
        if($(this).hasClass('far')){
             $(this).removeClass('far');
             $(this).addClass('fas');
        }else{
            $(this).removeClass('fas');
            $(this).addClass('far');
        }
        
    },function(){
        var h=$('#ccc3').val();
        if(h==1){
            $(this).removeClass('far');
            $(this).addClass('fas');
        }else{
            $(this).removeClass('fas');
            $(this).addClass('far');
        }
        
    });
    $('#heart').click(function(){
        var h=$('#ccc3').val();
        if(h==1){
            $.ajax({
            url : "../../App/Phpscript/deleteItemList.php",
            type: "POST",
            data : {
                idu : iduu,
                idp : idpp
            },
            success: function(){
                $('#ccc3').val(0);
                
            }
        });} 
        else 
            {
             $.ajax({
            url : "../../App/Phpscript/addItemInList.php",
            type: "POST",
            data : {
                idu : iduu,
                idp : idpp
            },
            success: function(){
                $('#ccc3').val(1);
              
            }
        });
            
             
        }
        /*if($(this).hasClass('far')){
            $.ajax({
            url : "../../App/Phpscript/deleteItemList.php",
            type: "POST",
            data : {
                idu : iduu,
                idp : idpp
            },
            success: function(){
                console.log('rm');
                $(this).removeClass('fas');
             $(this).addClass('far');
            }
        }); 
             
            
        }else{
             $.ajax({
            url : "../../App/Phpscript/addItemInList.php",
            type: "POST",
            data : {
                idu : iduu,
                idp : idpp
            },
            success: function(){
               $(this).removeClass('far');
             $(this).addClass('fas');
            }
        });
            
             
        }*/
    });
    
    

    
});
function A(id){
    B();
     
  $('#b'+id).css("display", "none");
  $('#r'+id).css("display", "");
  $('#bs'+id).css("display", "");
}
function B(){
    console.log('hi');
    $('[name="relp"]').css("display", "none");
    $('[name="bb2"]').css("display", "none");
    $('[name="bb1"]').css("display", ""); 
}