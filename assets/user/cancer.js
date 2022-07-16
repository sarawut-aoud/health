var cancer_js = {
    load_user: function (id) {
      $.ajax({
        type: "get",
        dataType: "json",
        url: "../../controller/user/cancer.php",
        data: { func: "getuser" },
        success: function (result) {
          var data = "<option value='0'>-----เลือกผู้สูงอายุ-----</option>";
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
    // Save_status: function () {
    //   var fdata = $("#frmstatus").serialize();
  
    //   $.ajax({
    //     type: "POST",
    //     dataType: "json",
    //     url: "../../controller/admin/status.php",
    //     data: { frmdata: fdata, func: "insert" },
    //     success: function (results) {
    //       if (results.is_successful == true) {
    //         Swal.fire({
    //           icon: "success",
    //           title: results.message,
    //           showConfirmButton: false,
    //           timer: 1500,
    //         }).then(function () {
    //           location.reload();
    //         });
    //       } else {
    //         Swal.fire({
    //           icon: "info",
    //           title: "เกิดข้อผิดพลาด",
    //           html: results.message,
    //           showConfirmButton: false,
    //           timer: 1500,
    //         });
    //       }
    //     },
    //   });
    // },
    
  };
    $(document).ready(function () {
        cancer_js.load_user("");
    $(document).on("change", "#chk1", function (e) {
        e.preventDefault();
        $("#chk2").prop("checked", false);
      });
      $(document).on("change", "#chk2", function (e) {
        e.preventDefault();
        $("#chk1").prop("checked", false);
      });

      $(document).on("change", "#chk3", function (e) {
        e.preventDefault();
        $("#chk4").prop("checked", false);
      });
      $(document).on("change", "#chk4", function (e) {
        e.preventDefault();
        $("#chk3").prop("checked", false);
      });
      $(document).on("change", "#chk5", function (e) {
        e.preventDefault();
        $("#chk6").prop("checked", false);
      });
      $(document).on("change", "#chk6", function (e) {
        e.preventDefault();
        $("#chk5").prop("checked", false);
      });
      $(document).on("change", "#chk7", function (e) {
        e.preventDefault();
        $("#chk8").prop("checked", false);
      });
      $(document).on("change", "#chk8", function (e) {
        e.preventDefault();
        $("#chk7").prop("checked", false);
      });
      $(document).on("change", "#chk9", function (e) {
        e.preventDefault();
        $("#chk10").prop("checked", false);
      });
      $(document).on("change", "#chk10", function (e) {
        e.preventDefault();
        $("#chk9").prop("checked", false);
      });
      $(document).on("change", "#chk11", function (e) {
        e.preventDefault();
        $("#chk12").prop("checked", false);
      });
      $(document).on("change", "#chk12", function (e) {
        e.preventDefault();
        $("#chk11").prop("checked", false);
      });
    // $(document).on("click", "#saveStatus", function (e) {
    //   e.preventDefault();
    //   status_js.Save_status();
    // });

  });
  