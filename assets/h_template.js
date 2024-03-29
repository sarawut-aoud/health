(function () {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
});
$(document).ready(function () {
  $.ajax({
    type: "get",
    dataType: "json",
    data: {
      pd_id: $("#personal_id").val(),
      func: "get",
    },
    url: "../../controller/top_navbar.php",
    success: function (result) {
      if (result.is_success) {
        $("#user_position,#user_position2").html(result.status);
        $("#user_path").attr("href", result.path);
      }
    },
  });
  //---------------------- ส่วนของ Modal เปลี่ยนตำแหน่ง
  $(document).on("click", ".change_position", function (e) {
    e.preventDefault();
    $("#change_position").modal("show");
  });
  //---------------------- ส่วนของ เปลี่ยนตำแหน่ง
  $(document).on("click", "#btn_change_status", function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      dataType: "json",
      data: {
        btn_change_status: $(this).val(),
        func: "change",
        pd_id: $("#personal_id").val(),
      },
      url: "../../controller/top_navbar.php",
      success: function (result) {
        if (result.is_success) {
          location.reload();
          $("#change_position").modal("hide");
        }
      },
    });
  });
  //---------------------- ส่วนของ การออกจากระบบ
  const supportsPDF = "application/pdf" in navigator.mimeTypes;
  $(document).on("click", ".is_logout", function (e) {
    e.preventDefault();

    Swal.fire({
      title: "คุณต้องการออกจากระบบ",

      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "ตกลง",
      cancelButtonText: "ยกเลิก",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "get",
          dataType: "json",
          url: "../../model/logout_model.php",
          success: function (result) {
            if (result.is_success) {
              Swal.fire({
                icon: "success",
                title: "กำลังทำการออกจากระบบ",
                showConfirmButton: false,
                timer: 1500,
              }).then(function () {
                location.href = "../../../index.php";
              });
            }
          },
        });
      }
    });
  });

  $("#example")
    .DataTable({
      // "searching": true,
      responsive: true,
      lengthChange: false,
      autoWidth: false,
      // dom: "Btrip",
      buttons: {
        dom: {
          button: {
            className: "btn btn-light  ",
          },
        },
        buttons: [
          {
            extend: "colvis",
            className: "btn btn-outline-info",
          },
        ],
      },
      language: {
        buttons: {
          colvis: "เลือกดูคอลัมน์",
        },
      },
    })
    .buttons()
    .container()
    .appendTo("#example_wrapper .col-md-6:eq(0)");


  $(document).on('click', "#view_pdf", function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    $('#show_iframe_modal iframe').attr('src', '../../view/reports/export_pdf.php?pd_id=' + id + '&embedded=true');
    $('#show_iframe_modal').modal('show');

  })
});
