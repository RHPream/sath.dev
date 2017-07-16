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