<!-- sidebar menu area start -->
<div class="sidebar-menu">
  <div class="sidebar-header">
    <div class="logo">
      <a href="index.html"><img src="{{ asset('images/icon/logo.png') }}" alt="logo"></a>
    </div>
  </div>
  <div class="main-menu">
    <div class="menu-inner">
      <nav>
        <ul class="metismenu" id="menu">
          <li>
            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
            <ul class="collapse">
              <li><a href="index.html">ICO dashboard</a></li>
              <li><a href="index2.html">Ecommerce dashboard</a></li>
              <li><a href="index3.html">SEO dashboard</a></li>
            </ul>
          </li>
          <li>
            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Members
              </span></a>
            <ul class="collapse">
              <li><a href="{{ route('member.index') }}">Manage Members</a></li>
              <li><a href="{{ route('member.index') }}">Contact List</a></li>
              <li><a href="{{ route('member.create') }}">Add Member</a></li>
              <li class=""><a href="#" aria-expanded="false">Birth Days</a>
                  <ul class="collapse" style="height: 0px;">
                    @foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                      <li><a href="{{ route('member.birthday', array('day' => $day)) }}">{{ ucfirst($day) }}</a></li>
                    @endforeach
                  </ul>
              </li>
                                    
                               
            </ul>
          </li>
          <li>
            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Fellowships</span></a>
            <ul class="collapse">
              <li><a href="{{ route('fellowship.index', array('grp'=>'elderly','gender' => 'male')) }}">Men Fellowship</a></li>
              <li><a href="{{ route('fellowship.index', array('grp'=>'elderly','gender' => 'female')) }}">Women Fellowship</a></li>
              <li><a href="{{ route('fellowship.index', array('grp'=>'children')) }}">Children Fellowship</a></li>
              <li><a href="{{ route('fellowship.index', array('grp'=>'youth')) }}">Youth Fellowship</a></li>
            </ul>
          </li>
          <li>
            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Events</span></a>
            <ul class="collapse">
              <li><a href="{{ route('event.index') }}">Manage Events</a></li>
              <li><a href="{{ route('event.create') }}">Create Event</a></li>
              <li><a href="{{ route('eventcat.index') }}">Manage Category</a></li>
              <!-- <li><a href="{{ asset('') }}php //echo base_url('event/calendar')?>">Calendar</a></li> -->
            </ul>
          </li>
          <li><a href="#"><i class="ti-map-alt"></i> <span>Options</span></a></li>
          
        </ul>
      </nav>
    </div>
  </div>
</div>
<!-- sidebar menu area end -->