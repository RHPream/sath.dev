
<div class="container">
    <div class="row">
        @foreach($dropdowns as $d)
            @if($d->dropdown_name!='Nested dropdown')
                <div class="col-sm-6 col-md-3">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" style="width: 100%;" type="button" data-toggle="dropdown" data-hover="dropdown">
                        @if($d->parent_name==0)
                            {{$d->name}}
                        @endif
                    </button>
                    <ul class="dropdown-menu">
                        @foreach($dropdowns as $n)
                            @if($n->parent_name==$d->dropdown_name)
                                <li><a href="#">{{$n->name}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>

<h6 class="text-center flex">&copy;Sagor 2017. All right reserved.</h6>

<!-- JQuery -->
<script type="text/javascript" src="{{url('')}}/js/jquery.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script>
    $('.c-link').click(function(e){
        e.preventDefault();
        var loc = $('.c-link').attr("href");
        $('.c-link').css("margin", "20px");
    });
</script>
<script>
//    $('input').click(function (e) {
//        $('label').css('margin-top','-15px');
//    });
</script>
</body>
</html>