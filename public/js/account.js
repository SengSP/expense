$(document).ready(function(){
  $('body').on('click', '#btnAccount', function(){
    $('#modalaccount').modal('show');
  });

  // function show image when select image for upload
  function showaimg(input){
    if(input.files && input.files){
      var reader = new FileReader;

      reader.onload = function(e){
        $('#showimg').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#fimage").change(function(){
    $('#showimg').show();
    $('#fimgname').val(this.files[0].name);
    showaimg(this);
  });

  $('body').on('click', '#btnChangAcpass', function(){
    $('#modalchangeacpass').modal('show');
  });

  function fnRandompass(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
       result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    $('#password').val(result);
  }

  $('body').on('click', '#btnRandompass', function(){
    fnRandompass(8);
  });

  $('body').on('click', '#btnShowpassword', function(){
    var x = document.getElementById('password');
    if(x.type === "password"){
      x.type = "text";
    }else{
      x.type = "password";
    }
  });

  // alert time
  setTimeout(function() {
    $('#toast-container').fadeOut('fast');
  }, 2500);
});