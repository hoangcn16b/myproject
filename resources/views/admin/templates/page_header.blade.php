@php
$pageTitle = 'Quản lý ' . ucfirst($controllerName);
$pageButton = sprintf('<a href="%s" class="btn btn-success"><i class="fa fa-arrow-left"></i> Quay về</a>', route('admin/' . $controllerName . '/index'));
if ($pageIndex == true) {
    if ($controllerName == 'product') {
        $pageButton = sprintf('<a href="%s" class="btn btn-success"><i class="fa fa-plus-circle"></i> Thêm mới</a>', route('admin/' . $controllerName . '/create'));
    } else {
        $pageButton = sprintf('<a href="%s" class="btn btn-success"><i class="fa fa-plus-circle"></i> Thêm mới</a>', route('admin/' . $controllerName . '/form'));
    }
}
@endphp

<div class="page-header zvn-page-header clearfix">
    <div class="zvn-page-header-title">
        <h3>{{ $pageTitle }}</h3>
    </div>
    <div class="zvn-add-new pull-right">
        {!! $pageButton !!}
    </div>
</div>
