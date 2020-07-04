$(document).ready(function(){
    $("form").on("submit", function(e){
        var storyTitle = $("#story-title");
        var storyBody  = $("#story-body");
        var storyImageHasSelected  = $("#uploaded_image").hasClass('selected');

        if (storyTitle.val().length > 0 && storyBody.val().length > 0 && storyImageHasSelected){
            // e.preventDefault();
            $.ajax({
                url: "../Controllers/AddStoryController.php",
                method: "POST",
                data: {
                    "story-title": storyTitle.val(),
                    "story-body": storyBody.val(),
                },
                success: function(result){
                    // e.preventDefault();
                    console.log(result);
                    window.location.href = "../views/StoriesView.php";
                    // alert("");
                }
            });
        }else{
            if(storyImageHasSelected == false){
                // Get element to inject the error
                let storyImageError = $("#imageError");
                storyImageError.html("Story image must be selected");
                e.preventDefault();
            }

            if (storyTitle.val().length == 0){
                // Get element to inject the error
                let storyTitleError = $("#storyTitleError");
                storyTitleError.html("Story title field cannot left blank");
                e.preventDefault();
            }

            if (storyBody.val().length == 0){
                // Get element to inject the error
                let storyBodyError = $("#storyBodyError");
                storyBodyError.html("Story body field cannot left blank");
                e.preventDefault();
            }
        }  
    });

});

