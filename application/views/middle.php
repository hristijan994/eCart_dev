<?php
 
//  echo '<pre>';
//  die(print_r($data));
//  echo '</pre>';
 $this->load->view('header', $data);
 ?>
 <div style="clear: both"></div>
 <hr width="80%" align="center"/>
 <?php 
 $this->load->view($page, $data);
 $this->load->view('footer');