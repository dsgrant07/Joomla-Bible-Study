<?php

//No Direct Access
defined('_JEXEC') or die;

if ($this->params->get('useexpert_seriesdetail')> 0)
     {
     	echo $this->loadTemplate('custom');
	 }
else
	{
		echo $this->loadTemplate('main');
	}