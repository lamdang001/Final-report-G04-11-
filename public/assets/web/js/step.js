$(document).ready(function() {
   $("#step-1").hide();
   $("#step-2").hide();
   $("#step-3").hide();
   $("#step-4").hide();
   $("#search").click(function() {
      var schedule = $('#schedule').val();
      $.ajax({
         url: '/search',
         type: 'GET',
         data: {
             'schedule': schedule
         },
         success: function(response) {
             if(response.status == 200) {
                $("#step-1").html(response.data);
                $("#step-1").fadeIn();
             } else {
               swal({ title: 'Vui lòng đăng nhập trước khi đặt vé', type: 'error' });
             }
         }
      });
   });
   $("#form-booking").on("click","#continue-1",function() {
      var schedule = $('input[name="choose"]:checked').val();
      var qty = $("#qty").val();
      if (schedule ==undefined) {
         swal({ title: 'Vui lòng chọn chuyến bay', type: 'error' })
      } else {
         $("#step-1").hide();
         $.ajax({
            url: '/continue_second',
            type: 'GET',
            data: {
                'qty': qty
            },
            success: function(response) {
                if(response.status == 200) {
                   $("#step-2").html(response.data);
                   $("#step-2").fadeIn();
                } 
            }
         });
      }
   });
   $("#form-booking").on("click","#continue-2",function() {
      var is_check = true;
      var schedule = $('input[name="choose"]:checked').val();
      var place_customer_arr = $("input[name='place-customer[]']").map(function(){return $(this).val();}).get();
      var name_customer_arr = $("input[name='name-customer[]']").map(function(){return $(this).val();}).get();
      var birthday_customer_arr = $("input[name='birthday-customer[]']").map(function(){return $(this).val();}).get();
      for (let name of name_customer_arr) {
         if (name == "") {
            is_check = false;
            swal({ title: 'Vui lòng điền đầy đủ thông tin', type: 'error' })
         }
      }
      for (let birthday of birthday_customer_arr) {
         if (birthday == "") {
            is_check = false;
            swal({ title: 'Vui lòng điền đầy đủ thông tin', type: 'error' })
         }
      }
      for (let place of place_customer_arr) {
         if (place == "") {
            is_check = false;
            swal({ title: 'Vui lòng điền đầy đủ thông tin', type: 'error' })
         }
      }
      if (is_check) {
         $("#step-2").hide();
         $.ajax({
            url: '/continue_third',
            type: 'GET',
            data: {
                'schedule': schedule,
                'name_customer_arr': name_customer_arr,
                'birthday_customer_arr': birthday_customer_arr
            },
            success: function(response) {
                if(response.status == 200) {
                   $("#step-3").html(response.data);
                   $("#step-3").fadeIn();
                } 
            }
         });
      }
   });
   $("#form-booking").on("click","#continue-3",function() {
      var is_check = true;
      var schedule = $('input[name="choose"]:checked').val();
      var birthday_customer_arr = $("input[name='birthday-customer[]']").map(function(){return $(this).val();}).get();
      var slot_customer_arr = $("input[name='slot[]']").map(function(){return $(this).val();}).get();
      for (let slot of slot_customer_arr) {
         if (slot == "") {
            is_check = false;
            swal({ title: 'Vui lòng chọn chỗ ngồi', type: 'error' })
         }
      }
      if (is_check) {
         $("#step-3").hide();
         $.ajax({
            url: '/continue_fourth',
            type: 'GET',
            data: {
                'schedule': schedule,
                'birthday_customer_arr': birthday_customer_arr,
                'slot_customer_arr': slot_customer_arr
            },
            success: function(response) {
                if(response.status == 200) {
                   $("#step-4").html(response.data);
                   $("#step-4").fadeIn();
                } 
            }
         });
      }
   });
   $("#form-booking").on("click","#back-1",function() {
      $("#step-2").hide();
      $("#step-3").hide();
      $("#step-4").hide();
      $("#step-1").fadeIn();
   });
   $("#form-booking").on("click","#back-2",function() {
      $("#step-1").hide();
      $("#step-3").hide();
      $("#step-4").hide();
      $("#step-2").fadeIn();
   });
   $("#form-booking").on("click","#back-3",function() {
      $("#step-1").hide();
      $("#step-2").hide();
      $("#step-4").hide();
      $("#step-3").fadeIn();
   });
});
function updateSlot(slot,el) {
   var is_check = $('input[name="customer-slot"]:checked').val();
   if (is_check == undefined) {
      swal({ title: 'Vui lòng chọn hành khách', type: 'error' })
   } else {
      $("#"+is_check).text(slot);
      $("#"+is_check+"-input").val(slot);
   }
}