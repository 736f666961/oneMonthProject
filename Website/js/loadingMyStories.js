$(document).ready(function(){
    // Load GetMyStories On First visit
    function loading(){
        $.ajax({
            url:"../Controllers/GetMyStoriesController.php",
            method:"GET",
            success:function(data){
                // console.log("deom delteStory");
                $(".showStories").html(data);
            }
        });
    }

    loading();
});