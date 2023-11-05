<div class="dashboard-products">
  <!-- DANH SÁCH ĐƠN HÀNG ĐÃ ĐẶT -->
  <div>
    <h2 class="text-dark11 text-2xl font-bold capitalize">
      Danh sách đơn hàng đã đặt
    </h2>
    <!-- TABLE PRODUCTS -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
      <table class="w-full text-sm text-left text-gray-800 font-medium">
        <thead class="text-xs text-gray-800 uppercase">
          <tr class="border-b border-gray-400">
            <th class="px-6 py-3 bg-gray-50">Mã</th>
            <th class="px-6 py-3 w-[200px]">Thời gian đặt</th>
            <th class="px-6 py-3 bg-gray-50">Tên người nhận</th>
            <th class="px-6 py-3">Số điện thoại</th>
            <th class="px-6 py-3 bg-gray-50 w-[250px]">
              Địa chỉ giao hàng
            </th>
            <th class="px-6 py-3">Tổng tiền</th>
            <th class="px-6 py-3 bg-gray-50">Trạng thái</th>
            <th class="px-6 py-3">Xem</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b border-gray-200">
            <td class="px-6 py-4 font-medium text-gray-900 whitespace-wrap">
              <span>1</span>
            </td>
            <td class="px-6 py-4 w-[200px]">
              <h4>2023-11-03 12:54:25</h4>
            </td>
            <td class="px-6 py-4">Lê Quang Thái</td>
            <td class="px-6 py-4">0123456789</td>
            <td class="px-6 py-4 w-[250px]">
              Thuỵ Lâm Đông Anh Hà Nội
            </td>
            <td class="px-6 py-4">106.666.999</td>
            <td class="px-6 py-4">Đã duyệt</td>
            <td class="px-6 py-4">
              <a href="#" class="text-bluebtn cursor-pointer hover:underline">Details</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- DANH SÁCH ĐƠN HÀNG CHƯA ĐẶT -->
  <div class="mt-10">
    <h2 class="text-dark11 text-2xl font-bold capitalize">
      Danh sách đơn hàng chưa đặt
    </h2>
    <!-- TABLE PRODUCTS -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
      <table class="w-full text-sm text-left text-gray-800 font-medium">
        <thead class="text-xs text-gray-800 uppercase">
          <tr class="border-b border-gray-400">
            <th class="px-6 py-3 bg-gray-50">Mã</th>
            <th class="px-6 py-3 w-[200px]">Thời gian đặt</th>
            <th class="px-6 py-3 bg-gray-50">Tên người nhận</th>
            <th class="px-6 py-3">Số điện thoại</th>
            <th class="px-6 py-3 bg-gray-50 w-[250px]">
              Địa chỉ giao hàng
            </th>
            <th class="px-6 py-3">Tổng tiền</th>
            <th class="px-6 py-3 bg-gray-50">Duyệt</th>
            <th class="px-6 py-3">Huỷ</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b border-gray-200">
            <td class="px-6 py-4 font-medium text-gray-900 whitespace-wrap">
              <span>1</span>
            </td>
            <td class="px-6 py-4 w-[200px]">
              <h4>2023-11-03 12:54:25</h4>
            </td>
            <td class="px-6 py-4">Lê Quang Thái</td>
            <td class="px-6 py-4">0123456789</td>
            <td class="px-6 py-4 w-[250px]">
              Thuỵ Lâm Đông Anh Hà Nội
            </td>
            <td class="px-6 py-4">106.666.999</td>
            <td class="px-6 py-4">
              <a href="#" class="flex items-center justify-center gap-1 bg-bluebtn p-2 rounded-lg text-white hover:bg-bluehover">
                Duyệt
              </a>
            </td>
            <td class="px-6 py-4">
              <a href="#" class="flex items-center justify-center gap-1 bg-secondary p-2 rounded-lg text-white hover:bg-secondaryhover">
                Huỷ
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- PAGINATION -->
  <div class="flex items-center justify-end gap-3 mt-10 mr-20">
    <a href="#" class="pagi-active inline-block text-black font-medium">1</a>
    <a href="#" class="inline-block text-black font-medium">2</a>
    <a href="#" class="inline-block text-black font-medium">3</a>
  </div>
</div>