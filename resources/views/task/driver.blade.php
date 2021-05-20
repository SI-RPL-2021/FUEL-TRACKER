@extends('layout.dashboard')

@section('content')
<div class="row">
    <div class="col-md-5 pr-3" style="border-right: 1px solid grey">
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
                        {{$task->spbu_1->spbu_name}}<br>
                        {{$task->spbu_2->spbu_name}}<br>
                        {{$task->spbu_3->spbu_name}}
                        </h3>
                    </div>
                    <div class="col-lg-6 d-flex">
                        <i class="text-success ml-auto fa fa-map" style="font-size: 48px"></i>
                    </div>
                </div>
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
                                @if($task->status_spbu_1 == 'Y')
                                <span class="badge badge-pill bg-success border">&nbsp;</span>
                                @elseif($task->status_spbu_1 == 'O')
                                <span class="badge badge-pill bg-warning border">&nbsp;</span>
                                @else
                                <span class="badge badge-pill bg-light border">&nbsp;</span>
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
                                    <h4 class="card-title mb-0">Tanggal Kedatangan di {{$task->spbu_1->spbu_name}}</h4>
                                    <h4 class="font-weight-bold" style="color:#AA2B1D">
                                            {{$task->arrival_spbu_1}}
                                    </h4>
                                    @if($task->status_spbu_1 == 'N')
                                    <button class="btn btn-sm btn-primary w-100" onclick="konfirmasi(1)">
                                        Konfirmasi
                                    </button>
                                    @endif
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
                                @if($task->status_spbu_2 == 'Y')
                                <span class="badge badge-pill bg-success border">&nbsp;</span>
                                @elseif($task->status_spbu_2 == 'O')
                                <span class="badge badge-pill bg-warning border">&nbsp;</span>
                                @else
                                <span class="badge badge-pill bg-light border">&nbsp;</span>
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
                                    <h4 class="card-title mb-0">Tanggal Kedatangan di {{$task->spbu_2->spbu_name}}</h4>
                                    <h4 class="font-weight-bold" style="color:#AA2B1D">
                                            {{$task->arrival_spbu_2}}
                                    </h4>
                                    @if($task->status_spbu_2 == 'N')
                                    <button class="btn btn-sm btn-primary w-100" onclick="konfirmasi(2)">
                                        Konfirmasi
                                    </button>
                                    @endif
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
                                @if($task->status_spbu_3 == 'Y')
                                <span class="badge badge-pill bg-success border">&nbsp;</span>
                                @elseif($task->status_spbu_3 == 'O')
                                <span class="badge badge-pill bg-warning border">&nbsp;</span>
                                @else
                                <span class="badge badge-pill bg-light border">&nbsp;</span>
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
                                    <h4 class="card-title mb-0">Tanggal Kedatangan di {{$task->spbu_3->spbu_name}}</h4>
                                    <h4 class="font-weight-bold" style="color:#AA2B1D">
                                            {{$task->arrival_spbu_3}}
                                    </h4>
                                    @if($task->status_spbu_3 == 'N')
                                    <button class="btn btn-sm btn-primary w-100" onclick="konfirmasi(3)">
                                        Konfirmasi
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-4">
                            <h6 class="mb-0">Supervisor {{$task->spbu_1->spbu_name}}</h6>
                            <h3 class="font-weight-bold" style="color:#AA2B1D">{{$task->spbu_1->supervisor ? $task->spbu_1->supervisor->user->fullname : 'Belum di assign'}}</h3>
                        </div>
                        <div class="col-lg-4">
                            <h6 class="mb-0">Supervisor {{$task->spbu_2->spbu_name}}</h6>
                            <h3 class="font-weight-bold" style="color:#AA2B1D">{{$task->spbu_2->supervisor ? $task->spbu_2->supervisor->user->fullname : 'Belum di assign'}}</h3>
                        </div>
                        <div class="col-lg-4">
                            <h6 class="mb-0">Supervisor {{$task->spbu_3->spbu_name}}</h6>
                            <h3 class="font-weight-bold" style="color:#AA2B1D">{{$task->spbu_3->supervisor ? $task->spbu_3->supervisor->user->fullname : 'Belum di assign'}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7 px-4 mt-4">
        @if($task->status_spbu_1 != 'Y')
        {!! $task->spbu_1->spbu_iframe !!}
        @elseif($task->status_spbu_2 != 'Y')
        {!! $task->spbu_2->spbu_iframe !!}
        @else
        {!! $task->spbu_3->spbu_iframe !!}
        @endif
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
            <form method="post" action="{{url('drivers/tasks/'.$id)}}">
                @csrf
                <input type="hidden" name="spbu" id="spbu_id" >
                <h1>Apakah BBM Sudah Terkirim Sesuai Dengan Lokasi SPBU ?</h1>
                <div class="d-flex">
                    <button type="button" class="w-100 mx-1 btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="w-100 mx-1 btn btn-success">Terkirim</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

@endsection

@section('js_section')
<script>
    $('iframe').css('height','100%').addClass('rounded shadow')
    function konfirmasi(id){
        $('#spbu_id').val(id)
        $('#confirm-modal').modal({
            keyboard: false,
            backdrop: 'static'
        });
    }
</script>
@endsection
