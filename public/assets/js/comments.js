$(document).ready(function () {
    $(document).on("submit", "form.js-comment", function (e) {
        e.preventDefault();

        let _form = $(this);
        const ERROR_CLASS = "error-comment";

        $("#name, #email, #comment", _form).removeClass(ERROR_CLASS);

        let dataObj = {
            parent_id: 0,
            user_id: $("#user_id", _form).val(),
            blog_post_id: $("#post_id", _form).val(),
            name: $("#name", _form).val(),
            email: $("#email", _form).val(),
            comment: $("#comment", _form).val(),
        };

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
            },
            url: "/api/comments/store",
            method: "POST",
            dataType: "json",
            data: dataObj,
            success(data) {
                if (!data.status) {
                    if (data.errors.name) {
                        $("#name", _form).addClass(ERROR_CLASS);
                    }
                    if (data.errors.email) {
                        $("#email", _form).addClass(ERROR_CLASS);
                    }
                    if (data.errors.comment) {
                        $("#comment", _form).addClass(ERROR_CLASS);
                    }
                } else {
                    $(".bottom-comment").append(`<div class="comment-text">
                        <a href="#" class="replay btn pull-right"> Replay</a>
                        <h5>${data.name}</h5>
                        <p class="comment-date">
                            ${data.date}
                        </p>
                        <p class="para">
                            ${data.comment}
                        </p>
                    </div>`);

                    $("#name, #email, #comment", _form).val('');
                }
            }
        });
    });
});