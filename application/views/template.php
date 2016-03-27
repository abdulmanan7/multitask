<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
$page_title = (isset($page_title)) ? $page_title : $this->router->fetch_class();
$sub_page = (isset($sub_page)) ? $sub_page : $this->router->fetch_method();
$data = array('page_title' => $page_title, 'sub_page' => $sub_page);
?>
<?php if (null !== $this->session->flashdata('message')) {
	$message = $this->session->flashdata('message');
}
?>
<?php $this->load->helper('template');?>
<?php get_theme_header($data);?>
    <!-- Main Container start -->
    <div class="dashboard-container">
      <div class="container">
<?php get_top_nav($data);?>
<?php load_sub_nav($page_title, $sub_page);?>
        <!-- Dashboard Wrapper Start -->
        <div class="dashboard-wrapper">
<?php //get_left_sidebar();?>

<!-- display message if any -->
<div id="message_box">
<?php if (!empty($message)): ?>
	<div class="row">
		<div class="col-sm-8">
	<?php echo $message;?>
		</div>
	</div>
<?php endif?>
</div>


<!-- content goes here... -->
<?php $this->load->view($page);?>
<?php //get_right_sidebar();?>
        <!-- </div> -->
<?php get_theme_footer($data);?>
