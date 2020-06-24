<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard nav-icon"></i>
    {{ trans('backpack::base.dashboard') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('link') }}'><i class="fa fa-link nav-icon"
      aria-hidden="true"></i> Links</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('department') }}'><i class='nav-icon fa fa-building'></i>
    Add Department</a></li>
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon fa fa-users"></i>Create Accounts</a>
        <ul class="nav-dropdown-items">
    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('admin') }}'><i class='nav-icon fa fa-user'></i>Admin Account</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('staff') }}'><i class='nav-icon fa fa-users'></i> Staff Account</a></li>
</ul>
</li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('documents') }}"><i
      class="nav-icon fa fa-file-text-o"></i> <span>Documents</span></a></li>

{{--  --}}
<li class="nav-item nav-dropdown">
  <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon fa fa-compress"></i>Communications</a>
  <ul class="nav-dropdown-items">
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('news') }}"><i class="nav-icon fa-newspaper-o"></i>
        <span>News</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('event') }}"><i class="nav-icon fa fa-calendar"></i>
        <span>Events</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('annoucement') }}"><i
          class="nav-icon fa fa-bullhorn"></i> <span>Annoucements</span></a></li>
  </ul>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('internalsystem') }}'><i
      class='nav-icon fa  fa-bars'></i> Internal Systems</a></li>

{{--  --}}
<li class="nav-item nav-dropdown">
  <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon fa fa-yelp"></i>HelpLine</a>
  <ul class="nav-dropdown-items">
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('emergencycontacts') }}"><i
          class="nav-icon fa fa-phone"></i> <span>emergency contacts</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('incidentreporting') }}"><i
          class="nav-icon fa fa-clock-o"></i> <span>incident reporting</span></a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('computerassistance') }}"><i
          class="nav-icon fa fa-laptop"></i>computer assistance</a></li>
  </ul>
</li>

{{--  --}}
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('walloffame') }}'><i class='nav-icon fa fa-trophy'></i>
    Walloffames</a></li>


      <li class='nav-item'><a class='nav-link' href='{{ backpack_url('profile') }}'><i class='nav-icon fa fa-cogs'></i>Profile</a></li>

<hr />

{{--  --}}
<li class=nav-item><a class=nav-link href="{{ backpack_url('elfinder') }}"><i class="nav-icon fa fa-files-o"></i>
    <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>

{{-- 
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('userprofile') }}'><i
      class='nav-icon fa fa-question'></i> UserProfiles</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('employmentcategory') }}'><i
      class='nav-icon fa fa-question'></i> EmploymentCategories</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('introtext') }}'><i class='nav-icon fa fa-question'></i> IntroTexts</a></li> --}}
