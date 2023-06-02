@extends('layouts.Dashbordapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Services Create') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="form-group">
                          <label for="">Name</label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="description" name="" id="summernote" class="summernote" placeholder="" aria-describedby="helpId">
                          </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for=""><b>Image</b></label><br>
                                <div id="image" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">
                                        <br>Drop files here or click to upload.
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for=""><b>Short Description</b></label><br>
                                <textarea name="short_description" id="short_description" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div>

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
