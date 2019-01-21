(function(d,w,$){
    $(document).ready(function(){
        /**
         * Creando un menu responsive
         */
        if($('.header-izquierda li').hasClass('menu-item-has-children')){
            icono = $("<i class='fal fa-angle-down dropdown-icon'></i>")
            icono.click(function(){
                $(this).next().slideToggle(400);
            })
            icono.insertBefore('.sub-menu')
        }

        if($('.header-derecha li').hasClass('menu-item-has-children')){
            icono = $("<i class='fal fa-angle-down dropdown-icon'></i>")
            icono.click(function(){
                $(this).next().slideToggle(400);
            })
            icono.insertBefore('.sub-menu')
        }

        if($('.header-centro li').hasClass('menu-item-has-children')){
            icono = $("<i class='fal fa-angle-down dropdown-icon'></i>")
            icono.click(function(){
                $(this).next().slideToggle(400);
            })
            icono.insertBefore('.sub-menu')
        }

        $('.hamburguesa').click(function(){
            $('.navegacion').slideToggle(300)
        })

        $(window).resize(function(){
            anchoPantalla = $(window).width()
            if(parseInt(anchoPantalla) > 991){
                $('.navegacion').css('display','block')
            }else if(parseInt(anchoPantalla) == 991){
                $('.navegacion').css('display','none')
            }
        })

    })
}(document,window,jQuery))