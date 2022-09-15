@extends('backend.main')
@section('content')
    @php
        $index = 1;
        // $inTable = $inTable;
    @endphp
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Quản lý Slider</h3>
                <a type="button" class="btn btn-primary mr-2" href="{{ route('slider/formAdd') }}">Thêm mới</a>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Bảng slider</h4>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th> STT </th>
                                            <th> Thumb </th>
                                            <th> Name </th>
                                            <th> Description </th>
                                            <th> Status </th>
                                            <th width="10%"> Ordering </th>
                                            <th> Special </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($items)
                                            @foreach ($items as $item)
                                                @php
                                                    $iconStatus = $item->status == 'active' ? 'success' : 'warning';
                                                    $iconSpecial = $item->special == '1' ? 'success' : 'warning';
                                                    $special = $item->special == '1' ? 'special' : 'normal';
                                                @endphp
                                                <tr>
                                                    <td>{{ $index++ }}</td>
                                                    <td class="py-1">
                                                        <img src="" alt="image" />
                                                    </td>
                                                    <td>
                                                        {{ $item->name }}
                                                    </td>
                                                    <td> {{ $item->description }}</td>
                                                    <td>
                                                        {{-- <livewire:admin.status :rowStatus="{{ $item->status }}" :rowId="{{ $item->id }}"
                                                            :inTable="{{ $inTable }}" /> --}}
                                                    </td>
                                                    <td> <input type="number" class="form-control"
                                                            value="{{ $item->ordering }}">
                                                    </td>
                                                    <td>
                                                        <a type="button" class="btn btn-{{ $iconSpecial }} btn-fw">
                                                            {{ $special }} </a>
                                                    </td>
                                                    <td> <button type="button" class="btn btn-primary btn-icon-text"> Edit
                                                            <i class="mdi mdi-file-check btn-icon-append"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-icon-text">
                                                            <i class="mdi mdi-delete-forever"></i> Delete </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-panel ends -->
@endsection
