@extends('backend.master')
@section('content')

@push('script')
  <script type="text/javascript" src="https://code.jquery.com/jquery-latest.pack.js"></script>
@endpush

<section class="content">
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">List Category</h3>
    </div>
    <div class="box-body">
      @if (Session::has('flash_message'))
        <div class="alert alert-success">
          {{Session('flash_message')}}
        </div>
      @endif
      <table id="example1" class="table table-bordered table-striped" id="data_table">
        <thead>
          <tr>
            <th>Categories ID</th>
            <th>Categories Title</th>
            <th>Categories Slug</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          @foreach($categories as $category)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->slug}}</td>
            <td>
              
              <form action="{{ url('admin/categories/edit/'.$category->id) }}" method="get" accept-charset="utf-8">
                <div id="edit">
                  <button type="submit" id="edit" name="edit" value="edit" class="btn btn-success">Edit</button>
                </div>
                @csrf
              </form>
              <div class="clearfix"></div>
              <form action="{{ url('admin/categories/delete/'.$category->id) }}" method="post" accept-charset="utf-8">
                <div id="delete">
                  <button onclick="return confirm('Do you want to delete this Category name?')" type="submit" id="delete" name="delete" value="delete" class="btn btn-danger">Delete</button>
                </div>
                @csrf
              </form>
            </td>
          </tr>
          @endforeach
          
         </tbody>
        </table>
  </div>
    
  </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
</section>
    <!-- /.content -->
 <script>
        $(document).ready(function () {
            jQuery("#delete").click(function(){
                var data_test = 'Bạn đã xóa thành công';
                $.ajax({
                    url: {{ url('admin/categories/delete/'.$category->id) }},
                    type: 'POST',
                    data: 'string=' + data_test,
                    success: function (data) {
                        setTimeout(function(){
                            $('#delete').html(data);
                        }, 3000);
                    },
                    error: function (e) {
                        console.log(e.message);
                    }
                });
            });
        });
 </script>
@endsection  
