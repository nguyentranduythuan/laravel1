@extends('backend.master')
@section('content')


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
                    <a href="{{ url('admin/category/edit/'.$category->id) }}" class="btn btn-success">Edit</a>
                    <a onclick="return confirm_delete('Do you want to delete this Category name?')" href="{{ url('admin/category/delete/'.$category->id) }}" class="btn btn-danger">Delete</a>
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
  $(document).ready(function(){
      $('#data_table').DataTable({
        processing: true,
        serverSide: true,
        ajax:{
          url: "{{ route('category.index') }}",
        },
        columns:[
          {
            data: 'name',
            name: 'name',
          },
          {
            data: 'slug',
            name: 'slug',
          },
          {
            data: 'action',
            name: 'action',
            orderable: false,
          }
        ]

      });
  });
</script>
 
@endsection  
