const { get } = require("jquery");

$(function(){
    $('div.anouncement-count a').click(function(event){
        event.preventDefault();
        $('a.anouncement-actual-count').text($(this).text());
        getAnnouncements($(this).text());
    });
    $('a#filter-button').click(function(event){
        event.preventDefault();
        getAnnouncements($('a.anouncement-actual-count').first().text());
    });
    function getAnnouncements(paginate){
        const form = $('form.sidebar-filter').serialize();
        $.ajax({
            method:"GET",
            url:"http://e-tutor.test/",
            data: form + "&"+$.param({paginate:paginate})
            })
            .done(function(response){
                $('div#announcements-wrapper').empty();
                $.each(response.data, function(index, announcement)
                {
                    const html = '<div class="col-6 col-md-6 col-lg-4 mb-3">\n'+
                                '<div class="card h-100 border-0">\n' +
                                    '<div class="card-img-top">\n'+
'                                        <img src="https://static.vecteezy.com/system/resources/thumbnails/001/486/411/small/open-book-icon-free-vector.jpg" class="img-fluid mx-auto d-block" alt="Card image cap">\n' +                                    
                                '</div>\n'+
                                '<div class="card-body text-center">\n'+
                                    '<h4 class="card-title">\n'+
                                    '<a href=\"\/announcements\/'+
                                    announcement.id +
                                    '\" class=" font-weight-bold text-dark text-uppercase small"> '+
                                        announcement.name +
                                        '</a>'+
                                    '</h4>\n'+
                                    '<h5 class="font-weight-bold text-dark ">\n'+
                                    '<i>'+
                                        announcement.place +
                                        '</i>'+
                                    '</h5>\n'+
                                    '<h5 class="card-price small text-dark ">\n'+
                                    '<i>'+
                                    announcement.price +
                                    'zł/godz.'+
                                    '</i>'+
                                    '</h5>\n'+
                                '</div>\n'+
                            '</div>'+
                            '</div>';
                    $('div#announcements-wrapper').append(html);
                });
            });
    }
})