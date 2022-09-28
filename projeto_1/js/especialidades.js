$(function(){
    var atual= -1;
    var maximo= $('.box-especialidades').length -1;
    var timer;
    var animacaoDelay = 3;
    executAnimacao();
    function executAnimacao(){
        $('.box-especialidades').hide();
        timer= setInterval(logicAnimacao,animacaoDelay*400);
        
        function logicAnimacao(){
            atual++;
            if(atual > maximo){
                clearInterval(timer);
                return false;
            }

            $('.box-especialidades').eq(atual).fadeIn();

        }
    }
})