<script src="{{url('public/site')}}/js/jquery-3.3.1.min.js"></script>
<script>
      $('a.decrement').click(function(event){
         event.preventDefault();
         var set=$(this).attr('data-set');
         var quantity=parseInt($('#'+set).val());
         if(quantity>1){
            quantity--;
            $('#'+set).val(quantity);
         }
      });
      $('a.increment').click(function(event){
         event.preventDefault();
         var set=$(this).attr('data-set');
         var quantity=parseInt($('#'+set).val());
         if(quantity<10){
            quantity++;
            $('#'+set).val(quantity);
         }
      });
   </script>
   <script>
      $('.cart-update').click(function(event){
         event.preventDefault();
         let urlUpdate=$('.cart-url').attr('data-update');
         let id=$(this).attr('data-id');
         let quantity=$(this).parents('tr').find('input.quantity'+id).val();
         $.ajax({
            type:'GET',
            url:urlUpdate,
            data:{id:id,quantity:quantity},
            success:function(data){
               if(data.code===200){
                  $('.cart_wrapper').html(data.cartComponent);
               }
            },
            error:function(){

            }
         });
         // alert(quantity);
      })
      $('.cart-remove').click(function(event){
         event.preventDefault();
         let urlUpdate=$('.cart-url').attr('data-delete');
         let id=$(this).attr('data-id');
         $.ajax({
            type:'GET',
            url:urlUpdate,
            data:{id:id},
            success:function(data){
               if(data.code===200){
                  $('.cart_wrapper').html(data.cartComponent);
               }
            },
            error:function(){

            }
         });
         // alert(quantity);
      })
   </script>