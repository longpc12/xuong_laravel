@extends('admin.layouts.mater');

@section('title')
    Cập Nhật danh mục Danh Mục sản phẩm
@endsection

@section('content')
    <form action="{{ route('admin.catalogues.update', $model->id) }}"enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <col-md-6>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"  value="{{$model->name}}">
                </div>

                <div class="mb-3">
                    <label for="cover" class="form-label">File:</label>
                    <input type="file" class="form-control" id="cover" placeholder="Enter cover" name="cover">
                    <img src="{{\Storage::url($model->cover) }}" alt="" width="50px">
                </div>

            </col-md-6>
            <col-md-6>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-check-lable"> IS ACTIVE</label>
                    <input class="form-check-input" type="checkbox" value="1" 
                    @if ($model->is_active) checked @endif name="is_active">
                   
                </div>
                    
            </col-md-6>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="{{ route('admin.catalogues.index') }}" class="btn btn-primary mb-3">Quay Lại</a>
@endsection
