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
  results_js.Save_results();
});
$(document).ready(function () {
  results_js.load_user("");
  $(document).on("change", "#chk3", function (e) {
    if ($(this).is(':checked') === true) {
      $("#chk4").prop("checked", false);
      $("#chk5").prop("checked", false);
      $("#chk6").prop("checked", false);
      $("#chk7").prop("checked", false);
      $('#found_sub').prop('disabled', true);
    }
  });
  $(document).on("change", "#chk4", function (e) {
    if ($(this).is(':checked') === true) {
      $("#chk3").prop("checked", false);
      $("#chk5").prop("checked", false);
      $("#chk6").prop("checked", false);
      $("#chk7").prop("checked", false);
      $('#found_sub').prop('disabled', true);
    }
  });
  $(document).on("change", "#chk5", function (e) {
    if ($(this).is(':checked') === true) {
      $("#chk3").prop("checked", false);
      $("#chk4").prop("checked", false);
      $("#chk6").prop("checked", false);
      $("#chk7").prop("checked", false);
      $('#found_sub').prop('disabled', true);
    }
  });
  $(document).on("change", "#chk6", function (e) {
    if ($(this).is(':checked') === true) {
      $("#chk3").prop("checked", false);
      $("#chk4").prop("checked", false);
      $("#chk5").prop("checked", false);
      $("#chk7").prop("checked", false);
      $('#found_sub').prop('disabled', true);
    }
  });
  $(document).on("change", "#chk7", function (e) {
    if ($(this).is(':checked') === true) {
      $("#chk3").prop("checked", false);
      $("#chk4").prop("checked", false);
      $("#chk5").prop("checked", false);
      $("#chk6").prop("checked", false);
      $('#found_sub').prop('disabled', false);
    }
  });
  $(document).on("change", "#chk9", function (e) {
    if ($(this).is(':checked') === true) {
      $("#chk10").prop("checked", false);
      $("#chk11").prop("checked", false);
      $("#chk12").prop("checked", false);
      $("#chk13").prop("checked", false);
      $('#found_sub2').prop('disabled', true);
    }
  });
  $(document).on("change", "#chk10", function (e) {
    if ($(this).is(':checked') === true) {
      $("#chk9").prop("checked", false);
      $("#chk11").prop("checked", false);
      $("#chk12").prop("checked", false);
      $("#chk13").prop("checked", false);
      $('#found_sub2').prop('disabled', true);
    }
  });
  $(document).on("change", "#chk11", function (e) {
    if ($(this).is(':checked') === true) {
      $("#chk9").prop("checked", false);
      $("#chk10").prop("checked", false);
      $("#chk12").prop("checked", false);
      $("#chk13").prop("checked", false);
      $('#found_sub2').prop('disabled', true);
    }
  });
  $(document).on("change", "#chk12", function (e) {
    if ($(this).is(':checked') === true) {
      $("#chk9").prop("checked", false);
      $("#chk10").prop("checked", false);
      $("#chk11").prop("checked", false);
      $("#chk13").prop("checked", false);
      $('#found_sub2').prop('disabled', true);
    }
  });
  $(document).on("change", "#chk13", function (e) {
    if ($(this).is(':checked') === true) {
      $("#chk9").prop("checked", false);
      $("#chk11").prop("checked", false);
      $("#chk12").prop("checked", false);
      $("#chk10").prop("checked", false);
      $('#found_sub2').prop('disabled', false);
    }
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
  $(document).on('change', '#chk1', function (e) {
    if ($(this).is(':checked') === true) {
      $('#chk2').prop('disabled', true);
      $('#chk3').prop('disabled', true);
      $('#chk4').prop('disabled', true);
      $('#chk5').prop('disabled', true);
      $('#chk6').prop('disabled', true);
      $('#chk8').prop('disabled', true);
      $('#chk9').prop('disabled', true);
      $('#chk10').prop('disabled', true);
      $('#chk11').prop('disabled', true);
      $('#chk12').prop('disabled', true);
      $('#chk13').prop('disabled', true);
      $('#found_sub').prop('disabled', true);
      $('#found_sub2').prop('disabled', true);
    }
  });
  $(document).on('change', '#chk1', function (e) {
    if ($(this).is(':checked') === false) {
      $('#chk2').prop('disabled', false);
      $('#chk3').prop('disabled', false);
      $('#chk4').prop('disabled', false);
      $('#chk5').prop('disabled', false);
      $('#chk6').prop('disabled', false);
      $('#chk7').prop('disabled', false);
      $('#chk8').prop('disabled', false);
      $('#chk9').prop('disabled', false);
      $('#chk10').prop('disabled', false);
      $('#chk11').prop('disabled', false);
      $('#chk12').prop('disabled', false);
      $('#chk13').prop('disabled', false);
      $('#found_sub').prop('disabled', false);
      $('#found_sub2').prop('disabled', false);
    }
  });
  $(document).on('change', '#chk2', function (e) {
    if ($(this).is(':checked') === true) {
      $('#chk1').prop('disabled', true);
      $('#chk8').prop('disabled', true);
      $('#chk9').prop('disabled', true);
      $('#chk10').prop('disabled', true);
      $('#chk11').prop('disabled', true);
      $('#chk12').prop('disabled', true);
      $('#chk13').prop('disabled', true);
      $('#found_sub2').prop('disabled', true);
    }
  });
  $(document).on('change', '#chk2', function (e) {
    if ($(this).is(':checked') === false) {
      $('#chk1').prop('disabled', false);
      $('#chk8').prop('disabled', false);
      $('#chk9').prop('disabled', false);
      $('#chk10').prop('disabled', false);
      $('#chk11').prop('disabled', false);
      $('#chk12').prop('disabled', false);
      $('#chk13').prop('disabled', false);
      $('#found_sub2').prop('disabled', false);
    }
  });
  $(document).on('change', '#chk8', function (e) {
    if ($(this).is(':checked') === true) {
      $('#chk1').prop('disabled', true);
      $('#chk2').prop('disabled', true);
      $('#chk3').prop('disabled', true);
      $('#chk4').prop('disabled', true);
      $('#chk5').prop('disabled', true);
      $('#chk6').prop('disabled', true);
      $('#chk7').prop('disabled', true);
      $('#found_sub').prop('disabled', true);
    }
  });
  $(document).on('change', '#chk8', function (e) {
    if ($(this).is(':checked') === false) {
      $('#chk1').prop('disabled', false);
      $('#chk2').prop('disabled', false);
      $('#chk3').prop('disabled', false);
      $('#chk4').prop('disabled', false);
      $('#chk5').prop('disabled', false);
      $('#chk6').prop('disabled', false);
      $('#chk7').prop('disabled', false);
      $('#found_sub').prop('disabled', false);
    }
  });

  $('#show_iframe').hide();
  //------------------------- เพิ่มโดยต้า
  $(document).on("change", '#pd_id', function (e) {
    e.preventDefault();
    var id = $(this).val();
    if (id != '0') {
      $('#btn_show').attr('data-id', id);
      $('#show_iframe').show();
    } else {
      $('#show_iframe').hide();
    }
  })
  $(document).on('click', "#btn_show", function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    $('#show_iframe_modal iframe').attr('src', '../../view/reports/export_pdf.php?pd_id='+id)
    $('#show_iframe_modal').modal('show');

  })
  $(document).ready(function () {
    results_js.load_tumbon_info($("#tumbon").val());
    results_js.load_province_info($("#province").val());
    results_js.load_amphoe_info($("#amphoe").val());
  })
});
