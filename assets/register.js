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
};
$(document).ready(function () {
  $(".select2").select2();
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
});
