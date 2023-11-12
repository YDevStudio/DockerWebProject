var marakkech = document.getElementById("marakkech");
            var beni = document.getElementById("beni");
            
            
            window.onload = function(){
                marakkech.style.display='none';   
                beni.style.display='none';
            }
            
            function hide(){
                var place = document.getElementById("place").value;
                if (place == "marakkech"){
                    marakkech.style.display='';   
                    beni.style.display='none';
                }else if(place  == "beni"){
                    marakkech.style.display='none';   
                    beni.style.display='';
                }else {
                    marakkech.style.display='none';   
                    beni.style.display='none';
                }
            }