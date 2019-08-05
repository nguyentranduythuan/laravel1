@extends('backend.master')

@section('title', 'News | Search')
@section('controller','News')
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
      <form action="{{ route('admin.news.search') }}" method="post" accept-charset="utf-8" style="width: 200px; margin-left: 700px; padding-top: 5px;">
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
                  <th>ID</th>
                  <th>Title</th>
                  <th>Slug</th>
                  <th>Author</th>
                  <th>Intro</th>
                  {{-- <th>Content</th> --}}
                  <th>Images</th>
                  <th>Status</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($keys as $key)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$key->title}}</td>
                  <td>{{$key->slug}}</td>
                  <td>{{$key->author}}</td>
                  <td>{!!$key->intro!!}</td>
                  {{-- <td>{{$n->content}}</td> --}}
                  <td><img src="{{ asset('storage/app/'.$key->image) }}" width="100px;"></td>
                  <td>
                    @if ($key['status'] == 0)
                      {{"Hide"}}
                    @else
                      {{"Show"}}
                    @endif
                  </td>
                  <td>
                    @if ($key['category_id'] == 0)
                      {{"None"}}
                    @else
                      {{$key->Category->name}}
                    @endif
                  </td>
                  <td>
                    <form action="{{ url('admin/news/delete/'.$key->id) }}" method="post" accept-charset="utf-8">
                      <a class="btn btn-success" href="{{ url('admin/news/edit/'.$key->id) }}" class="btn btn-success" style="margin-bottom: 2px;">Edit</a>
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
