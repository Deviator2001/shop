<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script type="text/javascript" src="/scripts/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="/scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="/scripts/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="/scripts/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script>
    $(document).ready(function(){
        $("a.photo").fancybox({
            centerOnScroll: false,
            transitionIn: 'elastic',
            transitionOut: 'elastic',
            speedIn: 500,
            speedOut: 500,
            hideOnOverlayClick: false,
            titlePosition: 'over',
            autoDimensions: true

        });
    });
    function AjaxFormRequest(result_id, error_id, form_id,url) {
        jQuery.ajax({
            url:     url, //Адрес подгружаемой страницы
            type:     "POST", //Тип запроса
            dataType: "html", //Тип данных
            data: jQuery("#"+form_id).serialize(),
            success: function(response) { //Если все нормально
                var res = jQuery.parseJSON(response);
                if(res.error==0){
                    document.getElementById(result_id).innerHTML = res.message;
                    $('.popuporderform').remove();
                } else {
                    document.getElementById(error_id).innerHTML = res.message;
                }

            },
            error: function(response) { //Если ошибка
                document.getElementById(result_id).innerHTML = "Ошибка при отправке формы";
            }
        });
    }
</script>