var status_js = {
  load_user: function () {
    $.ajax({
      type: "get",
      dataType: "json",
      url: "../../controller/admin/status.php",
      data: { func: "getuser" },
      success: function (result) {
        var data = "<option value=''>-----เลือกผู้ใช้งาน-----</option>";
        for (i in result) {
          data +=
            "<option value='" +
            result[i].pd_id +
            "'>" +
            result[i].fullname +
            "</option>";
        }
        $("#pd_id").html(data);
      },
    });
  },
};
$(document).ready(function () {
  status_js.load_user();

  $(document).on("click", "#saveStatus", function (e) {
    e.preventDefault();
  });
});
