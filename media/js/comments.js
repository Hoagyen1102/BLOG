function newComment(data) {
    var htmlString =  '<div class="d-flex space-between">';
    htmlString += '<div class="user-info d-flex mb-10">';
    htmlString += '<img src="../../media/upload/users/' + data.comment['users_image'] + '">';
    htmlString += '<div>';
    htmlString += '<div class="d-flex">';
    htmlString += '<a href="#"><p class="text-blue text-bold">' + data.comment['users_fullname'] + '</p></a>';
    htmlString += '<a href="#"><p class="text-light-gray">&ensp;@' + data.comment['users_username'] + '</p></a>';
    htmlString += '</div>';
    htmlString += '<p class="text-light-gray">' + data.comment['created'] + '</p>';
    htmlString += '</div>';
    htmlString += '</div>';
    htmlString += '<div class="crud-cmt d-flex">';
    htmlString += '<a href="#" class="edit-link mr-16"><p class="text-light-gray"><i class="fa-solid fa-pen"></i></p></a>';
    htmlString += '<a href="../../comments/delete/id='+ data.comment['id'] +'class="btn-delete"><p class="text-light-gray"><i class="fa-solid fa-trash"></i></p></a>';
    htmlString += '</div>';
    htmlString += '</div>';
    htmlString += '<div class="border-comment">';
    htmlString += '<p class="each-comment-text active">' + data.comment['content'] + '</p>';
    htmlString += '<div class="edit-comment">';
    htmlString += '<form method="post" action="../../comments/edit/id=' + data.comment['id'] + '">';
    htmlString += '<textarea name="comment[content]" class="input-comment w-100" placeholder="Nội dung bình luận"></textarea>';
    htmlString += '<div class="d-flex e-flex mb-10">';
    htmlString += '<input type="submit" class="btn-edit btn-padding" value="Chỉnh sửa">';
    htmlString += '</div>';
    htmlString += '</form>';
    htmlString += '</div>';
    htmlString += '<div class="bottom-action d-flex align-center text-light-gray mb-10">';
    htmlString += '<a class="btn-like text-light-gray" href="../../likes/add/id=' + data.comment['id'] + '/object_type_id=2"><i class="fa-solid fa-thumbs-up"></i></a>';
    htmlString += '<p class="total-like-cmt mr-16">&ensp;' + data.comment['total_like'] + '</p>';
    htmlString += '<a href="#" class="reply_link mr-16"><p class="text-light-gray">Trả lời</p></a>';
    htmlString += '</div>';
    htmlString += '</div>';
    htmlString += '<div class="reply">';
    htmlString += '<form method="post" action="../../comments/add/id=' + data.comment['post_id'] + '/path=' + data.comment['id'] + '">';
    htmlString += '<div class="d-flex mb-10">';
    htmlString += '<img src="../../media/upload/users/' + data.comment['users_image'] + '" alt="' + data.comment['users_fullname'] + '">';
    htmlString += '<textarea name="comment[content]" class="input-comment w-100" placeholder="Viết bình luận..."></textarea>';
    htmlString += '</div>';
    htmlString += '<div class="d-flex e-flex mb-10">';
    htmlString += '<input type="submit" class="btn-submit btn-padding" value="Bình luận">';
    htmlString += '</div>';
    htmlString += '</form>';
    htmlString += '</div>';
    htmlString += '</div>';

    return htmlString;
}

$(document).ready(function() {
    $(document).on("click", ".reply_link", function(event) {
        event.preventDefault();
        let replyForm = $(this).parent().parent().next();
        if (replyForm.length && !replyForm.hasClass("active")) {
            replyForm.addClass("active");
        } else if (replyForm.hasClass("active")) {
            replyForm.removeClass("active");
        } else {
            alert('Vui lòng đăng nhập để để lại bình luận');
        }
    });

    $(document).on("click", ".edit-link", function(event) {
        event.preventDefault();
        let editForm = $(this).parent().parent().parent().find('.edit-comment');
        let editText = $(this).parent().parent().parent().find('.each-comment-text');
        if (editForm.length && !editForm.hasClass("active")) {
            editForm.addClass("active");
            editText.removeClass("active");

        } else if (editForm.hasClass("active")) {
            editForm.removeClass("active");
            editText.addClass("active");
        } 
    });

    $(document).on("click", ".btn-delete", function(event) {
        event.preventDefault();
        var tc = $(this);
        var confirmation = confirm("Xác nhận xóa?");

        if (confirmation) {
            var url = tc.attr('href');

            $.ajax({
                url: url,
                method: 'get',
                dataType: 'json', 
            })
            .done(function(data) {
                if (data.success) {
                    tc.parent().parent().parent().find('.border-comment').addClass('delete-background');
                    tc.parent().parent().parent().find('.bottom-action').remove();
                    tc.parent().parent().parent().find('.each-comment-text').text('Bình luận đã bị xóa!');
                    tc.parent().find('.edit-link').remove();
                    tc.parent().find('.btn-delete').remove();
                } else {
                    console.error('Lỗi khi gửi yêu cầu AJAX: Dữ liệu không hợp lệ');
                }
            })
        }
    });

    $(document).on("click", ".btn-edit", function(event) {
        event.preventDefault();
        var tc = $(this);
        var url = tc.parent().parent().attr('action');

        $.ajax({
            url: url,
            method: 'post',
            data: {
                comment: {
                    content: tc.parent().parent().find('.input-comment').val()
                }
            },
            dataType: 'json',
        })
        .done(function(data) {
            if (data.success) {
                tc.parent().parent().parent().parent().find('.each-comment-text').text(data.comment['content']);
                tc.parent().parent().parent().parent().find('.each-comment-text').addClass('active');
                tc.parent().parent().parent().parent().find('.edit-comment').removeClass('active');
            } else {
                console.error('Lỗi khi gửi yêu cầu AJAX: Dữ liệu không hợp lệ');
            }
        })
        .fail(function(err) {
            console.error('Lỗi khi gửi yêu cầu AJAX:', err);
        });
    });

    $(document).on("click", ".btn-submit", function(event) {
        event.preventDefault();
        var tc = $(this);
        var url = tc.parent().parent().attr('action');

        $.ajax({
            url: url,
            method: 'post',
            data: {
                comment: {
                    content: tc.parent().parent().find('.input-comment').val()
                }
            },
            dataType: 'json',
        })
        .done(function(data) {
            if (data.success) {
                $('.input-comment').val('');
                    if(data.comment['path'].split('.').length - 1 >= 2){
                        tc.parent().parent().parent().parent().after('<div class="each-comment border-around mb-10 sub-cmt-2">' + newComment(data));
                    }else if(data.comment['path'].split('.').length - 1 == 1){ 
                        tc.parent().parent().parent().parent().after('<div class="each-comment border-around mb-10 sub-cmt-1">' + newComment(data));
                    }else{
                        $('.comment-content').prepend('<div class="each-comment border-around mb-10 sub-cmt">' + newComment(data));
                    }
            } else {
                console.error('Lỗi khi gửi yêu cầu AJAX: Dữ liệu không hợp lệ');
            }
        })
        .fail(function(err) {
            console.error('Lỗi khi gửi yêu cầu AJAX:', err);
        });
    });
});
