@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Nhân viên
                    <small>Thêm mới</small>
                </h1>
                @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible mt-2">
                    <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ $errors->first() }}
                    </div>
                @endif
                <form action="{{ route('staff.create') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label for="name">Tên: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Nhập tên nhân viên" id="name" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email: <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" placeholder="Nhập email" id="email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="sex">Giới tính: <span class="text-danger">*</span></label>
                        <select class="form-control" name="sex">
                            <option value="0" {{ old('sex') == 0 ? 'selected' : '' }}>Nam</option>
                            <option value="1" {{ old('sex') == 1 ? 'selected' : '' }}>Nữ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="identity">Chứng minh nhân dân: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Nhập chứng minh nhân dân" id="identity" name="identity" value="{{ old('identity') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu: <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" placeholder="Nhập mật khẩu" id="password" name="password" value="{{ old('password') }}">
                    </div>
                    <div class="form-group">
                        <button type="submit"
                                class="btn btn-primary">
                            Thêm mới
                        </button>
                    </div>
                  </form>
            </div>
        </div>
    </div>    
</div>
@endsection