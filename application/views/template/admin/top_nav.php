        <!-- Top Nav Start -->
        <div id='cssmenu'>
          <ul>
            <li <?php echo ($page_title == 'Dashboard') ? 'class="active"' : ''?>>
              <a href='<?php echo base_url('dashboard');?>'>
                <img src="<?=load_img('menu/dashboard.png');?>" alt="">
                Dashboard
              </a>
            </li>
            <li <?php echo ($page_title == 'Students') ? 'class="active"' : ''?>>
              <a href="<?php echo base_url('students');?>">
                <!-- <i class="fa fa-users"></i> -->
                <img src="<?=load_img('menu/students.png');?>" alt="">
                Students
              </a>
               <ul>
                 <li><a href='<?php echo base_url('students');?>'>Listing</a></li>
                 <li><a href='<?php echo base_url('students/register');?>'>Registration</a></li>
                 <li><a href='<?php echo base_url('students/verify');?>'>Verification</a></li>
                 <!-- <li><a href='notifications.html'>Fee</a></li> -->
                   <!-- <li><a href='vector-maps.html'>Attandance</a></li> -->
                   <!-- <li><a href='<?php echo base_url('students/exam_data');?>'>Exam Data</a></li> -->
              </ul>
            </li>
            <li <?php echo ($page_title == 'Fee') ? 'class="active"' : ''?>>
              <a href="<?php echo base_url('fee');?>">
                <img src="<?=load_img('menu/fee.png');?>" alt="">
                Billing
              </a>
               <ul>
                 <li><a href='<?php echo base_url('fee');?>'>Listing</a></li>
                 <li><a href='<?php echo base_url('fee/add');?>'>Add fee type</a></li>
                 <li><a href='<?php echo base_url('fee/get_unpaid');?>'>All Unpaid</a></li>
                 <li><a href='<?php echo base_url('fee/all_trans');?>'>All Transactions</a></li>
                 <!-- <li><a href='notifications.html'>Fee</a></li> -->
              </ul>
            </li>
            <li <?php echo ($page_title == 'Examination') ? 'class="active"' : ''?>>
              <a href='<?php echo base_url('examination');?>'>
                <img src="<?=load_img('menu/stats.png');?>" alt="">
              Examination
              </a>
              <ul>
                 <li><a href="<?=base_url('examination');?>">Active Exam</a></li>
                 <li><a href='<?=base_url("examination/take");?>'>Start Exam</a></li>
                 <li><a href='<?=base_url("examination/types");?>'>Exam Types</a></li>
                 <li><a href="<?=base_url('examination/result');?>">Result</a></li>
                 <!-- <li><a href='icons.html'>Icons</a></li> -->
              </ul>
            </li>
            <li <?php echo ($page_title == 'Employees') ? 'class="active"' : ''?>>
              <a href='#'>
                <img src="<?=load_img('menu/user.png');?>" alt="">
              Employees</a>
              <ul>
                 <li><a href='<?php echo base_url('employees');?>'>Listing</a></li>
                 <li><a href='<?php echo base_url('employees/hire');?>'>Hire</a></li>
                 <!-- <li><a href='timeline.html'>Salaries</a></li> -->
              </ul>
            </li>
             <!-- <li <?php echo ($page_title == 'Teachers') ? 'class="active"' : ''?>>
              <a href='<?php echo base_url('teachers');?>'>
                <img src="<?=load_img('menu/teacher.png');?>" alt="">
              Teachers
              </a>
              <ul>
                 <!-- <li><a href='flot.html'>Verification</a></li> -->
                 <!-- <li><a href='vector-maps.html'>Attandance</a></li> -->
                 <!-- <li><a href='vector-maps.html'>Salaries</a></li>
              </ul>
            </li> -->
           <!--  <li <?php echo ($page_title == 'Course') ? 'class="active"' : ''?>>
              <a href="media.html">
                <i class="fa fa-list-alt"></i>
                Course
              </a>
            </li>
            <li class="hidden-sm">
              <a href="calendar.html">
                <i class="fa fa-book"></i>
                Subjects
              </a>
            </li> -->
             <li <?php echo ($page_title == 'Settings') ? 'class="active"' : ''?>>
              <a href='#'>
                <img src="<?=load_img('menu/settings.png');?>" alt="">
              Settings</a>
              <ul>
                    <li><a href='<?php echo base_url('settings/departments');?>'>Departments</a></li>
                    <li><a href='<?php echo base_url('settings/semesters');?>'>Semesters</a></li>
                    <li><a href='<?php echo base_url('settings/subjects');?>'>Subjects</a></li>
                    <li><a href='<?php echo base_url('settings/sections');?>'>Sections</a></li>
                    <li><a href='<?php echo base_url('settings/courses');?>'>Courses</a></li>
                    <li><a href='<?php echo base_url('settings/shifts');?>'>Shifts</a></li>
                    <li><a href='<?php echo base_url('settings/jobs');?>'>Jobs</a></li>
              </ul>
            </li>
              <!-- <li <?php echo ($page_title == 'Extras') ? 'class="active"' : ''?>>
              <a href='#'>
                <img src="<?=load_img('menu/reports.png');?>" alt="">
              Extras
              </a>
              <ul>
                <li><a href='<?php echo base_url('auth/edit_user');?>'>Profile</a></li>
                <li><a href='<?php echo base_url('customer_care/pricing_plans');?>'>Price</a></li>
                <li><a href='#'>Help</a></li>
              </ul>
            </li> -->
          </ul>
        </div>
        <!-- Top Nav End -->