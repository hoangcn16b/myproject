@extends('backend.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Thêm mới Slider</h3>
                <a type="button" class="btn btn-primary mr-2" href="{{ route('slider/index') }}">Quay về</a>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" method="post" action="{{ route('slider/store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Name</label>
                                    <input type="text" name="form[name]" class="form-control" value=""
                                        id="exampleInputName1" style="color: brown" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Link</label>
                                    <input type="text" name="form[link]" class="form-control" value=""
                                        id="exampleInputName1" placeholder="Link">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Ordering</label>
                                    <input type="number" name="form[ordering]" class="form-control" value=""
                                        id="exampleInputEmail3" placeholder="Ordering" min="0" pattern="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Status</label>
                                    <select class="form-control" name="form[status]" id="exampleSelectGender">
                                        <option value="active">Kích hoạt</option>
                                        <option value="inactive">Không kích hoạt</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleTextarea1">Description</label>
                                    <textarea class="form-control" name="form[description]" id="exampleTextarea1" rows="4"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>File upload</label>
                                    <input type="file" name="form[thumb]" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="file" name="form[thumb]" class="form-control file-upload-info"
                                            placeholder="Upload Image">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                                <a class="btn btn-dark" href="{{ route('slider/index') }}">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
