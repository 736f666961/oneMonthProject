$(document).ready(function(){
    let commentKey = $(".comment-body");

    commentKey.on("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();

            let commentBody = $(".comment-body").val();
            let commentId = $(".comment-body").data('id');
            // console.log("CommentBody: " + commentBody);
            // console.log("CommentId: " + commentId);

            if (commentBody.length > 0){
                // Get element where to show the error
                let cbe = $(".comment-body-error");
                cbe.html(""); // Clear that error

                $.ajax({
                    url: "../Controllers/AddCommentController.php",
                    method: "POST",
                    data: {
                        "commentID": commentId,
                        "comment_body": commentBody,
                    },
                    success: function(result){
                        $(".comment-body").val(''); 
                        $.ajax({
                            url: "../Controllers/GetComments.php",
                            method: "POST",
                            data: {
                                "story_id": commentId
                            },
                            success: function(data){
                                console.log(data);
                                $(".allComments").html(data); 
                            }
                        });
    
                    }
                });
            }else{
                event.preventDefault();
                // Get element where to show the error
                let cbe = $(".comment-body-error");
                commentKey.css("border", "2px solid red");
                cbe.html("Field required !");
            }
        }
    });

    // Show comments on loading
    function showComents(){
        let commentId = $(".comment-body").data('id');
        $.ajax({
            url: "../Controllers/GetComments.php",
            method: "POST",
            data: {
                "story_id": commentId
            },
            success: function(data){
                // console.log(data);
                $(".allComments").html(data); 
            }
        });
    }

    // Load comments
    showComents();

    // Keep loading more comments
    setInterval(showComents, 1000);
});

