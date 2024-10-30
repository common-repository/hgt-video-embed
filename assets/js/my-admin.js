jQuery(document).ready(function(jQuery){
 
 
    var custom_uploader;
 
 
    jQuery('#upload_image_button').click(function(e) {
 
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Mp4 file',
            button: {
                text: 'Choose Mp4 file'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            jQuery('#upload_image').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
 
    });
 
 
});

jQuery(document).ready(function(jQuery){
 
 
    var custom_uploader;
 
 
    jQuery('#upload_image_button_overlay').click(function(e) {
 
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            jQuery('#upload_image_overlay').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
 
    });
 
 
});

jQuery(document).ready(function(jQuery){
 
 
    var custom_uploader;
 
 
    jQuery('#wve_upload_logo_image').click(function(e) {
 
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            jQuery('#wve_upload_logo_field').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
 
    });
 
 
});

jQuery(document).ready(function(jQuery){
 
 
    var custom_uploader;
 
 
    jQuery('#wve_upload_icon_image').click(function(e) {
 
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            jQuery('#wve_upload_icon_field').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
 
    });
 
 
});
jQuery(document).ready(function(jQuery){
 
 
    var custom_uploader;
 
 
    jQuery('#wve_edit_image_button').click(function(e) {
 
        e.preventDefault();
 
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            jQuery('#wve_edit_cta_image').val(attachment.url);
        });
 
        //Open the uploader dialog
        custom_uploader.open();
 
    });
 
 
});