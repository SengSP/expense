$(document).ready(function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  // data table
  $('#dtuserlist').DataTable({
    "oLanguage": {
      "sLengthMenu": 'ສະແດງຈຳນວນ<select>'+
        '<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">All</option>'+
        '</select>ແຖວ',
      "sInfo": "ສະແດງໜ້າ _START_ ຫາ _END_ ຂອງ _TOTAL_ ໜ້າທັງໝົດ",
      "oPaginate": {
        "sNext": "ໜ້າຕໍ່ໄປ",
        "sPrevious": "ກັບໜ້າເກົ່າ"
      }
    }
  });
  // $('#dtMaterialDesignExample').DataTable();
  $('#dtuserlist_wrapper').find('label').each(function () {
    $(this).parent().append($(this).children());
  });
  $('#dtuserlist_wrapper .dataTables_filter').find('input').each(function () {
    const $this = $(this);
    $this.attr("placeholder", "ຄົ້ນຫາ...");
    $this.removeClass('form-control-sm');
  });
  $('#dtuserlist_wrapper .dataTables_length').addClass('d-flex flex-row');
  $('#dtuserlist_wrapper .dataTables_filter').addClass('md-form');
  $('#dtuserlist_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
  $('#dtuserlist_wrapper select').addClass('mdb-select');
  $('#dtuserlist_wrapper .mdb-select').materialSelect();
  $('#dtuserlist_wrapper .dataTables_filter').find('label').remove();

  // btn change user status
  $('body').on('click', '#btnChangestatus', function(){
    var id = $(this).val();
    var status = $(this).text();
    if(status.length == 6){
      var newstatus = "block";
      $('#btnUpdatestatus').attr('class', 'btn btn-danger');
    }else{
      var newstatus = "public";
      $('#btnUpdatestatus').attr('class', 'btn btn-success');
    }
    $('#btnUpdatestatus').text(newstatus);
    $('#status').val(newstatus);
    $('#stuserid').val(id);
    $('#modalChangestatus').modal('show');
  });

  // random and show password
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

  $('body').on('click', '#btnChangepass', function(){
    var id = $(this).val();
    $('#passuserid').val(id);
    $('#modalChangepass').modal('show');
  });


  // btn change profile image
  $('body').on('click', '#btnChangeimg', function(){
    var invalue = $(this).val();
    if(invalue.length > 15){
      var id = invalue.substring(0, 2);
      var imgname = invalue.substring(2, 16);
    }else{
      var id = invalue.substring(0, 1);
      var imgname = invalue.substring(1, 15);
    }
    if(imgname.length !== 0){
      $('#showimg').attr('src', 'images/'+imgname);
    }else{
      $('#showing').attr('src', 'images/person.png');
    }
    $('#imguserid').val(id);
    $('#modalChangeimg').modal('show');
  });

  $('body').on('click', '#btnChangeRole', function(){
    var id = $(this).val();
    $.ajax({
      url: '/selectrolepms',
      type: 'POST',
      data: {id:id},
      dataType: 'json',
      success: function(response){
        // for(var i=0; i <)
        // console.log(response['role'][0].role_id);
        // console.log(response);
        if(response['role'][0].role_id === 2){
          $('#roles').prop('checked', false);
          // alert(response['role'][0].role_id);
        }else{
          $('#roles').prop('checked', true);
        }

        if(response['pms'].length >= 5){
          if(response['pms'][0].permission_id === 1){
            $('#Add').prop('checked', true);
          }else{
            $('#Add').prop('checked', false);
          }
          if(response['pms'][1].permission_id === 2){
            $('#Edit').prop('checked', true);
          }else{
            $('#Edit').prop('checked', false);
          }
          if(response['pms'][2].permission_id === 3){
            $('#Delete').prop('checked', true);
          }else{
            $('#Delete').prop('checked', false);
          }
          if(response['pms'][3].permission_id === 4){
            $('#View').prop('checked', true);
          }else{
            $('#View').prop('checked', false);
          }
          if(response['pms'][4].permission_id === 5){
            $('#ManageUser').prop('checked', true);
          }else{
            $('#ManageUser').prop('checked', false);
          }
        }else if(response['pms'].length === 0){

        }else{
          if(response['pms'][0].permission_id === 1){
            $('#Add').prop('checked', true);
          }else{
            $('#Add').prop('checked', false);
          }
          if(response['pms'][1].permission_id === 2){
            $('#Edit').prop('checked', true);
          }else{
            $('#Edit').prop('checked', false);
          }
          if(response['pms'][2].permission_id === 3){
            $('#Delete').prop('checked', true);
          }else{
            $('#Delete').prop('checked', false);
          }
          if(response['pms'][3].permission_id === 4){
            $('#View').prop('checked', true);
          }else{
            $('#View').prop('checked', false);
          }
        }
        $('#rpmsuserid').val(id);
        $('#modalrole').modal('show');
      }, error: function(response){
        console.log('Error: ' + response);
      }
    });
    // $('#modalrole').modal('show');
  });

  // button trash user show modal
  $('body').on('click', '#btnTrashuser', function(){
    var id = $(this).val();
    $('#deluserid').val(id);
    $('#modaldelete').modal('show');
  });

  $('body').on('click', '#btnEdituser', function(){
    var userid = $(this).val();
    $.ajax({
      url: '/loaduserdata',
      type: 'POST',
      data: {userid:userid},
      dataType: 'json',
      success: function(data){
        $('#edituserid').val(userid);
        $('#name').val(data.name);
        $('#email').val(data.email);
        $('#modaledituser').modal('show');
      }, error: function(data){
        console.log('Error: ' + data);
      }
    });
  });

  // select image
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


  // alert time
  setTimeout(function() {
    $('#toast-container').fadeOut('fast');
  }, 2500);
});