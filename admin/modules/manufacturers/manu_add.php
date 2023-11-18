<div class="dashboard-products">
  <h2 class="text-dark11 text-3xl font-bold uppercase">
    Thêm mới nhà sản xuất
  </h2>
  <!-- FORM ADD MANUFACTURE -->
  <h2 class="text-xl font-bold text-center mt-10 text-secondary uppercase">
    Thông tin nhà sản xuất
  </h2>
  <form id="form-manufacturer-add" action="modules/manufacturers/process_manu_add.php" method="post" enctype="multipart/form-data">
    <div class="mt-5">
      <div class="flex flex-col gap-3">
        <div class="flex items-center justify-center w-full">
          <label for="dropzone-file" class="flex flex-col items-center justify-center w-64 h-64 border-2 border-gray-300 border-dashed cursor-pointer bg-gray-50 hover:bg-gray-100 rounded-full block relative overflow-hidden mt-5">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
              <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
              </svg>
              <p class="mb-2 text-sm text-gray-500">
                <span class="font-semibold">Click to upload</span> or
                drag and drop
              </p>
              <p class="text-xs text-gray-500">
                SVG, PNG, JPG or GIF (MAX. 800x400px)
              </p>
            </div>
            <img id="selected-image" class="absolute inset-0 w-full h-full object-cover" />
            <input id="dropzone-file" type="file" class="hidden" name="manu_logo" />
          </label>
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Tên nhà sản xuất</label>
          <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Please enter name manufacture..." name="manu_name" autocomplete="off" />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Số điện thoại</label>
          <input type="number" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Please enter phone manufacture..." name="manu_phone" autocomplete="off" />
        </div>

        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Địa chỉ</label>
          <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" placeholder="Please enter address manufacture..." name="manu_address" autocomplete="off" />
        </div>
      </div>
    </div>

    <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-lg font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 mt-10 uppercase" type="submit" name="manu_add">
      <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
        Thêm nhà sản xuất
      </span>
    </button>
  </form>
</div>