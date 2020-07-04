$(document).ready(function(){
    $("form").on("submit", function(e){
        e.preventDefault();

        var storyTitle = $('#story-title');
        var storyBody = $('#story-body');
        var id = $("#eid").val();
        var img =  $("#uploaded_image").css('background-image');
        var bg = img.slice(5, -2); 

        if (storyTitle.val().length > 0 && storyBody.val().length > 0){
            console.log("Img: " + bg);
            $.ajax({
                url: "../Controllers/EditStoryController.php",
                method: "POST",
                data: {
                    "story-title": storyTitle.val(),
                    "story-body": storyBody.val(),
                    "img" : bg,
                    "EditPid": id
                },
                success: function(result){
                    // window.location.reload();
                    console.log(result);
                    window.location.href = "../views/StoriesView.php";
                }
            });
        }else{
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
