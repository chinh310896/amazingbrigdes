$(function () {
  $.validator.addMethod(
    "regex",
    function (value, element, param) {
      return this.optional(element) || param.test(value);
    },
    "Invalid format."
  );

  $("form").validate({
    errorClass: "text-danger",
    errorElement: "span",
    rules: {
      name: {
        required: true,
        regex: /^([a-zA-Z]+?)([-\s'][a-zA-Z]+)*?$/
      },
      begin: {
        regex: /^\d{1,10}( AD| BC)?$/
      },
      end: {
        regex: /^\d{1,10}( AD| BC)?$/
      },
      opened: {
        required: true,
        regex: /^\d{1,10}( AD| BC)?$/
      },
      country: "required",
      location: "required",
      length: {
        required: true,
        number: true
      },
      height: "number",
      clb: "number",
      width: "number",
      span: "number",
      description: "required",
      mapurl: {
        required: true,
        url: true
      },
      adminName: {
        required: true,
        regex: /^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/
      },
      email: {
        required: true,
        email: true
      },
      pwd: {
        required: true,
        regex: /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/
      },
      categoryName: {
        required: true,
        regex: /^[a-zA-Z ]*$/
      },
      loginName: "required",
      loginPwd: "required"      
    },
    messages: {
      name: {
        regex: "Only letters, spaces and hyphens allowed."
      },
      begin: {
        regex: "Maximum 10 digits. Optional suffix: AD|BC."
      },
      end: {
        regex: "Maximum 10 digits. Optional suffix: AD|BC."
      },
      opened: {
        regex: "Maximum 10 digits. Optional suffix: AD|BC."
      },
      adminName: {
          regex: "Only letters, numbers and underscores allowed."
      },
      pwd: {
          regex: "Minimum eight characters, must include at least one letter and one number."
      },
      categoryName: {
          regex: "Only letters and spaces allowed."
      }
    },
    submitHandler: function (form) {
      form.submit();
    }
  });
          
});
