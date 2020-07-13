<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Acceptance extends \Codeception\Module
{

    /**
     * test suites 
     * prefix a_-f_ => test suite 1 for manual test of pair builder process, sunob_ => test suite 2 for manual test of bonus/tiny features, n_ => test suite 3 for tests using sample data
     */

    /**
     * prefix: test suites(see above), '' => empty prefix means use specified key without prefix check 
     */
    public function get_configs($key, $prefix="")
    {
        if( $key == "first_button_text" && ($prefix=="n_" || empty($prefix)) ) {
            return "Start with Diamond Shape";
        }
        else if( $key == "second_button_text" && ($prefix=="n_" || empty($prefix)) ) {
            return "Start with Setting Shape";
        }
        else if( $key == "first_product_price" && ($prefix=="n_" || empty($prefix)) ) {
            return "12.00";
        }

        return null;
    }

    /**
     * 
     */
    public function site_path_by_test_suit($suite_name)
    {
        if( $suite_name == "a_-f_" ) {
            return "/wordpress/src";
        }
        elseif( $suite_name == "a_-f_" ) {
            return "/wordpress/src";
        } 

        return null;
    }

	/**
     * we assume different test environment based on php and other applicable versions
     */
    public function get_test_environment()
    {
        // echo "called get_test_environment... ";
        try {
            $version_nums = explode(".", PHP_VERSION);

            if( !isset($version_nums[0]) || /*$version_nums[0] >= 6*/($version_nums[0] >= 7 && $version_nums[1] >= 2) ) {
                return "WBC_TEST_ENV_default";
            } 
            else {
                return "WBC_TEST_ENV_with_sample_data";
            }
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
            return null;
        }

        return null;
    }

    /**
     * @param $test_name_perfix consider it as test suite, however it is not following the complete definition of suite flow available in codeception but just an internal way to handle different test categories as suites using name prefix. 
     */
    public function test_allowed_in_this_environment( $test_name_perfix )
    {
        // echo "called test_allowed_in_this_environment... ";
        try {
            $test_environment = $this->get_test_environment();

            if( $test_environment == "WBC_TEST_ENV_default" ) {
                if( $test_name_perfix != "n_" ) {
                    return true;
                }
            } 
            else if( $test_environment == "WBC_TEST_ENV_with_sample_data" ) {
                if( $test_name_perfix == "n_" ) {
                    return true;
                }
            } 
            else {
                return false;
            }
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
            return false;
        }

        return false;
    }

    /**
     * Get current uri from WebDriver
     * @return mixed
     * @throws \Codeception\Exception\ModuleException
     */
    public function getCurrentUri()
    {
        echo "called getCurrentUri...";
        try {
            return $this->getModule('WPWebDriver')->_getCurrentUri();
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
        }
    }

    /**
     * Get current url from WebDriver
     * @return mixed
     * @throws \Codeception\Exception\ModuleException
     */
    public function getCurrentUrl()
    {
        echo "called getCurrentUrl...";
        try {
            return $this->getModule('WPWebDriver')->_getUrl().$this->getModule('WPWebDriver')->_getCurrentUri();
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
        }
    }

    /**
     * 
     */
    public function findElementsUsingXPath($xpath)
    {
        echo "called findElementsUsingXPath...";
        try {
            $module = $this->getModule('WPWebDriver');
            $page = $module->webDriver;

            // // search a link or button on a page
            // $el = $module->_findClickable($page, 'Click Me');

            // search a link or button within an element
            // $topBar = $module->_findElements('.top-bar')[0];
            $elements = $module->_findElements($xpath);
            // $el = $module->_findClickable($elements, 'Click Me');

            return $elements;
        }
        catch(Exception $e) {
            echo "caught error at findElementsUsingXPath, message...";
            echo $e->getMessage()."";
        }
    }

    /**
     * 
     */
    public function findClickableElements($text_or_xpath)
    {
        echo "called findClickableElementsUsingXPath...";
        try {
            $module = $this->getModule('WPWebDriver');
            $page = $module->webDriver;

            // search a link or button on a page
            return $module->_findClickable($page, $text_or_xpath);
        }
        catch(Exception $e) {
            echo "caught error at findClickableElementsUsingXPath, message...";
            echo $e->getMessage()."";
        }
    }

    /**
     * 
     */
    public function set_session($key,$val)
    {
        echo "called set_session... ".$key." ".$val;
        try {
            //we should use standard practice like php session that comes with phpbrowser or something of that sort. but now as a quick resort we are saving it just in the txt file. 
            $myfile = fopen($key.".txt", "w") or die("Unable to open file!");
            fwrite($myfile, $val);
            fclose($myfile);
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
            return false;
        }

        return true;
    }

    /**
     * 
     */
    public function get_session($key)
    {
        echo "called get_session... ".$key;
        try {
            //we should use standard practice like php session that comes with phpbrowser or something of that sort. but now as a quick resort we are saving it just in the txt file. 
            $myfile = fopen($key.".txt", "r") or die("Unable to open file!");
            $val = fread($myfile,filesize($key.".txt"));
            fclose($myfile);

            echo " ".$val;
            return $val;
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
            return null;
        }

        return null;
    }
	
    /**
     * 
     */
    public function scrollToAndClick($I,$text_or_xpath, $xpath_for_scroll, $attempts=10, $delay=1) 
    {
        echo "called scrollToAndClick...";
        $this->scrollTo($xpath_for_scroll);
        $this->wait(3);
            
        for($i=1; $i<=$attempts; $i++) {
            try { 
                $this->click($text_or_xpath);
                break;
            }
            catch(Exception $e) {
                echo "caught at error '".$e->getMessage()."' at scrollToAndClick on attempt number ".$i." after the delay of ".$delay." seconds";
                $this->wait($delay);
            }
        }
    }

    /**
     * 
     */
    public function resetSession() 
    {
        // echo "called resetSession...";
            
        try { 
            $this->getModule('WPWebDriver')->_closeSession();
            
            $this->getModule('WPWebDriver')->_initializeSession();

            return true;
        }
        catch(Exception $e) {
            echo "caught message...";
            echo $e->getMessage()."";
        }

        return false;
    }

}
