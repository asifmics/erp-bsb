<div class="col-xl-12">
    <!--begin:: Widgets/Order Statistics-->
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                   Credential
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body kt-portlet__body--fluid">
            <div class="kt-widget12">
                <form method="post" action="{{ route('employee_to_make_user') }}">
                    @csrf
                    <div class="form-group">
                        <label for="my-input">E-mal</label>
                        <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                        <input type="hidden" name="name" value="{{ $employee->name }}">
                        <input type="hidden" name="image" value="{{ $employee->image }}">
                        <input type="hidden" name="phone" value="{{ $employee->phone }}">
                        <input class="form-control" type="email" name="email" value="{{ $employee->email }}">
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    @php
                        $roles = Spatie\Permission\Models\Role::all();
                    @endphp
                    <div class="form-group">
                        <label for="my-input">Role</label>
                        <select name="role" id="" class="form-control">
                            <option value="">Please Select Role</option>
                            @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="my-input">New Passowrd</label>
                        <input id="my-input" class="form-control" type="password" name="password">
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="my-input">Confirm Passowrd</label>
                        <input id="my-input" class="form-control" type="password" name="password_confirmation">
                        @if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary offset-md-6">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!--end:: Widgets/Order Statistics-->
</div>

<script>
</script>
