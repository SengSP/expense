$(document).ready(function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('.mdb-select').materialSelect();
  $('.datepicker').pickadate();
  setTimeout(function(){
    $('#toast-container').fadeOut();
  }, 2500);

  // calculate
  $('body').on('keyup', '#qty', function(){
    var qty = $(this).val();
    if(qty === ""){
      $('#total').val("");
    }else{
      var price = $('#price').val();
      var total = price * qty;
      $('#total').val(total);
    }
  });
  $('body').on('keyup', '#price', function(){
    var price = $(this).val();
    if(price === ""){
      $('#total').val("");
    }else{
      var qty = $('#qty').val();
      var total = price * qty;
      $('#total').val(total);

    }
  });

  // show modal add expen
  $('body').on('click', '#btnAddexpense', function(){
    $('#modaladdexpense').modal('show');
  });

  // function load search expense data
  function loadSearchexpense(){
    var current = new Date();
    var year = $('#year').val();
    var month = $('#month').val();
    var date = $('#date').val();
    if(year === null){
      var y = current.getFullYear(); 
    }else{
      var y = year;
    }
    if(month === null){
      var mm = current.getMonth();
      var mon = new Array();
      mon[0] = "01";
      mon[1] = "02";
      mon[2] = "03";
      mon[3] = "04";
      mon[4] = "05";
      mon[5] = "06";
      mon[6] = "07";
      mon[7] = "08";
      mon[8] = "09";
      mon[9] = "10";
      mon[10] = "11";
      mon[11] = "12";
      var m = mon[mm];
    }else{
      var m = month;
    }
    if(date === null){
      var d = null; 
    }else{
      var d = date;
    }
    $.ajax({
      url: '/loadSearchex',
      type: 'POST',
      data: {y:y,m:m,d:d},
      dataType: 'json',
      success: function(data){
        // console.log(data);
        $('#showcountrow').text(data.count);
        $('#showexpense').html(data.result);
        $('#showtotal').text(data.showtotal);
      }, error: function(data){
        console.log('Error: ' + data);
      }
    });
  }
  $('body').on('change', '#year', function(){
    loadSearchexpense();
  });

  $('body').on('change', '#month', function(){
    loadSearchexpense();
  });

  $('body').on('change', '#date', function(){
    loadSearchexpense();
  });

  // fucntion get expense date to edit
  $('body').on('click', '#btnEditexp', function(){
    var expenseid = $(this).val();
    $.ajax({
      url: '/getexpensedata',
      type: 'POST',
      data: {expenseid:expenseid},
      dataType: 'json',
      success: function(data){
        $('#expenseid').val(expenseid);
        $('#listbuy1').val(data.listbuy);
        $('#datebuy1').val(data.datebuy);
        $('#qty1').val(data.qty);
        $('#price1').val(data.price);
        $('#total1').val(data.total);
        $('#remark1').val(data.remark);
        $('#modaleditexpense').modal('show');
        // console.log(data);
      }, error: function(data){
        console.log('Error: ' + data);
      }
    });
  });


  // calculate
  $('body').on('keyup', '#qty1', function(){
    var qty = $(this).val();
    if(qty === ""){
      $('#total1').val("");
    }else{
      var price = $('#price1').val();
      var total = price * qty;
      $('#total1').val(total);
    }
  });
  $('body').on('keyup', '#price1', function(){
    var price = $(this).val();
    if(price === ""){
      $('#total1').val("");
    }else{
      var qty = $('#qty1').val();
      var total = price * qty;
      $('#total1').val(total);

    }
  });

  // function delete data
  $('body').on('click', '#btnTrashexp', function(){
    var expenseid = $(this).val();
    $('#delexpid').val(expenseid);
    $('#modaledelexpense').modal('show');
  });
});