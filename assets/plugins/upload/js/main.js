/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    'use strict';
    $('#fileupload').fileupload({
        url: "upload/do_upload",
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 999000,
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        // previewMaxWidth: 100,
        // previewMaxHeight: 100,
        // previewCrop: true
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                $('<input>',{
                   name:"image[]",
                   type:"hidden",
                   value:file.url
               }).appendTo('#fileupload');
            } 
        });
    }).prop('disabled', !$.support.fileInput)
    .parent().addClass($.support.fileInput ? undefined : 'disabled');
});