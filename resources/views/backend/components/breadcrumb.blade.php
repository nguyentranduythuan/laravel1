<section class="content-header">
      <h1>
        @yield('controller')
        <small>@yield('action')</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>@yield('home')</a></li>
        <li class="active">@yield('name')</li>
      </ol>
</section>