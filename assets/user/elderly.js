var addelderly = {
  add_tumbon: function (id) {
      $.ajax({
        type: "GET",
        dataType: "json",
        url: "../../controller/user/elderly.php",
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
    add_ampher: function (id) {
      $.ajax({
        type: "GET",
        dataType: "json",
        url: "../../controller/user/elderly.php",
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
    add_province: function () {
      $.ajax({
        type: "GET",
        dataType: "json",
        url: "../../controller/user/elderly.php",
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
    Save_elderly: function () {
      var fdata = $("#Formelderly").serialize();
  
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "../../controller/user/elderly.php",
        data: { Formelderly: fdata, func: "elderly" },
        success: function (result) {
          if (result.is_successful == true) {
            Swal.fire({
              icon: "success",
              title: result.message,
              showConfirmButton: false,
              timer: 1500,
            }).then(function () {
              location.href = "../../view/app/elderly.php";
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
    update_elderly: function () {
      var fdata = $("#Formelderly").serialize();
  
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "../../controller/user/elderly.php",
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
};

$(document).ready(function () {
    $(".select2").select2();
    $("#birthday").datepicker({
      language: "th-th",
      format: "dd/mm/yyyy",
      autoclose: true,
    });
  
    addelderly.add_province();
  
    // เลือกจังหวัด แล้วส่ง id ไปหา อำเภอ
    $(document).on("change", "#province_id", function (e) {
      e.preventDefault();
      var id = $(this).val();
      // $(this).val() value ของ id form select ชุดนี้  id from select id="province_id" เรียกใช้ #province_id
      addelderly.add_ampher(id);
    });
    // เลือกอำเภอ แล้วส่ง id ไปหา ตำบล
    $(document).on("change", "#ampher_id", function (e) {
      e.preventDefault();
      var id = $(this).val(); // $(this).val() value ของ id form select ชุดนี้
      addelderly.add_tumbon(id);
    });
    $(document).on("click", "#elderly", function (e) {
      e.preventDefault();
      addelderly.Save_elderly();
    });
    $(document).on("click", "#edit", function (e) {
      e.preventDefault();
      $("#saveStatus").hide();
      $("#updateStatus,#cancle").show();
  
      status_js.load_user($(this).val());
      status_js.load_status($(this).val());
    });
    $(document).on("click", "#updateStatus", function (e) {
      e.preventDefault();
      addelderly.update_elderly();
    });
});