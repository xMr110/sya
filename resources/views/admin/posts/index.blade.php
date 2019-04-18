@extends('admin.layouts.app')
@section('title')
    منشوارات الموقع
@endsection

@section('bread')
    <li class="breadcrumb-item active">منشورات الموقع</li>
@endsection
@section('style')
    <link href="/assets/backend/css/dataTables.bootstrap4.css" rel="stylesheet">
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">التحكم بمنشورات الموقع </h4>
                    <div class="table-responsive m-t-40">
                        <table id="table" class="table display table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>العنوان</th>
                                <th>المحتوى</th>
                                <!-- <th>الناشر</th> -->
                                <th>تاريخ المنشور</th>
                                <th>تاريخ أخر التعديل</th>
                                <th>حالة المنشور</th>
                                <th>خيارات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{str_limit($post->translate('ar')->title,10) }}</td>
                                <td>{{str_limit($post->translate('ar')->body,10) }}</td>
                                <!-- <td>post user name</td> -->
                                <td>{{$post->created_at}}</td>
                                <td>{{$post->updated_at}}</td>
                                <td><span class="label label-{{ $post->visible == 1 ? 'success' :($post->visible ==0 ? 'warning' : '')}}">{{ $post->visible  == 1 ? 'مرئي' : ($post->visible  == 0 ? 'مخفي' : '') }}</span></td>
                                <td>
                                    <a href="{{ action('Admin\PostController@edit', $post) }}" data-toggle="tooltip"
                                       data-original-title="تعديل"> <i
                                            class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    <a class="btn default btn-outline" href="javascript:void(0);" data-editable
                                       data-action="{{ action('Admin\PostController@visible', $post) }}"><i
                                            class="mdi {{ $post->visible ? 'mdi-eye-off' : 'mdi-eye' }}"></i></a>

                                    <a href="#" data-toggle="tooltip" data-delete data-original-title="حذف"> <i
                                            class="fa fa-trash text-danger"></i> </a>
                                    <form method="post"
                                          action="{{ action('Admin\PostController@destroy', $post) }}"
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
