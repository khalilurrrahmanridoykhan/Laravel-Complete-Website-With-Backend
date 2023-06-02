@extends('layouts.Dashbordapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="" method="post" name="editfaqFrom" id="editfaqFrom">
                    <div class="card">
                        <div class="card-header">{{ __('blogs Edit') }}</div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <a name="" id="" class="btn btn-primary" href="{{ route('admin.faq.index') }}" role="button">Back</a>
                                </div>
                                <div class="col-md-8"></div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder=""
                                    aria-describedby="helpId" value="{{ $faq->title }}">
                                <p class="text-danger error title-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea  name="description" id="description" class="form-control" cols="30" rows="10">{{ $faq->description }}</textarea>
                                <p class="text-danger error description-error"></p>
                            </div>

                            <div class="from-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ ($faq->status == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($faq->status == 0) ? 'selected' : '' }}>Block</option>
                                </select>
                            </div>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



@section('extraJs')
    <script type="text/javascript">
        $("#editfaqFrom").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: '{{ route("admin.faq.update",$faq->faq_id) }}',
                type: 'POST',
                dataType: 'json',
                data: $("#editfaqFrom").serializeArray(),
                success: function(response) {


                    if (response.status == 200) {

                        //location.replace('/admin/blogs/list');
                        window.location.href = '{{ route('admin.faq.index') }}';


                    } else {
                        $('.title-error').html(response.errors.title);
                        $('.description-error').html(response.errors.description);

                    }
                }
            });

        });
    </script>
@endsection
