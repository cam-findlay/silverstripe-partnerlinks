<?php
/**
 * Partners in Footer
 *
 * Extends the Page to allow partner logos in the footer of all pages on the website. 
 *
 * PHP version 5
 *	
 * @package    partnerlinks
 * @author     Cam Findlay <cam@camfindlay.com>
 * @copyright  2011 Cam Findlay Consulting
 * @version    SVN: $Id$
 */
class PartnerFooter extends DataObjectDecorator {

 /**
	 * getPublishedSupporters function.
	 * 
	 * gets the published supporters
	 * @access public
	 * @return void
	 */
	public function getFooterPartners()
	{
		if($partners = DataObject::get(
			'Partner', 
			'Published = 1', 
			'SortOrder ASC'
		))
			return $partners;
	}

}