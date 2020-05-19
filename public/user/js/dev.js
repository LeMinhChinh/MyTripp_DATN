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
    if(url === 'http://localhost:8000/user/personal-information'){
        $('.nav-item:eq(0) > a').addClass('active')
    }
    if(url === 'http://localhost:8000/user/personal-booking'){
        $('.nav-item:eq(1) > a').addClass('active')
    }
    if(url === 'http://localhost:8000/user/personal-update'){
        $('.nav-item:eq(2) > a').addClass('active')
    }
    if(url === 'http://localhost:8000/user/personal-request'){
        $('.nav-item:eq(3) > a').addClass('active')
    }

    var dtIndex = $(".rp-result-item[data-index]").length
    console.log(dtIndex)
    for (let i = 0; i < dtIndex; i++) {
        if($(".rp-result-item[data-index='"+i+"'] .hotel-fb-user-text > .hotel-fb-user-text-down.enabled-feedback").length){
            $(".rp-result-item[data-index='"+i+"'] .hotel-fb-user-text > .hotel-fb-user-text-down.disabled-feedback").addClass('hideEvaluate')
            $(".rp-result-item[data-index='"+i+"'] .hotel-fb-user-text > .hotel-fb-user-text-up").addClass('showEvaluate')
            $(".rp-result-item[data-index='"+i+"'] .hotel-fb-user-number > .hotel-fb-number").addClass('showEvaluate')
            $(".rp-result-item[data-index='"+i+"'] .hotel-fb-user-number > .hotel-fb-number-default").addClass('hideEvaluate')
        }
    }
})
