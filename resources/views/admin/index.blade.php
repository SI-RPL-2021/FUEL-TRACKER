@extends('layout.dashboard')

@section('content')
<div class="row mt-5 align-items-center" style="justify-content: space-evenly">
        <div class="col-md-12 mb-3">
            <div class="p-4 py-5 align-items-center rounded shadow-lg text-white d-flex flex-wrap" style="background: #AA2B1D">
                <div class="mr-auto" style="max-width: 500px">
                    <h5>Hi, {{Session::get('user')->fullname}}</h5>
                    <h4 class="font-weight-bold">CHECK YOUR DAILY TASK OF DELIVERY ACTIVITY HERE</h4>
                </div>
                <img src="{{asset('images/bot 1.png')}}"   height="150px" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="px-4 py-2 d-flex my-1 align-items-center flex-wrap rounded shadow-lg bg-white" style="border-left: 2px solid #AA2B1D">
                <div class="mr-auto">
                    <h4 style="color: #AA2B1D" class="mb-0">In Progress</h4>
                    <h1 class="font-weight-bold">{{count($all) - count($done)}} SPBU</h1>
                </div>1
                <i class="fa fa-truck text-secondary" style="font-size: 72px"></i>
            </div>
        </div>
        <div class="col-md-6">
            <div class="px-4 py-2 d-flex my-1 align-items-center flex-wrap rounded shadow-lg bg-white" style="border-left: 2px solid #AA2B1D">
                <div class="mr-auto">
                    <h4 style="color: #AA2B1D" class="mb-0">Done</h4>
                    <h1 class="font-weight-bold">{{count($done)}} SPBU</h1>
                </div>1
                <i class="fa fa-truck text-secondary" style="font-size: 72px"></i>
            </div>
        </div>
    </div>
@endsection

@section('js_section')
    <script src="{{ url('themes/limitless/global/js/plugins/extensions/jquery_ui/interactions.min.js') }}">
    </script>
    <script>

    </script>
@endsection
