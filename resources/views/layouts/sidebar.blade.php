  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group" style="display:none">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="/"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
        <!-- <li><a href="{{ url('employee-management') }}"><i class="fa fa-link"></i> <span>Employee Management</span></a></li> -->
        <!-- <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>System Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('system-management/department') }}">Department</a></li>
            <li><a href="{{ url('system-management/division') }}">Division</a></li>
            <li><a href="{{ url('system-management/country') }}">Country</a></li>
            <li><a href="{{ url('system-management/state') }}">State</a></li>
            <li><a href="{{ url('system-management/city') }}">City</a></li>
            <li><a href="{{ url('system-management/report') }}">Report</a></li>
          </ul>
        </li> -->

        <li class="treeview">
          <a href="#"><i class="fa fa-home"></i> <span>Home Page</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('home-page/main_slider') }}">Main slider</a></li>
            <li><a href="{{ url('home-page/events') }}">Events</a></li>
            <li><a href="{{ url('home-page/in_focus') }}">In Focus</a></li>
            <li><a href="{{ url('home-page/testimonial') }}">Testimonials</a></li>
            <li><a href="{{ url('director/index') }}">Director Message</a></li>
          </ul>
        </li>
          <li class="treeview">
                  <a href="#"><i class="fa fa-book"></i> <span>Academics</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a data-link="MBADetails" href="{{ url('Academics/MBADetails') }}">MBA</a></li>
                    <li><a href="{{ url('Academics/phdDetails') }}">PH.D</a></li>
                    <li><a href="{{ url('Academics/researchDetails') }}">Research</a></li>
                    <li><a href="{{ url('Academics/learningDetails') }}">Learning</a></li>
                  </ul>
                </li>


        <li class="treeview">
          <a href="#"><i class="fa fa-graduation-cap"></i> <span>Academics</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('academics/syllabus') }}">MBA Syllabus</a></li>
            <li><a href="{{ url('academics/course_allotment') }}">Course Allotment</a></li>
             <li><a href="{{ url('academics/faculty') }}">Faculty</a></li>
            <!--<li><a href="{{ url('home-page/testimonial') }}">Testimonials</a></li> -->
          </ul>
        </li>
 <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Faculty</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Academic Staff</a></li>

          </ul>
        </li>



                  <li class="treeview">
                          <a href="#"><i class="fa fa-university"></i> <span>Traning&Placements</span>
                                    <span class="pull-right-container">
                                      <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                  </a>
                                  <ul class="treeview-menu">
                                    <li><a href="{{ url('recruiters/index') }}">Our Recruiters</a></li>
                                    <li><a href="{{ url('admission/brochure') }}">Brouchers</a></li>
                                     <li><a href="{{ url('admission/criteria') }}">Student Training </a></li>
                                  </ul>
                                </li>

                                <li class="treeview">
                                   <a href="#"><i class="fa fa-life-ring"></i> <span>Life@JIM</span>
                                   <span class="pull-right-container">
                                   <i class="fa fa-angle-left pull-right"></i>
                                   </span>
                                   </a>
                                   <ul class="treeview-menu">
                                        <li><a href="{{ url('life_jim/campus') }}">The Campus</a></li>
                                        <li><a href="{{ url('life_jim/computer_lab') }}">Computer Lab</a></li>
                                        <li><a href="{{ url('life_jim/library') }}">The library</a></li>
                                        <li><a href="{{ url('life_jim/auditorium') }}">Auditorium</a></li>
                                        <li><a href="{{ url('life_jim/board_room') }}">Board Room</a></li>
                                        <li><a href="{{ url('life_jim/hostels') }}">Hostels</a></li>
                                        <li><a href="{{ url('life_jim/wifi') }}">WIFI Campus</a></li>
                                        <li><a href="{{ url('life_jim/student') }}">Student Affinities</a></li>
                                        <li><a href="{{ url('life_jim/research') }}">Research Room</a></li>
                                   </ul>
                                </li>
                                <li class="treeview">
                                      <a href="#"><i class="fa fa-calendar "></i> <span>Event</span>
                                           <span class="pull-right-container">
                                           <i class="fa fa-angle-left pull-right"></i>
                                           </span>
                                      </a>
                                      <ul class="treeview-menu">
                                             <li><a href="{{ url('events/gallery') }}">Events Photo Gallery</a></li>
                                             <li><a href="{{ url('guest_speaker/guest_speaker') }}">Guest Speakers</a></li>
                                             <li><a href="#">CEO Of Month</a></li>
                                      </ul>
                                </li>
                                  <li class="treeview">
                                                  <a href="#"><i class="fa fa-university"></i> <span>Admission</span>
                                                    <span class="pull-right-container">
                                                      <i class="fa fa-angle-left pull-right"></i>
                                                    </span>
                                                  </a>
                                                  <ul class="treeview-menu">
                                                    <li><a href="{{ url('admission/eligiblity') }}">Eligiblity</a></li>
                                                    <li><a href="{{ url('admission/enterance_test') }}">Enterance Test</a></li>
                                                     <li><a href="{{ url('admission/criteria') }}">Selection Criteria</a></li>
                                                     <li><a href="{{ url('admission/shortlisting') }}">Short Listing</a></li>
                                                     <li><a href="{{ url('admission/documents') }}">Supporting documents</a></li>
                                                     <li><a href="{{ url('admission/online_application') }}">Online Application</a></li>
                                                     <li><a href="{{ url('admission/hostel') }}">Hostel Accommodation</a></li>
                                                     <li><a href="{{ url('admission/curriculum') }}">Curriculum</a></li>
                                                     <li><a href="{{ url('admission/fee') }}">Fee Structure</a></li>
                                                     <li><a href="{{ url('admission/brochure') }}">Brochure downloadable</a></li>
                                                    <!--<li><a href="{{ url('home-page/testimonial') }}">Testimonials</a></li> -->
                                                  </ul>
                                                </li>

        <li><a href="#"><i class="fa fa-info-circle "></i> <span>About JIM</span></a></li>
        <li><a href="#"><i class="fa fa-phone"></i> <span>Contact Us</span></a></li>


   

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>