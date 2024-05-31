$(document).ready(function() {
    $(document).on("click", ".btn-like", function(event) {
        event.preventDefault();
        var tc = $(this);
        var url = tc.attr('href');

        $.ajax({
            url: url,
            method: 'get',
            dataType: 'json',
        })
        .done(function(data) {
            if (data.success) {
                if (!data.has_liked) {
                    tc.addClass('liked');
                } else {
                    tc.removeClass('liked');
                }
                if(data.obj_type == 1){
                    $('.number-like').html('&ensp;'+data.total_like);
                }else{
                    tc.parent().find('.total-like-cmt').html('&ensp;'+data.total_like);
                }
            } else {
                console.error('Lỗi khi gửi yêu cầu AJAX: Dữ liệu không hợp lệ');
            }
        })
        .fail(function(err) {
            alert('Vui lòng đăng nhập để để lại lượt thích');
            console.error('Lỗi khi gửi yêu cầu AJAX:', err);
        });
    });
});
