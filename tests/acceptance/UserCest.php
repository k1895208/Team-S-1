<?php

class UserCest

{
    public function addUserEmpty(AcceptanceTester $I)
    {
        $I->wantTo("verify");
        $I->amOnPage('/addUser.php');
        $I->fillField('username','');
        $I->fillField('name','');
        $I->fillField('surname','');
        $I->fillField('email','');
        $I->fillField('userLevel','');
        $I->click('Submit Changes');
        $I->seeCurrentUrlEqual('users.php');
    }

    public function addUserTestWorks(AcceptanceTester $I)
    {
        $I->wantTo("verify");
        $I->amOnPage('/addUser.php');
        $I->fillField('username','hashim12');
        $I->fillField('name','hashim');
        $I->fillField('surname','amla');
        $I->fillField('email','hashim@nhs.net');
        $I->fillField('userLevel','1');
        $I->click('Submit Changes');
        $I->seeCurrentUrlEqual('users.php');
    }

    public function addUserTestTwo(AcceptanceTester $I)
    {
        $I->wantTo("verify");
        $I->amOnPage('/addUser.php');
        $I->fillField('username','');
        $I->fillField('name','hashim');
        $I->fillField('surname','');
        $I->fillField('email','hashim@nhs.net');
        $I->fillField('userLevel','60');
        $I->click('Submit Changes');
        $I->seeCurrentUrlEqual('users.php');
    }

    public function addUserTestThree(AcceptanceTester $I)
    {
        $I->wantTo("verify");
        $I->amOnPage('/addUser.php');
        $I->fillField('username','73829');
        $I->fillField('name','hashim');
        $I->fillField('surname','alam');
        $I->fillField('email','hashim@yahoo.com');
        $I->fillField('userLevel','60');
        $I->click('Submit Changes');
        $I->seeCurrentUrlEqual('users.php');
    }

    public function editUserEmpty(AcceptanceTester $I)
    {
        $I->wantTo("verify");
        $I->amOnPage('/editUser.php');
        $I->fillField('username','');
        $I->fillField('name','');
        $I->fillField('surname','');
        $I->fillField('email','');
        $I->fillField('userLevel','');
        $I->click('Submit Changes');
        $I->seeCurrentUrlEqual('users.php');
    }

    public function editUserTestWorks(AcceptanceTester $I)
    {
        $I->wantTo("verify");
        $I->amOnPage('/editUser.php');
        $I->fillField('username','testingyo');
        $I->fillField('name','again');
        $I->fillField('surname','testing');
        $I->fillField('email','nbaakza@kings.nhs.uk');
        $I->fillField('userLevel','3');
        $I->click('Submit');
        $I->seeCurrentUrlEqual('users.php');
    }

     public function editUserTestTwo(AcceptanceTester $I)
    {
        $I->wantTo("verify");
        $I->amOnPage('/editUser.php');
        $I->fillField('username','xchkvk');
        $I->fillField('name','9909w9');
        $I->fillField('surname','238398');
        $I->fillField('email','nooriebaakza@yahoo.com');
        $I->fillField('userLevel','2');
        $I->click('Submit');
        $I->seeCurrentUrlEqual('users.php');
    }

}

?>