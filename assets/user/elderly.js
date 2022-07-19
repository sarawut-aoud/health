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
    stepper.to(2);
  });
  $(document).on("click", ".bs-stepper-content button.previous", function (e) {
    stepper.previous(-1);
  });
});
