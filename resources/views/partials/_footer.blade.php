<!-- Scripts -->

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

</body>
</html>