<?include $_SERVER['DOCUMENT_ROOT']."/bitrix/templates/webkmv_main/inc/footer.php";?>
</div><!-- .wrapper -->

<script>
    /*$(document).ready(function() {
     $('.monoblok31').mouseParallax({ moveFactor: 10 });
     $('#foreground').mouseParallax({ moveFactor: 10 });
     $('#fore-foreground').mouseParallax({ moveFactor: 15 });
     $('#fore-fore-foreground').mouseParallax({ moveFactor: 20 });
     })*/

    $(document).ready(function() {
        var owl = $("#owl-demo");
        owl.owlCarousel({
            autoPlay: true,
            navigation : true,
            singleItem : true,
            transitionStyle : "goDown"
        });
        //Select Transtion Type
        $("#transitionType").change(function(){
            var newValue = $(this).val();
            //TransitionTypes is owlCarousel inner method.
            owl.data("owlCarousel").transitionTypes(newValue);
            //After change type go to next slide
            owl.trigger("owl.next");
        });
    });
</script>

<? include_once "callhanter.php";?>
<script src="/bitrix/templates/webkmv_main/js/mouse.parallax.js"></script>

</body>