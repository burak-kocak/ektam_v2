<?php $this->load->view('includes/header'); ?>
 
    <div id="content">
    	<div class="ibox-content animated fadeInRight m-t-xs">

            <div class="statistics-canvas">
            <div class="item animated fadeInRight">
                    <i class="fa fa-user-circle-o"></i>
                    <div class="title">Authorised Users</div>
                    <div class="info"><?php echo $authorised; ?></div>
                </div>
                <div class="item animated fadeInRight">
                    <i class="fa fa-users"></i>
                    <div class="title">Customers</div>
                    <div class="info"><?php echo $customer; ?></div>
                </div>
                <div class="item animated fadeInRight">
                    <i class="fa fa-file-text"></i>
                    <div class="title">Files</div>
                    <div class="info"><?php echo $file; ?></div>
                </div>
                <div class="item animated fadeInRight">
                    <i class="fa fa-folder-open"></i>
                    <div class="title">Folders</div>
                    <div class="info"><?php echo $folder; ?></div>
                </div>

                <div class="user">
                    <?php echo $this->session->userdata['user']->username; ?> <br />
                    Hi, this is the administrator page. <br />
                    Your IP: <?php echo $ip; ?>

                    <?php echo form_open('login/validate'); ?>
                        <?php echo $this->session->userdata['user']->email; ?>
                        <input type="hidden" name="logout" value="<?php echo $this->session->userdata['user']->email; ?>" />
                        <button class="link-btn" onClick="$(this).find('form').submit()"><i class="fa fa-power-off"></i> <?php echo $this->lang->line('logout'); ?></button>
                    <?php echo form_close(); ?>
                </div>
            </div>
            
            

            <div class="current-path">
                <code>
                    <i class="fa fa-sitemap main" aria-hidden="true"></i>
                    <?php
                        $nav = rtrim($current_path, "/"); 
                        $nav = explode('/', $nav);
                        $segments = '';
                        foreach($nav as $item) {
                            $segments .= $item != 'uploads' ? '/'.$item : '';
                            echo "<i class='fa fa-angle-right'></i>";
                            echo "<a href='".base_url('dashboard/administrator/docs').$segments."'>$item</a>";
                        }
                    ?>
                </code>
            </div>
            <table class="tree">
                <tr><td>Select</td><td>Name</td><td>Date Created</td><td>Size</td></tr>
                <?php $docsPath = $current_path.'docs';
                    foreach($this->session->$docsPath as $key => $value) { ?>
                    <tr class="file-line clickable-row" data-href="<?php echo base_url('dashboard/administrator/docs/').$value->name; ?>">
                        <td>
                            <div class="file">
                                <i class="fa fa-file"></i>
                                <i class="box"></i>
                                <div class="type"><?php echo $value->type; ?></div>
                            </div>
                        </td>
                        <td>
                            <div class="file-name"><?php echo substr($value->name, strrpos($value->name, '/') + 1); ?></div>
                        </td>
                        <td>
                            <div class="file-date"><?php echo $value->upload_date; ?></div>
                            <div class="file-time"><?php echo substr($value->upload_time, 0, -3); ?></div>
                        </td>
                        <td><?php echo $value->size; ?></td>
                    </tr>
                <?php } ?>

                <?php foreach($this->session->$current_path as $key => $value) { ?>
                    <tr class="folder-line clickable-row" data-href="<?php echo base_url('dashboard/administrator/docs/').str_replace('uploads/', "", $current_path).$value->path; ?>">
                        <td>
                            <div class="folder"><?php echo $value->count; ?></div>
                        </td>
                        <td>
                            <div class="folder-name"><?php echo $value->path; ?></div>
                        </td>
                        <td>
                            <div class="folder-date"><?php echo substr($value->date_created, 0 , -9); ?></div>
                            <div class="folder-time"><?php echo substr($value->date_created, 11 , -3); ?></div>
                        </td>
                        <td><?php echo $value->size; ?></td>
                    </tr>
                <?php } ?>
            </table>

        </div>
    </div>

<?php $this->load->view('includes/footer'); ?>