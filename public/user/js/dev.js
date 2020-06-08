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

    var url = window.location.href
    if(url.indexOf('http://localhost:8000/user/personal-information') !== -1){
        $('.nav-item:eq(0) > a').addClass('active')
    }
    if(url.indexOf('http://localhost:8000/user/personal-booking') !== -1){
        $('.nav-item:eq(1) > a').addClass('active')
    }
    if(url.indexOf('http://localhost:8000/user/personal-notify') !== -1){
        $('.nav-item:eq(2) > a').addClass('active')
    }
    if(url.indexOf('http://localhost:8000/user/personal-request') !== -1){
        $('.nav-item:eq(3) > a').addClass('active')
    }

    if($('.rp-validate-review').length > 0){
        $('.rp-form-review').addClass('fix-top')
        $('form.ra-form textarea').attr('disabled','disabled')
        $('form.ra-form button.btn').attr('disabled','disabled')
    }else{
        $('.rp-form-review').removeClass('fix-top')
        $('form.ra-form textarea').removeAttr('disabled')
        $('form.ra-form button.btn').removeAttr('disabled')
    }

    $('input[name="rvEmotionicon"]').change(function(){
        if($(this).is(':checked')){
            $('li.rv-emotion-item > label > span').removeClass('rv-emotion-text-active')
            $('li.rv-emotion-item > label > img').removeClass('rv-emotion-img-active')
            $('li.rv-emotion-item > label[for="'+$(this).attr('id')+'"] > span').addClass('rv-emotion-text-active')
            $('li.rv-emotion-item > label[for="'+$(this).attr('id')+'"] > img').addClass('rv-emotion-img-active')
        }
    })

    $('.rv-off-overfollow').click(function(){
        $('.rd-reviews').addClass('off-overflow-hidden')
        $('.rv-off-overfollow').css('display','none')
        $('.rv-on-overfollow').removeClass('rv-on-display')
    })

    $('.rv-on-overfollow').click(function(){
        $('.rd-reviews').removeClass('off-overflow-hidden')
        $('.rv-off-overfollow').removeAttr('style')
        $('.rv-on-overfollow').addClass('rv-on-display')
    })

    $('.ps-button-update').click(function(){
        $('.ps-item-content > input').removeAttr('disabled')
        // $('.ps-item-content > input.ps-item-content-email').attr('disabled', 'disabled')
        $('.ps-item-content > .nice-select').removeClass('disabled')
        $('p.ps-infor-img-label').removeClass('disabledInput')
        $('.ps-item-content-input[name="psAvatar"]').removeAttr('disabled')
    })

    if($('.ps-item-content-input[name="psAvatar"]:disabled')){
        $('p.ps-infor-img-label').addClass('disabledInput')
    }

    for(let i = 0; i <= 1000; i++){
        $('.show-feedback-'+i).click(function(){
            if($('.content-feedback-'+i).hasClass('show-content')){
                $('.content-feedback-'+i).removeClass('show-content')
            }else{
                $('.content-feedback-'+i).addClass('show-content')
            }
        })
    }
})
