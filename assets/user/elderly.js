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
}

//**************************************************************  DOCUMENT READY ********************************************** */
$(document).ready(function () {
  $(".select2").select2();

  elderly.loadprovince();
  elderly.loadampher();

  elderly.loadtumbon();

  $(document).on("change", "#province_id", function (e) {
    e.preventDefault();
    var id = $(this).val();
    // $(this).val() value ของ id form select ชุดนี้  id from select id="province_id" เรียกใช้ #province_id
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
  $(document).on("click", "#form1 .bs-stepper-content button.next", function (e) {
    e.preventDefault();
    let fdata = new FormData($('#form1')[0]);
    stepper.next();

  });
  $(document).on("click", ".bs-stepper-content button.previous", function (e) {
    e.preventDefault();
    stepper.previous(-1);
  });

  // คัดกรองโรคซึมเศร้า

  $(document).on("change", " #symptom1", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("#symptom2").prop("checked", false);
    }
  });
  $(document).on("change", " #symptom2", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("#symptom1").prop("checked", false);
    }
  });
  $(document).on("change", " #symptom3", function (e) {
    e.preventDefault();

    if ($(this).is(":checked") == true) {
      $("#symptom4").prop("checked", false);
    }
  });
  $(document).on("change", " #symptom4", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("#symptom3").prop("checked", false);
    }
  });

  //บันทึกสุขภาพ 1
  $(document).on("change", "input[name='veget']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='veget']").not(this).prop("checked", false);
    }
  });
  $(document).on("change", " input[name='condiment']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='condiment']").not(this).prop("checked", false);
    }
  });
  $(document).on("change", " input[name='sweet']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='sweet']").not(this).prop("checked", false);
    }
  });
  $(document).on("change", " input[name='exercise']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='exercise']").not(this).prop("checked", false);
    }
  });
  $(document).on("change", " input[name='loll']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='loll']").not(this).prop("checked", false);
    }
  });
  $(document).on("change", " input[name='sleep']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='sleep']").not(this).prop("checked", false);
    }
  });
  $(document).on("change", " input[name='brush']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='brush']").not(this).prop("checked", false);
    }
  });
  $(document).on("change", " input[name='brushlong']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='brushlong']").not(this).prop("checked", false);
    }
  });
  $(document).on("change", " input[name='cigarette']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='cigarette']").not(this).prop("checked", false);
    }
  });
  $(document).on("change", " input[name='num']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='num']").not(this).prop("checked", false);
    }
  });
  $(document).on("change", " input[name='after']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='after']").not(this).prop("checked", false);
    }
  });
  $(document).on("change", " input[name='drink']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='drink']").not(this).prop("checked", false);
    }
  });
  $(document).on("change", " input[name='result']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='result']").not(this).prop("checked", false);
    }
  });
  $(document).on("change", " input[name='gum']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='gum']").not(this).prop("checked", false);
    }
  });
  $(document).on("change", " input[name='limestone']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='limestone']").not(this).prop("checked", false);
    }
  });
  $(document).on("change", " input[name='breast']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='breast']").not(this).prop("checked", false);
    }
  });
  $(document).on("change", " input[name='breastre']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='breastre']").not(this).prop("checked", false);
    }
  });
  $(document).on("change", " input[name='cervixre']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='cervixre']").not(this).prop("checked", false);
    }
  });
  $(document).on("change", " input[name='eye']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='eye']").not(this).prop("checked", false);
    }
  });
  $(document).on("change", " input[name='type_eye']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='type_eye']").not(this).prop("checked", false);
    }
  });
  $(document).on("change", " input[name='foot']", function (e) {
    e.preventDefault();
    if ($(this).is(":checked") == true) {
      $("input[name='foot']").not(this).prop("checked", false);
    }
  });
});
