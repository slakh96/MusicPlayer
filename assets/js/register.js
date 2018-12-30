var $ = jQuery;
$(document).ready(function(){
   $("#hide-login").click(function(){
       $("#loginForm").hide();
       $("#registerForm").show();
   });
    $("#hide-register").click(function(){
       $("#registerForm").hide();
       $("#loginForm").show();
   });
});