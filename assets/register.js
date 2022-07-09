var register = {
  loadtumbon: function (id) {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "../controller/register.php",
      data: {
        func: "tumbon",
        id: id,
      },
      success: function (result) {
        var data = '<option value="">----ตำบล-----</option>';
        for (i in result) {
          data +=
            '<option value="' +
            result[i].tumbon_id +
            '">' +
            result[i].tumbon_name +
            "</option>";
        }
        $("#tumbon_id").html(data);
      },
    });
  },
  loadampher: function (id) {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "../controller/register.php",
      data: {
        func: "ampher",
        id: id,
      },
      success: function (result) {
        var data = '<option value="">----อำเภอ-----</option>';
        for (i in result) {
          data +=
            '<option value="' +
            result[i].ampher_id +
            '">' +
            result[i].ampher_name +
            "</option>";
        }
        $("#ampher_id").html(data);
      },
    });
  },
  loadprovince: function () {
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "../controller/register.php",
      data: {
        func: "province",
      },
      success: function (result) {
        var data = '<option value="">----จังหวัด-----</option>';
        for (i in result) {
          data +=
            '<option value="' +
            result[i].province_id +
            '">' +
            result[i].province_name +
            "</option>";
        }
        $("#province_id").html(data);
      },
    });
  },
  Save_register: function () {
    var fdata = $("#Formregister").serialize();

    $.ajax({
      type: "POST",
      dataType: "json",
      url: "../controller/register.php",
      data: { Formregister: fdata, func: "register" },
      success: function (result) {
        if (result.is_successful == true) {
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
  check_username: function (data) {
    $.ajax({
      type: "get",
      dataType: "json",
      url: "../controller/register.php",
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
$(document).ready(function () {
  $(".select2").select2();
  $("#birthday").datepicker({
    language: "th-th",
    format: "dd/mm/yyyy",
    autoclose: true,
  });

  register.loadprovince();

  // เลือกจังหวัด แล้วส่ง id ไปหา อำเภอ
  $(document).on("change", "#province_id", function (e) {
    e.preventDefault();
    var id = $(this).val();
    // $(this).val() value ของ id form select ชุดนี้  id from select id="province_id" เรียกใช้ #province_id
    register.loadampher(id);
  });
  // เลือกอำเภอ แล้วส่ง id ไปหา ตำบล
  $(document).on("change", "#ampher_id", function (e) {
    e.preventDefault();
    var id = $(this).val(); // $(this).val() value ของ id form select ชุดนี้
    register.loadtumbon(id);
  });
  $(document).on("click", "#register", function (e) {
    e.preventDefault();
    register.Save_register();
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
  $(document).on("keyup", "#username", function (e) {
    e.preventDefault();
    if ($(this).val() != "") {
      register.check_username($(this).val());
    } else {
      $("#username").removeClass("is-valid");
    }
  });
});
