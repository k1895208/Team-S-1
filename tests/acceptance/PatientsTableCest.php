  
<?php 

class PatientsTableCest

{ 

    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/user_login.php');
        $I->fillField('username','admin');
        $I->fillField('password','admin');
        $I->click('Sign in');
    }
    
    public function checkPage(AcceptanceTester $I)
    {

            $I->amOnPage('/patients.php');
            $I->see('LOGOUT');


    }
    public function checkTable(AcceptanceTester $I){


            $I->seeElement("#searchinput");
            $I->seeElement("#searchbutton");
            $I->seeElement("table");
            $I->see('Manage');


    }

    public function addPatient(AcceptanceTester $I){

            $I->click("//a[@href='register_patient.php']");
            $I->amOnPage('/register_patient.php');

    }



    public function _after(AcceptanceTester $I)
    {
        $I->click('LOGOUT');
    }

}