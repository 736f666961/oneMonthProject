$(document).ready(function(){
    // Get all deleteIcons links
    let deleteIcon = document.querySelectorAll(".delete-icon");
    // console.log(deleteIcon);
    // alert('s');

    // Looh through that links
    for (let i = 0; i < deleteIcon.length; i++){
        $(deleteIcon[i]).click(function(e){
            e.preventDefault(); // prevent jump to the top at the page
            // console.log("dd");
            var id = $(deleteIcon[i]).data('deleteid');
            // console.log("delete story with id : " + id);
            $.ajax({
                url:"../Controllers/DeleteStoryController.php",
                method:"POST",
                data: {
                    'id': id
                },
                success:function(data){
                    // alert(data);
                    $.getScript( "../js/loadingMyStories.js");
                }
            });
        });
    }

});