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
};

$(document).ready(function () {

  infomation.add_province($("#province_set").val());
  infomation.add_tumbon('', $("#tumbon_set").val());
  infomation.add_ampher('', $("#amphoe_set").val());


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
});
