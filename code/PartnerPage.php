<?php
/**
 * Partner Page Type
 * 
 * Displays a list of partners, logos and links also pushes logos to the footer if selected.
 *
 * PHP version 5
 *	
 * @package    mysite
 * @author     Cam Findlay <cam@camfindlay.com>
 * @copyright  2011 Cam Findlay Consulting
 * @version    SVN: $Id$
 * @uses	DataObjectManager
 */
class PartnerPage extends Page{
	
	public static $db = array(
	);
	
	static $has_one = array(
    );
    
    static $has_many = array(
    	"Partners" => "Partner"
    );
       
	/**
	 * Add a custom icon for easier recognition.
	 * @TODO find a partner shake hands icons
	 */
	//public static $icon = '../images/icons/partner';
    
    /**
	 * Sets up additional fields for the supporter page
	 * @return $fields set of form fields for display in cms
	 */
    public function getCMSFields()
    {	
    	$fields = parent::getCMSFields();
    	
    	// supporters DOM field
    	$partners = new DataObjectManager(
    		$this,
    		'Partners',
    		'Partner'
    	);
    	
    	// set filter benefits by category
		$partners->setFilter(
   			'Published', //Fieldname
   			'Filter by Status',//Title
    		array('0'=>'Unpublished','1'=>'Published')//filter
		); 

    	
    	// add fields
    	$fields->addFieldToTab('Root.Content.Partners', $partners);
    	return $fields;
    }
    
    
    /**
     * return the published partners
     */
    public function getPublishedPartners(){
    	return $this->Partners('Published = 1');
    }

}
class PartnerPage_Controller extends Page_Controller {
	
	public static $allowed_actions = array (
	);

	public function init() {
		parent::init();
	}
}