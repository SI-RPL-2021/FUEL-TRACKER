@extends('layout.dashboard')

@section('content')
    <div class="bg-light shadow pt-3 pb-1" style="border-radius: 20px">
        <h2 style="color:#AA2B1D; font-weight: bold" class='px-4 mb-1'>Data Supervisor</h2>
        <table class="table table-striped" id="table">
            <thead style='background:#AA2B1D; font-weight: bold' class='text-white'>
                <tr>
                    <th>ID Driver</th>
                    <th>Username</th>
                    <th>Nama Supervisor</th>
                    <th>SPBU</th>
                    <th>No. Hp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div class="modal fade" id="frmbox" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" style="border-radius: 10%">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <center>
                        <h2 style="color:#AA2B1D; font-weight: bold" class='mb-2'>Data Supervisor</h2>
                    </center>
                    <input type="hidden" id="uid" />
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nama Supervisor</label>
                            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nama Supervisor">
                        </div>
                        <div class="form-group col-md-6">
                            <label>SPBU</label>
                            <select name="spbu_name" id="spbu_name" class="form-control select2">
                                <option selected value="">...</option>
                                @foreach($spbus as $item)
                                <option value="{{$item->spbu_id}}">{{$item->spbu_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nomor Telepon</label>
                            <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Nomor Telepon">
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
            if($('#username').val() && $('#phone_no').val() && $('#spbu_name').val() && $('#fullname').val())
            $.ajax({
                url:'{{ url("admin/supervisors/add") }}',
                type:'post',
                dataType:'json',
                data: ({ 
                    username: $('#username').val(),
                    phone_no: $('#phone_no').val(),
                    spbu_name: $('#spbu_name').val(),
                    fullname: $('#fullname').val()
                }),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(e) {
                    $("#frmbox").modal('hide');
                    $('#button-add').css('display','none');
                    dTable.draw()
                }
            });
            else alert('Isi Field Dengan Lengkap')
        }

        function edit(id) {
            $('#frmbox').trigger("reset");
            $('#button-update').css('display','inline');
            $.ajax({
                url:'{{ url("admin/supervisors/edit") }}',
                type:'post',
                dataType:'json',
                data: ({ id : id }),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(e) {
                    $('#username').val(e.username)
                    $('#phone_no').val(e.phone_no)
                    $('#spbu_name').val(e.spbu_id)
                    $('#spbu_name').trigger('change')
                    $('#fullname').val(e.fullname)
                    $('#uid').val(e.uid)
                    $('#frmbox').modal({keyboard: false, backdrop: 'static'});
                }
            });
        }

        function update() {
            if($('#username').val() && $('#phone_no').val() && $('#spbu_name').val() && $('#fullname').val())
            $.ajax({
                url:'{{ url("admin/supervisors/save") }}',
                type:'post',
                dataType:'json',
                data: ({ 
                    username: $('#username').val(),
                    phone_no: $('#phone_no').val(),
                    spbu_name: $('#spbu_name').val(),
                    fullname: $('#fullname').val(),
                    id: $('#uid').val()
                }),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(e) {
                    $("#frmbox").modal('hide');
                    $('#button-add').css('display','none');
                    dTable.draw()
                }
            });
            else alert('Isi Field Dengan Lengkap')
        }

        function remove(id) {
            if(confirm('Yakin ingin menghapus data ini?')){
                $.ajax({
                    url:'{{ url("admin/supervisors/delete") }}',
                    type:'post',
                    dataType:'json',
                    data: ({ id : id }),
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
                    url: '{{ url("admin/supervisors/dt") }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    data: function(d) {
                        d.studyprogram = $('#filter-studyprogram').val()
                    },
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        className: 'center'
                    },
                    {
                        data: 'username',
                        name: 'username',
                        className: 'center'
                    },
                    {
                        data: 'fullname',
                        name: 'fullname',
                        className: 'center'
                    },
                    {
                        data: 'spbu_name',
                        name: 'spbu_name',
                        className: 'center'
                    },
                    {
                        data: 'phone_no',
                        name: 'phone_no',
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
                '<a href="javascript:openModal()" button class="btn btn-light bg-white"><i class="icon-add"></i> <span class="d-none d-lg-inline-block ml-2">Tambah Supervisor</span></a>'
            );
        });

    </script>
@endsection
