<?php 

class n_kc_checkoutPageCest extends f_q_checkoutPageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // // tests
    // public function tryToTest(AcceptanceTester $I)
    // {
    // }

	public function checkoutPage(AcceptanceTester $I, $suite_name_prefix=false) {
		
		if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        parent::checkoutPage($I, "n_");
	}

	public function placeOrder(AcceptanceTester $I, $suite_name_prefix=false) {
		
		if( !$I->test_allowed_in_this_environment("n_") ) {
            return;
        }

        parent::placeOrder($I, "n_");
	}
	
}
