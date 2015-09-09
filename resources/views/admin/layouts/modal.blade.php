<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@section('title') Administration @show</title>
    @section('meta_keywords')
        <meta name="keywords" content="your, awesome, keywords, here"/>
    @show @section('meta_author')
        <meta name="author" content="Jon Doe"/>
    @show @section('meta_description')
        <meta name="description"
              content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei."/>
    @show
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <script src="{{ asset('js/admin.js') }}"></script>
    @yield('styles')
</head>
<!-- Container -->
<div class="container">
    <div class="page-header">
        &nbsp;
        <div class="pull-right">
            <button class="btn btn-primary btn-xs close_popup">
                <span class="glyphicon glyphicon-backward"></span> {!! trans('admin/admin.back')!!}
            </button>
        </div>
    </div>
    <!-- Content -->
    @yield('content')
            <!-- ./ content -->
    <script type="text/javascript">
        $(function () {
            $('textarea').summernote({height: 250});
            $('form').submit(function (event) {
                event.preventDefault();
                var form = $(this);

                if (form.attr('id') == '' || form.attr('id') != 'fupload') {
                    $.ajax({
                        type: form.attr('method'),
                        url: form.attr('action'),
                        data: form.serialize()
                    }).success(function () {
                        setTimeout(function () {
                            parent.$.colorbox.close();
                        }, 10);
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        // Optionally alert the user of an error here...
                        var textResponse = jqXHR.responseText;
                        var alertText = "One of the following conditions is not met:\n\n";
                        var jsonResponse = jQuery.parseJSON(textResponse);

                        $.each(jsonResponse, function (n, elem) {
                            alertText = alertText + elem + "\n";
                        });
                        alert(alertText);
                    });
                }
                else {
                    var formData = new FormData(this);
                    $.ajax({
                        type: form.attr('method'),
                        url: form.attr('action'),
                        data: formData,
                        mimeType: "multipart/form-data",
                        contentType: false,
                        cache: false,
                        processData: false
                    }).success(function () {
                        setTimeout(function () {
                            parent.$.colorbox.close();
                        }, 10);

                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        // Optionally alert the user of an error here...
                        var textResponse = jqXHR.responseText;
                        var alertText = "One of the following conditions is not met:\n\n";
                        var jsonResponse = jQuery.parseJSON(textResponse);

                        $.each(jsonResponse, function (n, elem) {
                            alertText = alertText + elem + "\n";
                        });

                        alert(alertText);
                    });
                }
                ;
            });

            $('.close_popup').click(function () {
                parent.$.colorbox.close();
            });
        });
    </script>
    @yield('scripts')
</div>
</body>
</html>