$(function() {
    Noty.overrideDefaults({
        theme: 'limitless',
        layout: 'topRight',
        type: 'alert',
        timeout: 2000
    });

    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        //dom: '<"datatable-header"f<"dt-buttons">l><"datatable-scroll"t><"datatable-footer"ip>',
        dom: '<"datatable-header datatable-header-accent"lfB><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '_INPUT_',
            lengthMenu: '_MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' },
            "processing": "DataTables is currently busy",
            "sEmptyTable": "No data available in table", //Data tidak tersedia
            "sInfoEmpty":  "Showing 0", //Menampilkan
            "sLengthMenu": "Show _MENU_ entries", //Item per halaman
            "sInfoFiltered": " - from _MAX_ entries", //- dari total _MAX_ entri
            "sInfo": "Total: _TOTAL_ entries", //entri
            "sProcessing": "Processing...",
            "sZeroRecords": "No matching records found" //Tidak ditemukan data yang cocok
        },
        "lengthMenu": [
            [10, 20, 30, 50, 100, 150, -1],
            [10, 20, 30, 50, 100, 150, "All"]
        ],
        "bStateSave": true,
        "pageLength": 30, // default records per page
        "autoWidth": false, // disable fixed width and enable fluid table
        "processing": true, // enable/disable display message box on record load
        "serverSide": true, // enable/disable server side ajax loading
        buttons: [
            {
                extend: 'collection',
                text: '<i class="icon-file-excel"></i> <span class="d-none d-lg-inline-block ml-2">Export</span>',
                className: 'btn btn-light bg-white',
                buttons: [{
                    text: 'Excel',
                    extend: 'excelHtml5',
                    footer: false,
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    text: 'CSV',
                    extend: 'csvHtml5',
                    fieldSeparator: ';',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    text: 'PDF Portrait',
                    extend: 'pdfHtml5',
                    message: '',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    text: 'PDF Landscape',
                    extend: 'pdfHtml5',
                    message: '',
                    orientation: 'landscape',
                    exportOptions: {
                        columns: ':visible'
                    }
                }]
            }
        ]
    });

    $.fn.dataTableExt.oPagination.iFullNumbersShowPages = 10;
});

var validator = $('.form-validate').validate({
    ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
    errorClass: 'validation-invalid-label',
    successClass: 'validation-valid-label',
    validClass: 'validation-valid-label',
    highlight: function(element, errorClass) {
        $(element).removeClass(errorClass);
    },
    unhighlight: function(element, errorClass) {
        $(element).removeClass(errorClass);
    },
    /*success: function(label) {
        label.addClass('validation-valid-label').text('Success.'); // remove to hide Success message
    },*/

    // Different components require proper error label placement
    errorPlacement: function(error, element) {

        // Unstyled checkboxes, radios
        if (element.parents().hasClass('form-check')) {
            error.appendTo( element.parents('.form-check').parent() );
        }

        // Input with icons and Select2
        else if (element.parents().hasClass('form-group-feedback') || element.hasClass('select2-hidden-accessible')) {
            error.appendTo( element.parent() );
        }

        // Input group, styled file input
        else if (element.parent().is('.uniform-uploader, .uniform-select') || element.parents().hasClass('input-group')) {
            error.appendTo( element.parent().parent() );
        }

        // Other elements
        else {
            error.insertAfter(element);
        }
    },
    rules: {
        password: {
            minlength: 5
        },
        repeat_password: {
            equalTo: '#password'
        },
        email: {
            email: true
        },
        repeat_email: {
            equalTo: '#email'
        },
        minimum_characters: {
            minlength: 10
        },
        maximum_characters: {
            maxlength: 10
        },
        minimum_number: {
            min: 10
        },
        maximum_number: {
            max: 10
        },
        number_range: {
            range: [10, 20]
        },
        url: {
            url: true
        },
        date: {
            date: true
        },
        date_iso: {
            dateISO: true
        },
        numbers: {
            number: true
        },
        digits: {
            digits: true
        },
        creditcard: {
            creditcard: true
        },
        basic_checkbox: {
            minlength: 2
        },
        styled_checkbox: {
            minlength: 2
        },
        switchery_group: {
            minlength: 2
        },
        switch_group: {
            minlength: 2
        }
    },
    messages: {
        custom: {
            required: 'This is a custom error message'
        },
        basic_checkbox: {
            minlength: 'Please select at least {0} checkboxes'
        },
        styled_checkbox: {
            minlength: 'Please select at least {0} checkboxes'
        },
        switchery_group: {
            minlength: 'Please select at least {0} switches'
        },
        switch_group: {
            minlength: 'Please select at least {0} switches'
        },
        agree: 'Please accept our policy'
    }
});

function validator_init(id)
{
   return $(id).validate({
       ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
       errorClass: 'validation-invalid-label',
       successClass: 'validation-valid-label',
       validClass: 'validation-valid-label',
       highlight: function(element, errorClass) {
           $(element).removeClass(errorClass);
       },
       unhighlight: function(element, errorClass) {
           $(element).removeClass(errorClass);
       },
       /*success: function(label) {
           label.addClass('validation-valid-label').text('Success.'); // remove to hide Success message
       },*/

       // Different components require proper error label placement
       errorPlacement: function(error, element) {

           // Unstyled checkboxes, radios
           if (element.parents().hasClass('form-check')) {
               error.appendTo( element.parents('.form-check').parent() );
           }

           // Input with icons and Select2
           else if (element.parents().hasClass('form-group-feedback') || element.hasClass('select2-hidden-accessible')) {
               error.appendTo( element.parent() );
           }

           // Input group, styled file input
           else if (element.parent().is('.uniform-uploader, .uniform-select') || element.parents().hasClass('input-group')) {
               error.appendTo( element.parent().parent() );
           }

           // Other elements
           else {
               error.insertAfter(element);
           }
       },
       rules: {
           password: {
               minlength: 5
           },
           repeat_password: {
               equalTo: '#password'
           },
           email: {
               email: true
           },
           repeat_email: {
               equalTo: '#email'
           },
           minimum_characters: {
               minlength: 10
           },
           maximum_characters: {
               maxlength: 10
           },
           minimum_number: {
               min: 10
           },
           maximum_number: {
               max: 10
           },
           number_range: {
               range: [10, 20]
           },
           url: {
               url: true
           },
           date: {
               date: true
           },
           date_iso: {
               dateISO: true
           },
           numbers: {
               number: true
           },
           digits: {
               digits: true
           },
           creditcard: {
               creditcard: true
           },
           basic_checkbox: {
               minlength: 2
           },
           styled_checkbox: {
               minlength: 2
           },
           switchery_group: {
               minlength: 2
           },
           switch_group: {
               minlength: 2
           }
       },
       messages: {
           custom: {
               required: 'This is a custom error message'
           },
           basic_checkbox: {
               minlength: 'Please select at least {0} checkboxes'
           },
           styled_checkbox: {
               minlength: 'Please select at least {0} checkboxes'
           },
           switchery_group: {
               minlength: 'Please select at least {0} switches'
           },
           switch_group: {
               minlength: 'Please select at least {0} switches'
           },
           agree: 'Please accept our policy'
       }
    });
}

var http_codes = {
    100 : 'Continue',
    101 : 'Switching Protocols',
    102 : 'Processing',
    103 : 'Checkpoint',
    200 : 'OK',
    201 : 'Created',
    202 : 'Accepted',
    203 : 'Non-Authoritative Information',
    204 : 'No Content',
    205 : 'Reset Content',
    206 : 'Partial Content',
    207 : 'Multi-Status',
    300 : 'Multiple Choices',
    301 : 'Moved Permanently',
    302 : 'Found',
    303 : 'See Other',
    304 : 'Not Modified',
    305 : 'Use Proxy',
    306 : 'Switch Proxy',
    307 : 'Temporary Redirect',
    400 : 'Bad Request',
    401 : 'Unauthorized',
    402 : 'Payment Required',
    403 : 'Forbidden',
    404 : 'Not Found',
    405 : 'Method Not Allowed',
    406 : 'Not Acceptable',
    407 : 'Proxy Authentication Required',
    408 : 'Request Timeout',
    409 : 'Conflict',
    410 : 'Gone',
    411 : 'Length Required',
    412 : 'Precondition Failed',
    413 : 'Request Entity Too Large',
    414 : 'Request-URI Too Long',
    415 : 'Unsupported Media Type',
    416 : 'Requested Range Not Satisfiable',
    417 : 'Expectation Failed',
    418 : 'I\'m a teapot',
    422 : 'Unprocessable Entity',
    423 : 'Locked',
    424 : 'Failed Dependency',
    425 : 'Unordered Collection',
    426 : 'Upgrade Required',
    449 : 'Retry With',
    450 : 'Blocked by Windows Parental Controls',
    500 : 'Internal Server Error',
    501 : 'Not Implemented',
    502 : 'Bad Gateway',
    503 : 'Service Unavailable',
    504 : 'Gateway Timeout',
    505 : 'HTTP Version Not Supported',
    506 : 'Variant Also Negotiates',
    507 : 'Insufficient Storage',
    509 : 'Bandwidth Limit Exceeded',
    510 : 'Not Extended'
};

$.ajaxSetup({
    //cache: false,
    global:true,
    async:true,
    timeout: 20000,
    method: 'GET',
    error: function (x, t, e)
    {
        $('#loading-img').hide();

        alert("Error "+x.status+": "+http_codes[x.status]);
        /*if (x.status == 550)
            alert("Error 550: Error Message");
        else if (x.status == "403")
            alert("Error 403: Not Authorized");
        else if (x.status == "500")
            alert("Error 500: Internal Server Error");
        else if (x.status == "419")
            alert("Error 419: CSRF Token Expired");
        else
            alert("Error XHR");*/
    },
    beforeSend : function() {
        $('#loading-img').show();
    },
    complete : function() {
        $('#loading-img').hide();
    }
});

function _reset()
{
    validator.resetForm();

    $("label.error").hide();
    $(".error").removeClass("error");
    $('.form-validate')[0].reset();
}