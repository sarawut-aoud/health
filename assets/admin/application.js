var application = {
  loadapplication: async function (pd_id) {
    let frmaction = "../../controller/admin/application.php";
    await $.ajax({
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
            '   class="custom-control-input"   type="checkbox" target="application_id" id="application_id' +
            result[i].id +
            '" name="application_name[' +
            result[i].id +
            ']" value="' +
            result[i].id +
            '">';
          data +=
            '<label for="application_name' +
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
  SaveFormdata: async function () {
    let frmdata = $("#frmapplication").serialize();
  },
};
$(document).ready(function () {
  application.loadapplication("");
  application.load_user("");
});
