  // SideNav Initialization
  $(".button-collapse").sideNav();

  var container = document.querySelector('.custom-scrollbar');
  var ps = new PerfectScrollbar(container, {
    wheelSpeed: 2,
    wheelPropagation: true,
    minScrollbarLength: 20
  });

  // Data Picker Initialization
    $('.datepicker').pickadate();

    // Material Select Initialization
    $(document).ready(function () {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      loadExpensechart();
      function loadExpensechart(){
        $.ajax({
          url: '/loadexpensechart',
          type: 'POST',
          dataType: 'json',
          success: function(data){
            // console.log(data);
            // Main chart
            var ctxL = document.getElementById("lineChart").getContext('2d');
            var myLineChart = new Chart(ctxL, {
              type: 'line',
              data: {
                labels: ["ມັງກອນ", "ກຸມພາ", "ມີນາ", "ເມສາ", "ພຶດສະພາ", "ມີຖຸນາ", "ກໍລະກົດ", "ສິງຫາ", "ກັນຍາ", "ຕຸລາ", "ພະຈິກ", "ທັນວາ"],
                datasets: [{
                  label: "ລາຍຈ່າຍຂອງເດືອນ",
                  fillColor: "#fff",
                  backgroundColor: 'rgba(255, 255, 255, .3)',
                  borderColor: 'rgba(255, 255, 255)',
                  data: [data.jan, data.feb, data.mar, data.apr, data.may, data.jun, data.jul, data.aug, data.sep, data.oct, data.nov, data.dec],
                }]
              },
              options: {
                legend: {
                  labels: {
                    fontColor: "#fff",
                  }
                },
                scales: {
                  xAxes: [{
                    gridLines: {
                      display: true,
                      color: "rgba(255,255,255,.25)"
                    },
                    ticks: {
                      fontColor: "#fff",
                    },
                  }],
                  yAxes: [{
                    display: true,
                    gridLines: {
                      display: true,
                      color: "rgba(255,255,255,.25)"
                    },
                    ticks: {
                      fontColor: "#fff",
                    },
                  }],
                }
              }
            });
          }, error: function(data){
            console.log('Error: ' + data);
          }
        })
      }
    });

    // Tooltips Initialization
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
