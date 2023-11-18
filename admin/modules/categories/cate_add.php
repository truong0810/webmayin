<div class="dashboard-products">
  <h2 class="text-dark11 text-3xl font-bold uppercase">
    Thêm mới danh mục
  </h2>
  <!-- FORM ADD CATEGORIES -->
  <h2 class="text-xl font-bold text-center mt-10 text-secondary uppercase">
    Thông tin danh mục
  </h2>
  <form id="form-category-add" action="modules/categories/process_cate_add.php" method="post">
    <div class="mt-5">
      <div class="flex flex-col gap-3">
        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Tên danh mục</label>
          <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" name="cate_name" placeholder="Please enter name category..." />
        </div>
        <div class="box-field">
          <label class="text-sm font-semibold cursor-pointer">Slug</label>
          <input type="text" class="p-[6px] bg-[#f9fafb] border border-gray-400 w-full rounded-md outline-none" name="cate_slug" placeholder="Please enter slug category..." />
        </div>
      </div>
    </div>

    <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-lg font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 mt-10 uppercase" type="submit" name="cate_add">
      <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
        Thêm danh mục
      </span>
    </button>
  </form>
</div>