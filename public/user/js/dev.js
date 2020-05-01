$(document).ready(function(){
    $('.rp-click-map').click(function(e){
        e.preventDefault();
        $('.rp-popup-map').removeClass('rp-map-cancel');
    })
    $('.rp-cancel').click(function(e){
        e.preventDefault();
        $('.rp-popup-map').addClass('rp-map-cancel');
    })

    for(let i = 1; i <= 4; i++){
        $('.r-title-'+i).click(function(){
            if($('.r-down-'+i).hasClass('disabledIcon')){
                $('.r-down-'+i).removeClass('disabledIcon')
                $('.r-up-'+i).addClass('disabledIcon')
                $('.r-content-'+i).removeClass('disabledIcon')
            }else{
                $('.r-down-'+i).addClass('disabledIcon')
                $('.r-up-'+i).removeClass('disabledIcon')
                $('.r-content-'+i).addClass('disabledIcon')
            }
        })
    }
})
