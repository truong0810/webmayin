<?php
require_once("admin/config/config.php");
$product_id = $_GET['id'];
$sql_chitiet = "SELECT product.*,category.name AS category_name, manufacturer.*, product_details.*, product_images.*
FROM product
LEFT JOIN category ON product.category_id = category.id
LEFT JOIN manufacturer ON product.manufacturer_id = manufacturer.id
LEFT JOIN product_details ON product.id = product_details.product_id
LEFT JOIN product_images ON product.id = product_images.product_id
WHERE product.id = $product_id";

$query_product_details = mysqli_query($mysqli, $sql_chitiet);
$each = mysqli_fetch_array($query_product_details);

$discountPercentage = (($each['price'] - $each['discount']) / $each['price']) * 100;
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <!-- ===================SWIPER CSS======================= -->
   <link rel="stylesheet" href="./css/swiper-bundle.min.css" />
   <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
   <!-- ====================TAILWIND + GG FONT====================== -->
   <?php
   require_once("pages/general.php");
   ?>
   <script src="./handle/script.js"></script>
   <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="./css/main.css" />
   <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
   <title>Document</title>
</head>

<body class="w-full h-full min-h-[100vh]">
   <div class="container">
      <?php
      require_once("pages/header.php");
      ?>
      <main class="px-3 pb-10">
         <!-- =========SINGLE PRODUCT HEADER========= -->
         <section class="single-product-header">
            <div class="mt-7">
               <nav class="flex items-center gap-3 text-sm text-[#1A7FD7]">
                  <a href="#">Trang chủ</a>
                  <span>/</span>
                  <a href="#">Máy Scan</a>
                  <span>/</span>
                  <a href="#">Máy Scan HP</a>
               </nav>
            </div>
         </section>
         <!-- =========PRODUCT DETAILS=============== -->
         <section class="product-details">
            <div class="grid grid-cols-[600px_minmax(0,_1fr)] mt-5 gap-5">
               <!-- =====PRODUCT DETAILS IMAGE======= -->
               <div>
                  <div class="product-details-item relative w-full h-[600px] border border-gray-400 transition-all">
                     <img src="admin/modules/products/store/<?= $each['thumbnail'] ?>" class="w-full h-full object-cover" />
                     <div class="btn-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                     </div>
                     <div class="btn-next">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                     </div>
                     <div class="flex items-center justify-center text-gray-700 absolute bottom-0 left-0 p-5">
                        <a class="p-2 rounded-2xl border border-gray-500 hover:bg-primaryHover hover:text-white transition-all open-images">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                           </svg>
                        </a>
                     </div>
                  </div>

                  <div class="flex items-center gap-3 mt-3">
                     <?php foreach ($query_product_details as $rs) : ?>
                        <div class="details-active w-[135px] h-[135px] wrapper-images">
                           <img src="admin/modules/products/store/<?= $rs['images'] ?>" class="w-full h-full object-cover cursor-pointer" />
                        </div>
                     <?php endforeach; ?>
                  </div>

               </div>
               <!-- =====PRODUCT DETAILS INFO================ -->
               <div>
                  <!-- TÊN MÁY -->
                  <h3 class="text-gray55 text-2xl hidden-text font-semibold">
                     <?= $each['title'] ?>
                  </h3>

                  <!-- GIÁ CẢ -->
                  <div class="mt-8">
                     <div class="flex items-center gap-3">
                        <span class="text-gray8e line-through text-lg"> <?= number_format($each['price'], 0, ',', '.') ?>
                           <span class="inline-block -translate-y-1">₫</span></span>
                        <span class="inline-block bg-[#c40c00] rounded-lg py-[2px] px-[10px] text-white text-md">
                           -<?= round(abs($discountPercentage)) ?>%</span>
                     </div>
                     <div class="mt-2 flex items-end gap-3">
                        <p class="text-secondary text-3xl font-bold">
                           <?= number_format($each['discount'], 0, ',', '.') ?>
                           <span class="inline-block -translate-y-2">₫</span>
                        </p>
                        <span class="text-[15px] text-[#a4a4a4] font-semibold">(Giá đã có VAT)</span>
                     </div>
                  </div>
                  <!-- THÔNG TIN MÁY IN -->
                  <div class="flex flex-col gap-2 mt-4">
                     <div class="flex items-center gap-2">
                        <span class="text-black font-bold">Loại máy: </span>
                        <span class="text-gray8e"><?= $each['printer_type'] ?></span>
                     </div>
                     <div class="flex items-center gap-2">
                        <span class="text-black font-bold">Khổ giấy: </span>
                        <span class="text-gray8e"><?= $each['paper_size'] ?></span>
                     </div>
                     <div class="flex items-center gap-2">
                        <span class="text-black font-bold">Tốc độ scan: </span>
                        <span class="text-gray8e">
                           <?= $each['scan_speed'] ?></span>
                     </div>
                     <div class="flex items-center gap-2">
                        <span class="text-black font-bold">Scan hai mặt: </span>
                        <span class="text-gray8e">
                           <?= $each['double_sided_scanning'] == 0 ? "Không" : "Có" ?>
                        </span>
                     </div>
                     <div class="flex items-center gap-2">
                        <span class="text-black font-bold">Khay nạp giấy tự động (ADF):
                        </span>
                        <span class="text-gray8e">
                           <?= $each['automatic_paper_feeder'] == 0 ? "Không có sẵn" : "Có sẵn" ?>
                        </span>
                     </div>
                     <div class="flex items-center gap-2">
                        <span class="text-black font-bold">Cổng giao tiếp: </span>
                        <span class="text-gray8e">
                           <?= $each['printer_communicate'] ?>
                        </span>
                     </div>
                     <div class="flex items-center gap-2">
                        <span class="text-black font-bold">Bảo hành: </span>
                        <span class="text-gray8e">
                           <?= $each['warranty'] ?>
                        </span>
                     </div>
                     <div class="flex items-center gap-2">
                        <span class="text-black font-bold">Tình trạng máy: </span>
                        <span class="text-gray8e">
                           <?= $each['printer_condition'] ?>
                        </span>
                     </div>
                  </div>

                  <!-- ĐÁNH GIÁ SẢN PHẨM -->
                  <div class="flex items-center gap-x-10 mt-5">
                     <div class="w-[150px]">
                        <img src="admin/modules/manufacturers/uploads/<?= $each['logo'] ?>" alt="Logo" class="w-full h-full object-cover">
                     </div>
                     <button class="flex flex-col items-center bg-primary text-white px-4 py-1 rounded-lg hover:bg-primary transition-all">
                        <p>Đánh giá sản phẩm</p>
                        <fieldset class="rating">
                           <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                           <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                           <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                           <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                           <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                           <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                           <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                           <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                           <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                           <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                        </fieldset>
                     </button>
                  </div>


                  <!-- SẴN HÀNG  -->
                  <p class="text-[#31c064] text-base font-semibold flex items-center gap-2 mt-5">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                     </svg>
                     Sẵn hàng
                  </p>

                  <!-- FORM ĐẶT HÀNG -->
                  <form action="carts.php?id=<?= $product_id ?>" method="post">
                     <div class="mt-5 flex flex-col gap-2">
                        <span class="text-gray22 text-[15px] font-bold">Số lượng:</span>
                        <!-- ================================ -->
                        <div class="flex items-center gap-3">
                           <!-- BTN INCREMENT -->
                           <div class="py-2 px-1 border border-primary text-primary rounded-lg">
                              <button class="px-3 py-1 border border-primary rounded-full hover:bg-primary hover:text-white transition-all">
                                 -
                              </button>
                              <span class="text-xl px-4 font-bold">1</span>
                              <button class="px-3 py-1 border border-primary rounded-full hover:bg-primary hover:text-white transition-all">
                                 +
                              </button>
                           </div>
                           <!-- BTN ADD CART -->
                           <div>
                              <button type="submit" name="add_order" class="flex items-center justify-center gap-3 bg-secondary text-white hover:bg-[#c40c00] px-10 py-3 rounded-lg transition-all font-semibold h-[50px] w-[300px]">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                 </svg>
                                 Thêm vào giỏ hàng
                              </button>
                           </div>
                           <!-- BTN GỬI BÁO GIÁ -->
                           <div>
                              <p class="cursor-pointer flex items-center justify-center gap-3 uppercase bg-primary text-white rounded-lg px-10 py-3 font-bold hover:bg-[#000] transition-all h-[50px] w-[300px]">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                 </svg>
                                 Gửi báo giá
                              </p>
                           </div>
                        </div>
                        <!-- ============================== -->
                        <div class="flex items-center gap-3">
                           <!-- BTN TRẢ GÓP QUA THẺ -->
                           <button disabled class="cursor-pointer text-white uppercase text-center px-20 rounded-lg font-bold bg-[#288ad6] text-sm group h-[50px] w-[370px]">
                              <p class="group-hover:text-lg">Trả góp qua thẻ</p>
                              <p class="group-hover:text-xs font-normal">
                                 Visa,Master,JCB
                              </p>
                           </button>
                           <!-- BTN TRẢ GÓP -->
                           <button disabled class="cursor-pointer text-white uppercase flex flex-col items-center px-20 rounded-lg font-bold bg-[#288ad6] text-sm group h-[50px] w-[370px]">
                              <p class="group-hover:text-lg">Trả góp</p>
                              <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                 </svg>
                              </span>
                           </button>
                        </div>
                     </div>
                  </form>
                  <div class="mt-5 flex flex-col gap-2"></div>
               </div>
            </div>
         </section>

         <!-- ============PRODUCT DESCRIPTION=================== -->
         <section class="product-description">
            <div class="grid grid-cols-[926px_minmax(0,_1fr)] gap-5 mt-10">
               <!-- ======DESCRIPTION===== -->
               <div class="border border-gray-500 w-full h-fit">
                  <span class="block text-center text-lg py-2 text-white bg-primary w-full uppercase font-bold">Mô Tả</span>
                  <div class="text-center">
                     <p class="mt-4 text-gray22 text-[19px] capitalize hidden-text font-bold">
                        <?= $each['title'] ?>
                     </p>
                     <p class="mt-4 italic">(Bảo hành: <?= $each['warranty'] ?>)</p>
                  </div>

                  <div class="px-4 mt-10 pb-10">
                     <p>
                        <?= $each['description'] ?>
                     </p>
                  </div>
               </div>
               <!-- ======TECHNICAL SPECIFICATIONS===== -->
               <div class="border border-gray-500 w-full">
                  <span class="block text-center text-lg py-2 text-white bg-primary w-full uppercase font-bold">Thông số kỹ thuật</span>
                  <div class="p-4 relative overflow-x-auto">
                     <table class="w-full text-sm text-left text-black">
                        <tbody>
                           <tr class="bg-white border-b">
                              <td class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap w-[130px]">
                                 Hãng sản xuất
                              </td>
                              <td class="px-6 py-4">
                                 <?= $each['name'] ?>
                              </td>
                           </tr>
                           <tr class="bg-white border-b">
                              <td class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap w-[130px]">
                                 Chủng loại
                              </td>
                              <td class="px-6 py-4">
                                 <?= $each['species'] ?>
                              </td>
                           </tr>
                           <tr class="bg-white border-b">
                              <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                                 Loại máy
                              </td>
                              <td class="px-6 py-4">
                                 <?= $each['machine_type'] ?>
                              </td>
                           </tr>
                           <tr class="bg-white border-b">
                              <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                                 Chu kỳ hoạt động (hàng ngày)
                              </td>
                              <td class="px-6 py-4">
                                 <?= $each['activity_cycle'] ?>
                              </td>
                           </tr>
                           <tr class="bg-white border-b">
                              <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                                 Độ phân giải quang học
                              </td>
                              <td class="px-6 py-4">
                                 <?= $each['optical_resolution'] ?>
                              </td>
                           </tr>
                           <tr class="bg-white border-b">
                              <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                                 Công suất khay nạp tài liệu tự động
                              </td>
                              <td class="px-6 py-4">
                                 <?= $each['auto_doc_feeder'] ?>
                              </td>
                           </tr>
                           <tr class="bg-white border-b">
                              <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                                 Tùy chọn chụp quét (ADF)
                              </td>
                              <td class="px-6 py-4">
                                 <?= $each['scan_options'] ?>
                              </td>
                           </tr>
                           <tr class="bg-white border-b">
                              <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                                 Kích thước chụp quét (ADF)
                              </td>
                              <td class="px-6 py-4">
                                 <?= $each['scan_size'] ?>
                              </td>
                           </tr>
                           <tr class="bg-white border-b">
                              <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                                 Trọng lượng giấy ảnh media, được hỗ trợ ADF
                              </td>
                              <td class="px-6 py-4">
                                 <?= $each['support_weight'] ?>
                              </td>
                           </tr>
                           <tr class="bg-white border-b">
                              <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                                 Tốc độ chụp quét của khay nạp tài liệu tự động
                              </td>
                              <td class="px-6 py-4">
                                 <?= $each['auto_scan_speed'] ?>
                              </td>
                           </tr>
                           <tr class="bg-white border-b">
                              <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                                 Chiều sâu bit màu
                              </td>
                              <td class="px-6 py-4">
                                 <?= $each['color_bit_depth'] ?>
                              </td>
                           </tr>
                           <tr class="bg-white border-b">
                              <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                                 Bộ nhớ
                              </td>
                              <td class="px-6 py-4">
                                 <?= $each['memory'] ?>
                              </td>
                           </tr>
                           <tr class="bg-white border-b">
                              <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                                 Định dạng file scan
                              </td>
                              <td class="px-6 py-4">
                                 <?= $each['scan_file_format'] ?>
                              </td>
                           </tr>
                           <tr class="bg-white border-b">
                              <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                                 Kết nối
                              </td>
                              <td class="px-6 py-4">
                                 <?= $each['connect'] ?>
                              </td>
                           </tr>
                           <tr class="bg-white border-b">
                              <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                                 Hệ điều hành tương thích
                              </td>
                              <td class="px-6 py-4">
                                 <?= $each['operating_system'] ?>
                              </td>
                           </tr>
                           <tr class="bg-white border-b">
                              <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                                 Kích thước
                              </td>
                              <td class="px-6 py-4">
                                 <?= $each['printer_size'] ?>
                              </td>
                           </tr>
                           <tr class="bg-white border-b">
                              <td class="px-6 py-4 font-bold text-gray-900 w-full max-w-[150px] line-clamp-6">
                                 Trọng lượng
                              </td>
                              <td class="px-6 py-4">
                                 <?= $each['printer_weight'] ?>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </section>

         <!-- ===========LIST BRAND====================== -->
         <?php
         require_once("pages/layout/mainBrand.php")
         ?>
      </main>

      <?php
      require_once("pages/footer.php")
      ?>
   </div>
   <div class="">
      <div class="gallery">
         <div class="control__close">
            <i class="bx bx-x"></i>
         </div>
         <div class="gallery__inner">
            <img src="admin/modules/products/store/<?= $each['thumbnail'] ?>" />
         </div>
         <div class="control prev">
            <i class="bx bxs-chevron-left"></i>
         </div>
         <div class="control next">
            <i class="bx bxs-chevron-right"></i>
         </div>
      </div>
   </div>
   <!--=============== SWIPER JS ===============-->
   <script src="./handle/swiper-bundle.min.js"></script>
   <!--=============== MAIN JS ===============-->
   <script src="./handle/main.js"></script>
   <?php require_once 'general_live_search_json.php' ?>
   <script>
      document.addEventListener('DOMContentLoaded', function() {
         const images = document.querySelectorAll('.wrapper-images img');
         const btnPrev = document.querySelector('.prev');
         const btnNext = document.querySelector('.next');
         const btnClose = document.querySelector('.control__close');
         const galleryImg = document.querySelector('.gallery__inner img');
         const gallery = document.querySelector('.gallery');
         const openImages = document.querySelector('.open-images');
         let currentIndex = 0;

         function showGallery() {
            //Prev
            if (currentIndex === 0) {
               btnPrev.classList.add('hide');
            } else {
               btnPrev.classList.remove('hide');
            }
            //Next
            if (currentIndex === images.length - 1) {
               btnNext.classList.add('hide');
            } else {
               btnNext.classList.remove('hide');
            }
            //Hiển thị
            galleryImg.src = images[currentIndex].src;
            gallery.classList.add('show');
         }
         images.forEach((item, index) => {
            item.addEventListener('click', function() {
               currentIndex = index;
               showGallery();
            });
         });
         btnClose.addEventListener('click', function() {
            gallery.classList.remove('show');
         });
         document.addEventListener('keydown', function(e) {
            if (e.keyCode === 27) {
               gallery.classList.remove('show');
            }
         });
         btnPrev.addEventListener('click', function() {
            if (currentIndex > 0) {
               currentIndex--;
               showGallery();
            }
         });
         btnNext.addEventListener('click', function() {
            if (currentIndex < images.length - 1) {
               currentIndex++;
               showGallery();
            }
         });
         openImages.addEventListener('click', function() {
            currentIndex = 0;
            showGallery();
         })
      });
   </script>
</body>

</html>