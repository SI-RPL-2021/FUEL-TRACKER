@extends('layout.dashboard')

@section('content')
    <div class="p-5 rounded card">
        <h1 style="color:#AA2B1D" class="font-weight-bold mb-3">Profile</h1>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <form id="frm">
                    @csrf
                    <div class="form-group">
                        <label>Username</label>
                        <input disabled type="email" class="form-control" id="email" value="{{Session::get('user')->username}}" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="name" class="form-control" name="name" id="name" placeholder="Enter name" value="{{Session::get('user')->fullname}}">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" value="{{Session::get('user')->password}}">
                    </div>
                    <button type="button" onclick="save()" class="btn w-100 mt-2" style="background: #AA2B1D; color:white">
                        <i class="mr-2 fa fa-save"></i>Submit
                    </button>
                </form>
            </div>
            <div class="col-lg-6">
                <img src="{{url('profile.svg')}}" width="100%" />
            </div>
        </div>
    </div>
@endsection

@section('js_section')
    <script src="{{ url('public/themes/limitless/global/js/plugins/extensions/jquery_ui/interactions.min.js') }}">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function save(){
            const form = document.getElementById(`frm`);
            const formData = new FormData(form);
            $.ajax({
                url:`{{ url("/profile") }}`,
                type:'post',
                data: formData,
                contentType: false,//untuk upload image
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                success: function (e) {
                    swal('Edit Profile Sukses','Profile sukses diedit','success')
                }
            })
        }
    </script>
@endsection
