@extends('backend.main')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Tài khoản của tôi</h3>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" method="post" action="{{ route('account/edit') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">UserName</label>
                                    <input type="text" name="form[name]" class="form-control" value="{{ $user->name }}"
                                        id="exampleInputName1" style="color: brown" placeholder="Name" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Full Name</label>
                                    <input type="text" name="form[fullname]" class="form-control"
                                        value="{{ $user->fullname }}"id="exampleInputName1" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Email address</label>
                                    <input type="email" name="form[email]" class="form-control"
                                        value="{{ $user->email }}"id="exampleInputEmail3" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName1">Status</label>
                                    <input type="text" name="form[status]" class="form-control"
                                        value="{{ $user->status }}"id="exampleInputName1" placeholder="status" readonly>
                                </div>

                                <div class="form-group">
                                    <label>File upload</label>
                                    <input type="file" name="form[thumb]" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="file" name="form[thumb]" class="form-control file-upload-info"
                                            placeholder="Upload Image">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputCity1">Addres</label>
                                    <input type="text" name="form[address]" class="form-control"
                                        value="{{ $user->address }}" id="exampleInputCity1" placeholder="Location">
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                                <a class="btn btn-dark" href="{{ route('home/backend') }}">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
