/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    'use strict';
    $('#fileupload').fileupload({
        url: "upload/do_upload",
        dataType: 'json',
        autoUpload: true,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png|pdf)$/i,
        maxFileSize: 99900000,
        filesContainer:$(".FocusedStep").children(':last').find("tbody.files"),
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        // previewMaxWidth: 100,
        // previewMaxHeight: 100,
        // previewCrop: true
        messages: {
                acceptFileTypes: 'Dieses Dateiformat wird nicht unterstützt, bitte wählen Sie eines der folgenden Formate aus: .jpg, .png, *.pdf',
            }
    }).on('fileuploaddone', function (e, data) {
        // $.each(data.result.files, function (index, file) {
        //     if (file.url) {
        //        //  $('<input>',{
        //        //     name:"image[]",
        //        //     type:"hidden",
        //        //     value:file.pdfUrl
        //        // }).appendTo('#fileupload');
        //     } 
        // });
    }).prop('disabled', !$.support.fileInput)
    .parent().addClass($.support.fileInput ? undefined : 'disabled');
});