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
