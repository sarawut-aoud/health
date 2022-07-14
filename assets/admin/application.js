var application = {
  loadapplication: function (pd_id) {
    let frmaction = "../../controller/admin/application.php";
    $.ajax({
      type: "GET",
      dataType: "json",
      url: frmaction,
      data: { func: "getdata", pd_id: pd_id },
      success: function (result) {
        var data = "";
        for (i in result) {
          var chk = result[i].check_id != null ? "checked" : "";
          data += '<div class="custom-control custom-checkbox mt-2 ms-5">';
          data +=
            "<input  " +
            chk +
            '   class="custom-control-input"   type="checkbox" target="application" id="application_id' +
            result[i].id +
            '" name="application_name[' +
            result[i].id +
            ']" value="' +
            result[i].id +
            '">';
          data +=
            '<label for="application_id' +
            result[i].id +
            '"" class="custom-control-label">' +
            result[i].application_name +
            "</label></div>";
        }
        $("#application_show").html(data);
      },
    });
  },
  load_user: function (id) {
    $.ajax({
      type: "get",
      dataType: "json",
      url: "../../controller/admin/application.php",
      data: { func: "getuser" },
      success: function (result) {
        var data = "<option value='0'>-----เลือกผู้ใช้งาน-----</option>";
        for (i in result) {
          if (result[i].pd_id == id) {
            data +=
              "<option selected value='" +
              result[i].pd_id +
              "'>" +
              result[i].fullname +
              "</option>";
          } else {
            data +=
              "<option value='" +
              result[i].pd_id +
              "'>" +
              result[i].fullname +
              "</option>";
          }
        }
        $("#pd_id").html(data);
      },
    });
  },
  Save_status: function () {
    var fdata = $("#frmapplication").serialize();
    let frmaction = "../../controller/admin/application.php";

    $.ajax({
      type: "POST",
      dataType: "json",
      url: frmaction,
      data: { frmdata: fdata, func: "insert" },
      success: function (results) {
        if (results.is_successful == true) {
          Swal.fire({
            icon: "success",
            title: results.message,
            showConfirmButton: false,
            timer: 1500,
          }).then(function () {
            location.reload();
          });
        } else {
          Swal.fire({
            icon: "info",
            title: "เกิดข้อผิดพลาด",
            html: results.message,
            showConfirmButton: false,
            timer: 1500,
          });
        }
      },
    });
  },
  update_status: function () {
    var fdata = $("#frmapplication").serialize();

    let frmaction = "../../controller/admin/application.php";
    $.ajax({
      type: "POST",
      dataType: "json",
      url: frmaction,
      data: { frmdata: fdata, func: "update" },
      success: function (results) {
        if (results.is_successful == true) {
          Swal.fire({
            icon: "success",
            title: results.message,
            showConfirmButton: false,
            timer: 1500,
          }).then(function () {
            location.reload();
          });
        } else {
          Swal.fire({
            icon: "info",
            title: "เกิดข้อผิดพลาด",
            html: results.message,
            showConfirmButton: false,
            timer: 1500,
          });
        }
      },
    });
  },
  delete: function (pd_id) {
    let frmaction = "../../controller/admin/application.php";
    Swal.fire({
      title: "คุณต้องการลบข้อมูลใช่หรือไม่ ?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "ยืนยัน",
      cancelButtonText: "ยกเลิก",
    }).then((btn) => {
      if (btn.isConfirmed) {
        $.ajax({
          method: "POST",
          url: frmaction,
          dataType: "json",
          data: {
            func: "delete",
            pd_id: pd_id,
          },
          success: function (results) {
            if (results.is_successful) {
              Swal.fire({
                icon: "success",
                title: results.message,
                showConfirmButton: false,
                timer: 1500,
              }).then(function () {
                location.reload();
              });
            } else {
              Swal.fire({
                icon: "error",
                title: "เกิดข้อผิดพลาด",
                html: results.message,
                confirmButtonText: "กลับไปแก้ไข",
              });
            }
          },
        });
      }
    });
  },
};
$(document).ready(function () {
  application.loadapplication("");
  application.load_user("");

  $(document).on("click", "#saveStatus", function (e) {
    e.preventDefault();
    application.Save_status();
  });
  $(document).on("click", "#updateStatus", function (e) {
    e.preventDefault();
    application.update_status();
  });
  $(document).on("change", "#pd_id", function (e) {
    e.preventDefault();
    application.loadapplication($(this).val());
  });

    $("#updateStatus,#cancle").hide();

    $(document).on("click", "#edit", function (e) {
      e.preventDefault();
      $("#saveStatus").hide();
      $("#updateStatus,#cancle").show();

      application.load_user($(this).val());
      application.loadapplication($(this).val());
    });
    $(document).on("click", "#cancle", function (e) {
      e.preventDefault();
      $("#updateStatus,#cancle").hide();
      $("#saveStatus").show();
      $('input[target="status_id"]').removeAttr("checked");
      $("#pd_id").val("0").trigger("change");
    });

    $(document).on("click", "#delete", function (e) {
      e.preventDefault();
      application.delete($(this).val());
    });
});
