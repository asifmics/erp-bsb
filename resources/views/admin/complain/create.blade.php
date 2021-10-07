@extends('layouts.admin')
@section('content')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_complain')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">
                    Add Complain
                </h3>
            </div>

        </div>
        <div class="kt-portlet__body">
            @if(Session::has('success'))
            <script type="text/javascript">
                swal({title: "Success!", text: "New Client Survey Successfully.", icon: "success", button: "OK", timer:5000,});
            </script>
            @endif
            @if(Session::has('error'))
            <script type="text/javascript">
                swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
            </script>
            @endif


           <div class="row">
               <div class="col-md-8 m-auto">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class=" col-form-label">Name</label>
                    <div class="">
                        <input type="text" class="form-control" name="name" placeholder="Enter Your Name" value="{{old('name')}}">
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

               <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <label class=" col-form-label">E-mail</label>
                <div class="">
                    <input type="text" class="form-control" name="email" placeholder="Enter Your E-mail" value="{{old('email')}}">
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                <label class="col-form-label">Subject</label>
                <div class="">
                    <input type="text" class="form-control" name="subject" placeholder="Enter Your subject" value="{{old('subject')}}">
                    @if ($errors->has('subject'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('subject') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                <label class="col-form-label">Details</label>
                <div class="">
                    <textarea name="details" id="" cols="30" rows="10" class="form-control">{{old('details')}}</textarea>
                    @if ($errors->has('details'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('details') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

         </div>

        </div>
        <div class="kt-portlet__foot text-center">
            <button type="submit" class="btn btn-md btn-brand">SAVE</button>
        </div>
    </form>
</div>
@endsection


