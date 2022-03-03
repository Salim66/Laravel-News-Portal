(function ($) {
    $(document).ready(function () {

        $("#comment_store").on("submit", function (e) {
            e.preventDefault();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                        "content"
                    ),
                },

                method: "POST",
                url: "/comment/store",
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: "json",

                success: function (response) {
                    $('#comment_store')[0].reset();
                    showComment();
                },
            });
        });

        showComment();

        // Show all commnets
        function showComment() {
            let id = $("#post_id").val();

            $.ajax({
                url: "/comment/all_data/" + id,
                success: function (response) {
                    console.log(response);
                    $("#showComments").empty();

                    for (data of response.comment) {
                        if (data.comment_id == null) {
                            let date = new Date(data.created_at);
                            console.log(date);
                            // let element =
                            //     " <li>\n" +
                            //         '             <div class="comment">\n' +
                            //         '                 <div class="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">\n' +
                            //         '                     <img class="avatar" alt="" src="' +
                            //         data.image +
                            //         '">\n' +
                            //         "                 </div>\n" +
                            //         '                 <div class="comment-block">\n' +
                            //         '                     <div class="comment-arrow"></div>\n' +
                            //         '                     <span class="comment-by">\n' +
                            //         "                         <strong>" +
                            //         data.name +
                            //         "</strong>\n" +
                            //         '                         <span class="float-right">\n' +
                            //         '                             <span>'; if(response.auth == true) { element +=  '<a href="#" c_id="' +
                            //         data.id +
                            //         '" class="comment-reply reply-box-btn" id="reply_box_btn"><i class="fas fa-reply"></i> Reply</a>' } element += '</span>\n' +
                            //         "                         </span>\n" +
                            //         "                     </span>\n" +
                            //         '                     <p>"' +
                            //         data.text +
                            //         '"</p>\n' +
                            //         '                     <span class="date float-right">"' +
                            //         date.toDateString() +
                            //         '"</span>\n' +
                            //         "                 </div>\n" +
                            //         "             </div>\n" +
                            //         "\n" +
                            //         "\n" +
                            //         "\n" +
                            //         '<ul  class="comments reply">\n';
                            // // for(reply_data of response.comment_reply){
                            // //     if(reply_data.comment_id == data.id) {
                            // //     let ply_data = new Date(reply_data.created_at);
                            // //     element += '<li>\n' +
                            // //         '<div style="display: flex; background-color: #eee;" className="comment">\n' +
                            // //             '<div style="background-color: #fff;" className="img-thumbnail img-thumbnail-no-borders d-none d-sm-block">\n' +
                            // //                 '<img style="width: 50px; width: 50px" className="avatar" alt="" src="/uploads/users/'+reply_data.user.photo+'"/>\n' +
                            // //             '</div>\n' +
                            // //             '<div style="margin-left: 50px;" className="comment-block">\n' +
                            // //                 '<div className="comment-arrow"></div>\n' +
                            // //                   '<span className="comment-by">\n' +
                            // //                     '<strong>'+reply_data.user.name+'</strong>\n' +
                            // //                     '</span>\n' +
                            // //                   '</span>\n' +
                            // //                 '<p>'+reply_data.text+'</p>\n' +
                            // //                 '<span className="date float-right">'+ply_data.toDateString()+'</span>\n' +
                            // //             '</div>\n' +
                            // //         '</div>\n' +
                            // //     '</li>\n';
                            // //     }
                            // // }
                            // element += "\n" +
                            //         "\n" +
                            //         "\n" +
                            //         '                 <form class="contact-form p-4 rounded bg-color-grey comment_reply reply-box reply-box-' +
                            //         data.id +
                            //         '" id="comment_reply_store" action="" method="POST">\n' +
                            //         "                 <div>\n" +
                            //         '                     <div class="row">\n' +
                            //         '                         <div class="form-group col">\n' +
                            //         '                             <input type="hidden" name="post_id" id="post_id" value="' +
                            //         data.post_id +
                            //         '">\n' +
                            //         '                             <input type="hidden" name="comment_id" id="comment_id" value="' +
                            //         data.id +
                            //         '">\n' +
                            //         '                             <label class="form-label required font-weight-bold text-dark">Comment</label>\n' +
                            //         '                             <textarea maxlength="5000" data-msg-required="Please enter your comment." rows="1" class="form-control" id="text" name="text" required></textarea>\n' +
                            //         "                         </div>\n" +
                            //         "                     </div>\n" +
                            //         '                     <div class="row">\n' +
                            //         '                         <div class="form-group col mb-0">\n' +
                            //         '                             <input type="submit" value="Reply" class="btn btn-primary btn--sm btn-modern" data-loading-text="Loading...">\n' +
                            //         "                         </div>\n" +
                            //         "                     </div>\n" +
                            //         "                     </div>\n" +
                            //         "                 </form>\n" +
                            //         "\n" +
                            //         "\n" +
                            //         "\n" +
                            //         "             </ul>\n" +
                            //         "         </li>";

                            let element = `
                                <li class="comment">
                                    <div class="comment-body">
                                        <footer class="comment-meta">
                                            <div class="comment-author vcard">
                                            <img src="/${data.image}" class="avatar" alt="image">
                                            <b class="fn">${data.name}</b>
                                            </div>
                                            <div class="comment-metadata">
                                            <a href="index.html">
                                            <span>${date.toDateString()}</span>
                                            </a>
                                            </div>
                                        </footer>
                                        <div class="comment-content">
                                            <p>${data.text}</p>
                                        </div>
                                        <div class="reply">
                                            <a href="#" class="comment-reply-link">Reply</a>
                                        </div>
                                    </div>
                                    <ol class="children">`
                                    for(reply_data of response.comment_reply){
                                            if(reply_data.comment_id == data.id) {
                                                let ply_data = new Date(reply_data.created_at);
                                                element += `
                                                <li class="comment">
                                                    <div class="comment-body">
                                                    <footer class="comment-meta">
                                                        <div class="comment-author vcard">
                                                            <img src="/${reply_data.image}" class="avatar" alt="image">
                                                            <b class="fn">${reply_data.name}</b>
                                                        </div>
                                                        <div class="comment-metadata">
                                                            <a href="index.html">
                                                            <span>April 24, 2021 at 10:59 am</span>
                                                            </a>
                                                        </div>
                                                    </footer>
                                                    <div class="comment-content">
                                                        <p>${reply_data.text}</p>
                                                    </div>
                                                    </div>
                                                </li>`
                                            }
                                    }
                                        `

                                    </ol>
                                    <input type="text" name="submit" class="form-control">
                                    <form action="" method="POST">
                                    <p class="comment-form-comment">
                                        <label>Comment</label>
                                        <input type="hidden" name="post_id" id="post_id" value="{{ $data->id }}">
                                        <textarea id="comment_text" name="text" cols="45" placeholder="Your Comment..." rows="5" maxlength="65525" required="required"></textarea>
                                    </p>
                                    <p class="form-submit">
                                        <input type="submit" name="submit" id="submit" class="submit" value="Post a comment">
                                    </p>
                                </form>

                                </li>

                            `;

                            $("#showComments").append(element);

                        }
                    }
                },
            });
        } // Show all commnets

        showComment();

        $(document).on("click", ".reply-box-btn", function (e) {
            e.preventDefault();
            let c_id = $(this).attr("c_id");
            $(".reply-box-" + c_id).toggle();
        });

        $(document).on("submit", "#comment_reply_store", function (e) {
            e.preventDefault();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr(
                        "content"
                    ),
                },
                method: "POST",
                url: "/comment/reply/store",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    showComment();
                },
            });
        });
    });
})(jQuery);
