$(function(){
    $('nav.mobile').click(function(){
       var listamenu = $('nav.mobile ul');
       if(listamenu.is(':hidden')==true){
        var icone= $('.botao-menu-mobile').find('i');
        icone.removeClass('fa fa-bars');
        icone.addClass('close')
        ;   
        listamenu.slideToggle();
       }
       else{
        var icone= $('.botao-menu-mobile').find('i');
        icone.removeClass('close');
        icone.addClass('menu'); 
           listamenu.slideToggle()
       }
    });

    if($('target').length > 0){
        var elemento= '#'+$('target').attr('target');
        var divScroll= $(elemento).offset().top;
        $('html,body').animate({scrollTop:divScroll},2000);
    }

    carregarDinamico();
    function carregarDinamico(){
        $('[realtime]').click(function(){
            var pagina= $(this).attr('realtime');
            $('.container-principal').load(include_path+'pages/'+pagina+'.php');
            setTimeout(function(){
                initialize();
                addMarker(-27.609959,-48.576585,'',"Minha loja",undefined,false);
        
            },1000);

            $('.container-principal').fadeIn(1000);
            window.history.pushState('','',pagina);
        
            return false;
        })
    }

})