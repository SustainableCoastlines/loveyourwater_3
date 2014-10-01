<?php

	Page_Controller::add_extension("InstagramFeed_ControllerExtension");

	$config = Config::inst();

	$config->update('InstagramFeed_ControllerExtension', 'ClientID', '8af248585b8f406ab3d973193a354747');
	$config->update('InstagramFeed_ControllerExtension', 'DefaultHash', 'loveyourwater');
