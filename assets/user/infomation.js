var infomation = {
  loadprovince: function (id) {
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
};

$(document).ready(function () {
  infomation.loadtumbon($("#tumbon").val());
});
