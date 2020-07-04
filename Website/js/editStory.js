$(document).ready(function(){
        // Get all editIcons links
        let editIcon = document.querySelectorAll(".edit-icon");
        // console.log(editIcon);
        // alert('s');
    
        // Looh through that links
        for (let i = 0; i < editIcon.length; i++){
            $(editIcon[i]).click(function(e){
                e.preventDefault(); // prevent jump to the top at the page
                // console.log("dd");
                var id = $(editIcon[i]).data('editid');
                // alert(id);
                // console.log("delete story with id : " + id);
                $.ajax({
                    url:"../Controllers/GetEditStoryIdController.php",
                    method:"POST",
                    data: {
                        'id': id
                    },
                    success:function(data){
                        
                        window.location.replace("../views/EditStoryView.php");
                        // $.getScript( "../js/loadingMyStories.js");
                    }
                });
            });
        }
});