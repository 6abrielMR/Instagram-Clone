var url = "http://instagramclone.com.devel/";
window.addEventListener("load", function() {

    $('.btn-like').css('cursor', 'pointer');
    $('.btn-dislike').css('cursor', 'pointer');

    // Aumentar/Disminuir likes
    function counterLikes(isLike, id) {
        let countLikes = isLike ? parseInt($('#coutn-likes-'+id).text(), 10) + 1 : parseInt($('#coutn-likes-'+id).text(), 10) - 1;
        $('#coutn-likes-'+id).text(countLikes.toString());
    }

    // Boton de like
    function like() {
        $('.btn-like').off('click').on('click', function() {
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr('src', url + 'img/heart-red.png');

            counterLikes(true, $(this).data('id'));

            $.ajax({
                url: url + 'like/' + $(this).data('id'),
                type: 'GET',
                success: function(response) {
                    if (response.like) console.log('has dado like a la publicacion');
                    else console.log('error al dar like');
                }
            });

            dislike();
        });
    }
    like();

    // Boton de dislike
    function dislike() {
        $('.btn-dislike').off('click').on('click', function() {
            $(this).addClass('btn-like').removeClass('btn-dislike');
            $(this).attr('src', url + 'img/heart-black.png');

            counterLikes(false, $(this).data('id'));

            $.ajax({
                url: url + 'dislike/' + $(this).data('id'),
                type: 'GET',
                success: function(response) {
                    if (response.like) console.log('has dado dislike a la publicacion');
                    else console.log('error al dar dislike');
                }
            });

            like();
        });
    }
    dislike();
});