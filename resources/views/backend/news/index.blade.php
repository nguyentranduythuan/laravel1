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
                    <a href="{{ url('admin/news/edit/'.$n->id) }}" class="btn btn-success">Edit</a>
                    <form action="{{ url('admin/news/delete/'.$n->id) }}" method="post" accept-charset="utf-8">
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
                    url: {{ url('admin/news/delete/'.$n->id) }},
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

