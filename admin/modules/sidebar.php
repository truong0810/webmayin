<?php
$actionsToCheck = [
  'quanlydanhmucsanpham',
  'quanlyhangsanxuat',
  'quanlysanpham',
  'quanlydonhang',
  'quanlykhachhang',
];
$action = isset($_GET['action']) ? $_GET['action'] : '';
// Kiểm tra xem action có trong danh sách không
if (in_array($action, $actionsToCheck)) {
  // Action nằm trong danh sách, kích hoạt mục sidebar tương ứng
  ${"page_active_" . $action} = true;
} else {
  // Nếu không phù hợp với bất kỳ action nào trong danh sách, mặc định active dashboard
  $page_active_dashboard = true;
}
?>
<div class="p-3">
  <div class="bg-[#f9fafb] p-3 flex flex-col gap-4 border-2 border-gray-400 shadow-md h-fit rounded-lg">
    <a href="index.php?action=dashboard" class="flex items-center gap-5 hover:bg-gray-300 hover:text-primary transition-all text-xl p-3 rounded-lg font-semibold <?= $page_active_dashboard ? 'bg-gray-300 text-primary' : 'text-black'; ?>">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
      </svg>
      Dashboard
    </a>
    <a href="index.php?action=quanlydanhmucsanpham" class="flex items-center gap-5  hover:bg-gray-300 hover:text-primary transition-all text-xl p-3 rounded-lg font-semibold
    <?= $page_active_quanlydanhmucsanpham ? 'bg-gray-300 text-primary' : 'text-black'; ?>
    ">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" />
      </svg>
      Danh mục
    </a>
    <a href="index.php?action=quanlyhangsanxuat" class="flex items-center gap-5 hover:bg-gray-300 hover:text-primary transition-all text-xl p-3 rounded-lg font-semibold <?= $page_active_quanlyhangsanxuat ? 'bg-gray-300 text-primary' : 'text-black'; ?>">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
      </svg>
      Hãng sản xuất
    </a>
    <a href="index.php?action=quanlysanpham" class="flex items-center gap-5 hover:bg-gray-300 hover:text-primary transition-all text-xl p-3 rounded-lg font-semibold <?= $page_active_quanlysanpham ? 'bg-gray-300 text-primary' : 'text-black'; ?>">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859M12 3v8.25m0 0l-3-3m3 3l3-3" />
      </svg>
      Sản phẩm
    </a>
    <a href="index.php?action=quanlydonhang" class="flex items-center gap-5 hover:bg-gray-300 hover:text-primary transition-all text-xl p-3 rounded-lg font-semibold <?= $page_active_quanlydonhang ? 'bg-gray-300 text-primary' : 'text-black '; ?>">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 109.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1114.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
      </svg>
      Đơn hàng
    </a>
    <a href="index.php?action=quanlykhachhang" class="flex items-center gap-5 hover:bg-gray-300 hover:text-primary transition-all text-xl p-3 rounded-lg font-semibold <?= $page_active_quanlykhachhang ? 'bg-gray-300 text-primary' : 'text-black '; ?>">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
      </svg>
      Thông tin khách hàng
    </a>
    <a href="signout.php" class="flex items-center gap-5 text-black hover:bg-gray-300 hover:text-primary transition-all text-xl p-3 rounded-lg font-semibold">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
      </svg>
      Đăng xuất
    </a>
  </div>
</div>