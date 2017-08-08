<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head class="printableArea1">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SMPShop Confirm Receipt: Customer -</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="{{url('resources/assets/templates/admin/assets/css/bootstrapp.css')}}" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="{{url('resources/assets/templates/admin/assets/css/font-awesome.css')}}" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="{{url('resources/assets/templates/admin/assets/css/custom.css')}}" rel="stylesheet" />
  <link href="{{url('resources/assets/templates/admin/assets/css/style.css')}}" rel="stylesheet" />
  <script src="{{url('resources/assets/templates/admin/assets/js/jquery-3.2.0.min.js')}}"></script>
  <script src="{{url('resources/assets/templates/admin/assets/js/script.js')}}"></script>

  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body style="margin-top:20px" class="printableArea2">
  <div class="container">
    <div class="row">
      <div class="well col-xs-10 col-sm-10 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <address>
              <strong>SMP Shop</strong>
              <br>
              Ngô Sỹ Liên
              <br>
              Danang, Vietnam
              <br>
              <span title="Phone">Phone:</span> 0986.308.460
            </address>
          </div>
         <div class="col-xs-6 col-sm-6 col-md-6 text-right">
            <p>
              <em>Date: {!! date("d-m-Y", strtotime("$arOrder->created_at")) !!}</em>
            </p>
            <p>
              <em>Order Code: {{$arOrder->id}} </em>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="text-center">
            <h1>Receipt</h1>
            @php
                if($arOrder->status==0)
                  $status="Chưa thanh toán";
                else
                  $status="Đã thanh toán";
                
            @endphp    
            <h4>(Status: {{$status}})</h4>
          </div>
        </span>
        <div class="text-left" style="padding-left:20px">
          Customer Name: {{$arOrder->fullname}}<br>
          Address: {{$arOrder->useradderss}}<br>
          Phone: {{$arOrder->userphone}}<br>
          Email: {{$arOrder->useremail}}<br>
          Message: {{$arOrder->moreinfo}}<br>
      
          Payment Method: Thanh toán 1
        </div>
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="text-center">Product</th>
              <th >Quantity</th>
              <th class="text-center">Price</th>
              <th class="text-center">(-%)</th>
              <th class="col-md-2 text-center">Total</th>
            </tr>
          </thead>
          <tbody>
          @foreach($arJoin as $item)
            @php
              $total=($item->price*$item->quantity*(100-$item->discount))/100;
            @endphp
            <tr>
              <td class="col-md-6"><em>{{$item->pname}}</em></td>
              <td class="col-md-1 text-center">{{$item->quantity}}</td>
              <td class="col-md-2" style="text-align: center">{{number_format($item->price)}} VNĐ</td>
              <td class="col-md-1 text-center">{{$item->discount}}</td>
              <td class="col-md-2 text-center">{{number_format($total)}}VNĐ</td>
            </tr>
          @endforeach
           
            </tbody>
            </table>
           

            <table class="table table-hover" >
              <thead>
                  <tr>
                    <th class="col-md-3 text-center"></th>
                    <th class="col-md-3 text-center"></th>
                    <th class="col-md-3 text-center"></th>
                    <th class="col-md-3 text-center"></th>
                  </tr>
            </thead>
            <tbody>
            <tr>
              <td></td>
              <td></td>
              <td style="width:50px" class="text-center">
                    <p>
                      <strong>Subtotal:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{number_format($arOrder->price_total)}}</strong>
                    </p>
                    <p>
                      <strong>Tax   :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</strong>
                    </p>
              </td>
              <td class="text-center" colspan="3">
                      <p>
                        <strong> VNĐ</strong>
                      </p>
                      <p>
                        <strong> VNĐ</strong>
                      </p>

              </td>
            </tr>
                <tr>
                  <td>   </td>
                  <td>   </td>
                  <td class="text-right"><h4><strong>Total: </strong></h4></td>
                  <td class="text-center text-danger" colspan="3"><h4><strong>{{number_format($arOrder->price_total)}}  VNĐ</strong></h4></td>
                </tr>
                </tbody>
            </table>
            <div class="row noprint" style="padding:30px">
              <div class="col-md-9">
              <a type="button" class="btn btn-success btn-lg btn-block" onclick="window.close()">
                Close Order Detail <span class="glyphicon glyphicon-glyphicon glyphicon-remove"></span>
              </a>
              </div>
              <div class="col-md-3">
                  <a type="button" class="btn btn-primary btn-lg btn-block printbtn">
                 Print Order <span class="glyphicon glyphicon-glyphicon glyphicon-print"></span>
                </a>
              </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </body>