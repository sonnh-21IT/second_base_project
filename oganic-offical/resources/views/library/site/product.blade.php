<script>
   $('.btn-add-cart').click(function(event){
      event.preventDefault();
      var url='';
      url=$(this).attr('data-url');
      if(url=="{{route('login')}}"){
         window.location="{{route('login')}}";
      }else{
         let urlCart=$(this).attr('href');
         $.ajax({
            type:'GET',
            url:urlCart,
            dataType:'json',
            success:function(data){
               if(data.code===200){
                  $('.modal-notifycation').fadeIn(1000).delay(1000).fadeOut(1000);
               }
            },
            error:function(){

            }
         });
      }
   });
</script>
