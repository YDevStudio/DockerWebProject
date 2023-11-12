var vals=new Array(7);


$(function(){
    $('#btnV').click(function(){
        vals[0]=$("input[name=gender]:checked").val();
        vals[1]=$('#FnI').val();
        vals[2]=$('#LnI').val();
        vals[3]=$('#DI').val();
        vals[4]=$('#NtI').val();
        vals[5]=$('#AI').val();
        vals[6]=$('#CI').val();
        checkall();
	});
     $('#btnM').click(function(){
         $("#ge").prop('disabled', false);
         $("#ge2").prop('disabled', false);
         $("#FnI").prop('disabled', false);
         $("#LnI").prop('disabled', false);
         $("#DI").prop('disabled', false);
         $("#NtI").prop('disabled', false);
         $("#AI").prop('disabled', false);
         $("#CI").prop('disabled', false);
         $(this).css("display", "none");
         $('#btnV').prop('hidden', false);
	});
    

});

function checkall(){
    var b=true;
    
    vals[1]=f1(vals[1]).trim().replace(/\s/g, '');
    vals[2]=f1(vals[2]).trim().replace(/\s/g, '');
    vals[4]=f1(vals[4]);
    vals[5]=f1(vals[5]);
    if(vals[1]==''){
        $('#FnI').parent().css("color", "red");
        b=false;
    }
    if(vals[2]==''){
        $('#LnI').parent().css("color", "red");
        b=false;
    }
    if(vals[4]=='' || !validatetel(vals[4])){
        $('#NtI').parent().css("color", "red");
        b=false;
    }
    if(vals[5]==''){
        $('#AI').parent().css("color", "red");
        b=false;
        console.log('n');
    }
    
      if(vals[3]==''){
          
        $('#DI').parent().css("color", "red");
        b=false;
    }
    
    if(b)
        {
            $.ajax({
            url: "../../App/Phpscript/editUser.php",
            type: "POST",
            data : {
                id : $('#id').val(),
                fn : vals[1] ,
                ln : vals[2] ,
                gn : vals[0] ,
                tel : vals[4] ,
                ad : vals[5] ,
                ci : vals[6] ,
                bd : vals[3]
            },
            success: function(){
                $('#FnI').parent().css("color", "black");
                $('#LnI').parent().css("color", "black");
                $('#NtI').parent().css("color", "black");
                $('#AI').parent().css("color", "black");
                $('#DI').parent().css("color", "black");
               $("#ge").prop('disabled', true);
             $("#ge2").prop('disabled', true);
             $("#FnI").prop('disabled', true);
             $("#LnI").prop('disabled', true);
             $("#DI").prop('disabled', true);
             $("#NtI").prop('disabled', true);
             $("#AI").prop('disabled', true);
             $("#CI").prop('disabled', true);
             $('#btnM').css("display", "");
             $('#btnV').prop('hidden', true);
             
            }
        });
            
        }
}

function f1(str){
    var outString = str.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
    return outString;

}

////function pour vérifier tel
function validatetel(tel) 
    {
      var re = /^\d{10}$/;
      return re.test(tel);
    }

