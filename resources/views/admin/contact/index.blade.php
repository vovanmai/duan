@extends('templates.admin.master')
@section('main-content')
<div class="row">
	<div class="col-lg-12">
		<h2>Contact Management</h2>   
	</div>
</div>              
<!-- /. ROW  -->
<hr />
@include('errors.message')
<!-- /. ROW  --> 
<div class="row text-center pad-top">
  <div class="row col-md-12 custyle" style="margin-left:10px">
    <table class="table table-striped custab">
      <thead>
        <tr>
          <th class="text-center" style="width:4%">ID</th>
          <th class="text-center">Contact Title</th>
          <th class="text-center">Contact Name</th>
          <th class="text-center">Contact Email</th>
          <th class="text-center" style="width:10%">Sent Date</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      @foreach($arContact as $item)
        <?php
          $id=$item->id;
          $urlDel=route('admin.contact.destroy',['id'=>$id]);
          $contact_title=$item->contact_title;
          $contact_name=$item->contact_name;
          $contact_email=$item->contact_email;
          $contact_detail=$item->contact_detail;
          $created_at=$item->created_at;
          $status=$item->status;
          $contact_phone=$item->contact_phone;
        ?>
      <tr>
        <td>{{$id}}</td>
        <input type="hidden" class="cid" value="">
        <td class="ctitle">{{$contact_title}}</td>
        <td class="cname">{{$contact_name}}</td>
        <td class="cemail">{{$contact_email}}</td>
        <td>{{ date("H:m:s d-m-Y", strtotime("$item->created_at")) }}</td>
        <td class="text-center">
          @if($status==0)
          <a class='btn btn-success btn-xs replybtn' data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span> Reply</a> 
          @else
          <a class='btn btn-default btn-xs' data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span> Replied</a> 
          @endif
          <a class='btn btn-info btn-xs' data-toggle="modal" data-target="#detailModal{{$id}}"><span class="glyphicon glyphicon-edit"></span> View Detail</a> 
          <a href="{{$urlDel}}" class='btn btn-danger btn-xs' ><span class="glyphicon glyphicon-edit"></span>Del</a> 
          
        </td>
      </tr>
      
     
      <div id="detailModal{{$id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"></h4>
            </div>
            <div class="container" style="text-align: left">
              <p><label>From: </label> (Email: {{$contact_email}}  - Phone: {{$contact_phone}} )</p>
              <p><label>Sent Date:</label>{{ date("H:m:s d-m-Y", strtotime("$item->created_at")) }}</p>
               <div class="form-group">    
                <label>Contact Detail</label>
                <textarea name="content" readonly class="form-control border-input reply-detail" placeholder="" style="width:50%;height: 100px;" required>{{$contact_detail}}</textarea>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
    @endforeach
      <div id="replyModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width:80vw">
          <form action="" method="POST">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reply</h4>
              </div>
              <div class="container" style="text-align: left;width:100%">
                {{ csrf_field() }}
                <input type="hidden" name="replyid" class="replyid" value="">
                <p>Title:  <input type="text" name="title" value="" placeholder="Re: " class="form-control border-input reply-title"></p>
                <p>Contact Name: <input type="text" name="name" class="border-input form-control reply-name" value="" readonly=""></p>
                <p>To: <input type="text" name="email" class="border-input form-control reply-email" value="" readonly=""></p>
                <div class="form-group">    
                <label>Reply Content</label>
                <textarea name="content" class="form-control border-input reply-detail" placeholder="Reply Content" style="width:100%" required></textarea>
                </div>
              </div>
              <div class="modal-footer">
              <input type="submit" class="btn btn-info" value="Send Reply">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </table>
  </div>
</div>   
<div class="row">
  <div class="col-lg-12">
    {{$arContact->links()}}
  </div>
</div>
</div>

@stop