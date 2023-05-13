<!-- Js Plugins -->
<script src="{{asset('public/site/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('public/site/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/site/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('public/site/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('public/site/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('public/site/js/mixitup.min.js')}}"></script>
<script src="{{asset('public/site/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('public/site/js/main.js')}}"></script>
<script>
   $('.search-result').hide();
   $('.input-search-ajax').keyup(function(){
      var _text=$(this).val();
      if(_text!=''){
         $.ajax({
            type:'GET',
            url:"{{route('home.searchAjax')}}",
            data:{search:_text},
            success:function(data){
               if(data.code===200){
                  $('.search-result').html(data.result);
                  $('.search-result').show();
                  if(data.count==0){
                     $('.search-result').html('');
                     $('.search-result').hide();
                  }
               }
            },
            error:function(){

            }
         });
      }else{
         $('.search-result').html('');
         $('.search-result').hide();
      }
   })
</script>
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
                  $('.modal-notifycation').fadeIn().delay(1000).fadeOut();
               }
            },
            error:function(){

            }
         });
      }
   });
</script>