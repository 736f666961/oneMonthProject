$(document).ready(function(){
    // Get all links
    var readMoreButtons = document.querySelectorAll(".read-more-link");
    // console.log(readMoreButtons);
    // console.log("Before - For Button Clicked: " + readMoreButtons[i]);
    // Looh through that links
    for (let i = 0; i < readMoreButtons.length; i++){
        $(readMoreButtons[i]).click(function(){
            var id = $(readMoreButtons[i]).data('id');
            // alert(id);

            // console.log("In - For Button Clicked: " + readMoreButtons[i]);

            $.ajax({
                url:"../Controllers/StoryDetailsIdController.php",
                method:"POST",
                data: {
                    'id': id
                },
                success:function(data){
                    // alert(data);
                    // console.log(data);
                    // window.location.href = "../views/StoryDetails.php";
                    // $("#uploaded_image").attr('class', "selected");
                }
            });
        });
    }
});