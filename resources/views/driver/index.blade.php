@extends('layout.dashboard')

@section('content')
    <div class="row mt-5 align-items-center" style="justify-content: space-evenly">
        <div class="col-md-6">
            <div class="p-4 py-4 align-items-center rounded shadow-lg text-white d-flex flex-wrap" style="background: #AA2B1D">
                <div class="mr-auto" style="max-width: 500px">
                    <h5>Hi, {{Session::get('user')->fullname}}</h5>
                    <h4 class="font-weight-bold">CEK AKTIVITAS PENGANTARAN BBM PADA HARI INI</h4>
                </div>
                <img src="{{asset('images/bot 1.png')}}" height="150px"/>
            </div>
        </div>
        <div class="col-md-5">
            <div class="px-4 py-2 d-flex my-1 align-items-center flex-wrap rounded shadow-lg bg-white" style="border-left: 2px solid #AA2B1D">
                <div class="mr-auto">
                    <h4 style="color: #AA2B1D" class="mb-0">Total Task</h4>
                    <h1 class="font-weight-bold">{{count($tasks)}} SPBU</h1>
                </div>1
                <i class="fa fa-truck text-secondary" style="font-size: 72px"></i>
            </div>
        </div>
    </div>
    <div class="bg-light shadow pt-3 pb-1 mt-5" style="border-radius: 20px">
        <h2 style="color:#AA2B1D; font-weight: bold" class='px-4 mb-2 text-center'>Task List</h2>
        <table class="table table-striped" id="table">
            <thead style='background:#AA2B1D; font-weight: bold' class='text-white'>
                <tr>
                    <th>Shipment Number</th>
                    <th>SPBU</th>
                    <th>Deskripsi BBM</th>
                    <th>Liter</th>
                    <th>Tracking</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
@endsection

@section('js_section')
    <script src="{{ url('public/themes/limitless/global/js/plugins/extensions/jquery_ui/interactions.min.js') }}">
    </script>
    <script>
        $(function() {
            dTable = $('#table').DataTable({
                ajax: {
                    url: '{{ url('drivers/tasks/dt') }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'get',
                },
                columns: [{
                        data: 'shipment_no',
                        name: 'shipment_no',
                        className: 'center'
                    },
                    {
                        data: 'spbu',
                        name: 'spbu',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'desc',
                        name: 'desc',
                        className: 'center'
                    },
                    {
                        data: 'litre',
                        name: 'litre',
                        className: 'center',
                    },
                    {
                        data: 'tracking',
                        name: 'tracking',
                        className: 'center',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'status',
                        name: 'status',
                        className: 'center',
                    },
                ]
            });

            $('.dt_buttons .dt_button').eq(1).css('display', 'none')

            $('#table2_wrapper .dt-buttons').html("");

            $('.select2').select2();

            $('.form-check-input-styled').uniform();

            $('.dataTables_filter input[type=search]').attr('placeholder', 'Cari');

            $('.dataTables_length select').select2({
                minimumResultsForSearch: Infinity,
                width: 'auto'
            });

            $('.daterange-single').datepicker({
                format: "yyyy-mm-dd",
                todayHighlight: true
            });
        });
    </script>
@endsection
