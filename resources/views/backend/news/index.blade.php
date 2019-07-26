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
            <h3 class="box-title">List News</h3>
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
                @foreach ($news as $n)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$n->title}}</td>
                  <td>{{$n->slug}}</td>
                  <td>{{$n->author}}</td>
                  <td>{{$n->intro}}</td>
                  {{-- <td>{{$n->content}}</td> --}}
                  <td><img src="{{ asset('storage/app/'.$n->image) }}" width="100px;"></td>
                  <td>
                    @if ($n['status'] == 0)
                      {{"Hide"}}
                    @else
                      {{"Show"}}
                    @endif
                  </td>
                  <td>
                    @if ($n['category_id'] == 0)
                      {{"None"}}
                    @else
                      @php
                        $category = DB::table('categories')->where('id',$n['category_id'])->first();
                        echo $category->name;
                      @endphp
                    @endif
                  </td>
                  <td>
                    <form action="{{ url('admin/news/delete/'.$n->id) }}" method="post" accept-charset="utf-8">
                      <a class="btn btn-success" href="{{ url('admin/news/edit/'.$n->id) }}" class="btn btn-success" style="margin-bottom: 2px;">Edit</a>
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

