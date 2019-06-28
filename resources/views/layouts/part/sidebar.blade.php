<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li @if ($menu1 == "Dashboard") class="active" @endif><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li @if ($menu1 == "Category") class="treeview active" @else class="treeview" @endif>
                <a href="#">
                    <i class="fa fa-question"></i> <span>Pertanyaan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li @if ($menu1 == "Category" && $menu2 != "List") class="active" @endif><a href="{{route('category.create.page')}}"><i class="fa fa-circle-o"></i> Buat Kategori Pertanyaan</a></li>
                    <li @if ($menu2 == "List")
                        class="treeview active"
                    @else
                        class="treeview"
                    @endif>
                        <a href="#"><i class="fa fa-circle-o"></i> Daftar Kategori
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <p hidden>{{$categorySidebarLists = \App\Category::orderBy('id')->get()}}</p>
                            @for ($i = 0; $i < count($categorySidebarLists); $i++)
                            <li @if ($menu3 == $categorySidebarLists[$i]->id)
                                class="active"
                            @endif><a href="{{route('category.detail.id',['id'=>$categorySidebarLists[$i]->id])}}"><i class="fa fa-circle-o"></i> {{$categorySidebarLists[$i]->name}}</a></li>
                            @endfor
                        </ul>
                    </li>
                </ul>
            </li>
            <li @if ($menu1 == "QuestionnaireResult") class="active" @endif><a href="{{route('questionnaire.index')}}"><i class="fa fa-file-text"></i> <span>Hasil Kuesioner</span></a></li>
            <li @if ($menu1 == "UserManagement") class="active" @endif><a href="{{route('user.management.index')}}"><i class="fa fa-user"></i> <span>User Management</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>