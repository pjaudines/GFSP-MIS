//SIGN OUT BUTTON
$("#btnSignOut").click(function(){
    $.ajax({
      url: "../../php/logout.php",
      type: "POST",
      success: function(){
        alert("Signed Out");
        setTimeout(function(){
        location.reload();
         }, 3000);
      }
    });
 });
 //END SIGNOUT