<?php

/**
 * Partner DataObject Definition
 *
 * 
 *
 * PHP version 5
 *
 * @package    partnerlinks
 * @author     Shea Dawson <shea@livesource.co.nz>
 * @author	Cam Findlay <cam@camfindlay.com>
 * @copyright  2011 Cam Findlay Consulting
 * @copyright  2011 LiveSource
 * @version    SVN: $Id$  
 * @uses Uploadify    
 */
class Partner extends DataObject{
	
	static $db = array(
		"Title" => "Varchar(255)",
		"Content" => "HTMLText",
		"Link" => "Varchar(255)",
		"Type" => "Varchar(255)", 
		"Published" => "Boolean",
		"InFooter" => "Boolean", 
	);
	
	static $has_one = array(
		"PartnerPage" => "PartnerPage",
		"Logo" => "Image"
	);
	
	static $summary_fields = array(
		"Thumb",
		"Title",
		"Type",
		"Link",
		"State",		
	);
	
	
	/**
	 * @return $fields CMS fields for SupporterPage DOM
	 */ 
	function getCMSFields()
	{	
		$fields = parent::GetCMSFields();
		
		// remove fields
		$fields->removeByName('SortOrder');
		
		// prepare image field
		$image = new ImageUploadField("Logo", "Upload Logo");
		
		// add fields
      	$fields->addFieldToTab('Root.Main', new SimpleTinyMCEField('Content', 'Content'));
		$fields->addFieldToTab('Root.Image', $image);
		$fields->addFieldToTab('Root.Main', new CheckBoxField('Published','Published'));
		$fields->addFieldToTab('Root.Main', new CheckBoxField('InFooter','Show in footer?'));
		
		//$fields->addFieldToTab("Root.Main", $this->getBenefitDropdownField()); //@todo Do we really need to allow them to change the benefit on a supporter?, would this really occur?

      	return $fields;
	}
	
	/**
	 * onBeforeWrite function.
	 * 
	 * @access public
	 * @return void
	 */
	function onBeforeWrite()
	{
		parent:: onBeforeWrite();
		
		//If they unpublish a partner, remove them from the footer too
		if(!$this->Published){
			$this->InFooter = false;
			}
	}
	 
	/**
	 * @return object resized thumbnail logo for summary fields, if logo exists
	 */
	public function getThumb()
    {
    	return ($this->LogoID) ? $this->Logo()->CroppedImage(30,30) : '(No Image)';
    }
	
	
	/**
	 * @return resized logo for footer
	 */ 
	public function FooterLogoResize() 
	{
		return $this->Logo()->CroppedImage(100,100);
	}
	
	
	/**
     * @return string to descibe published state
     */
    public function getState()
    {
    	$return = ($this->Published) ? 'Published' : 'Unpublished';
    	$return .= ($this->InFooter) ? ' - In Footer' : '';
    	return $return;
    }
    
}