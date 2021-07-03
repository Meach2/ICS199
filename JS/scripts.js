/*!
* Start Bootstrap - Business Frontpage v4.3.0 (https://startbootstrap.com/template/business-frontpage)
* Copyright 2013-2021 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-business-frontpage/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project




function validation() {
  if (document.getElementById('userid').value=='') {
    alert ("You must include a userid");
    return false;
  }
  if (document.getElementById('password').value == '') {
    alert ("You must include a password");
    return false;
  }
  if (document.getElementById('password').value.length < 4) {
    alert("password must be at least 4 characters in length");
    return false;
  }
  return true;
}


// if username is admin name makes it appear, otherwise it is hidden.

$("#loginbutton").click(function(e) 
{   e.preventDefault();
    if (toLowerCase(document.getElementById('loginname').value) == 'ggadmin') {
        $(".administrator").show(1);
    } else {
        $(".administrator").hide(1); 
    }
    
});


// this is some AJAX for button click where if the button is clicked in log in it executes the PHP script (This is totally dead)

$('#loginbutton').click(function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "localhost/shopping-cart/PHP/verifyPasswordUsername.php"
    }).done(function( msg ) {
      alert( "got here" );
    });
  });
