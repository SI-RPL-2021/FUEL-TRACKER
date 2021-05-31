@extends('layout.dashboard')

@section('content')
    <div class="bg-light shadow pt-3 pb-1" style="border-radius: 20px">
        <h2 style="color:#AA2B1D; font-weight: bold" class='px-4 mb-1'>Data SPBU</h2>
        <table class="table table-striped" id="table">
            <thead style='background:#AA2B1D; font-weight: bold' class='text-white'>
                <tr>
                    <th>ID SPBU</th>
                    <th>Nama SPBU</th>
                    <th>Alamat</th>
                    <th>Kota SPBU</th>
                    <th>IFrame</th>
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
                        <h2 style="color:#AA2B1D; font-weight: bold" class='mb-2'>Data SPBU</h2>
                    </center>
                    <input type="hidden" id="spbu_id" />
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Nama SPBU</label>
                            <input type="text" class="form-control" name="spbu_name" id="spbu_name" placeholder="Nama SPBU">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Kota/Kabupaten</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="Kota/Kabupaten">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Alamat SPBU</label>
                            <textarea rows='2' class="form-control" name="address" id="address" placeholder="Alamat SPBU"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>IFrame Rute SPBU</label>
                            <textarea rows='3' class="form-control" name="iframe" id="iframe" placeholder="IFrame Rute SPBU"></textarea>
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
                    <center>
                        <div id="box-route-frame"></div>
                    </center>
                </div>
                <div class="modal-footer d-flex" style='justify-content:space-between'>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('js_section')
    <script src="{{ url('themes/limitless/global/js/plugins/extensions/jquery_ui/interactions.min.js') }}">
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
            if($('#spbu_name').val() && $('#address').val() && $('#city').val() && $('#iframe').val())
            $.ajax({
                url:'{{ url("admin/spbus/add") }}',
                type:'post',
                dataType:'json',
                data: ({ 
                    spbu_name: $('#spbu_name').val(),
                    address: $('#address').val(),
                    city: $('#city').val(),
                    iframe: $('#iframe').val()
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
        function detailRoute(id){
            $('#frmbox').trigger("reset");
            $('#button-update').css('display','inline');
            $.ajax({
                url:'{{ url("admin/spbus/edit") }}',
                type:'post',
                dataType:'json',
                data: ({ id : id }),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(e) {
                    $('#box-route-frame').html(e.spbu_iframe)
                    $('#boxroute').modal({keyboard: false, backdrop: 'static'});
                }
            });
        }
        function edit(id) {
            $('#frmbox').trigger("reset");
            $('#button-update').css('display','inline');
            $.ajax({
                url:'{{ url("admin/spbus/edit") }}',
                type:'post',
                dataType:'json',
                data: ({ id : id }),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(e) {
                    $('#spbu_name').val(e.spbu_name)
                    $('#address').val(e.address)
                    $('#city').val(e.city)
                    $('#iframe').val(e.spbu_iframe)
                    $('#spbu_id').val(e.spbu_id)
                    $('#frmbox').modal({keyboard: false, backdrop: 'static'});
                }
            });
        }
        function update() {
            if($('#spbu_name').val() && $('#address').val() && $('#city').val() && $('#iframe').val())
            $.ajax({
                url:'{{ url("admin/spbus/save") }}',
                type:'post',
                dataType:'json',
                data: ({ 
                    spbu_name: $('#spbu_name').val(),
                    address: $('#address').val(),
                    city: $('#city').val(),
                    iframe: $('#iframe').val(),
                    id: $('#spbu_id').val()
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
                    url:'{{ url("admin/spbus/delete") }}',
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
                    url: '{{ url("admin/spbus/dt") }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    data: function(d) {
                        d.studyprogram = $('#filter-studyprogram').val()
                    },
                },
                columns: [{
                        data: 'spbu_id',
                        name: 'spbu_id',
                        className: 'center'
                    },
                    {
                        data: 'spbu_name',
                        name: 'spbu_name',
                        className: 'center'
                    },
                    {
                        data: 'address',
                        name: 'address',
                        className: 'center'
                    },
                    {
                        data: 'city',
                        name: 'city',
                        className: 'center'
                    },
                    {
                        data: 'spbu_iframe',
                        name: 'spbu_iframe',
                        className: 'center',
                        orderable: false,
                        searchable: false,
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
                '<a href="javascript:openModal()" button class="btn btn-light bg-white"><i class="icon-add"></i> <span class="d-none d-lg-inline-block ml-2">Tambah SPBU</span></a>'
            );
        });

    </script>
@endsection
