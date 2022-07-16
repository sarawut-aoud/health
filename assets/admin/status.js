var status_js = {
  load_user: function (id) {
    $.ajax({
      type: "get",
      dataType: "json",
      url: "../../controller/admin/status.php",
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
    var fdata = $("#frmstatus").serialize();

    $.ajax({
      type: "POST",
      dataType: "json",
      url: "../../controller/admin/status.php",
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
    var fdata = $("#frmstatus").serialize();

    $.ajax({
      type: "POST",
      dataType: "json",
      url: "../../controller/admin/status.php",
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
          url: "../../controller/admin/status.php",
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
  load_status: function (pd_id) {
    $.ajax({
      type: "get",
      dataType: "json",
      url: "../../controller/admin/status.php",
      data: { func: "getdata", pd_id: pd_id },
      success: function (result) {
        var data = "";
        for (i in result) {
          var chk_dis = result[i].check_id == "5" ? " disabled" : "";
          var chk = result[i].check_id != null ? "checked" : "";
          data += '<div class="custom-control custom-checkbox mt-2 ms-5">';
          data +=
            "<input  " +
            chk +
            '   class="custom-control-input"  ' +
            chk_dis +
            '  type="checkbox" target="status_id" id="status_name' +
            result[i].id +
            '" name="status_name[' +
            result[i].id +
            ']" value="' +
            result[i].id +
            '">';
          data +=
            '<label for="status_name' +
            result[i].id +
            '"" class="custom-control-label">' +
            result[i].status_name +
            "</label></div>";
        }
        $("#status_show").html(data);
      },
    });
  },
};
$(document).ready(function () {
  status_js.load_user("");
  status_js.load_status();
  $(document).on("click", "#saveStatus", function (e) {
    e.preventDefault();
    status_js.Save_status();
  });
  $(document).on("click", "#updateStatus", function (e) {
    e.preventDefault();
    status_js.update_status();
  });
  $(document).on("change", "#pd_id", function (e) {
    e.preventDefault();
    status_js.load_status($(this).val());
  });

  $("#updateStatus,#cancle").hide();

  $(document).on("click", "#edit", function (e) {
    e.preventDefault();
    $("#saveStatus").hide();
    $("#updateStatus,#cancle").show();

    status_js.load_user($(this).val());
    status_js.load_status($(this).val());
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
    status_js.delete($(this).val());
  });
 
});
