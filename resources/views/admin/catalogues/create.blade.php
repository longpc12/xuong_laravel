@extends('admin.layouts.mater');

@section('title')
    Thêm Mới Danh Mục sản phẩm
@endsection

@section('content')
    <form action="{{ route('admin.catalogues.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <col-md-6>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                </div>

                <div class="mb-3">
                    <label for="cover" class="form-label">File:</label>
                    <input type="file" class="form-control" id="cover" placeholder="Enter cover" name="cover">
                </div>

            </col-md-6>
            <col-md-6>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-check-lable">IS ACTIVE</label>
                    <input type="checkbox" value="1" name="is_active" checked>
                </div>

            </col-md-6>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="{{ route('admin.catalogues.index') }}" class="btn btn-primary mb-3">Quay Lại</a>
@endsection
