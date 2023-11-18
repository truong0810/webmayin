'use strict';

// VALIDATE CATEGORY
// ADD CATEGORY VALIDATE
$(document).ready(function () {
  $('#form-category-add').validate({
    rules: {
      cate_name: {
        required: true,
      },
      cate_slug: {
        required: true,
      },
    },
    messages: {
      cate_name: {
        required: 'This field cannot be empty',
      },
      cate_slug: {
        required: 'This field cannot be empty',
      },
    },
    errorClass: 'border-red-600 text-red-600',
  });
});
// UPDATE CATEGORY VALIDATE
$(document).ready(function () {
  $('#form-category-update').validate({
    rules: {
      cate_name: {
        required: true,
      },
      cate_slug: {
        required: true,
      },
    },
    messages: {
      cate_name: {
        required: 'This field cannot be empty',
      },
      cate_slug: {
        required: 'This field cannot be empty',
      },
    },
    errorClass: 'border-red-600 text-red-600',
  });
});

// VALIDATE MANUFACTURER
// ADD MANUFACTURER VALIDATE
$(document).ready(function () {
  $('#form-manufacturer-add').validate({
    rules: {
      manu_name: {
        required: true,
      },
      manu_phone: {
        required: true,
        maxlength: 15,
      },
      manu_address: {
        required: true,
      },
    },
    messages: {
      manu_name: {
        required: 'This field cannot be empty',
      },
      manu_phone: {
        required: 'This field cannot be empty',
        maxlength: 'Phone number must not be more than 15 characters',
      },
      manu_address: {
        required: 'This field cannot be empty',
      },
    },
    errorClass: 'border-red-600 text-red-600',
  });
});
$(document).ready(function () {
  $('#form-manufacturer-update').validate({
    rules: {
      manu_name: {
        required: true,
      },
      manu_phone: {
        required: true,
        maxlength: 15,
      },
      manu_address: {
        required: true,
      },
    },
    messages: {
      manu_name: {
        required: 'This field cannot be empty',
      },
      manu_phone: {
        required: 'This field cannot be empty',
        maxlength: 'Phone number must not be more than 15 characters',
      },
      manu_address: {
        required: 'This field cannot be empty',
      },
    },
    errorClass: 'border-red-600 text-red-600',
  });
});
