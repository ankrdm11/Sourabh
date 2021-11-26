    
function validateForm() {
       
            var uname = document.myForm.Name;    
            var passw = document.myForm.Pass;          
            var em = document.myForm.Email;
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;    
            var mobile = document.myForm.Num;
            var ge = document.myForm.gender;  
            var scity = document.myForm.City;
            var im = document.myForm.imgs;


            var nerror = document.getElementById("nerror");
            var perror = document.getElementById("perror");
            var verror = document.getElementById("verror");
            var cerror = document.getElementById("cerror");
            var gerror = document.getElementById("gerror");
            var cierror = document.getElementById("cierror");
            var lerror = document.getElementById("lerror");
            var ierror = document.getElementById("ierror");

            var flag = 0;
                 
    
            if (uname.value.length <= 0) {    
                //alert("Name is required");       
                nerror.innerHTML = "*Please enter Name";
                flag++;
            }else{
                nerror.innerHTML = "";
            }    
            if (passw.value.length <= 0) {    
                //alert("password is required"); 
                perror.innerHTML = "*please enter Name";     
                flag++;
            }else{
                perror.innerHTML = "";
            }     
            if (em.value.length <= 0) {    
                //alert("Email Id is required");        
                verror.innerHTML = "*please enter email";
                flag++;   
            }
            
            else if (!filter.test(em.value)) {
             //alert('Please provide a valid email address');
              verror.innerHTML = "*please enter vaild email";
                flag++;   
            }else{
                verror.innerHTML =" ";
            } 
         
        if (mobile.value.length <=0) {    
               // alert("Mobile number is required");       
            
            cerror.innerHTML ="*please enter mobile Number";
            flag++;

            }else if (isNaN(mobile.value)) {
             //alert('Please enter  numeric value only ');
            cerror.innerHTML ="*please enter only Numbers are allowed"; 
         } else {
            cerror.innerHTML = " ";
         }

            if (ge.value.length <=0) {    
                //alert("Gender is required");    
                gerror.innerHTML ="*please select gender"; 
                flag++;   
            } else {
                gerror.innerHTML = " ";
            }
            if (scity.value == "select") {    
                //alert("City is required");
                cierror.innerHTML ="*please select city"; 
                flag++;   
                    
            }  else {
                cierror.innerHTML = " ";
            }
// check box validation

         var lang = document.getElementsByName('click');
        var lengthch = lang.length;
       
        var val=0;
        for(var i=0;i<lengthch;i++) {
            if(lang[i].checked) {
                val++;
            }
        }
        if(val==0) {
           // alert('Please select atleast one language');
            lerror.innerHTML="*please select language";
            flag++;
        } else {
            lerror.innerHTML =" ";
        }
// validation for img uploading

       if (im.files.length == 0) {
        //alert('Please select image');
        ierror.innerHTML = "*please select image";
        flag++;
       }
       else if(!/(\.bmp|\.gif|\.jpg|\.jpeg|)$/i.test(im.value)) {
       // alert("Invalid image file type.");             
          ierror.innerHTML = "*please select vaild image format"; 
    } else {
        ierror.innerHTML = " ";
    }
if (flag == 0) {
    
      return true;
}else{
    return false;
}

}
