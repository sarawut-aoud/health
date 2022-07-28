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
  Save_cancer: function () {
    var fdata = $("#Formcancer").serialize();

    $.ajax({
      type: "POST",
      dataType: "json",
      url: "../../controller/user/cancer.php",
      data: { frmdata: fdata, func: "insert" },
      success: function (result) {
        if (result.is_successful == true) {
          Swal.fire({
            icon: "success",
            title: result.messchk3,
            showConfirmButton: false,
            timer: 1500,
          }).then(function () {
            location.href = "../../view/app/cancer.php";
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

$(document).ready(function () {
  cancer_js.load_user("");
  $(document).on("change", "#chk1", function (e) {
    e.preventDefault();
    if ($(this).is(':checked') === true) {
      $("#chk2").prop("checked", false).prop("required", false);
    } else {
      $("#chk2").prop("checked", false).prop("required", true);
      $("#chk1").prop("checked", false).prop("required", true);
    }

  });
  $(document).on("change", "#chk2", function (e) {
    e.preventDefault();
    if ($(this).is(':checked') === true) {
      $("#chk1").prop("checked", false).prop("required", false);
    } else {
      $("#chk1").prop("checked", false).prop("required", true);
      $("#chk2").prop("checked", false).prop("required", true);
    }
  });

  $(document).on("change", "#chk3", function (e) {
    e.preventDefault();
    if ($(this).is(':checked') === true) {
      $("#chk4").prop("checked", false).prop("required", false);
    } else {
      $("#chk4").prop("checked", false).prop("required", true);
      $("#chk3").prop("checked", false).prop("required", true);
    }
  });
  $(document).on("change", "#chk4", function (e) {
    e.preventDefault();
    if ($(this).is(':checked') === true) {
      $("#chk3").prop("checked", false).prop("required", false);
    } else {
      $("#chk3").prop("checked", false).prop("required", true);
      $("#chk4").prop("checked", false).prop("required", true);
    }
  });
  $(document).on("change", "#chk5", function (e) {
    e.preventDefault();
    if ($(this).is(':checked') === true) {
      $("#chk6").prop("checked", false).prop("required", false);
    } else {
      $("#chk6").prop("checked", false).prop("required", true);
      $("#chk5").prop("checked", false).prop("required", true);
    }
  });
  $(document).on("change", "#chk6", function (e) {
    e.preventDefault();
    if ($(this).is(':checked') === true) {
      $("#chk5").prop("checked", false).prop("required", false);
    } else {
      $("#chk5").prop("checked", false).prop("required", true);
      $("#chk6").prop("checked", false).prop("required", true);
    }
  });
  $(document).on("change", "#chk7", function (e) {
    e.preventDefault();
    if ($(this).is(':checked') === true) {
      $("#chk8").prop("checked", false).prop("required", false);
    } else {
      $("#chk8").prop("checked", false).prop("required", true);
      $("#chk7").prop("checked", false).prop("required", true);
    }
  });
  $(document).on("change", "#chk8", function (e) {
    e.preventDefault();
    if ($(this).is(':checked') === true) {
      $("#chk7").prop("checked", false).prop("required", false);
    } else {
      $("#chk7").prop("checked", false).prop("required", true);
      $("#chk8").prop("checked", false).prop("required", true);
    }
  });
  $(document).on("change", "#chk9", function (e) {
    e.preventDefault();
    if ($(this).is(':checked') === true) {
      $("#chk10").prop("checked", false).prop("required", false);
    } else {
      $("#chk10").prop("checked", false).prop("required", true);
      $("#chk9").prop("checked", false).prop("required", true);
    }
  });
  $(document).on("change", "#chk10", function (e) {
    e.preventDefault();
    if ($(this).is(':checked') === true) {
      $("#chk9").prop("checked", false).prop("required", false);
    } else {
      $("#chk9").prop("checked", false).prop("required", true);
      $("#chk10").prop("checked", false).prop("required", true);
    }
  });
  $(document).on("change", "#chk11", function (e) {
    e.preventDefault();
    if ($(this).is(':checked') === true) {
      $("#chk12").prop("checked", false).prop("required", false);
    } else {
      $("#chk11").prop("checked", false).prop("required", true);
      $("#chk12").prop("checked", false).prop("required", true);
    }
  });
  $(document).on("change", "#chk12", function (e) {
    e.preventDefault();
    if ($(this).is(':checked') === true) {
      $("#chk11").prop("checked", false).prop("required", false);
    } else {
      $("#chk11").prop("checked", false).prop("required", true);
      $("#chk12").prop("checked", false).prop("required", true);

    }
  });
  $(document).on("click", "#savecancer", function (e) {
    e.preventDefault();

    var forms = document.querySelectorAll('.needs-validation')
    var form = $(this).parents('form')[0];
    Array.prototype.slice.call(forms)
      .forEach(function (target) {

        if (form.checkValidity() === false) {
          e.preventDefault();
          e.stopPropagation();

        } else {
          cancer_js.Save_cancer();
        }
        target.classList.add('was-validated');
      }, false)

  });

});
