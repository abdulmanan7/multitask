<?php $this->load->view('template/header');?>
        <h1>Welcome to PDF Gerator!</h1>

        <div id="body">
            <!-- The file upload form used as target for the file upload widget -->
            <form id="fileupload" action="upload/do_upload" method="POST" enctype="multipart/form-data">
                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                <div class="row fileupload-buttonbar">
                    <div class="col-lg-7">
                    <table id="main" cellspacing="0" border="0" cellpadding="3">
                    <tr>
                        <td valign="right">
                            <img width="220" height="75" style="float: right;"  src="<?//=$logo?>" />
                        </td>
                    </tr>
            </table>

            <table class="table-col-12" cellspacing="10">
                <tr>
                    <td class="table-head" style="padding-bottom:0;"><h4>Fragebogen für Ihre „Digitale Ortsbegehung“</h4></td>
                </tr>
                <tr>
                    <td align="left" class="subheading">Erfassung Ihrer Kundendaten</td>
                </tr>
            </table>
            <table id="items" border="1" style="width:100%;" cellspacing="10">
                <tr class="item-row">
                    <td class="item-name">Vorname:</td>
                    <td class="item-name"><input name="vorname" type="text" class="form-control"></input></td>
                    <td class="item-name">Nachname:</td>
                    <td class="item-name"><input name="nachname" type="text" class="form-control"></input></td>
                </tr>
                <tr class="item-row">
                    <td class="item-name">Straße + Nr.:</td>
                    <td class="item-name" colspan="3"><input name="strabe" type="text" class="form-control"></input></td>
                </tr>
                <tr class="item-row">
                    <td class="item-name">PLZ:</td>
                    <td class="item-name"><input name="plz" type="text" class="form-control"></input></td>
                    <td class="item-name">Ort:</td>
                    <td class="item-name" style="width: 60%"><input name="ort" type="text" class="form-control"></input></td>
                </tr>
                <tr class="item-row">
                    <td class="item-name">Bauobjektadresse:(falls abweichend)</td>
                    <td class="item-name" colspan="3"><textarea name="adresse" class="form-control" rows="2"></textarea></td>
                </tr>
                <tr class="item-row">
                    <td class="item-name">Telefon:</td>
                    <td class="item-name"><input name="phone" type="text" class="form-control"></input></td>
                    <td class="item-name">eMail:</td>
                    <td class="item-name" style="width: 60%"><input name="email" type="text" class="form-control"></input></td>
                </tr>
            </table>
            <table class="table-col-12">
                <tr>
                    <td align="left" class="subheading">Erfassung Ihrer Objektdaten:</td>
                </tr>
            </table>
            <table id="items" border="1" class="question" style="margin:0 0 40px 0 ; width:100%;" cellspacing="10">
                <tr class="item-row">
                    <td class="item-name">Baujahr von Ihrem Haus? </td>
                    <td class="item-name"><input name="question1" type="text" class="form-control"></input></td>
                </tr>
                <tr class="item-row">
                    <td class="item-name">Baujahr Ihrer aktuellen Heizung? </td>
                    <td class="item-name"><input name="question2" type="text" class="form-control"></input></td>
                </tr>
                <tr class="item-row">
                    <td class="item-name">Womit heizen Sie derzeit? </td>
                    <td class="item-name"><input name="question3" type="text" class="form-control"></input></td>
                </tr>
                <tr class="item-row">
                    <td class="item-name">Wie hoch ist durchschnittlich Ihr Heizenergieverbrauch ca. pro Jahr?</td>
                    <td class="item-name"><input name="question4" type="text"><input name="question_part2" type="text" style="width:45.6% ;margin-left: 10px;"></input></td>
                </tr>
                <tr class="item-row">
                    <td class="item-name">Wie viel kW-Leistung hat Ihre aktuelle Heizung? </td>
                    <td class="item-name"><input name="question5" type="text" class="form-control"></input></td>
                </tr>
                <tr class="item-row">
                    <td class="item-name"><u>Beheizte Wohnfläche</u> in qm? </td>
                    <td class="item-name"><input name="question6" type="text" class="form-control"></input></td>
                </tr>
                <tr class="item-row">
                    <td class="item-name">Wie viel Personen leben in Ihrem Haus? </td>
                    <td class="item-name"><input name="question7" type="text" class="form-control"></input></td>
                </tr>
                <tr class="item-row">
                    <td class="item-name">Wird Ihr Haus wärmegedämmt oder wann ist das ggf. geplant? </td>
                    <td class="item-name"><input name="question8" type="text" class="form-control"></input></td>
                </tr>
                <tr class="item-row">
                    <td class="item-name">Wie wird der neue gesamte Wärmebedarf nach der Dämmmaßnahme sein:</td>
                    <td class="item-name" style="width:40%"><input name="question9" type="text" style="width: 76%;"><span style="width:56% ;margin-left: 10px;">kWh / Jahr</span></td>
                </tr>
                <tr class="item-row">
                    <td class="item-name" colspan="2">Haben Sie schon eine Vorstellung, was Sie benötigen, dann ist hier der richtige Platz für Ihre Beschreibung. Wir freuen uns über Ihre zusätzlichen Informationen. Vielen Dank</td>
                </tr>
                <tr class="item-row">
                    <td class="item-name" colspan="2"><textarea name="description" class="form-control" rows="8"></textarea></td>
                </tr>
            </table>
                        <!-- The fileinput-button span is used to style the file input field as button -->
                        <span class="btn btn-success fileinput-button">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Add files...</span>
                            <input type="file" name="userfile" multiple>
                        </span>
                        <button type="submit" class="btn btn-primary start">
                            <i class="glyphicon glyphicon-upload"></i>
                            <span>Start upload</span>
                        </button>
                        <button type="reset" class="btn btn-warning cancel">
                            <i class="glyphicon glyphicon-ban-circle"></i>
                            <span>Cancel upload</span>
                        </button>
                        <button type="button" class="btn btn-danger delete">
                            <i class="glyphicon glyphicon-trash"></i>
                            <span>Delete</span>
                        </button>
                        <input type="checkbox" class="toggle">
                        <!-- The global file processing state -->
                        <span class="fileupload-process"></span>
                    </div>
                    <!-- The global progress state -->
                    <div class="col-lg-5 fileupload-progress fade">
                        <!-- The global progress bar -->
                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                        </div>
                        <!-- The extended global progress state -->
                        <div class="progress-extended">&nbsp;</div>
                    </div>
                </div>
                <!-- The table listing the files available for upload/download -->
                <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                <button type="submit" class="btn btn-default">Process</button>
            </form>
            <!-- The blueimp Gallery widget -->
            <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
                <div class="slides"></div>
                <h3 class="title"></h3>
                <a class="prev">‹</a>
                <a class="next">›</a>
                <a class="close">×</a>
                <a class="play-pause"></a>
                <ol class="indicator"></ol>
            </div>
        </div>
    </div>
    <?php $this->load->view('template/footer');?>
<script>
    /*
 * jQuery File Upload Plugin JS Example 8.9.1
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

 /* global $, window */

 $(function () {
    'use strict';

    // Initialize the jQuery File Upload widget:
    $('#fileupload').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: 'upload/do_upload'
    });

    // Enable iframe cross-domain access via redirect option:
    $('#fileupload').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '/cors/result.html?%s'
            )
        );

    if (window.location.hostname === 'blueimp.github.io') {
        // Demo settings:
        $('#fileupload').fileupload('option', {
            url: '//jquery-file-upload.appspot.com/',
            // Enable image resizing, except for Android and Opera,
            // which actually support image resizing, but fail to
            // send Blob objects via XHR requests:
            disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
            maxFileSize: 5000000,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
        });
        // Upload server status check for browsers with CORS support:
        if ($.support.cors) {
            $.ajax({
                url: 'upload/do_upload',
                type: 'HEAD'
            }).fail(function () {
                $('<div class="alert alert-danger"/>')
                .text('Upload server currently unavailable - ' +
                    new Date())
                .appendTo('#fileupload');
            });
        }
    } else {
        // Load existing files:
        $('#fileupload').addClass('fileupload-processing');
        $.ajax({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: $('#fileupload').fileupload('option', 'url'),
            dataType: 'json',
            context: $('#fileupload')[0]
        }).always(function () {
            $(this).removeClass('fileupload-processing');
        }).done(function (result) {
            $(this).fileupload('option', 'done')
            .call(this, $.Event('done'), {result: result});
        });
    }

});

</script>
</body>
</html>