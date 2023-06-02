@extends('layouts.Dashbordapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit User') }}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <a name="" id="" class="btn btn-primary" href="{{ route('admin.user.index') }}" role="button">Back</a>
                                </div>
                                <div class="col-md-8"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        {{-- table header --}}


                        <div class="container">
                            <div class="row">
                                <form action="" method="post" name="editUserFrom" id="editUserFrom">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input value="{{ $user->name }}" type="text" name="name" id="name"
                                            class="form-control" placeholder="" aria-describedby="helpId">
                                        <p class="text-danger error name-error"></p>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input value="{{ $user->email }}" type="email" name="email" id="email"
                                            class="form-control" placeholder="" aria-describedby="helpId">
                                        <p class="text-danger error email-error"></p>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="" aria-describedby="helpId">
                                        <p class="text-danger error password-error"></p>
                                    </div>

                                    <div class="from-group">
                                        <label for="status">Role</label>
                                        <select name="is_admin" id="is_admin" class="form-control">
                                            <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>User</option>
                                            <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Admin</option>
                                        </select>
                                    </div>


                                    <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                                </form>


                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('extraJs')
    <script type="text/javascript">
        $("#editUserFrom").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: '{{ route('admin.user.update', $user->id) }}',
                type: 'POST',
                dataType: 'json',
                data: $("#editUserFrom").serializeArray(),
                success: function(response) {


                    if (response.status == 200) {

                        //location.replace('/admin/blogs/list');
                    window.location.href = '{{ route('admin.user.index') }}';



                    } else {
                        $('.name-error').html(response.errors.name);
                        $('.email-error').html(response.errors.email);
                        $('.password-error').html(response.errors.password);

                    }
                }
            });

        });
    </script>
@endsection
