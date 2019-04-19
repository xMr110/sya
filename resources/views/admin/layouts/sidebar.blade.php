<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">

            <ul id="sidebarnav">


                    <li class="nav-small-cap">شخصي</li>

                <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                class="mdi mdi-settings"></i>
                        <span class="hide-menu">
                        الإعدادات
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{action('Admin\SettingsController@index')}}">إدارة </a></li>
                    </ul>
                </li>
                @if(Auth::user()->role == 1)
                <li><a  class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i
                            class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">
                        المستخدمون
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{action('Admin\UserController@index')}}">الكل </a></li>
                        <li><a href="{{action('Admin\UserController@create')}}">جديد</a></li>
                    </ul>
                </li>
                @endif
                <li><a  class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i
                                class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">
                        إدارة صور الموقع
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{action('Admin\BackgroundController@index')}}">تعديل</a></li>
                    </ul>
                </li>
                <li class="nav-devider"></li>
                <li class="nav-small-cap">إدارة محتوى الموقع</li>
                <li><a class="waves-effect waves-dark" href="{{ action('\Barryvdh\TranslationManager\Controller@getIndex') }}" aria-expanded="false"><i
                                class="mdi mdi-google-translate"></i>
                        <span class="hide-menu">
                        ترجمة كلمات الموقع
                    </span></a>
                </li>

                <li><a  class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i
                                class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">
                        برامجنا
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{action('Admin\ProgramController@index')}}">الكل </a></li>
                        <li><a href="{{action('Admin\ProgramController@create')}}">جديد</a></li>
                    </ul>
                </li>
                <li><a  class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i
                                class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">
                        الاعتمادات
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{action('Admin\CertificateController@index')}}">الكل </a></li>
                        <li><a href="{{action('Admin\CertificateController@create')}}">جديد</a></li>
                    </ul>
                </li>
                <li><a  class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i
                            class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">
                        المنشورات
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{action('Admin\PostController@index')}}">الكل </a></li>
                        <li><a href="{{action('Admin\PostController@create')}}">جديد</a></li>
                    </ul>
                </li>
                <li><a  class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i
                            class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">
                        تدوينات الزوار
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{action('Admin\GpostController@index')}}">الكل </a></li>
                        <li><a href="{{action('Admin\GpostController@create')}}">جديد </a></li>
                    </ul>
                </li>
                <li><a  class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i
                            class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">
                        ماذا نفعل
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{action('Admin\WhatwedoController@index')}}">الكل </a></li>
                        <li><a href="{{action('Admin\WhatwedoController@create')}}">جديد </a></li>
                    </ul>
                </li>
                <li><a  class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i
                            class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">
                        إنضم إلينا
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{action('Admin\JoinusController@index')}}">الكل </a></li>
                    </ul>
                </li>
                <li><a  class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i
                            class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">
                     الشركاء
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{action('Admin\PartnersController@index')}}">الكل </a></li>
                        <li><a href="{{action('Admin\PartnersController@create')}}">جديد </a></li>
                    </ul>
                </li>
                <li><a  class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i
                            class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">
                     فريقنا
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{action('Admin\OurteamsController@index')}}">الكل </a></li>
                        <li><a href="{{action('Admin\OurteamsController@create')}}">جديد </a></li>
                    </ul>
                </li>

                <li><a  class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i
                                class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">
                     مبادرات
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{action('Admin\InitiativeController@index')}}">الكل </a></li>
                        <li><a href="{{action('Admin\InitiativeController@create')}}">جديد </a></li>
                    </ul>
                </li>



            </ul>
        </nav>
    </div>
</aside>
