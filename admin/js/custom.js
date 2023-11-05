const dashboardUser = document.querySelector('.dashboard-user');
const dashboardUserSetting = document.querySelector('.dashboard-user-setting');
dashboardUser.addEventListener('click', function () {
  dashboardUserSetting.classList.toggle('hidden-sub');
});

// =====================
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
          url: 'modules/categories/progess_cate_delete.php',
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
