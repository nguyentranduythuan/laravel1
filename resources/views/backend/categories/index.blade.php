@extends('backend.master')
@section('content')

@push('script')
  <script src="{{ asset('public/backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('public/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

  <script>
    $(function () {
      $('#example1').DataTable()
    })
  </script>
@endpush

@push('css')
  <link rel="stylesheet" href="{{ asset('public/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
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
              
              <form action="{{ url('admin/categories/delete/'.$category->id) }}" method="post" accept-charset="utf-8">
                  <a class="btn btn-success" href="{{ url('admin/categories/edit/'.$category->id) }}">Edit</a>
                  <button onclick="return confirm('Do you want to delete this Category name?')" type="submit" id="delete" name="delete" value="delete" class="btn btn-danger">Delete</button>
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

@endsection  
