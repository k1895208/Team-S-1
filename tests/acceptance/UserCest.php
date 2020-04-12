<?php

class UserCest

{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/user_login.php');
        $I->fillField('username','admin');
        $I->fillField('password','admin');
        $I->click('Sign in');
    }
    public function addUserEmpty(AcceptanceTester $I)
    {
        $I->wantTo("add an empty user");
        $I->amOnPage('/addUser.php');
        $I->fillField('username','');
        $I->fillField('name','');
        $I->fillField('surname','');
        $I->fillField('email','');
        $I->fillField('userLevel','');
        $I->click('Submit Changes');
        $I->seeCurrentUrlEquals('/Team-S/public/addUser.php');
    }

    public function addUserTestWorks(AcceptanceTester $I)
    {
        $I->wantTo("add a user");
        $I->amOnPage('/addUser.php');
        $I->fillField('username','hashim12');
        $I->fillField('name','hashim');
        $I->fillField('surname','amla');
        $I->fillField('email','hashim@nhs.net');
        $I->fillField('userLevel','1');
        $I->click('Submit Changes');
        $I->seeCurrentUrlEquals('/Team-S/public/users.php');
    }

    public function addEmptyUser(AcceptanceTester $I)
    {
        $I->wantTo("verify");
        $I->amOnPage('/addUser.php');
        $I->fillField('username','');
        $I->fillField('name','');
        $I->fillField('surname','');
        $I->fillField('email','');
        $I->fillField('userLevel','');
        $I->click('Submit Changes');
        $I->seeCurrentUrlEquals('/Team-S/public/addUser.php');
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
        $I->seeCurrentUrlEquals('/Team-S/public/users.php');
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
        $I->seeCurrentUrlEquals('/Team-S/public/editUser.php');
    }

    public function editUserTestWorks(AcceptanceTester $I)
    {
        $I->wantTo("verify");
        $I->amOnPage('/editUser.php?id=74');
        $I->fillField('username','testingyo');
        $I->fillField('name','again');
        $I->fillField('surname','testing');
        $I->fillField('email','nbaakza@kings.nhs.uk');
        $I->fillField('userLevel','3');
        $I->click('Submit');
        $I->seeCurrentUrlEquals('/Team-S/public/users.php');
        $I->see('testingyo');
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
        $I->seeCurrentUrlEquals('/Team-S/public/editUser.php');
    }

}

?>