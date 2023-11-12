var b=[0, 0,  0, 0, 0 , 0 , 0, 0,0];

$(window).bind("pageshow", function() {
    var form = $('form'); 
    // let the browser natively reset defaults
    form[0].reset();
});
$(function(){
  
	$('#FnI').focusout(function(){
		var v=$(this).val();
        var divx='#FnD';
		if(v == ''){
		$(divx).removeClass("validDiv");
		$(divx).addClass("notValidDiv");
		b[0]=0;
		checkall();
	}
		else{
			 $(divx).removeClass("notValidDiv");
			 $(divx).addClass("validDiv");
			
			b[0]=1;
			checkall();
			} 	
	});
    
		$('#LnI').focusout(function(){
		var v=$(this).val();
         var divx='#LnD';
		if(v == ''){
		 $(divx).removeClass("validDiv");
		$(divx).addClass("notValidDiv");
		
		b[1]=0;
		checkall();
	}
		else{
			 $(divx).removeClass("notValidDiv");
			 $(divx).addClass("validDiv");
			
			b[1]=1;
			checkall();
			} 	
	});

$('#DI').focusout(function(){
		var v=$(this).val();
        var divx='#DD';
		if ( v == ''){
         $(divx).removeClass("validDiv");
		 $(divx).addClass("notValidDiv");
		
		b[2]=0;
		checkall();
	}
		else{
			 $(divx).removeClass("notValidDiv");
			 $(divx).addClass("validDiv");
			
			b[2]=1;
			checkall();
			} 	
	});
    
    
    	$('#NtI').focusout(function(){
		var v=$(this).val();
        var divx='#NtD';
		if(v == ''){
            $(divx).removeClass("validDiv");
            $(divx).addClass("notValidDiv");
            $(divx).addClass("validDiv");
		    b[3]=0;
		    checkall();
        } else{
               if (!validatetel(v)){
                   $(divx).removeClass("validDiv");
                   $(divx).addClass("notValidDiv");
                   spanE('NtS',"entre un nemuro valid",'notValidSpan');
                   b[3]=0;
                   checkall();
               }
                else{
                    $(divx).removeClass("notValidDiv");
                    $(divx).addClass("validDiv");
                    spanE('NtS');
                    b[3]=1;
                    checkall();
                    }
        }
		
	});
    $('#EI').focusout(function(){
		var v=$(this).val();
        var divx='#ED';
		if(v == ''){
            $(divx).removeClass("validDiv");
            $(divx).addClass("notValidDiv");
            $(divx).addClass("validDiv");
		    b[4]=0;
		    checkall();
        } else{
               if (!validateEmail(v)){
                   $(divx).removeClass("validDiv");
                   $(divx).addClass("notValidDiv");
                   spanE('ES',"entre un email valid",'notValidSpan');
                   b[4]=0;
                   checkall();
               }
                else{
                    $(divx).removeClass("notValidDiv");
                    $(divx).addClass("validDiv");
                    spanE('ES');
                    b[4]=1;
                    checkall();
                    }
        }
		
	});
    
    		$('#AI').focusout(function(){
		var v=$(this).val();
         var divx='#AD';
		if(v == ''){
		 $(divx).removeClass("validDiv");
		$(divx).addClass("notValidDiv");
		
		b[5]=0;
		checkall();
	}
		else{
			 $(divx).removeClass("notValidDiv");
			 $(divx).addClass("validDiv");
			
			b[5]=1;
			checkall();
			} 	
	});


	
	$('#PI').keyup(function(){
		var v = $(this).val();
        var divx='#PD';
		var upperCaseLetters = /[A-Z]/g;
		var numbers = /[0-9]/g;
		var lowerCaseLetters = /[a-z]/g;
		if(v == '' ){
			$(divx).removeClass("validDiv");
			$(divx).addClass("notValidDiv");
			spanE('PS');
			b[6]=0;
			checkall();
		}
		else{
			
			if(v.length<8){
				$(divx).removeClass("validDiv");
				$(divx).addClass("notValidDiv");
				spanE('PS', "au moins 8 caractères",'notValidSpan');
				b[6]=0;
				checkall();
			}
			else{
				$(divx).removeClass("validDiv");
				$(divx).addClass("notValidDiv");
				if(!v.match(upperCaseLetters) ||!v.match(lowerCaseLetters) ||!v.match(numbers)){
					spanE('PS', "au moins 1 chiffre + 1 majuscule + 1 miniscule",'notValidSpan');
					b[6]=0;
					checkall();
				}
				else{
						$(divx).removeClass("notValidDiv");
						$(divx).addClass("validDiv");
						spanE('PS');
						b[6]=1;
                        if(v == $('#PcI').val()){
                            $('#PcD').removeClass("notValidDiv");
                            $('#PcD').addClass("validDiv");
                            spanE('PcS','mot de passe confirmé','validSpan');
                            b[7]=1;
                        }else{
                             $('#PcD').removeClass("validDiv");
                             $('#PcD').addClass("notValidDiv");
                             spanE('PcS','le mot de passe ne correspond pas','notValidSpan');
                             b[7]=0;
                        }
						checkall();
					}
			   }
		}

		});
	$('#PcI').keyup(function(){
		var v=$(this).val();
		var v2=$("#PI").val();
        var divx='#PcD';
        if( b[6]==0 ){
        	$(PD).removeClass("validDiv");
			$(PD).addClass("notValidDiv");
            return ;
        }
		if(v == ''){
			$(divx).removeClass("validDiv");
			$(divx).addClass("notValidDiv");
			spanE('PcS',"confirmer le password",'notValidSpan');
			b[7]=0;
			checkall();
		}
			else{
				$(divx).removeClass("validDiv");
				$(divx).addClass("notValidDiv");
				if(v != v2){
					spanE('PcS', "le mot de passe ne correspond pas",'notValidSpan');
					b[7]=0;
					checkall();
				}
				else{
                    
						$(divx).removeClass("notValidDiv");
						$(divx).addClass("validDiv");
						spanE('PcS','mot de passe confirmé','validSpan');
						b[7]=1;
						checkall();
					}
			   }

		});
    
	$('#CI').click(function(){
        var divx="#CS";
		if(!this.checked){
		$(divx).removeClass("validText");
		$(divx).addClass("notValidText");
		b[8]=0;
		checkall();
	}
		else{
			 $(divx).removeClass("notValidText");
			 $(divx).addClass("validText");
			
			b[8]=1;
			checkall();
			} 	
	});


});



function progA() {
	var s= b.reduce((pv, cv) => pv + cv, 0);
    var s2=$('.progress-bar').text();
    s=10 + s*10;
    s2= s2.replace('%','');

    if(s !=  s2){
            
             $('.progress-bar').animate({width : s.toString()+'%'});   
             $('.progress-bar').text(s);
       }
    
}

/// eine kleine Funktion von ibrahim geschrieben
function spanE (id , txt, st){
	
    if(txt != null)
		{
			$('#'+id+'').text(txt);
			$("#"+id+"").fadeIn();
		}
	else{
			$('#'+id+'').text('');
			$("#"+id+"").fadeOut('slow');
	}
    if (st != null){
        $('#'+id+'').removeClass();
        $('#'+id+'').addClass(st);
    }
}

///enable or disable la button de submit 
function checkall(){
    progA();
	var elm=document.getElementById("btnV");
	if(Math.min.apply(Math, b) > 0){
		elm.disabled = false;
	}else{
		elm.disabled = true;
	}
}

function vid(){
   
}
  
////function pour vérifier email 
function validateEmail(email) 
    {
      var re = /\S+@\S+\.\S+/;
      return re.test(email);
    }

////function pour vérifier tel
function validatetel(tel) 
    {
      var re = /^\d{10}$/;
      return re.test(tel);
    }



