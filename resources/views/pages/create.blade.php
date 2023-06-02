@extends('layouts.Dashbordapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="" method="post" name="createPageFrom" id="createPageFrom">
                    <div class="card">
                        <div class="card-header">{{ __('Page Create') }}</div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <a name="" id="" class="btn btn-primary" href="{{ route('admin.page.index') }}" role="button">Back</a>
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
                                    aria-describedby="helpId">
                                <p class="text-danger error title-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                                <p class="text-danger error description-error"></p>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" id="image_id" name="image_id" value="">
                                    <label for=""><b>Image</b></label><br>
                                    <div id="image" class="dropzone dz-clickable">
                                        <div class="dz-message needsclick">
                                            <br>Drop files here or click to upload.
                                            <br><br>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="from-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Block</option>
                                </select>
                            </div>
                            <br>
                            <button id="buttonid" type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



@section('extraJs')
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        const dropzone = $("#image").dropzone({
            init: function() {
                this.on('addedfile', function(file) {
                    if (this.files.length > 1) {
                        this.removefile(this.file[0]);
                    }
                });
            },
            url: "{{ route('admin.page.temp') }}",
            maxFiles: 1,
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(file, respinse) {
                $("#image_id").val(respinse.id);
            }
        });

        $("#createPageFrom").submit(function(event) {
            event.preventDefault();
            $("#buttonid").prop('disabled',true);

            $.ajax({
                url: '{{ route('admin.page.save') }}',
                type: 'POST',
                dataType: 'json',
                data: $("#createPageFrom").serializeArray(),
                success: function(response) {
                    $("#buttonid").prop('disabled',false);



                    if (response.status == 0) {


                        $('.title-error').html(response.errors.title);
                        $('.description-error').html(response.errors.description);

                    }

                    // window.location.href = '{{ route('admin.page.index') }}';

                }
            });

        });
    </script>
@endsection
