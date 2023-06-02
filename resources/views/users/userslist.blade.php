@extends('layouts.Dashbordapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('User List') }}</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        {{-- table header --}}
                        <div class="container">
                            <div class="row">

                                <div class="col-md-12">
                                    <form action="" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="Search" name="keyword" class="form-control" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-info text-light" type="submit">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                        {{-- Table --}}

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 table-responsive p-0">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="80">Id</th>
                                                <th>Name</th>
                                                <th width="100">Email</th>
                                                <th width="100">is_admin</th>
                                                <th width="100">Edit</th>
                                                <th width="100">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($user))
                                                @foreach ($user as $users)
                                                {{-- @dd($users) --}}

                                                    <tr>
                                                        <td>{{ $users->id }}</td>
                                                        {{-- <td>
                                                            <img src="{{ asset('uploads/users/thumb/small/' . $users->img) }}"
                                                                width="50" alt="">
                                                        </td> --}}
                                                        <td>{{ $users->name }}</td>
                                                        <td>{{ date('d/m/Y', strtotime($users->created_at)) }}</td>
                                                        <td>
                                                            @if ($users->is_admin == 0)
                                                                <span class="badge bg-success">User</span>
                                                            @else
                                                                <span class="badge bg-danger">Admin</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span>
                                                                <a href="{{ route('admin.user.edit',$users->id ) }}"><img
                                                                        src="{{ asset('admin/assets/myImages/edit-property-24.png') }}"
                                                                        alt=""></a>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.user.delete', $users->id) }}"><img
                                                                    src="{{ asset('admin/assets/myImages/delete-24.png') }}"
                                                                    alt=""></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6">
                                                        The row is empty
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- <div class="row">
                                @if (!empty($user))
                                    {{ $user->links('pagination::bootstrap-4') }}
                                @endif
                            </div> --}}
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
