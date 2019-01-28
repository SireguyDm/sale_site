$(document).ready(function () {

    
    questions.forEach(function(question){
        $('.questions').append(
            '<div class="answ">' +
                '<div class="flexPage2">' +
                    '<button class="show-button">' + '' + '</button>' +
                    '<p>' + question.title + '</p>' +
                '</div>' + 
                '<div class="answtext">' + question.text + '</div>' +
            '</div>'
        );
    });
    
    
    
    $('button').click(function () {

        var answtext = $(this).parent().next('.answtext');

        if ($(answtext).css('display') == 'none') {
            $(answtext).show();
            $(this).css('background', 'url(icons_img/sort-up.png) center center / contain no-repeat');
        } else {
            $(answtext).hide();
            $(this).css('background', '');
        }
        
    });
});