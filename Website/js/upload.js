$(document).ready(function(){
    // $(document).on('change', '#fileToUpload', function(e){
        //  ####################### From here #######################
        var elmFileUpload = document.getElementById('fileToUpload');
        var form_data = new FormData();

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
                console.log("Not goos extension");
                e.preventDefault();
            }


            oFReader.readAsDataURL(document.getElementById("fileToUpload").files[0]);
            form_data.append("fileToUpload", document.getElementById('fileToUpload').files[0]);

            let img = document.getElementById('uploaded_image');
            img.style.backgroundImage = "url(" + e.target.result + ")";

            $.ajax({
                url:"../Controllers/UploadController.php",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,  
                success:function(data){
                    console.log(data);
                }
            });
        };

        elmFileUpload.addEventListener('change', onFileUploadChange, false);
        // ####################### to here #######################

        // var name = document.getElementById("fileToUpload").files[0].name;
        // var form_data = new FormData();
        // var ext = name.split('.').pop().toLowerCase();
        // if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
        //     e.preventDefault();
        // }

        // var oFReader = new FileReader();
        // oFReader.readAsDataURL(document.getElementById("fileToUpload").files[0]);
        // form_data.append("fileToUpload", document.getElementById('fileToUpload').files[0]);

        // // From here
        // var elmFileUpload = document.getElementById('fileToUpload');

        // function onFileUploadChange(e) {
        //     var file = e.target.files[0];
        //     var fr = new FileReader();
        //     fr.onload = onFileReaderLoad;
        //     fr.readAsDataURL(file);
        // }

        // function onFileReaderLoad(e) {
        //     let img = document.getElementById('uploaded_image');
        //     img.style.backgroundImage = "url(" + e.target.result + ")";
        // };

        // elmFileUpload.addEventListener('change', onFileUploadChange, false);
        // // to here

        
        // $.ajax({
        //     url:"../Controllers/UploadController.php",
        //     method:"POST",
        //     data: form_data,
        //     contentType: false,
        //     cache: false,
        //     processData: false,  
        //     success:function(data){
                // let x = document.createElement('img');
                // let img = document.getElementById('uploaded_image');

                // img.attr('src', data);
                // img.attr('alt', name);

                // img.style.backgroundImage = "url(" + data + ")";

        //         console.log(data);
        //     }
        // });

    // });
});
