        <!-- Top Nav Start -->
        <div id='cssmenu'>
          <ul>
            <li <?php echo ($page_title == 'Dashboard') ? 'class="active"' : ''?>>
              <a href='<?php echo base_url('dashboard');?>'>
                <i class="fa fa-home"></i>
                Dashboard
              </a>
            </li>
            <li <?php echo ($page_title == 'welcome') ? 'class="active"' : ''?>>
              <a href='<?php echo base_url('welcome/listing');?>'>
                <i class="fa fa-book"></i>
                Angebote
              </a>
            </li>
             <li <?php echo ($page_title == 'Settings') ? 'class="active"' : ''?>>
              <a href='#'>
                <i class="fa fa-cogs"></i>Settings</a>
                <!-- <i class="fa fa-cogs"></i>Einstellungen</a> -->
              <ul>
              </ul>
            </li>
          </ul>
        </div>
        <!-- Top Nav End -->