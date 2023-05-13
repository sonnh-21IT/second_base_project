<div class="modal modal-add" tabindex="-1">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="{{route('category.store')}}" method="post" class="form-horizontal form-bordered" id="form-add">
            @csrf
            <div class="modal-header">
               <p class="text-right col-6" data-bs-dismiss="modal" aria-label="Close"><a href="" class="btn btn-close"><i class='fa fa-times'></a></i></p>
               <h4 class="modal-title d-3 col-6">Tạo mới danh mục<span id="category"></span></h4>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label class="col-md-3 control-label" for="name">Tên danh mục</label>
                  <div class="col-md-6">
                     <input type="text" class="form-control" id="name" name="name">
                  </div>
               </div>
               {{-- <div class="form-group">
                  <label class="col-md-3 control-label" for="">Trạng thái</label>
                  <div class="col-md-6">
                     <div class="radio">
                        <label>
                           <input type="radio" name="status" id="status" value="1"
                              checked>
                           Sẵn sàng
                        </label>
                     </div>
                     <div class="radio">
                        <label>
                           <input type="radio" name="status" id="status" value="0">
                           Đang chờ
                        </label>
                     </div>
                  </div>
               </div> --}}
            </div>
            <div class="modal-footer form-group justify-content-around mb-2">
               <label class="col-md-3 control-label" for=""></label>
               <div class="col-md-3">
                  <a type="submit" class="mb-xs mt-xs mr-xs btn btn-primary btn-block btn-done-create">Xác nhận</a>
               </div>
               <div class="col-md-3">
                  <a class="mb-xs mt-xs mr-xs btn btn-block btn-default btn-default btn-close">Hủy bỏ</a>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>