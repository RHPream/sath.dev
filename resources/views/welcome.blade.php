@extends('layouts.guestLayout')

@section('slider')
    <div class="home-video">
        {!!  $video->video  !!}
    </div>

    <script>
        $(document).ready(function() {
            $('.home-video iframe').attr('width','100%');
            $('.home-video iframe').attr('height','360');
            $('.home-video iframe').attr('autoplay','1');
        });
    </script>
@endsection
