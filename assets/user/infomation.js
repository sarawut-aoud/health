var infomation = {
  add_tumbon: function (id, ckeck) {

    $.ajax({
      type: "GET",
      dataType: "json",
      url: "../../controller/user/dashborad.php",
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
      url: "../../controller/user/dashborad.php",
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
      url: "../../controller/user/dashborad.php",
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
  check_username: function (data) {
    let frmdata = "../../controller/user/dashborad.php";
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
  updateFormdata: async function () {
    let frmdata = "../../controller/user/dashborad.php";
    let fdata = $("#infomation").serialize();

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
};

$(document).ready(function () {

  infomation.add_province($("#province_set").val());
  infomation.add_tumbon('', $("#tumbon_set").val());
  infomation.add_ampher('', $("#amphoe_set").val());

  $("#birthday").datepicker({
    language: "th-th",
    format: "dd/mm/yyyy",
    autoclose: true,
  });
  $(document).on("change", "#province_id", function (e) {
    e.preventDefault();
    var id = $(this).val();
    // $(this).val() value ของ id form select ชุดนี้  id from select id="province_id" เรียกใช้ #province_id
    infomation.add_ampher(id, "");
  });
  // เลือกอำเภอ แล้วส่ง id ไปหา ตำบล
  $(document).on("change", "#ampher_id", function (e) {
    e.preventDefault();
    var id = $(this).val(); // $(this).val() value ของ id form select ชุดนี้
    infomation.add_tumbon(id, "");
  });

  $(document).on("keyup", "#username", function (e) {
    e.preventDefault();
    if ($(this).val() != "") {
      infomation.check_username($(this).val());
    } else {
      $("#username").removeClass("is-valid");
    }
  });

  $(document).on('click', "#update", function (e) {
    e.preventDefault();
    infomation.updateFormdata();
  })
});
