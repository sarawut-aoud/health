$(document).ready(function () {
  //---------------------- ส่วนของ Modal เปลี่ยนตำแหน่ง
  $(document).on("click", ".change_position", function (e) {
    e.preventDefault();
    $("#change_position").modal("show");
  });

  $(document).on("click", ".is_logout", function (e) {
    e.preventDefault();

    Swal.fire({
      title: "คุณต้องการออกจากระบบ",

      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "ตกลง",
      cancelButtonText: "ยกเลิก",
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          icon: "success",
          title: "กำลังทำการออกจากระบบ",
          showConfirmButton: false,
          timer: 1500,
        }).then(function () {
          location.href = "../../../index.php";
        });
      }
    });
  });
});
