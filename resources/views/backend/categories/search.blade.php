@extends('backend.master')

@section('title', 'Category | Search')
@section('controller','Category')
@section('action','Search')


@section('content')
<section class="content">
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="col-md-5">
      <h3 class="box-title">Result :: {{$search}}</h3>
    </div>
    <div class="col-md5">
      <form action="{{ route('admin.category.search') }}" method="post" accept-charset="utf-8" style="width: 200px; margin-left: 700px; padding-top: 5px;">
        @csrf
        
        <div class="input-group">
          <input type="search" name="search" class="form-control">
          <span class="input-group-btn">
            <button type="submit" class="btn btn-primary">Search</button>
          </span>
        </div>
      </form>
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
          @foreach($keys as $key)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$key->name}}</td>
            <td>{{$key->slug}}</td>
            <td>
              
              <form action="{{ url('admin/category/delete/'.$key->id) }}" method="post" accept-charset="utf-8">
                  <a class="btn btn-success" href="{{ url('admin/category/edit/'.$key->id) }}">Edit</a>
                  <button onclick="return confirm('Do you want to delete this Category name?')" type="submit" id="delete" name="delete" value="delete" class="btn btn-danger">Delete</button>
                @csrf
              </form>
            </td>
          </tr>
          @endforeach
         </tbody>
        </table>
        <div class="clearfix" style="margin-left: 800px;">{{$keys->links()}}</div>
        
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
