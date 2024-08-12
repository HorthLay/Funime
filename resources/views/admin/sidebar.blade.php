<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="avatar">
          <img src="{{ asset('users/' . Auth::user()->user_image) }}" alt="Profile Photo" class="img-fluid rounded-circle">
        </div>
        <div class="title">
          <h1 class="h5">{{Auth::user()->name}}</h1>
          <p>{{Auth::user()->email}}</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
      <ul class="list-unstyled">
              <li><a href="{{url('admin/dashboard')}}"> <i class="icon-home"></i>Home </a></li>


            
             
              <li><a href="#productDropdown" aria-expanded="false" data-toggle="collapse">
                <i class="icon-windows"></i>Article</a>
                <ul id="productDropdown" class="collapse list-unstyled">
                    <li><a href="{{url('/add_article')}}">Add Article</a></li>
                    <li><a href="{{url('/view_article')}}">View Article</a></li>
                </ul>
            </li>


              <li><a href="{{url('/category_view')}}"> <i class="icon-grid"></i>Category</a></li>

              <li><a href="#userDropdown" aria-expanded="false" data-toggle="collapse">
                <i  class="icon-user-1"></i>User</a>
                <ul id="userDropdown" class="collapse list-unstyled">
                    <li><a href="{{url('/add_user')}}">Add User</a></li>
                    <li><a href="{{url('/view_user')}}">View User</a></li>
                </ul>
            </li>
              
      </ul>
    </nav>