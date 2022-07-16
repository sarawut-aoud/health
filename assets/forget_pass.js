var forget = {
  check_username: function () {
    let frm = "../controller/forget_password.php";

    var username = $("#inputUsername").val();
    if (username != "") {
      $.ajax({
        type: "post",
        dataType: "json",
        url: frm,
        data: {
          func: "getuser",
          frmdata: username,
        },
        success: function (result) {
          if (result.is_success) {
            window.setTimeout(function () {
              window.location =
                "../view/reset-password.php?pd_id=" + result.pd_id;
            }, 1000);
          } else {
            $("#alertcheck")
              .show(0)
              .html(
                "<div align='center' class='bg-danger px-2 py-2 text-white  rounded'>" +
                  result.message +
                  "</div>"
              )
              .delay(2500)
              .fadeOut("fast");
          }
        },
      });
    } else {
      $("#alertcheck")
        .show(0)
        .html(
          "<div align='center' class='bg-danger px-2 py-2 text-white rounded'>โปรดระบุชื่อเข้าใช้งานหรือเบอร์โทร !</div>"
        )
        .delay(2500)
        .fadeOut("fast");
    }
  },
  reset_pass: function () {
    let frm = "../controller/forget_password.php";

    $.ajax({
      type: "post",
      dataType: "json",
      url: frm,
      data: {
        func: "resetpass",
        password: $("#password-input").val(),
        pd_id: $("#pd_id").val(),
      },
      success: function (result) {
        if (result.is_success == true) {
          Swal.fire({
            icon: "success",
            title: result.message,
            showConfirmButton: false,
            timer: 1500,
          }).then(function () {
            location.href = "../../index.php";
          });
        } else {
          Swal.fire({
            icon: "info",
            title: "เกิดข้อผิดพลาด",
            html: result.message,
            showConfirmButton: false,
            timer: 1500,
          }).then(function () {
            $(".swal2-modal").modal("hide");
          });
        }
      },
    });
  },
};
$(document).ready(function () {
  $(document).on("click", ".forget", function (e) {
    e.preventDefault();
    forget.check_username();
  });
  $(document).on("click", ".reset", function (e) {
    e.preventDefault();
    forget.reset_pass();
  });

  $(document).on("keyup", "#confirm_password", function (e) {
    e.preventDefault();

    if ($(this).val() == "") {
      $("#confirm_password").removeClass();
      $("#confirm_password").addClass("form-control py-2 ");
    } else if ($(this).val() != $("#password-input").val()) {
      $("#confirm_password").removeClass();
      $("#confirm_password").addClass("form-control py-2 is-invalid");
    } else {
      $("#confirm_password").removeClass();
      $("#confirm_password").addClass("form-control py-2 is-valid");
    }
  });

  $(document).on("keyup", "#password-input", function (e) {
    e.preventDefault();

    if ($(this).val() == "") {
      $("#confirm_password").removeClass();
      $("#confirm_password").addClass("form-control py-2 ");
    } else if ($(this).val() != $("#confirm_password").val()) {
      $("#confirm_password").removeClass();
      $("#confirm_password").addClass("form-control py-2 is-invalid");
    }
  });
});
