<?php
/**
 * Created by PhpStorm.
 * User: davis
 * Date: 30/09/14
 * Time: 03:32
 */

class InstagramFeed_ControllerExtension extends Extension{

	protected $configSettings = array();

	static $owlCarouselInitJS = '(function($) { $(document).ready(function(){
  			$(".owl-carousel").owlCarousel();
	});}(jQuery));
';

	public function onAfterInit() {
		$config = Config::inst();

		Requirements::css("instagramfeed/css/owl.carousel.css");
		Requirements::javascript("instagramfeed/javascript/jquery/jquery-1.11.1.min.js");
		Requirements::javascript("instagramfeed/javascript/owl-carousel/owl.carousel.js");
		Requirements::customScript(self::$owlCarouselInitJS);

		$this->configSettings['ClientID'] = $config->get('InstagramFeed_ControllerExtension', 'ClientID');;
		$this->configSettings['DefaultHash'] = $config->get('InstagramFeed_ControllerExtension', 'DefaultHash');;
	}

	public function getInstagramFeedItems(){

		$api_url = 'https://api.instagram.com/v1/tags/'.$this->configSettings['DefaultHash'].'/media/recent?client_id='.$this->configSettings['ClientID'];

		$ch = curl_init();

		curl_setopt_array($ch, array(
			CURLOPT_URL => $api_url,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_SSL_VERIFYPEER => false
		));

		$output = curl_exec($ch);

		$instagram_json = json_decode($output);

		$whitelist_fields = array('created_time', 'link', 'images', 'likes');

		$row_array = array();
		foreach($instagram_json->data as $items){
			$coloumn_array = array();
			foreach($items as $key => $value){
				if(in_array($key, $whitelist_fields)){
					if($key == 'images'){
						$coloumn_array['LowResImage'] =  $value->low_resolution->url;
						$coloumn_array['StandardResImage'] =  $value->standard_resolution->url;
						$coloumn_array['Thumbnail'] =  $value->thumbnail->url;
					} elseif($key == 'likes'){
						$coloumn_array['Likes'] =  $value->count;
					} else {
						$coloumn_array[$key] =  $value;
					}
				}
			}
			array_push($row_array, ArrayData::create($coloumn_array));
		}

		$instagram_feed_arraylist = ArrayList::create($row_array);

		return $instagram_feed_arraylist->renderWith('InstagramFeed');
	}
}