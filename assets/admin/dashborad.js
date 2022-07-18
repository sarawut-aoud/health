var dashboard = {
  dash1: (num = "4") => {
    let frmaction = "../../controller/admin/dashborad.php";

    $.ajax({
      type: "get",
      dataType: "json",
      data: { data: num, set: "4" },
      url: frmaction,
      success: (result) => {
        $("#dash1").html(result.num + " <span>คน</span>");
      },
    });
  },
  dash2: (num = "3") => {
    let frmaction = "../../controller/admin/dashborad.php";

    $.ajax({
      type: "get",
      dataType: "json",
      data: { data: num, set: "3" },
      url: frmaction,
      success: (result) => {
        $("#dash2").html(result.num + " <span>คน</span>");
      },
    });
  },
  dash3: (num = "2") => {
    let frmaction = "../../controller/admin/dashborad.php";

    $.ajax({
      type: "get",
      dataType: "json",
      data: { data: num, set: "2" },
      url: frmaction,
      success: (result) => {
        $("#dash3").html(result.num + " <span>คน</span>");
      },
    });
  },
  dash4: (num = "1") => {
    let frmaction = "../../controller/admin/dashborad.php";

    $.ajax({
      type: "get",
      dataType: "json",
      data: { data: num, set: "1" },
      url: frmaction,
      success: (result) => {
        $("#dash4").html(result.num + " <span>คน</span>");
      },
    });
  },
};
$(document).ready(function () {
  dashboard.dash1();
  dashboard.dash2();
  dashboard.dash3();
  dashboard.dash4();
  setInterval(() => {
    dashboard.dash1();
    dashboard.dash2();
    dashboard.dash3();
    dashboard.dash4();
  },30000);
});
