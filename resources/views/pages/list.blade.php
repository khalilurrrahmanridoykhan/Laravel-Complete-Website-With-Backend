@extends('layouts.Dashbordapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Pages List') }}</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        {{-- table header --}}
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <a name="" id="" class="btn btn-success"
                                        href="{{ route('admin.page.create') }}" role="button">Create</a>
                                </div>
                                <div class="col-md-8">
                                    <form action="" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="Search" name="keyword" class="form-control" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-info text-light" type="submit">Button</button>
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
                                                <th width="80">Image</th>
                                                <th>Title</th>
                                                <th>description</th>
                                                <th width="100">Created At</th>
                                                <th width="100">Status</th>
                                                <th width="100">Edit</th>
                                                <th width="100">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($page))
                                                @foreach ($page as $pages)
                                                    <tr>
                                                        <td>{{ $pages->page_id }}</td>
                                                        <td>
                                                            @if (!empty($pages->img))
                                                            <img src="{{ asset('uploads/pages/thumb/small/' . $pages->img) }}"
                                                            width="50" alt="">
                                                            @else
                                                            <img src="{{ asset('no_image/no_image_small.png') }}"
                                                            width="50" alt="">
                                                            @endif
                                                        </td>
                                                        <td>{{ $pages->title }}</td>
                                                        <td>
                                                            @if (strlen($pages->description > 50))
                                                                {!! substr($pages->description, 0, 50 ) !!}
                                                            @else
                                                                {{ $pages->description }}
                                                            @endif
                                                        </td>
                                                        <td>{{ date('d/m/Y', strtotime($pages->created_at)) }}</td>
                                                        <td>
                                                            @if ($pages->status == 1)
                                                                <span class="badge bg-success">Active</span>
                                                            @else
                                                                <span class="badge bg-danger">Block</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span>
                                                                <a href="{{ route('admin.page.edit', $pages->page_id) }}"><img
                                                                        src="{{ asset('admin/assets/myImages/edit-property-24.png') }}"
                                                                        alt=""></a>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.page.delete', $pages->page_id) }}"><img
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

                            <div class="row">
                                @if (!empty($page))
                                    {{ $page->links('pagination::bootstrap-4') }}
                                @endif
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
