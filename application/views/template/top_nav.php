        <!-- Top Nav Start -->
        <div id='cssmenu'>
          <ul>
            <li <?php echo ($page_title == 'Dashboard') ? 'class="active"' : ''?>>
              <a href='<?php echo base_url('dashboard');?>'>
                <i class="fa fa-home"></i>
                Dashboard
              </a>
            </li>
            <li <?php echo ($page_title == 'planung') ? 'class="active"' : ''?>>
              <a href='<?php echo base_url('planung/listing');?>'>
                <i class="fa fa-pencil-square-o"></i>
                PLANUNG
              </a>
            </li>
            <li <?php echo ($page_title == 'angebote') ? 'class="active"' : ''?>>
              <a href='<?php echo base_url('angebote/listing');?>'>
                <i class="fa fa-file-text-o"></i>
                ANGEBOTE
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