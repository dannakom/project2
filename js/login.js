/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
	$("#add_err").css('display', 'none', 'important');
	 $("#login").click(function(){	
		  username=$("#user").val();
		  password=$("#pass").val();
                   verifyLogin="verifyLogin";
               //   console.log("data");
		  $.ajax({
                        type: "POST",
                        url: "lib/api.php",
			data: "user="+username+"&pass="+password+"&action="+verifyLogin,
                      //  success: function(data){
                        //    console.log("return data"+data);
                            /*
			if(data=='true')    {
			 window.location="lib/tmp.php";
			}
			else    {
			$("#add_err").css('display', 'inline', 'important');
			 $("#add_err").html("Wrong username or password"+password);
                       
			}*/
		 //  },
		   beforeSend:function()
		   {
			$("#add_err").css('display', 'inline', 'important');
			$("#add_err").html(" Loading...");
		   }
		  });
		//return false;
	});
});

