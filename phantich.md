10 bài đăng
1 trang chứa 3 bài
=> có 4 trang
trang 1: 3 -> bỏ qua 0 bài
trang 2: 3 -> bỏ qua 3 bài đầu
trang 3: 3 -> bỏ qua 6 bài đầu
trang 4: 1 -> bỏ qua 9 bài đầu
=> Tại sao ra đc con số 1 ở trang 4
Công thức:
Bỏ qua = số bài trên 1 trang x (số trang hiện tại - 1)

? VẤN ĐỀ -> VD Có 3 bài và số bài trên 1 trang là 1 -> Có 3 trang
Khi tìm kiếm VD chữ lazer thì chỉ có 1 bài viết có cái chữ đấy đấy mà nó vẫn hiện 3 trang

? VẤN ĐỀ -> Khi fix được lỗi trên thì có vấn đề mới VD Có 3 bài và số bài trên 1 trang là 1 -> Có 3 trang Khi tìm kiếm VD chữ lazer thì có 2 bài viết tìm kiếm lần đầu sẽ hiển thị đúng số trang là 2 rồi nhưng khi ấn sang page 2 thì nó lại xuất hiện thành 3 page -> Tại sao -> Vì trên thanh địa chỉ truyền không theo cái ta đang tìm kiếm mà khi bấm vào link nó sẽ chỉ truyền mỗi số trang
=> Giải quyết: Khi nhảy sang trang khác cũng phải truyền ta cái đang tìm kiếm

-> VỀ PHẦN PRODUCTS
1 nhà sản xuất = n sản phẩm
1 sản phẩm = n nhà sản xuất

+) Ảnh image thì sẽ đổi là chọn ảnh từ file
+) Products sẽ có 3 bảng
-> Làm thế nào để khi thêm các trường dữ liệu nó sẽ tự động update vào các bảng tương ứng thông qua product_id
+) Giờ lưu được nhiều ảnh rồi -> VẤN ĐỀ làm để lưu được cái product_id khi thêm ảnh vào database product

+) Khi UPDATE 1 sản phẩm nếu mà không có thông tin chi tiết của 1 sản phẩm mà nó tìm qua product_id thì ta sẽ không thể sửa được sản phẩm vì trong product_details sẽ không có product để lúc => if product đang sửa kiểm tra không có product_id nào trùng với sản phẩm đang sửa thì tức là sản phẩm đấy chưa có thông tin chi tiết => Ta sẽ thêm thông tin của product đấy vào product_details => nếu có rồi thì update lại thôi

+) Trong file process_product_update có 2 đoạn logic giống nhau lặp lại khi ta đổi ảnh thumbnail và không đổi ảnh thumbnail thì cùng logic khi ta sửa hoặc không sửa images ở bảng product_images mà chưa tối ưu được
https://dbdiagram.io/d/6549d38e7d8bbd6465a292e3
//////////////////////
product_thumbnail
product_name
manufacturer_id
category_id
product_price
product_discount
product_type
product_papersize
product_scanspeed
product_doublescan (Scan hai mặt)
product_promotion(Khuyến mãi sốc)
product_selling(Bán chạy)
product_automatic(Khay nạp giấy tự động (ADF))
product_communicate
product_warranty
product_condition
product_images (Ở bảng product_images)
product_desc (ở bảng thông số phụ)

/////THÔNG SỐ PHỤ
product_species(Chủng loại)
product_machinetype
product_activitycycle
product_opticalresolution
product_autodocfeeder
product_scanoptions
product_scansize
product_supportweight
product_autoscanspeed
product_colorbitdepth
product_scanfileformat
product_connect
product_operatingsystem
product_printersize
product_weight
