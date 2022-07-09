$(document).ready(function () {
  //---------------------- ส่วนของ Modal เปลี่ยนตำแหน่ง
  $(document).on("click", ".change_position", function (e) {
    e.preventDefault();
    $("#change_position").modal("show");
  });
});
