var infomation = {
  load_province_info: function (id) {
    $.ajax({
      type: "get",
      dataType: "json",
      url: "../../controller/user/dashborad.php",
      data: {
        province: id,
        func: "province",
      },
      success: function (result) {
        $("#province_id").val(result.province_name);
      },
    });
  },
  load_tumbon_info: function (id){
    $.ajax({
      type: "get",
      dataType: "json",
      url: "../../controller/user/dashborad.php",
      data:{
        tumbon: id,
        func: "tumbon",
      },
      success: function (result){
        $("#tumbon_id").val(result.tumbon_name)
      },
    });
  },
  load_amphoe_info: function (id){
    $.ajax({
      type: "get",
      dataType: "json",
      url: "../../controller/user/dashborad.php",
      data:{
        amphoe: id,
        func: "amphoe",
      },
      success: function (result){
        $("#amphoe_id").val(result.amphoe_name)
      },
    });
  }
};

$(document).ready(function () {
  infomation.load_tumbon_info($("#tumbon").val());
  infomation.load_province_info($("#province").val());
  infomation.load_amphoe_info($("#amphoe").val());
});
