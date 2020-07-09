$(document).ready(function(){
    //  ####################### From here #######################
    var elmFileUpload = document.getElementById('fileToUpload');
    var form_data = new FormData();

    var imageError = document.getElementById("imageError");
    function onFileUploadChange(e) {
        var file = e.target.files[0];
        var fr = new FileReader();
        fr.onload = onFileReaderLoad;
        fr.readAsDataURL(file);
    }

    function onFileReaderLoad(e) {
        var oFReader = new FileReader();
        var ext = elmFileUpload.files[0].name.split('.').pop().toLowerCase();
        if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
            // console.log("Not goos extension");
            imageError.innerHTML = "That's not look like an image";
            e.preventDefault();
        }


        oFReader.readAsDataURL(document.getElementById("fileToUpload").files[0]);
        form_data.append("fileToUpload", document.getElementById('fileToUpload').files[0]);

        let img = document.getElementById('uploaded_image');
        img.style.backgroundImage = "url(" + e.target.result + ")";

        let storyImageError = $("#imageError");
        storyImageError.html("");

        $.ajax({
            url:"../Controllers/UploadStoryImageController.php",
            method:"POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,  
            success:function(data){
                // console.log(data);
                document.getElementById("uploaded_image").classList.add("selected");
            }
        });
    };

    elmFileUpload.addEventListener('change', onFileUploadChange, false);
});
