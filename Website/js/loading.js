$(document).ready(function(){
    // Functio with ajax
    function loading() {
        $.ajax({
            url: "../Controllers/GetStoriesController.php",
            method: "GET",
            success: function(response){
                // console.log("data");
                $(".showStories").html(response);
            }
        });
    }

    // Loading on first 
    loading();

    // Ajax Pulling
    setInterval(loading, 1000);
    
});