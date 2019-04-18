 <!-- START SIDEBAR MENU -->
      <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
          <li class="m-t-30 ">
            <a href="{{route('index')}}" class="detailed">
              <span class="title">Dashboard</span>
             
            </a>
            <span class="bg-success icon-thumbnail"><i class="pg-home"></i></span>
          </li>
          
          <li class="">
            <a href="{{route('users')}}"><span class="title">Users</span>
            <span class="arrow"></span></a>
            <span class="icon-thumbnail"><i class="pg-menu_lv"></i></span>
            <ul class="sub-menu">
              <li>
                <a href="{{route('users')}}">View all</a>
                <span class="icon-thumbnail">L1</span>
              </li>

             <li>
                <a href="{{route('users')}}">Add new</a>
                <span class="icon-thumbnail">L1</span>
              </li>
             

            </ul>
          </li>

           <li class="">
            <a href=""><span class="title">Therapists</span>
            <span class="arrow"></span></a>
            <span class="icon-thumbnail"><i class="pg-menu_lv"></i></span>
            <ul class="sub-menu">
              <li>
                <a href="{{route('therapists')}}"">view all</a>
                <span class="icon-thumbnail">L1</span>
              </li>

              <li>
                <a href="{{route('therapists')}}"">Add new</a>
                <span class="icon-thumbnail">L1</span>
              </li>
















             
            </ul>
          </li>
 <li class="">
            <a ><span class="title">Appointments</span>
            <span class="arrow"></span></a>
            <span class="icon-thumbnail"><i class="pg-menu_lv"></i></span>
            <ul class="sub-menu">
              <li>
                <a href="{{route('appointments')}}"">view all</a>
                <span class="icon-thumbnail">L1</span>
              </li>

              <li>
                <a href="{{route('appointments',['query'=>'accepted'])}}">accepted</a>
                <span class="icon-thumbnail">L1</span>
              </li>

              <li>
                <a href="{{route('appointments',['query'=>'pending'])}}">pending</a>
                <span class="icon-thumbnail">L1</span>
              </li>

              <li>
                <a href="{{route('appointments',['query'=>'rejected'])}}">rejected</a>
                <span class="icon-thumbnail">L1</span>
              </li>

               <li>
                <a href="{{route('appointments',['query'=>'started'])}}">on going</a>
                <span class="icon-thumbnail">L1</span>
              </li>


                <li>
                <a href="{{route('appointments',['query'=>'ended'])}}">ended</a>
                <span class="icon-thumbnail">L1</span>
              </li>


              

        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->