var results_js = {
    load_user: function (id) {
      $.ajax({
        type: "get",
        dataType: "json",
        url: "../../controller/user/results.php",
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
    Save_results: function () {
      var fdata = $("#Formresults").serialize();
  
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "../../controller/user/results.php",
        data: { frmdata: fdata, func: "insert" },
        success: function (result) {
            if (result.is_successful == true) {
              Swal.fire({
                icon: "success",
                title: result.messchk3,
                showConfirmButton: false,
                timer: 1500,
              }).then(function () {
                location.href = "../../view/user/results.php";
              });
            } else {
              Swal.fire({
                icon: "info",
                title: "เกิดข้อผิดพลาด",
                html: result.messchk3,
                showConfirmButton: false,
                timer: 1500,
              }).then(function () {
                $(".swal2-modal").modal("hide");
              });
            }
          },
        });
    },
    
  };

   $(document).on("click", "#saveresults", function (e) {
     e.preventDefault();
     results_js.Save_cancer();
   });
    $(document).ready(function () {
        results_js.load_user("");
    $(document).on("change", "#chk1", function (e) {
        e.preventDefault();
        $("#chk2").prop("checked", false);
        $("#chk8").prop("checked", false);
      });
      $(document).on("change", "#chk2", function (e) {
        e.preventDefault();
        $("#chk1").prop("checked", false);
        $("#chk8").prop("checked", false);
        
      });
      $(document).on("change", "#chk8", function (e) {
        e.preventDefault();
        $("#chk1").prop("checked", false);
        $("#chk2").prop("checked", false);
      });
      $(document).on("change", "#chk14", function (e) {
        e.preventDefault();
        $("#chk15").prop("checked", false);
        $("#chk16").prop("checked", false);
      });
      $(document).on("change", "#chk15", function (e) {
        e.preventDefault();
        $("#chk14").prop("checked", false);
        $("#chk16").prop("checked", false);
      });
      $(document).on("change", "#chk16", function (e) {
        e.preventDefault();
        $("#chk14").prop("checked", false);
        $("#chk15").prop("checked", false);
      });
 

  });
  