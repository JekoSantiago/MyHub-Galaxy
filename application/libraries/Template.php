<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
	var $template_data = array();
	
	function set($name, $value)
	{
		$this->template_data[$name] = $value;
	}
	
	function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
	{
		$this->CI =& get_instance();
		$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
		
		return $this->CI->load->view($template, $this->template_data, $return);
	}
}

/* End of file Template.php 
 * Location: ./application/libraries/Template.php
 * 
 * Author: Igor M. Lucmayon 
 * Created Date: Nov. 15, 2019
 * Project Name : Project Galaxy - Warehouse Container Monitoring System v.2
 *
 */
