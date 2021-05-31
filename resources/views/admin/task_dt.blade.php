@extends('layout.dashboard')

@section('content')
    <div class="bg-light shadow pt-3 pb-1" style="border-radius: 20px">
        <h2 style="color:#AA2B1D; font-weight: bold" class='px-4 mb-1'>Task List</h2>
        <table class="table table-striped" id="table">
            <thead style='background:#AA2B1D; font-weight: bold' class='text-white'>
                <tr>
                    <th>Shipment Number</th>
                    <th>Nomor Kendaraan</th>
                    <th>Nama Driver</th>
                    <th>Deskripsi BBM</th>
                    <th>Lokasi Pengiriman</th>
                    <th>Status</th>
                    <th>Waktu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div class="modal fade" id="frmbox" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="border-radius: 10%">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <center>
                    <h2 style="color:#AA2B1D; font-weight: bold" class='mb-2'>Data Task</h2>
                    </center>
                    <input type="hidden" id="tasks_id" />
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Driver</label>
                            <select name="driver" id="driver" class="form-control select2">
                                @foreach ($drivers as $item)
                                    <option value="{{ $item->uid }}">{{ $item->fullname }} -
                                        {{ $item->driver_data->vehicle_no }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Deskripsi BBM</label>
                            <input type="text" class="form-control" name="desc" id="desc" placeholder="Deskripsi BBM">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Liter</label>
                            <input type="text" class="form-control" name="litre" id="litre" placeholder="Liter">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Lokasi Pengiriman - SPBU 1</label>
                            <select name="spbu_1_name" id="spbu_1" class="form-control select2">
                                @foreach ($spbus as $item)
                                    <option value="{{ $item->spbu_id }}">{{ $item->spbu_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Lokasi Pengiriman - SPBU 2</label>
                            <select name="spbu_2_name" id="spbu_2" class="form-control select2">
                                @foreach ($spbus as $item)
                                    <option value="{{ $item->spbu_id }}">{{ $item->spbu_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Lokasi Pengiriman - SPBU 3</label>
                            <select name="spbu_3_name" id="spbu_3" class="form-control select2">
                                @foreach ($spbus as $item)
                                    <option value="{{ $item->spbu_id }}">{{ $item->spbu_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex" style='justify-content:space-between'>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" onclick="add()" id='button-add' style="display: none"
                        class="btn btn-success">Simpan Perubahan</button>
                    <button type="button" onclick="update()" id='button-update' style="display: none"
                        class="btn btn-success">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="boxroute" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="border-radius: 10%">
            <div class="modal-content">
                <div class="modal-body">
                    <h2 class="text-center font-weight-bold pt-3">Status Details</h2>
                    <hr />
                    <div class="d-flex" style="justify-content: space-evenly">
                        <div>
                            <h5 class="font-weight-bold">Shipment Number</h5>
                            <h4 id="shipment_no_label"></h4>
                        </div>
                        <div>
                            <h5 class="font-weight-bold">Nomor Kendaraan</h5>
                            <h4 id="vehicle_no_label"></h4>
                        </div>
                        <div>
                            <h5 class="font-weight-bold">Deskripsi</h5>
                            <h4 id="desc_label"></h4>
                        </div>
                    </div>
                    <hr />
                    <div class="container py-2" id="status_list">
                        <div class="row">
                            <div class="col-auto text-center flex-column d-none d-sm-flex">
                                <div class="row h-50">
                                    <div class="col border-right">&nbsp;</div>
                                    <div class="col">&nbsp;</div>
                                </div>
                                <h5 class="m-2">
                                    <span class="badge badge-pill bg-light border">&nbsp;</span>
                                </h5>
                                <div class="row h-50">
                                    <div class="col border-right">&nbsp;</div>
                                    <div class="col">&nbsp;</div>
                                </div>
                            </div>
                            <div class="col py-2">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="float-right">Tue, Jan 10th 2019 8:30 AM</div>
                                        <h4 class="card-title">Day 2 Sessions</h4>
                                        <p class="card-text">Sign-up for the lessons and speakers that coincide with your
                                            course syllabus. Meet and greet with instructors.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto text-center flex-column d-none d-sm-flex">
                                <div class="row h-50">
                                    <div class="col border-right">&nbsp;</div>
                                    <div class="col">&nbsp;</div>
                                </div>
                                <h5 class="m-2">
                                    <span class="badge badge-pill bg-light border">&nbsp;</span>
                                </h5>
                                <div class="row h-50">
                                    <div class="col">&nbsp;</div>
                                    <div class="col">&nbsp;</div>
                                </div>
                            </div>
                            <div class="col py-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right text-muted">Thu, Jan 12th 2019 11:30 AM</div>
                                        <h4 class="card-title">Day 4 Wrap-up</h4>
                                        <p>Join us for lunch in Bootsy's cafe across from the Campus Center.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>
                </div>
                <div class="modal-footer d-flex" style='justify-content:space-between'>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js_section')
    <script src="{{ url('public/themes/limitless/global/js/plugins/extensions/jquery_ui/interactions.min.js') }}">
    </script>
    <script>
        function openModal() {
            $('#frmbox').trigger("reset");
            $('#button-add').css('display', 'inline');
            $('#frmbox').modal({
                keyboard: false,
                backdrop: 'static'
            });
        }

        function add() {
            if ($('#desc').val() && $('#litre').val() && $('#driver').val())
                $.ajax({
                    url: '{{ url('admin/tasks/add') }}',
                    type: 'post',
                    dataType: 'json',
                    data: ({
                        desc: $('#desc').val(),
                        litre: $('#litre').val(),
                        driver: $('#driver').val(),
                        spbu_1: $('#spbu_1').val(),
                        spbu_2: $('#spbu_2').val(),
                        spbu_3: $('#spbu_3').val(),
                    }),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(e) {
                        $("#frmbox").modal('hide');
                        $('#button-add').css('display', 'none');
                        dTable.draw()
                    }
                });
            else alert('Isi Field Dengan Lengkap')
        }

        function detail(id) {
            $('#frmbox').trigger("reset");
            $('#button-update').css('display', 'inline');
            $.ajax({
                url: '{{ url('admin/tasks/detail') }}',
                type: 'post',
                dataType: 'json',
                data: ({
                    id: id
                }),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(e) {
                    $('#desc_label').html(e.desc)
                    $('#vehicle_no_label').html(e.vehicle_no)
                    $('#shipment_no_label').html(e.shipment_no)
                    $('#status_list').empty();
                    e.status.map((item, index) => {
                        $('#status_list').append(`
                            <div class="row">
                                <div class="col-auto text-center flex-column d-none d-sm-flex">
                                    <div class="row h-50">
                                        <div class="col ${index != 0 ? 'border-right' : ''}">&nbsp;</div>
                                        <div class="col">&nbsp;</div>
                                    </div>
                                    <h5 class="m-2">
                                        <span class="badge badge-pill bg-${item.status == 'Y' ? 'success' : item.status == 'O' ? 'warning' : 'light'} border">&nbsp;</span>
                                    </h5>
                                    <div class="row h-50">
                                        <div class="col ${index != e.status.length - 1 ? 'border-right' : ''}">&nbsp;</div>
                                        <div class="col">&nbsp;</div>
                                    </div>
                                </div>
                                <div class="col py-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="float-right text-muted">Supervisor : <strong>${item.supervisor}</strong></div>
                                            <h4 class="card-title">${item.data.spbu_name}</h4>
                                            <p>${item.data.address}.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `)
                    })
                    $('#boxroute').modal({
                        keyboard: false,
                        backdrop: 'static'
                    });
                }
            });
        }

        function edit(id) {
            $('#frmbox').trigger("reset");
            $('#button-update').css('display', 'inline');
            $.ajax({
                url: '{{ url('admin/tasks/edit') }}',
                type: 'post',
                dataType: 'json',
                data: ({
                    id: id
                }),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(e) {
                    $('#desc').val(e.desc)
                    $('#litre').val(e.litre)
                    $('#driver').val(e.did)
                    $('#driver').trigger('change')
                    $('#spbu_1').val(e.spbu_id_1)
                    $('#spbu_1').trigger('change')
                    $('#spbu_2').val(e.spbu_id_2)
                    $('#spbu_2').trigger('change')
                    $('#spbu_3').val(e.spbu_id_3)
                    $('#spbu_3').trigger('change')
                    $('#tasks_id').val(e.tasks_id)
                    $('#frmbox').modal({
                        keyboard: false,
                        backdrop: 'static'
                    });
                }
            });
        }

        function update() {
            if ($('#desc').val() && $('#litre').val() && $('#driver').val())
                $.ajax({
                    url: '{{ url('admin/tasks/save') }}',
                    type: 'post',
                    dataType: 'json',
                    data: ({
                        desc: $('#desc').val(),
                        litre: $('#litre').val(),
                        driver: $('#driver').val(),
                        spbu_1: $('#spbu_1').val(),
                        spbu_2: $('#spbu_2').val(),
                        spbu_3: $('#spbu_3').val(),
                        id: $('#tasks_id').val()
                    }),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(e) {
                        $("#frmbox").modal('hide');
                        $('#button-add').css('display', 'none');
                        dTable.draw()
                    }
                });
            else alert('Isi Field Dengan Lengkap')
        }

        function remove(id) {
            if (confirm('Yakin ingin menghapus data ini?')) {
                $.ajax({
                    url: '{{ url('admin/tasks/delete') }}',
                    type: 'post',
                    dataType: 'json',
                    data: ({
                        id: id
                    }),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(e) {
                        dTable.draw();
                    }
                });
            }
        }
        $(function() {
            dTable = $('#table').DataTable({
                ajax: {
                    url: '{{ url('admin/tasks/dt') }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    data: function(d) {
                        d.date = $('#filter_tanggal').val()
                    },
                },
                columns: [{
                        data: 'shipment_no',
                        name: 'shipment_no',
                        className: 'center'
                    },
                    {
                        data: 'vehicle_no',
                        name: 'vehicle_no',
                        className: 'center'
                    },
                    {
                        data: 'driver_name',
                        name: 'driver_name',
                        className: 'center'
                    },
                    {
                        data: 'desc',
                        name: 'desc',
                        className: 'center'
                    },
                    {
                        data: 'locations',
                        name: 'locations',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'status',
                        name: 'status',
                        className: 'center',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        className: 'center'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        className: 'center',
                        orderable: false,
                        searchable: false,
                    }
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

            $('.dt-buttons').append(
                '<a href="javascript:openModal()" button class="btn btn-light bg-white"><i class="icon-add"></i> <span class="d-none d-lg-inline-block ml-2">Tambah Task</span></a>'
            );
            $('.dt-buttons').append(
                `<input type="date" style="width:200px;height:100%" class="ml-2 btn-lg form-control" id="filter_tanggal" placeholder="Filter Tanggal">`
            );
            $("#filter_tanggal").change(function(){
                dTable.draw()
            });
        });

    </script>
@endsection
