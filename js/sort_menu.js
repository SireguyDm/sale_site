$(document).ready(function(){

    $('.sort-zag').click(function(){
        actionMenu('sort');
    })
    
    $('.view-zag').click(function(){
        actionMenu('view');
    })
    
    $('.sort-item').click(function(){
        
        var sort_select = $(this).html();
        var sort_action = $(this).data('action');
        
        $('.sort-select').empty();
        $('.sort-select').append(sort_select);
        $('.sort-zag').attr('data-action', sort_action);
        
        actionMenu('sort');
    });
    
    $('.view-item').click(function(){
        
        var status_tilte = $(this).text();
        var status_id = $(this).data('statusid');
        
        $('#view-zag-title').text('Статус: ' + status_tilte);
        $('.view-zag').attr('data-statusid', status_id);
        
        actionMenu('view');
    });
    
    clickAway('view');
    clickAway('sort');
    
});

function actionMenu(target){
    if ($('.'+ target +'-menu').css('display') == 'none'){
        $('.'+ target +'-menu').css('display', 'block');
    } else {
        $('.'+ target +'-menu').css('display', 'none');
    }
    if ($('.'+ target +'-zag').children('#menu-arrow').hasClass('menu-arrow-active')){
        $('.'+ target +'-zag').children('#menu-arrow').removeClass('menu-arrow-active');
    } else{
        $('.'+ target +'-zag').children('#menu-arrow').addClass('menu-arrow-active');
    }
}

function clickAway(target){
    $(document).mouseup(function (e){ // событие клика по веб-документу
		var div = $('.'+ target +'-menu'); // тут указываем ID элемента
		if (!div.is(e.target) // если клик был не по нашему блоку
		    && div.has(e.target).length === 0) { // и не по его дочерним элементам
			$('.'+ target +'-menu').css('display', 'none');
            $('.'+ target +'-zag').children('#menu-arrow').removeClass('menu-arrow-active');
		}
	});
}