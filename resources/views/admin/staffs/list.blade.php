@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Nhân viên
                    <small>Danh sách</small>
                </h1>
                @if(Session::has('invalid'))
                    <div class="alert alert-danger alert-dismissible">
                         <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         {{Session::get('invalid')}}
                    </div>
               @endif
               @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                         <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         {{Session::get('success')}}
                    </div>
               @endif
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Giới tính</th>
                        <th>Chứng minh thư</th>
                        <th>Vị trí</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @php $count = 1; @endphp
                    @foreach ($staffs as $staff)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $staff['name'] }}</td>
                            <td>{{ $staff['email'] }}</td>
                            <td>{{ $staff['sex'] == 0 ? 'Nam' : 'Nữ' }}</td>
                            <td>{{ $staff['identity_card'] }}</td>
                            <td>{{ $staff['role'] == 1 ? 'Nhân viên' : '' }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Hành động
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('staff.edit.form',['id' => $staff['id']]) }}">Sửa</a></li>
                                        <li><a href="{{ route('staff.delete',['id' => $staff['id']]) }}" onclick="return confirm('Bạn có muốn xóa nhân viên này ?');">Xóa</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @php $count++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection