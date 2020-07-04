$(document).ready(function(){
    // Get all element from links profile when clicked
    var profileLinks = document.querySelectorAll('.profile-link');

    // Loop through all profile to know which profile clicked
    for(let i = 0; i < profileLinks.length; i++){
        $(profileLinks[i]).click(function(e){
            e.preventDefault();  // prevent link from work

            // Get id from element above
            var profileID = $(profileLinks[i]).data("profileid");
            var altImg = $("#upload_image").val();
             
            // console.log(profileLinks[i]);
            // console.log(profileID);
            $.ajax({
                url: "../views/profileView.php",
                method: "POST",
                data: {
                    "profileID": profileID,
                    "alt-profile-img": altImg
                },
                success: function(data){
                    window.location.replace("../views/profileView.php");
                }
            });
        });
    }
});