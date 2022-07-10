var login = {
  login: function () {
    var fdata = $("#frmLogin").serialize();
    fdata += "&func=login";
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "application/controller/login.php",
      data: { frmLogin: fdata },
      success: function (result) {
        if (result.is_successful == true) {
          Swal.fire({
            icon: "success",
            title: result.message,
            showConfirmButton: false,
            timer: 1500,
          }).then(function () {
            location.href = result.path;
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
  $(document).on("click", "#btnLogin", function (e) {
    e.preventDefault();
    login.login();
  });
});
