$(document).ready(function() {
    $('.delete').on('click', function(event) {
        event.stopPropagation();
        var tc = $(this);
        var confirmation = confirm("Xác nhận xóa?");

        if (confirmation) {
            var url = tc.attr('href');

            $.ajax({
                url: url,
                method: 'post',
                dataType: 'json', 
            })
            .done(function(data) {
                if (data) {
                    tc.parent().parent().remove();
                    alert('Bài viết đã được xóa thành công!');
                }
            })
        }
        return false;
    });
});