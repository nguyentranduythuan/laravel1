<div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active">
                        Menu
                    </li>
                    @foreach ($categories as $cate)
                        <li><a href="{{ route('news',['id'=>$cate->id]) }}" class="list-group-item menu1">
                        {{$cate->name}}
                        </a></li>
                    @endforeach
                    
                    {{-- <ul>
                        <li class="list-group-item">
                            <a href="#">Level2</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Level2</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Level2</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Level2</a>
                        </li>
                    </ul> --}}

                    
                </ul>
            </div>