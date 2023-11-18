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
// UPDATE MANUFACTURER VALIDATE
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

// VALIDATE PRODUCT
// ADD PRODUCT VALIDATE
$(document).ready(function () {
  $('#form-product-add').validate({
    rules: {
      product_name: {
        required: true,
      },
      manufacturer_id: {
        required: true,
      },
      category_id: {
        required: true,
      },
      product_price: {
        required: true,
      },
      product_discount: {
        required: true,
      },
      product_type: {
        required: true,
      },
      product_papersize: {
        required: true,
      },
      product_scanspeed: {
        required: true,
      },
      product_doublescan: {
        required: true,
      },
      product_promotion: {
        required: true,
      },
      product_selling: {
        required: true,
      },
      product_automatic: {
        required: true,
      },
      product_communicate: {
        required: true,
      },
      product_warranty: {
        required: true,
      },
      product_condition: {
        required: true,
      },
      product_desc: {
        required: true,
      },
      product_species: {
        required: true,
      },
      product_machinetype: {
        required: true,
      },
      product_activitycycle: {
        required: true,
      },
      product_opticalresolution: {
        required: true,
      },
      product_autodocfeeder: {
        required: true,
      },
      product_scanoptions: {
        required: true,
      },
      product_scansize: {
        required: true,
      },
      product_supportweight: {
        required: true,
      },
      product_autoscanspeed: {
        required: true,
      },
      product_colorbitdepth: {
        required: true,
      },
      product_memory: {
        required: true,
      },
      product_scanfileformat: {
        required: true,
      },
      product_connect: {
        required: true,
      },
      product_operatingsystem: {
        required: true,
      },
      product_printersize: {
        required: true,
      },
      product_weight: {
        required: true,
      },
    },
    messages: {
      product_name: {
        required: 'This field cannot be empty',
      },
      product_price: {
        required: 'This field cannot be empty',
      },
      product_discount: {
        required: 'This field cannot be empty',
      },
      product_type: {
        required: 'This field cannot be empty',
      },
      product_papersize: {
        required: 'This field cannot be empty',
      },
      product_scanspeed: {
        required: 'This field cannot be empty',
      },
      product_doublescan: {
        required: 'This field cannot be empty',
      },
      product_promotion: {
        required: 'This field cannot be empty',
      },
      product_selling: {
        required: 'This field cannot be empty',
      },
      product_automatic: {
        required: 'This field cannot be empty',
      },
      product_communicate: {
        required: 'This field cannot be empty',
      },
      product_warranty: {
        required: 'This field cannot be empty',
      },
      product_condition: {
        required: 'This field cannot be empty',
      },
      product_desc: {
        required: 'This field cannot be empty',
      },
      product_species: {
        required: 'This field cannot be empty',
      },
      product_machinetype: {
        required: 'This field cannot be empty',
      },
      product_activitycycle: {
        required: 'This field cannot be empty',
      },
      product_opticalresolution: {
        required: 'This field cannot be empty',
      },
      product_autodocfeeder: {
        required: 'This field cannot be empty',
      },
      product_scanoptions: {
        required: 'This field cannot be empty',
      },
      product_scansize: {
        required: 'This field cannot be empty',
      },
      product_supportweight: {
        required: 'This field cannot be empty',
      },
      product_autoscanspeed: {
        required: 'This field cannot be empty',
      },
      product_colorbitdepth: {
        required: 'This field cannot be empty',
      },
      product_memory: {
        required: 'This field cannot be empty',
      },
      product_scanfileformat: {
        required: 'This field cannot be empty',
      },
      product_connect: {
        required: 'This field cannot be empty',
      },
      product_operatingsystem: {
        required: 'This field cannot be empty',
      },
      product_printersize: {
        required: 'This field cannot be empty',
      },
      product_weight: {
        required: 'This field cannot be empty',
      },
    },
    errorClass: 'border-red-600 text-red-600',
  });
});
// UPDATE PRODUCT VALIDATE
$(document).ready(function () {
  $('#form-product-update').validate({
    rules: {
      product_name: {
        required: true,
      },
      manufacturer_id: {
        required: true,
      },
      category_id: {
        required: true,
      },
      product_price: {
        required: true,
      },
      product_discount: {
        required: true,
      },
      product_type: {
        required: true,
      },
      product_papersize: {
        required: true,
      },
      product_scanspeed: {
        required: true,
      },
      product_doublescan: {
        required: true,
      },
      product_promotion: {
        required: true,
      },
      product_selling: {
        required: true,
      },
      product_automatic: {
        required: true,
      },
      product_communicate: {
        required: true,
      },
      product_warranty: {
        required: true,
      },
      product_condition: {
        required: true,
      },
      product_desc: {
        required: true,
      },
      product_species: {
        required: true,
      },
      product_machinetype: {
        required: true,
      },
      product_activitycycle: {
        required: true,
      },
      product_opticalresolution: {
        required: true,
      },
      product_autodocfeeder: {
        required: true,
      },
      product_scanoptions: {
        required: true,
      },
      product_scansize: {
        required: true,
      },
      product_supportweight: {
        required: true,
      },
      product_autoscanspeed: {
        required: true,
      },
      product_colorbitdepth: {
        required: true,
      },
      product_memory: {
        required: true,
      },
      product_scanfileformat: {
        required: true,
      },
      product_connect: {
        required: true,
      },
      product_operatingsystem: {
        required: true,
      },
      product_printersize: {
        required: true,
      },
      product_weight: {
        required: true,
      },
    },
    messages: {
      product_name: {
        required: 'This field cannot be empty',
      },
      product_price: {
        required: 'This field cannot be empty',
      },
      product_discount: {
        required: 'This field cannot be empty',
      },
      product_type: {
        required: 'This field cannot be empty',
      },
      product_papersize: {
        required: 'This field cannot be empty',
      },
      product_scanspeed: {
        required: 'This field cannot be empty',
      },
      product_doublescan: {
        required: 'This field cannot be empty',
      },
      product_promotion: {
        required: 'This field cannot be empty',
      },
      product_selling: {
        required: 'This field cannot be empty',
      },
      product_automatic: {
        required: 'This field cannot be empty',
      },
      product_communicate: {
        required: 'This field cannot be empty',
      },
      product_warranty: {
        required: 'This field cannot be empty',
      },
      product_condition: {
        required: 'This field cannot be empty',
      },
      product_desc: {
        required: 'This field cannot be empty',
      },
      product_species: {
        required: 'This field cannot be empty',
      },
      product_machinetype: {
        required: 'This field cannot be empty',
      },
      product_activitycycle: {
        required: 'This field cannot be empty',
      },
      product_opticalresolution: {
        required: 'This field cannot be empty',
      },
      product_autodocfeeder: {
        required: 'This field cannot be empty',
      },
      product_scanoptions: {
        required: 'This field cannot be empty',
      },
      product_scansize: {
        required: 'This field cannot be empty',
      },
      product_supportweight: {
        required: 'This field cannot be empty',
      },
      product_autoscanspeed: {
        required: 'This field cannot be empty',
      },
      product_colorbitdepth: {
        required: 'This field cannot be empty',
      },
      product_memory: {
        required: 'This field cannot be empty',
      },
      product_scanfileformat: {
        required: 'This field cannot be empty',
      },
      product_connect: {
        required: 'This field cannot be empty',
      },
      product_operatingsystem: {
        required: 'This field cannot be empty',
      },
      product_printersize: {
        required: 'This field cannot be empty',
      },
      product_weight: {
        required: 'This field cannot be empty',
      },
    },
    errorClass: 'border-red-600 text-red-600',
  });
});
