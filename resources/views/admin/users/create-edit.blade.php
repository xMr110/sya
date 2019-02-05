@extends('admin.layouts.app')
@section('title')
إضافة مدير
@endsection

@section('bread')
    <li class="breadcrumb-item"><a href="{{ action('Admin\UserController@index') }}">مدراء الموقع</a></li>
    <li class="breadcrumb-item active">مدير جديد</li>
    @endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">مدير جديد</h4>
                    <form class="form-material" enctype="multipart/form-data"
                          action="{{isset($user)? action('Admin\UserController@update',$user):action('Admin\UserController@store')}}"
                          method="POST">
                        {{ csrf_field() }}

                        @if(isset($user))
                            {{ method_field('PATCH') }}
                        @endif

                        <div class="row p-t-20">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">الاسم ( بالعربية او الأنكليزية )</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="name"
                                           placeholder="الاسم"
                                           value="{{isset($user)?$user->name:old('name')??''}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="emil">البريد الألكتروني</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="email"
                                           placeholder="البريد الألكتروني"
                                           value="{{isset($user)?$user->email:old('email')??''}}"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">كلمة السر</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="password"
                                           placeholder="كلمة السر"
                                           value=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">تأكيد كلمة السر</label>
                                    <input type="text" class="form-control form-control-line"
                                           name="password_confirmation"
                                           placeholder="تأكيد"
                                           value=""/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="role">دور المدير (الصلاحية)</label>
                                    <select name="role" id="role" class="form-control" onchange="showDiv(this)">
                                        <option value="1" {{ isset($user) ? $user->role == 1 ? 'selected' : '' : '' }}>مدير عام</option>
                                        <option value="2" {{ isset($user) ? $user->role == 2 ? 'selected' : '' : '' }}>محرر</option>
                                        <option value="3" {{ isset($user) ? $user->role == 3 ? 'selected' : '' : '' }}>منسق</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">
                                        <h3>
                                            <span class="label label-info">الصورة الشخصية</span>
                                            الصورة {{ isset($user) ? '' : '*' }}
                                        </h3>
                                    </label>
                                    <input type="file" name="image_path" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <div class="form-group">
                                    <button class="btn btn-success btn-rounded" type="submit">أدخل</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
