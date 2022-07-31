var elderly = {
  loadtumbon: function (id) {
    let frm = "../../controller/user/elderly.php"
    $("#tumbon_id").html('<option value="">----ตำบล-----</option>');

    if (id) {
      $.ajax({
        type: "GET",
        dataType: "json",
        url: frm,
        data: {
          func: "tumbon",
          id: id,
        },
        success: function (result) {
          var data = '<option value="">----ตำบล-----</option>';
          for (i in result) {
            data +=
              '<option value="' +
              result[i].tumbon_id +
              '">' +
              result[i].tumbon_name +
              "</option>";
          }
          $("#tumbon_id").html(data);
        },
      });
    }

  },
  loadampher: function (id) {
    let frm = "../../controller/user/elderly.php"
    $("#ampher_id").html('<option value="">----อำเภอ-----</option>');

    if (id) {
      $.ajax({
        type: "GET",
        dataType: "json",
        url: frm,

        data: {
          func: "ampher",
          id: id,
        },
        success: function (result) {
          var data = '<option value="">----อำเภอ-----</option>';
          for (i in result) {
            data +=
              '<option value="' +
              result[i].ampher_id +
              '">' +
              result[i].ampher_name +
              "</option>";
          }
          $("#ampher_id").html(data);
        },
      });
    }

  },
  loadprovince: function () {
    let frm = "../../controller/user/elderly.php"
    $("#province_id").html('<option value="">----จังหวัด-----</option>');

    $.ajax({
      type: "GET",
      dataType: "json",
      url: frm,
      data: {
        func: "province",
      },
      success: function (result) {
        var data = '<option value="">----จังหวัด-----</option>';
        for (i in result) {
          data +=
            '<option value="' +
            result[i].province_id +
            '">' +
            result[i].province_name +
            "</option>";
        }
        $("#province_id").html(data);
      },
    });
  },
  Save_form: async function (fdata) {
    let frm = "../../controller/user/elderly.php"
    $.ajax({
      type: "POST",
      dataType: "json",
      url: frm,
      data: { frmdata: fdata, func: "insert" },
      success: function (result) {
        if (result.is_successful == true) {
          Swal.fire({
            icon: "success",
            title: result.message,
            showConfirmButton: false,
            timer: 1500,
          }).then(function () {
            location.reload()
            stepper.to(1);
          });
        } else {
          Swal.fire({
            icon: "info",
            title: "เกิดข้อผิดพลาด",
            html: result.message,
            showConfirmButton: false,
            timer: 1500,
          }).then(function () {
            $(".swal2-modal").modal("hide");
          });
        }
      },
    });
  }
}



//**************************************************************  DOCUMENT READY ********************************************** */
$(document).ready(function () {
  $(".select2").select2();
  $("#birthday").datepicker({
    language: "th-th",
    format: "dd/mm/yyyy",
    autoclose: true,
  });
  $('#id_card').inputmask("9-9999-99999-99-9");
  $('#phone_number').inputmask("099-999-9999");

  elderly.loadprovince();
  elderly.loadampher();

  elderly.loadtumbon();

  $(document).on("change", "#province_id", function (e) {
    e.preventDefault();
    var id = $(this).val();
    elderly.loadampher(id);
  });
  // เลือกอำเภอ แล้วส่ง id ไปหา ตำบล
  $(document).on("change", "#ampher_id", function (e) {
    e.preventDefault();
    var id = $(this).val(); // $(this).val() value ของ id form select ชุดนี้
    elderly.loadtumbon(id);
  });

  var stepper = new Stepper($(".bs-stepper")[0], {
    linear: true,
    animation: true,
    selectors: {
      steps: ".step",
      trigger: ".step-trigger",
      stepper: ".bs-stepper",
    },
  });

  $(document).on("click", ".bs-stepper-content button.next", function (e) {
    e.preventDefault();
    let bt = $(this);
    var forms = document.querySelectorAll('.needs-validation')
    var form = bt.parents('form')[0];
    Array.prototype.slice.call(forms)
      .forEach(function (target) {

        if (form.checkValidity() === false) {
          e.preventDefault();
          e.stopPropagation();

        } else {
          stepper.next();
        }
        target.classList.add('was-validated');
      }, false)

  });
  $(document).on("click", ".bs-stepper-content button.previous", function (e) {
    e.preventDefault();
    stepper.previous(-1);
  });

  $(document).on("click", ".bs-stepper-content button.save", function (e) {
    e.preventDefault();
    var frmdata = $('#form1').serialize();
    frmdata += '&' + $('#form2').serialize();
    frmdata += '&' + $('#form3').serialize();
    frmdata += '&' + $('#form4').serialize();
    frmdata += '&' + $('#form5').serialize();
    frmdata += '&' + $('#form6').serialize();
    elderly.Save_form(frmdata);

  });

  // คัดกรองโรคซึมเศร้า

  $(document).on("change", " #symptom1", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("#symptom2").prop("checked", false).prop("required", false);
    } else {
      $(this).prop("required", true)
      $("#symptom2").prop("required", true);
    }
  });
  $(document).on("change", " #symptom2", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("#symptom1").prop("checked", false).prop("required", false);
    } else {
      $(this).prop("required", true)
      $("#symptom1").prop("required", true);
    }
  });
  $(document).on("change", " #symptom3", function (e) {
    e.preventDefault();

    if ($(this).is(":checked") == true) {
      $("#symptom4").prop("checked", false).prop("required", false);
    } else {
      $(this).prop("required", true)
      $("#symptom4").prop("required", true);
    }
  });
  $(document).on("change", " #symptom4", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("#symptom3").prop("checked", false).prop("required", false);
    } else {
      $(this).prop("required", true)
      $("#symptom3").prop("required", true);
    }
  });

  //บันทึกสุขภาพ 1
  $(document).on("change", "input[name='veget']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='veget']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='veget']").prop("required", true);
    }
  });
  $(document).on("change", " input[name='condiment']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='condiment']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='condiment']").prop("required", true);
    }
  });
  $(document).on("change", " input[name='sweet']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='sweet']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='sweet']").prop("required", true);
    }
  });
  $(document).on("change", " input[name='exercise']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='exercise']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='exercise']").prop("required", true);
    }
  });
  $(document).on("change", " input[name='loll']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='loll']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='loll']").prop("required", true);
    }
  });
  $(document).on("change", " input[name='sleep']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='sleep']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='sleep']").prop("required", true);
    }
  });
  $(document).on("change", " input[name='brush']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='brush']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='brush']").prop("required", true);
    }
  });
  $(document).on("change", " input[name='brushlong']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='brushlong']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='brushlong']").prop("required", true);
    }
  });
  $(document).on("change", " input[name='cigarette']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='cigarette']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='cigarette']").prop("required", true);
    }
  });
  $(document).on("change", " input[name='num']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='num']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='num']").prop("required", true);
    }
  });
  $(document).on("change", " input[name='after']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='after']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='after']").prop("required", true);
    }
  });
  $(document).on("change", " input[name='drink']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='drink']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='drink']").prop("required", true);
    }
  });
  $(document).on("change", " input[name='result']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='result']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='result']").prop("required", true);
    }
  });
  $(document).on("change", " input[name='gum']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='gum']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='gum']").prop("required", true);
    }
  });
  $(document).on("change", " input[name='limestone']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='limestone']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='limestone']").prop("required", true);
    }
  });
  $(document).on("change", " input[name='breast']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='breast']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='breast']").prop("required", true);
    }
  });
  $(document).on("change", " input[name='breastre']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='breastre']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='breastre']").prop("required", true);
    }
  });
  $(document).on("change", " input[name='cervixre']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='cervixre']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='cervixre']").prop("required", true);
    }
  });
  $(document).on("change", " input[name='eye']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='eye']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='eye']").prop("required", true);
    }
  });
  $(document).on("change", " input[name='type_eye']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='type_eye']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='type_eye']").prop("required", true);
    }
  });
  $(document).on("change", " input[name='foot']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='foot']").not(this).prop("checked", false).prop("required", false);
    } else {
      $("input[name='foot']").prop("required", true);
    }
  });
});
