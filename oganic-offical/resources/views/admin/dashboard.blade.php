@extends('layouts.admin')
@section('title')
   <title>Ogani-Admin | Dashboard</title>
   <style>
      .custom-select {
         float: right;
         position: relative;
         font-family: Arial;
         margin-right: 15px
         }

         .custom-select select {
         display: none; /*hide original SELECT element:*/
         }

         .select-selected {
         background-color: DodgerBlue;
         }

         /*style the arrow inside the select element:*/
         .select-selected:after {
         position: absolute;
         content: "";
         top: 14px;
         right: 10px;
         width: 0;
         height: 0;
         border: 6px solid transparent;
         border-color: #fff transparent transparent transparent;
         }

         /*point the arrow upwards when the select box is open (active):*/
         .select-selected.select-arrow-active:after {
         border-color: transparent transparent #fff transparent;
         top: 7px;
         }

         /*style the items (options), including the selected item:*/
         .select-items div,.select-selected {
         color: #ffffff;
         padding: 8px 16px;
         border: 1px solid transparent;
         border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
         cursor: pointer;
         user-select: none;
         }

         /*style items (options):*/
         .select-items {
         position: absolute;
         background-color: DodgerBlue;
         top: 100%;
         left: 0;
         right: 0;
         z-index: 99;
         }

         /*hide the items when the select box is closed:*/
         .select-hide {
         display: none;
         }

         .select-items div:hover, .same-as-selected {
         background-color: rgba(0, 0, 0, 0.1);
         }
   </style>
@endsection
@section('title-panner')
   <h2>Dashboard</h2>
@endsection
@section('address')
   <li>
      <a href="{{route('admin.dashboard')}}">
         <i class="fa fa-home text-primary"></i>
      </a>
   </li>
   {{-- <li><span>Layouts</span></li> --}}
@endsection
@section('content')
<!-- start: page -->
<div class="row">
   <div class="col-md-6 col-lg-12 col-xl-6">
      <div class="row">
         <div class="col-md-12 col-xl-4 col-lg-4">
            <section class="panel panel-featured-left panel-featured-secondary">
               <div class="panel-body">
                  <div class="widget-summary">
                     <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-secondary">
                           <i class="fa fa-usd"></i>
                        </div>
                     </div>
                     <div class="widget-summary-col">
                        <div class="summary">
                           <h4 class="title">Doanh Thu (VNĐ)</h4>
                           <div class="info">
                              <strong class="amount">{{number_format($turnover)}}</strong>
                           </div>
                        </div>
                        <div class="summary-footer">
                           {{-- <a class="text-muted text-uppercase">(withdraw)</a> --}}
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
         <div class="col-md-12 col-lg-4 col-xl-4">
            <section class="panel panel-featured-left panel-featured-quartenary">
               <div class="panel-body">
                  <div class="widget-summary">
                     <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-quartenary">
                           <i class="fa fa-user"></i>
                        </div>
                     </div>
                     <div class="widget-summary-col">
                        <div class="summary">
                           <h4 class="title">Khách Hàng</h4>
                           <div class="info">
                              <strong class="amount">{{number_format($user)}}</strong>
                           </div>
                        </div>
                        <div class="summary-footer">
                           {{-- <a class="text-muted text-uppercase">(report)</a> --}}
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
         <div class="col-md-12 col-xl-4 col-lg-4">
            <section class="panel-md panel-featured-left panel-featured-tertiary">
               <div class="panel-body">
                  <div class="widget-summary">
                     <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-tertiary">
                           <i class="fa fa-shopping-cart"></i>
                        </div>
                     </div>
                     <div class="widget-summary-col">
                        <div class="summary">
                           <h4 class="title">Đơn Hàng</h4>
                           <div class="info">
                              <strong class="amount">{{number_format($order)}}</strong>
                           </div>
                        </div>
                        <div class="summary-footer">
                           <a class="text-muted text-uppercase" href="{{route('order.index')}}">(viewall)</a>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
   <div class="col-md-6 col-lg-12 col-xl-6">
      <section class="panel">
         <div class="panel-body">
            <div class="row justify-content-end">
               <div class="custom-select" onchange="dataChange(this)" style="width:200px;">
                  <select>
                     <option value="thisYear">Năm này</option>
                     <option value="thisMonth">Tháng này</option>
                     <option value="thisWeek">Tuần này</option>
                  </select>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-8 col-md-12">
                  <canvas id="line-chart"></canvas>
               </div>
               <div class="col-lg-4 col-md-6 justify-content-center">
                  <canvas id="doughnut-chart"></canvas>
               </div>
            </div>
         </div>
      </section>
   </div>
   {{-- <div class="row">
      <button class="btn btn-primary btn-click">hello</button>
   </div> --}}
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{url('public/site')}}/js/jquery-3.3.1.min.js"></script>
   <script>
      var lbOrder=['Đã hủy','Đang chờ','Đang giao'];
      var lbTurnoverYear=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
      var lbTurnoverMonth=['Week first','Week second','Week Thrid','Week fourth'];
      var lbTurnoverWeek=['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
      var _dataprofit ={{$dataprofit}};
      var _dataorder={{$dataorder}};
      var line_chart=new Chart(document.getElementById("line-chart"), {
         type: 'line',
         data: {
            labels:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{ 
               data:_dataprofit,
               label: "Tổng (vnđ)",
               borderColor: "#FF7777",
               fill: false,
               tension:0.3,
               pointStyle: 'circle',
               pointRadius: 5,
               pointHoverRadius: 10,
               backgroundColor: 'rgba(250, 112, 112,0.5)',
               }
            ]
         },
         options: {
            plugins: {
               title: {
               display: true,
               text: 'Doanh Thu',
               font: {
                     size: 20,
                     weight: 'bold',
                     lineHeight: 1.2,
                  },
                  padding: {top: 20, left: 0, right: 0, bottom: 0}
               }
            }
         }
      });
      var doughnut_chart=new Chart(document.getElementById("doughnut-chart"),{
         type: 'doughnut',
         data: {
            labels: lbOrder,
            datasets: [
               {
                  label: "Đơn",
                  backgroundColor: ["#734ba9","#2baab1", "#e36159"],
                  data:_dataorder
               }
            ]
         },
         options: {
            plugins: {
               title: {
                  display: true,
                  text: 'Đơn Hàng',
                  font: {
                     size: 20,
                     weight: 'bold',
                     lineHeight: 1.2,
                  },
                  padding: {top: 20, left: 0, right: 0, bottom: 0}
               }
            }
         }
      });

   //    $('.btn-click').click(function(){
   //       line_chart.data.labels=lbTurnoverMonth;
   //       line_chart.data.datasets[0].data=[10,5,15,34];
   //       line_chart.update();
   //    });
   //    function dataChange(obj){
   //       var change=obj.value;
   //       $.ajax({
   //          type:'GET',
   //          url:"{{route('home.sort')}}",
   //          data:{sort:sortCM},
   //          success:function(data){
   //             if(data.code===200){
   //                $('.product-wrapper').html(data.productcomponent);
   //             }
   //          },
   //          error:function(){

   //          }
   //       });
   //    };
   </script>
   @include('library.admin.select')
@endsection