@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <form action="" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label>Tên danh muc</label>
                    <input type="text" class="form-control" value="{{$menu->name}}" id="name" name="name" placeholder="Nhập tên danh mục">
                </div>

                <div class="form-group">
                    <label>Danh muc</label>
                    <select name="parent_id" class="form-control">
                        <option value="0" {{$menu->parent_id == 0 ? 'selected' : ''}} >Danh mục cha</option>
                        @foreach($menus as $menuParent)
                            <option value="{{$menuParent->id}} {{$menu->parent_id == $menuParent->id ? 'selected' : ''}}">
                                {{$menuParent->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea name="description" class="form-control">{{$menu->description}}</textarea>
                </div>

                <div class="form-group">
                    <label>Mô tả chi tiết</label>
                    <textarea name="content" id="content" class="form-control">{{$menu->content}}</textarea>
                </div>

                <div class="form-group">
                    <label>Kích hoạt</label>
                    <div class="col-sm-6">
                        <!-- radio -->
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                                     {{$menu->active == 1 ? 'checked=""' : ''}}>
                                <label for="active" class="custom-control-label">Có</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="0" type="radio" id="no_active"
                                       name="no_active" {{$menu->active == 0 ? 'checked=""' : ''}}>
                                <label for="customRadio2" class="custom-control-label">Không</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
            </div>
            @csrf
        </form>
    </div>
    <!-- /.card -->
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
