@extends('layouts.admin')
@section('content')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
<div class="kt-portlet kt-portlet--mobile">
    <form class="kt-form kt-form--label-right" method="post" action="{{route('save_cs_survey')}}"
        enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon"><i class="fab fa-gg-circle"></i></span>
                <h3 class="kt-portlet__head-title">
                    Add Client Survey
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
            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label class="col-form-label">Phone</label>
                <div class="">
                    <input type="text" class="form-control" name="phone" placeholder="Enter Your Phone" value="{{old('phone')}}">
                    @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            @php
            $questions = App\CLientSatisfactionQuestion::where('publish',1)->where('status',1)->get()
        @endphp
        @foreach ($questions as $item)

        <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
            <label class="col-form-label">{{ $item->question }}</label>
            <div class="">
                <input type="hidden" name="question_id[]" value="{{ $item->id }}">
                <input type="text" class="form-control" placeholder="Enter Question Answer" name="answer[]" value="{{old('answer[]')}}">
                @if ($errors->has('question'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('question') }}</strong>
                </span>
                @endif
            </div>
        </div>
        @endforeach
         </div>

        </div>
        <div class="kt-portlet__foot text-center">
            <button type="submit" class="btn btn-md btn-brand">SAVE</button>
        </div>
    </form>
</div>
@endsection


