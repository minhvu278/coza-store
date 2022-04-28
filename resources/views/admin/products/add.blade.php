@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên sản phẩm">
                </div>
                <div class="col">
                    <label>Danh muc</label>
                    <select name="parent_id" class="form-control">
                        <option value="0">Danh mục cha</option>
                        @foreach($menus as $menu)
                            <option value="{{$menu->id}}">{{$menu->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col">
                    <label>Giá gốc</label>
                    <input type="number"  class="form-control" name="price">
                </div>
                <div class="col">
                    <label>Giá giảm</label>
                    <input type="number" class="form-control" name="price_sale">
                </div>
            </div>

            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea name="content" id="content" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Ảnh sản phẩm</label>
                <input type="file" class="form-control" id="upload">
                <div id="image_show">
                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" id="active" name="active" checked="">
                    <label class="form-check-label">Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" name="active" id="no_active">
                    <label class="form-check-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>


        </div>
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
