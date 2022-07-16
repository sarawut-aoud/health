var adduser = {
  add_tumbon: function (id, ckeck) {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "../../controller/admin/add_user.php",
      data: {
        func: "tumbon",
        id: id,
      },
      success: function (result) {
        var data = '<option value="">----ตำบล-----</option>';
        for (i in result) {
          if (result[i].tumbon_id == ckeck) {
            data +=
              '<option selected value="' +
              result[i].tumbon_id +
              '">' +
              result[i].tumbon_name +
              "</option>";
          } else {
            data +=
              '<option value="' +
              result[i].tumbon_id +
              '">' +
              result[i].tumbon_name +
              "</option>";
          }
        }
        $("#tumbon_id").html(data);
      },
    });
  },
  add_ampher: function (id, ckeck) {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "../../controller/admin/add_user.php",
      data: {
        func: "ampher",
        id: id,
      },
      success: function (result) {
        var data = '<option value="">----อำเภอ-----</option>';
        for (i in result) {
          if (result[i].ampher_id == ckeck) {
            data +=
              '<option selected value="' +
              result[i].ampher_id +
              '">' +
              result[i].ampher_name +
              "</option>";
          } else {
            data +=
              '<option value="' +
              result[i].ampher_id +
              '">' +
              result[i].ampher_name +
              "</option>";
          }
        }
        $("#ampher_id").html(data);
      },
    });
  },
  add_province: function (id) {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "../../controller/admin/add_user.php",
      data: {
        func: "province",
      },
      success: function (result) {
        var data = '<option value="">----จังหวัด-----</option>';
        for (i in result) {
          if (result[i].province_id == id) {
            data +=
              '<option selected value="' +
              result[i].province_id +
              '">' +
              result[i].province_name +
              "</option>";
          } else {
            data +=
              '<option value="' +
              result[i].province_id +
              '">' +
              result[i].province_name +
              "</option>";
          }
        }
        $("#province_id").html(data);
      },
    });
  },
  Get_status: function (id) {
    let frmdata = "../../controller/admin/add_user.php";
    $.ajax({
      type: "get",
      dataType: "json",
      url: frmdata,
      data: {
        func: "getstatus",
      },
      success: function (result) {
        let data = "<option>--- เลือกสถานะ----</option>";
        for (i in result) {
          if (result[i].id == id) {
            data +=
              "<option selected value=" +
              result[i].id +
              ">" +
              result[i].status_name +
              "</option>";
          } else {
            data +=
              "<option  value=" +
              result[i].id +
              ">" +
              result[i].status_name +
              "</option>";
          }
        }
        $("#status_id").html(data);
      },
    });
  },
  Get_title: function (id) {
    const arr = new Array("นาย", "นาง", "นางสาว");
    var data = "<option value='' selected >เลือกคำนำหน้า</option>";
    var j = 1;
    for (i = 0; i < arr.length; i++) {
      if (j == id) {
        data += "<option selected value=" + j + ">" + arr[i] + "</option>";
      } else {
        data += "<option value=" + j + ">" + arr[i] + "</option>";
      }
      j++;
    }
    $("#title").html(data);
  },
  Get_data: function (id) {
    let frmdata = "../../controller/admin/add_user.php";
    $.ajax({
      type: "get",
      dataType: "json",
      url: frmdata,
      data: {
        func: "getuserfor_table",
        pd_id: id,
      },
      success: function (result) {
        $("#fname").val(result.first_name);
        $("#lname").val(result.last_name);
        $("#age").val(result.age);
        $("#birthday").val(result.birthday);
        $("#id_card").val(result.id_card);
        $("#phone_number").val(result.phone_number);
        $("#address").val(result.address);
        $("#username").val(result.username);
        $("#password").val(result.password);
        adduser.add_tumbon("", result.tumbon_id);
        adduser.add_ampher("", result.ampher_id);
        adduser.add_province(result.province_id);
        adduser.Get_status(result.status_id);
        adduser.Get_title(result.title);
      },
    });
  },

  saveFormdata: async function () {
    let frmdata = "../../controller/admin/add_user.php";
    let fdata = $("#FormUser").serialize();
    $.ajax({
      type: "POST",
      dataType: "json",
      url: frmdata,
      data: { formdata: fdata, func: "insert" },
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
  updateFormdata: async function (id) {
    let frmdata = "../../controller/admin/add_user.php";
    let fdata = $("#FormUser").serialize();
    fdata += "&pd_id=" + id;
    $.ajax({
      type: "POST",
      dataType: "json",
      url: frmdata,
      data: { formdata: fdata, func: "update" },
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
  deleteFormdata: async function (id) {
    let frmdata = "../../controller/admin/add_user.php";
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
          url: frmdata,
          dataType: "json",
          data: {
            func: "delete",
            pd_id: id,
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
  check_username: function (data) {
    let frmdata = "../../controller/admin/add_user.php";
    $.ajax({
      type: "get",
      dataType: "json",
      url: frmdata,
      data: {
        func: "username_check",
        username_check: data,
      },
      success: function (result) {
        if (result.is_successful == false) {
          $("#show_username").html(result.message).css("color", "red");
          $("#username").addClass("is-invalid");
        } else {
          $("#show_username").html("");
          $("#username").removeClass("is-invalid");

          $("#username").addClass("is-valid");
        }
      },
    });
  },
};

/**
 * --------------------------------- document Ready ---------------------------------
 */
$(document).ready(function () {
  $(".select2").select2();
  $("#birthday").datepicker({
    language: "th-th",
    format: "dd/mm/yyyy",
    autoclose: true,
  });
  adduser.Get_title();
  adduser.add_province();
  adduser.Get_status();
  // เลือกจังหวัด แล้วส่ง id ไปหา อำเภอ
  $(document).on("change", "#province_id", function (e) {
    e.preventDefault();
    var id = $(this).val();
    // $(this).val() value ของ id form select ชุดนี้  id from select id="province_id" เรียกใช้ #province_id
    adduser.add_ampher(id, "");
  });
  // เลือกอำเภอ แล้วส่ง id ไปหา ตำบล
  $(document).on("change", "#ampher_id", function (e) {
    e.preventDefault();
    var id = $(this).val(); // $(this).val() value ของ id form select ชุดนี้
    adduser.add_tumbon(id, "");
  });
  $("#cancle,#update").hide();
  // ---------insert
  $(document).on("click", "#btnsave", function (e) {
    e.preventDefault();
    adduser.saveFormdata();
  });
  // ---------update

  $(document).on("click", "#edit", function (e) {
    e.preventDefault();
    adduser.Get_data($(this).val());
    $("#cancle,#update").show();
    $("#update").attr("data-id", $(this).val());
    $("#btnsave").hide();
  });
  $(document).on("click", "#update", function (e) {
    e.preventDefault();
    adduser.updateFormdata($(this).attr("data-id"));
  });

  // ---------delete
  $(document).on("click", "#delete", function (e) {
    e.preventDefault();
    adduser.deleteFormdata($(this).val());
  });

  // ----------------------- ยกเลิกข้อมูล
  $(document).on("click", "#cancle", function (e) {
    e.preventDefault();
    $("#FormUser")[0].reset();
    $("#btnsave").show();
    $("#cancle,#update").hide();
    $("#province_id,#ampher_id,#tumbon_id,#title").val("").trigger("change");
  });
  $(document).on("keyup", "#username", function (e) {
    e.preventDefault();
    if ($(this).val() != "") {
      adduser.check_username($(this).val());
    } else {
      $("#username").removeClass("is-valid");
    }
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
