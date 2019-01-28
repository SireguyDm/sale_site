$(document).ready(function () {

    
    var tag_html = '';
    for (var i = 0; i < (tags.length); i++) {
        var tag_html =  tag_html + ' ' + tags[i];
    }
    
    
    gallery.forEach(function(people) {
        $('.photos').append(
            '<div class="people">' +
                '<div class="people-zag">' +
                    '<img src="img/gallery/avat/' + people.avat + '" alt="photo">' +
                    '<p class="people-name">' + people.name + '<br>' + '<span>&bull;&#8194;' + people.place + '</span></p>' +
                '</div>' +
                '<img src="img/gallery/' + people.photo + '" alt="photo" class="people-photo">' +
                '<div class="people-tags">' + tag_html + '</div>' +
            '</div>'
        );             
    });

});
