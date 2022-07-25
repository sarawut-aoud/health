$(document).ready(function () {
  $(".select2").select2();
  var stepper = new Stepper($(".bs-stepper")[0], {
    linear: false,
    animation: true,
    selectors: {
      steps: ".step",
      trigger: ".step-trigger",
      stepper: ".bs-stepper",
    },
  });
  $(document).on("click", ".bs-stepper-content button.next", function (e) {
    e.preventDefault();
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
