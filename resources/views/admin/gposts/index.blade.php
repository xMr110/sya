@extends('admin.layouts.app')

@section('title')
    تدوينات الزوار
    @endsection

@section('bread')
    <li class="breadcrumb-item active">تدوينات زوار الموقع</li>
@endsection
@section('style')
    <link href="/assets/backend/css/dataTables.bootstrap4.css" rel="stylesheet">
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">التحكم بتدوينات الموقع </h4>
                    <div class="table-responsive m-t-40">
                        <table id="table" class="table display table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>العنوان</th>
                                <th>اسم الناشر</th>
                                <th>البريد الألكتروني</th>
                                <th>تاريخ التدوينة</th>
                                <th>حالة التدوينة</th>
                                <th>تمت الإطلاع من </th>
                                <th>لغة التدوينة</th>
                                <th>خيارات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($gposts as $gpost)
                                <tr>
                                    <td>{{$gpost->id}}</td>
                                    <td>{{$gpost->title }}</td>
                                    <td>{{$gpost->name}}</td>
                                    <td>{{$gpost->email}}</td>
                                    <td>{{$gpost->created_at->format("M/d/Y")}}</td>
                                    <td><span class="label label-{{ $gpost->status == 1 ? 'success' :($gpost->status ==0 ? 'warning' : 'danger')}}">{{ $gpost->status  == 1 ? 'تمت الموافقة' : ($gpost->status  == 0 ? 'في انتظار الموافقة' : 'تم الرفض') }}</span></td>
                                    <td><span class="label label-{{ $gpost->checked_by != null ? 'success' :($gpost->checked_by == null ? 'warning' : '')}}">{{ $gpost->checked_by != null ? $gpost->checked_by : ($gpost->checked_by  == null ? 'في انتظار الموافقة' : '') }}</span></td>
                                    <td><span class="label label-{{ $gpost->type == 1 ? 'success' :($gpost->type == 2 ? 'warning' : '')}}">{{ $gpost->type == 1 ? 'العربية' : ($gpost->type == 2 ? 'اللإنكليزية' : '') }}</span></td>
                                    <td>
                                        <a href="{{ action('Admin\GpostController@show', $gpost) }}" data-toggle="tooltip"
                                           data-original-title="عرض"> <i
                                                class="fa fa-eye text-inverse m-r-10"></i> </a>

                                        <a href="{{ action('Admin\GpostController@approv', $gpost) }}" data-toggle="tooltip"
                                           data-original-title="موافقة"> <i
                                                class="fa fa-check text-inverse m-r-10"></i> </a>

                                        <a href="{{ action('Admin\GpostController@reject', $gpost) }}" data-toggle="tooltip"
                                           data-original-title="رفض"> <i
                                                class="fa fa-times-circle text-inverse m-r-10"></i> </a>

                                        <a href="#" data-toggle="tooltip" data-delete data-original-title="حذف"> <i
                                                class="fa fa-trash text-danger"></i> </a>
                                        <form method="post"
                                              action="{{ action('Admin\GpostController@destroy', $gpost) }}"
                                              id="delete">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- This is data table -->
    <script src="/assets/backend/js/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });

    </script>
@endsection
