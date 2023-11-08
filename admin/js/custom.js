const dashboardUser = document.querySelector('.dashboard-user');
const dashboardUserSetting = document.querySelector('.dashboard-user-setting');
dashboardUser.addEventListener('click', function () {
  dashboardUserSetting.classList.toggle('hidden-sub');
});

// ===================== DELETE CATEGORIES =========
$(document).ready(function () {
  $('.delete_cate_btn').click(function (e) {
    e.preventDefault();
    var id = $(this).val();
    swal({
      title: 'Xác nhận xoá sản phẩm',
      text: 'Bạn có chắc muốn xoá sản phẩm này?',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          method: 'POST',
          url: 'modules/categories/process_cate_delete.php',
          data: {
            id,
            delete_cate_btn: true,
          },
          success: function (res) {
            if (res == 200) {
              swal({
                title: 'Success!',
                text: 'Category deleted successfully!',
                icon: 'success',
              });
              $('#products_table').load(location.href + ' #products_table');
            } else if (res == 500) {
              swal({
                title: 'Error!',
                text: 'Something went wrong!',
                icon: 'error',
              });
            }
          },
        });
      }
    });
  });
});
// ==================DELETE MANUFACTURERS==========
$(document).ready(function () {
  $('.delete_manu_btn').click(function (e) {
    console.log('Delete manu');
    e.preventDefault();
    var id = $(this).val();
    swal({
      title: 'Xác nhận xoá sản phẩm',
      text: 'Bạn có chắc muốn xoá sản phẩm này?',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          method: 'POST',
          url: 'modules/manufacturers/process_manu_delete.php',
          data: {
            id,
            delete_manu_btn: true,
          },
          success: function (res) {
            if (res == 200) {
              swal({
                title: 'Success!',
                text: 'Category deleted successfully!',
                icon: 'success',
              });
              $('#manufacturer_table').load(
                location.href + ' #manufacturer_table'
              );
            } else if (res == 500) {
              swal({
                title: 'Error!',
                text: 'Something went wrong!',
                icon: 'error',
              });
            }
          },
        });
      }
    });
  });
});
// IMAGE MANUFACTURERS ADD
const fileInput = document.getElementById('dropzone-file');
const selectedImage = document.getElementById('selected-image');
fileInput.addEventListener('change', function () {
  // Kiểm tra xem đã chọn tệp hay chưa
  if (fileInput.files.length > 0) {
    const file = fileInput.files[0];
    // Kiểm tra xem tệp được chọn có phải là hình ảnh hay không
    if (file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = function (e) {
        // Đặt src của thẻ <img> bằng dữ liệu ảnh đã đọc
        selectedImage.src = e.target.result;
      };
      // Đọc tệp ảnh
      reader.readAsDataURL(file);
    }
  }
});
