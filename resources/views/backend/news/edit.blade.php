@extends('backend.master')

@push('script')
<script src="{{ asset('public/backend/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('public/backend/ckfinder/ckfinder.js') }}"></script>
<script>
  CKEDITOR.replace( 'intro', {
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
</script>
<script>
  CKEDITOR.replace( 'content', {
        filebrowserBrowseUrl: '{{ asset('resources/upload/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('resources/upload/ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('resources/upload/ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('resources/upload/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('resources/upload/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('resources/upload/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
</script>
@endpush

@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-6">
    <!-- Horizontal Form -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Addition Category</h3>
        </div>
      <!-- /.box-header -->
      <!-- form start -->
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
          </ul>
        </div>
        @endif

        @if (Session::has('flash_message'))
          <div class="alert alert-success">
            {{Session('flash_message')}}
          </div>
        @endif
        <form class="form-horizontal" method="post" id="add_category" action="{{ route('admin.news.update',$news->id) }}" enctype="multipart/form-data">
        @csrf
          <div class="box-body">

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
              <div class="col-sm-10">
                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                  <option value="0">Please choose Category</option>
                  @php
                    category_parent($category,0,"--",$news['category_id']);
                  @endphp
                </select>
              </div>
            </div>
                  
            <div class="form-group">
              <label for="title" class="col-sm-2 control-label">Title</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="title" placeholder="Please enter Category name" value="{{ old('title',$news->title)}}">
              </div>
            </div>

            <div class="form-group">
              <label for="author" class="col-sm-2 control-label">Author</label>
              <div class="col-sm-10">
                <input type="text" name="author" class="form-control" id="name" placeholder="Please enter Aurhor name" value="{{ old('author',$news->author) }}">
              </div>
            </div>

            <div class="form-group">
              <label for="intro" class="col-sm-2 control-label">Intro</label>
                <div class="col-sm-10">
                  <textarea cols="60" rows="10" id="intro" name="intro">{{ old('intro',$news->intro) }}</textarea>
                  
                </div>
            </div>
                
            <div class="form-group">
              <label for="content" class="col-sm-2 control-label">Content</label>
              <div class="col-sm-10">
                <textarea cols="60" rows="10" id="content" name="content">{{old('content',$news->content)}}</textarea>
                
              </div>   
            </div>

            <div class="form-group" style="text-align: center">
              <div class="col-sm-6">

                <input class="form-check-input" type="radio" name="ShowHide" id="AnHien_1" value="1"
                    @if ($news['status'] == '1'){{"checked"}}@endif
                >
                <label class="form-check-label" for="inlineRadio1">Show</label>
              </div>

              <div class="col-sm-6">
                <input class="form-check-input" type="radio" name="ShowHide" id="AnHien_0" value="0" @if ($news['status'] == '0'){{"checked"}}@endif>
                <label class="form-check-label" for="inlineRadio2">Hide</label>
              </div>
            </div>

            <div class="form-group">
              <label for="image" class="col-sm-2 control-label">Current Images</label>
              <div class="col-sm-10">
                <img src="{{ asset('storage/app/'.$news->image) }}" width="100px;" class="current_image">
                <input type="hidden" name="current_image" value="{{old('current_image',$news->image)}}">
              </div>
            </div>

            <div class="form-group">
              <label for="image" class="col-sm-2 control-label">Images</label>
              <div class="col-sm-10">
                <input type="file" name="image" value="" placeholder="Please choose your image">
              </div>
            </div>

            {{-- <div class="form-group">
               <label class="col-sm-2" for="inlineFormCustomSelect">Position</label>
            <div class="col-sm-10">
              <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="position">
                    <option selected>Choose...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="3">4</option>
                    <option value="3">5</option>
                </select>
            </div>
            </div> --}}
          </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" value="add" class="btn btn-info pull-right">Update</button>
            </div>
            <!-- /.box-footer -->
        </form>
      </div>
    </div>
  </div>
</section>
@endsection