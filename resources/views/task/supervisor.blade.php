@extends('layout.dashboard')

@section('content')
<div class="row">
    <div class="col-md-4 pr-3" style="border-right: 1px solid grey">
        <h2 style="color:#AA2B1D" class="font-weight-bold text-center">TRACKING</h2>
        <div class="mt-3" id="status_list">
            @foreach($spbus as $key => $item)
            <div class="row">
                <div class="col-auto text-center flex-column d-none d-sm-flex">
                    <div class="row h-50">
                        <div class="col {{$key != 0 ? 'border-right' : ''}}">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                    <h5 class="m-2">
                        @if($task['status_spbu_'.($key+1)] == 'Y')
                        <span class="badge badge-pill bg-success border">&nbsp;</span>
                        @elseif($task['status_spbu_'.($key+1)] == 'O')
                        <span class="badge badge-pill bg-warning border">&nbsp;</span>
                        @else
                        <span class="badge badge-pill bg-light border">&nbsp;</span>
                        @endif
                    </h5>
                    <div class="row h-50">
                        <div class="col {{$key != 2 ? 'border-right' : ''}}">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                </div>
                <div class="col py-2">
                    <div class="card shadow {{$item->spbu_id == $user->supervisor_data->spbu->spbu_id ? 'bg-primary': ''}}">
                        <div class="card-body">
                            <div class="float-right">Supervisor : <strong>{{$item->supervisor ? $item->supervisor->user->fullname : 'Belum Memiliki Supervisor'}}</strong></div>
                            <h4 class="card-title">{{$item->spbu_name}}</h4>
                            <p class="card-text">{{$item->address}}.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-8 px-4">
        <h2 style="color:#AA2B1D" class="font-weight-bold text-center">BUKTI PENGIRIMAN</h2>
        <div class="card shadow mt-4">
            <div class="card-body mx-3">
                <h6 class="mb-0">Shipment Number</h6>
                <h3 class="font-weight-bold" style="color:#AA2B1D">{{$task->tasks_id}}</h3>
                <div class="row">
                    <div class="col-lg-6">
                        <h6 class="mb-0">Deskripsi BBM</h6>
                        <h3 class="font-weight-bold" style="color:#AA2B1D">{{$task->desc}}</h3>
                    </div>
                    <div class="col-lg-6">
                        <h6 class="mb-0">Liter</h6>
                        <h3 class="font-weight-bold" style="color:#AA2B1D">{{$task->litre}}</h3>
                    </div>
                </div>
                <hr>
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h6 class="mb-0">Delivery</h6>
                        <h3 class="font-weight-bold" style="color:#AA2B1D">
                        @if($task->spbu_id_1 == $user->supervisor_data->spbu->spbu_id)
                        {{$task->spbu_1->spbu_name}}
                        @elseif($task->spbu_id_2 == $user->supervisor_data->spbu->spbu_id)
                        {{$task->spbu_2->spbu_name}}
                        @elseif($task->spbu_id_3 == $user->supervisor_data->spbu->spbu_id)
                        {{$task->spbu_3->spbu_name}}
                        @endif
                        </h3>
                    </div>
                    <div class="col-lg-6 d-flex">
                        <i class="text-success ml-auto fa fa-map" style="font-size: 48px"></i>
                    </div>
                </div>
                <h6 class="mb-0">Alamat</h6>
                <h3 class="font-weight-bold" style="color:#AA2B1D">
                    @if($task->spbu_id_1 == $user->supervisor_data->spbu->spbu_id)
                    {{$task->spbu_1->address}}
                    @elseif($task->spbu_id_2 == $user->supervisor_data->spbu->spbu_id)
                    {{$task->spbu_2->address}}
                    @elseif($task->spbu_id_3 == $user->supervisor_data->spbu->spbu_id)
                    {{$task->spbu_3->address}}
                    @endif
                </h3>
                <hr>
                <div class="" id="status_list">
                    <div class="row">
                        <div class="col-auto text-center flex-column d-none d-sm-flex">
                            <div class="row h-50">
                                <div class="col">&nbsp;</div>
                                <div class="col">&nbsp;</div>
                            </div>
                            <h5 class="m-2">
                                <span class="badge badge-pill bg-primary border">&nbsp;</span>
                            </h5>
                            <div class="row h-50">
                                <div class="col border-right">&nbsp;</div>
                                <div class="col">&nbsp;</div>
                            </div>
                        </div>
                        <div class="col py-2">
                            <div class="">
                                <div class="card-body">
                                    <h4 class="card-title mb-0">Tanggal Keberangkatan</h4>
                                    <h4 class="font-weight-bold" style="color:#AA2B1D">{{$task->created_at}}.</h4>
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
                                @if($task->spbu_id_1 == $user->supervisor_data->spbu->spbu_id)
                                @if($task->status_spbu_1 == 'Y')
                                <span class="badge badge-pill bg-success border">&nbsp;</span>
                                @elseif($task->status_spbu_1 == 'O')
                                <span class="badge badge-pill bg-warning border">&nbsp;</span>
                                @else
                                <span class="badge badge-pill bg-light border">&nbsp;</span>
                                @endif
                                @elseif($task->spbu_id_2 == $user->supervisor_data->spbu->spbu_id)
                                @if($task->status_spbu_2 == 'Y')
                                <span class="badge badge-pill bg-success border">&nbsp;</span>
                                @elseif($task->status_spbu_2 == 'O')
                                <span class="badge badge-pill bg-warning border">&nbsp;</span>
                                @else
                                <span class="badge badge-pill bg-light border">&nbsp;</span>
                                @endif
                                @elseif($task->spbu_id_3 == $user->supervisor_data->spbu->spbu_id)
                                @if($task->status_spbu_3 == 'Y')
                                <span class="badge badge-pill bg-success border">&nbsp;</span>
                                @elseif($task->status_spbu_3 == 'O')
                                <span class="badge badge-pill bg-warning border">&nbsp;</span>
                                @else
                                <span class="badge badge-pill bg-light border">&nbsp;</span>
                                @endif
                                @endif
                            </h5>
                            <div class="row h-50">
                                <div class="col ">&nbsp;</div>
                                <div class="col">&nbsp;</div>
                            </div>
                        </div>
                        <div class="col py-2">
                            <div class="">
                                <div class="card-body">
                                    <h4 class="card-title mb-0">Tanggal Kedatangan</h4>
                                    <h4 class="font-weight-bold" style="color:#AA2B1D">
                                        @if($task->spbu_id_1 == $user->supervisor_data->spbu->spbu_id)
                                            {{$task->arrival_spbu_1}}
                                        @elseif($task->spbu_id_2 == $user->supervisor_data->spbu->spbu_id)
                                            {{$task->arrival_spbu_2}}
                                        @elseif($task->spbu_id_3 == $user->supervisor_data->spbu->spbu_id)
                                            {{$task->arrival_spbu_3}}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <h6 class="mb-0">Sopir</h6>
                            <h3 class="font-weight-bold" style="color:#AA2B1D">{{$task->driver->fullname}}</h3>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="mb-0">Nomor Kendaraan</h6>
                            <h3 class="font-weight-bold" style="color:#AA2B1D">{{$task->driver->driver_data->vehicle_no}}</h3>
                        </div>
                    </div>
                    @if($task->spbu_id_1 == $user->supervisor_data->spbu->spbu_id)
                    @if($task->status_spbu_1 == 'O')
                    <button class="btn btn-primary w-100" onclick="konfirmasi(1)">
                        Konfirmasi
                    </button>
                    @endif
                    @elseif($task->spbu_id_2 == $user->supervisor_data->spbu->spbu_id)
                    @if($task->status_spbu_2 == 'O')
                    <button class="btn btn-primary w-100" onclick="konfirmasi(2)">
                        Konfirmasi
                    </button>
                    @endif
                    @elseif($task->spbu_id_3 == $user->supervisor_data->spbu->spbu_id)
                    @if($task->status_spbu_3 == 'O')
                    <button class="btn btn-primary w-100" onclick="konfirmasi(3)">
                        Konfirmasi
                    </button>
                    @endif
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered rounded" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Kedatangan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body text-center">
            <form method="post" action="{{url('supervisors/tasks/'.$id)}}">
                @csrf
                <input type="hidden" name="spbu" id="spbu_id" >
                <h1>Apakah Anda Yakin Untuk Mengkonfirmasi Penerimaan BBM ?</h1>
                <div class="d-flex">
                    <button type="button" class="w-100 mx-1 btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="w-100 mx-1 btn btn-danger">Konfirmasi</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

@endsection

@section('js_section')
<script>
    function konfirmasi(id){
        $('#spbu_id').val(id)
        $('#confirm-modal').modal({
            keyboard: false,
            backdrop: 'static'
        });
    }
</script>
@endsection
