<?php
   return[
      [
         'name'=>'Trang Chủ',
         'route'=>'admin.dashboard',
         'icon'=>'fa fa-home'
      ],
      [
         'name'=>'Danh Mục',
         'route'=>'category.index',
         'icon'=>'fa-list-alt'
      ],
      [
         'name'=>'Sản Phẩm',
         'route'=>'product.index',
         'icon'=>'fa-fax'
      ],
      [
         'name'=>'Đơn Hàng',
         'route'=>'order.index',
         'icon'=>'fa-shopping-cart',
         'item'=>[
            [
               'name'=>'Đơn Hàng',
               'route'=>'order.index'
            ],
            [
               'name'=>'Đơn Hàng Mới',
               'route'=>'order.view'
            ]
         ]
      ],
      [
         'name'=>'Tài Khoản',
         'route'=>'user.index',
         'icon'=>'fa-users'
      ]
   ]
?>