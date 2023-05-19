

// to upload single image 

// set the dropzone container id
var classw = ".upload_dropzone_images";
if($(classw).length > 0){
    $(classw).each(function(){
        
        var id = $(this).attr("id"),
        id = "#" + id;
        var max = $(this).attr("data-max"),
        key = $(this).attr("data-key"),
        img_name = $(this).attr("data-img");

var previewTemplate = $(id + " .dropzone-items").html();

var myDropzone = new Dropzone(id, { // Make the whole body a dropzone
    url: "form_handler.php", // Set the url for your upload script location
    params:{"form_action":"upload_img","key":key,"img_name":img_name},
    parallelUploads: 2,
    acceptedFiles:'image/jpeg,image/png',
    previewTemplate: previewTemplate,
    maxFiles:max,
    maxFilesize: 8, // Max filesize in MB
    autoQueue: true, // Make sure the files aren't queued until manually added
    previewsContainer: id + " .dropzone-items", // Define the container to display the previews
    clickable: id + " .dropzone-select", // Define the element that should be used as click trigger to select files.
    init: function() {
        this.on("success", function(file, response) {
            
            console.log(response);
        })
    }
});

myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(id + " .dropzone-start").onclick = function() { myDropzone.enqueueFile(file); };
    $(document).find( id + " .dropzone-item").css("display", "");
    $( id + " .dropzone-upload, " + id + " .dropzone-remove-all").css("display", "inline-block");
});

// Update the total progress bar
myDropzone.on("totaluploadprogress", function(progress) {
    $(this).find( id + " .progress-bar").css("width", progress + "%");
});

myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    $( id + " .progress-bar").css("opacity", "1");
    // And disable the start button
    file.previewElement.querySelector(id + " .dropzone-start").setAttribute("disabled", "disabled");
});

// Hide the total progress bar when nothing's uploading anymore
myDropzone.on("complete", function(progress) {
    var thisProgressBar = id + " .dz-complete";
    setTimeout(function(){
        $( thisProgressBar + " .progress-bar, " + thisProgressBar + " .progress, " + thisProgressBar + " .dropzone-start").css("opacity", "0");
    }, 300)

});

// Setup the buttons for all transfers
document.querySelector( id + " .dropzone-upload").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
};

// Setup the button for remove all files
document.querySelector(id + " .dropzone-remove-all").onclick = function() {
    $( id + " .dropzone-upload, " + id + " .dropzone-remove-all").css("display", "none");
    myDropzone.removeAllFiles(true);
};

// On all files completed upload
myDropzone.on("queuecomplete", function(progress){
    $( id + " .dropzone-upload").css("display", "none");
});

// On all files removed
myDropzone.on("removedfile", function(file){
    if(myDropzone.files.length < 1) {
        $( id + " .dropzone-upload, " + id + " .dropzone-remove-all").css("display", "none");
    }
});

    });

}

$(".dropzone-item").remove();


$(".delete_camp_btn").on("click" , function(){
    var id = $(this).attr("data-id");
    $("#kt_modal_new_card_form input[name='camp_id']").val(id);
});
$(".delete_feedback_btn").on("click" , function(){
    var id = $(this).attr("data-id");;
    $("#kt_modal_new_card_form input[name='feedback_id']").val(id);
});
$(".delete_member_btn").on("click" , function(){
    var id = $(this).attr("data-id");
    $("#kt_modal_new_card_form input[name='member_id']").val(id);
});
$(".delete_project_btn").on("click" , function(){
    var id = $(this).attr("data-id");
    $("#kt_modal_new_card_form input[name='port_slug']").val(id);
});
$(".delete_message_btn").on("click" , function(){
    var id = $(this).attr("data-id");
    $("#kt_modal_new_card_form input[name='message_id']").val(id);
});



if( $("#kt_dropzonejs_example_1").length > 0 ){

    var folder_key = $("input[name='port_slug']").val();
    var logoPosition = $("#logo-position").attr("data-position");
    // multi download dropzone
    var multidropzone = new Dropzone("#kt_dropzonejs_example_1", {
        url: "form_handler.php", // Set the url for your upload script location
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 20,
        maxFilesize: 8, // MB
        addRemoveLinks: true,
        parallelUploads: 1,
        acceptedFiles:'image/jpeg,image/png',
        params:{"form_action":"upload_img","key":folder_key,"img_name":"multi_upload_imgs", "logo-position": logoPosition},
        success: function(file, response){
            console.log(response);
            //console.log(response);
            //Here you can get your response.
            let img_name = response;
            $("#kt_dropzonejs_example_1 .dz-preview:last-child").attr("data-key" , img_name).children(".dz-image").children("img").attr("src" , "../uploads/" + folder_key + "/" + img_name);
        }
        
    });

}

if( $("#kt_dropzonejs_example_2").length > 0 ){

    var panorama_folder_key = $("input[name='port_slug']").val() + '/panorama/';
    // multi download dropzone
    var multidropzone = new Dropzone("#kt_dropzonejs_example_2", {
        url: "form_handler.php", // Set the url for your upload script location
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 20,
        maxFilesize: 8, // MB
        addRemoveLinks: true,
        parallelUploads: 1,
        acceptedFiles:'image/jpeg,image/png',
        params:{"form_action":"upload_img","key":panorama_folder_key,"img_name":"multi_upload_imgs", "is_panorma": "true"},
        success: function(file, response){
            //console.log(response);
            //Here you can get your response.
            let img_name = 'panorama/' + response;
            $("#kt_dropzonejs_example_2 .dz-preview:last-child").attr("data-key" , img_name);
        }
        
    });

}


function remove_from_folder(obj,db = false){
    let img_name = obj.parent(".dz-preview").attr("data-key");
    let folder_key = $("input[name='port_slug']").val();
    let img = folder_key + "/" + img_name;
    let action = ( db == false ) ? 'delete_image' : 'delete_img_db';
    
    $.ajax({
        url: 'form_handler.php',
        method:"POST",
        dataType:"text",
        data:{"form_action": action,"imgSrc":img},
        success:function(txt){
            //console.log(txt);
        }
    })
}


if( $("#editorwww").length > 0 ){
    var editor = CKEDITOR.replace( 'editorwww');
    CKFinder.setupCKEditor( editor );
}

if( $("#editorssss").length > 0 ){
    var editor = CKEDITOR.replace( 'editorssss');
    CKFinder.setupCKEditor( editor );
}


$(".card-body .dz-remove").on("click" , function(e){
    var c = confirm("Are you sure you want to delete this image ?");
    if(c == true){
        remove_from_folder($(this),'db');
        $(this).parent().parent().parent().parent().remove();
    }
    
});



$(".ajax-action-custom").on("click" , function(){

    let action = $(this).attr("data-action");
    let id = $(this).attr("data-id");

    $.ajax({
        url: 'form_handler.php',
        method:"POST",
        dataType:"text",
        data:{'form_action':action,'id':id},
        success:function(txt){
            if(txt == 'success-messages-page'){
                toggle_message_status(action,id);
            }
        }
    });

});

function toggle_message_status( old_status,id ){

    let new_status = ( old_status == 'mark-undone' ) ? 'mark-done' : 'mark-undone';
    let txt_stats = ( old_status == 'mark-undone' ) ? '<span class="badge badge-light-danger">Not Done</span>' : '<span class="badge badge-light-success">Done</span>';

    $("tr.row-message-container[data-id='"+ id +"'] .message-status-tab").html(txt_stats);

    let btn = $("tr.row-message-container[data-id='"+ id +"'] .menu-sub-dropdown .ajax-action-custom");

    btn.attr("data-action" , new_status);
    let t = ( new_status == 'mark-done' ) ? 'Mark as Done' : 'Mark as Undone';
    btn.html(t);

}


$("#add-new-video-link").on("click" , function(){
    $("#videos-inputs").append(`
        <input class="form-control form-control-solid mt-3" type="url" placeholder="Enter video link" value="" name="videos[]">
    `);
});

$(".translate-to-arabic").on("blur" , function(){
    let outputId = $(this).attr("data-output");
    var textToTranslate = $(this).val();
    var targetLanguage = 'ar';
    var is_textarea = $(this).hasClass('is-textarea');
    
    var url = 'https://api.mymemory.translated.net/get?q=' + encodeURIComponent(textToTranslate) + '&langpair=en|' + targetLanguage;
    if(textToTranslate.length > 1){
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
              var translatedText = response.responseData.translatedText;
              if(is_textarea){
                $(outputId).html(translatedText)
                $(outputId).val(translatedText)
              }else{
                $(outputId).val(translatedText)
              }
              
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
              
            }
          });
    }
    
});


$(".create-new-project-modal").on("click" , function(){
    $(".action-attr-input").attr("name" , $(this).attr("data-name")).attr("value" , $(this).attr("data-val"));
})