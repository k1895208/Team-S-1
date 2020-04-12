<?php

class PatientCest

{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/user_login.php');
        $I->fillField('username','admin');
        $I->fillField('password','admin');
        $I->click('Sign in');
    }

    public function registerPatientEmpty(AcceptanceTester $I) 
    {
        $I->wantTo("add an empty patient");
        $I->amOnPage('/register_patient.php');
        $I->fillField('lastname2','');
        $I->fillField('firstname2','');
        $I->fillField('mail2','');
        $I->fillField('lastname','');
        $I->fillField('firstname','');
        $I->fillField('nhsnumber','');
        $I->fillField('dob','');
        $I->fillField('refname','');
        $I->fillField('ref_mail','');
        $I->fillField('refhospital','');
        $I->fillField('gender','');
        $I->fillField('email','');
        $I->fillField('address','');
        $I->fillField('postcode','');
        $I->fillField('homenumber','');
        $I->fillField('mobilenumber','');
        $I->fillField('gpaddress','');
        $I->fillField('gpnumber','');
        $I->click('Submit');
        $I->seeCurrentUrlEquals('/Team-S/public/register_patient.php');
    }

    public function registerPatientWorks(AcceptanceTester $I)
    {
        $I->wantTo("add a patient");
        $I->amOnPage('/register_patient.php');
        $I->fillField('lastname2','hashim');
        $I->fillField('firstname2','amla');
        $I->fillField('mail2','hashim@nhs.net');
        $I->fillField('lastname','hashim');
        $I->fillField('firstname','amla');
        $I->fillField('nhsnumber','1234567890');
        $I->fillField('dob','2020-04-08');
        $I->fillField('refname','Noor');
        $I->fillField('ref_mail','noorbaakza@gmail.com');
        $I->fillField('refhospital','NHS');
        $I->fillField('gender','m');
        $I->fillField('email','hashim@40gmail.com');
        $I->fillField('address','Street 1');
        $I->fillField('postcode','39460');
        $I->fillField('homenumber','03448857560');
        $I->fillField('mobilenumber','03448857560');
        $I->fillField('gpaddress','Street 1');
        $I->fillField('gpnumber','03448857560');
        $I->click('Submit');
        $I->seeCurrentUrlEquals('/Team-S/public/patients.php');
        $I->see('hashim');
        $I->see('amla');

    }

    public function registerPatientTestTwo(AcceptanceTester $I)
    {
        $I->wantTo("verify");
        $I->amOnPage('/register_patient.php');
        $I->fillField('lastname2','899383');
        $I->fillField('firstname2','0009300');
        $I->fillField('mail2','noorbaakza@nhs.net');
        $I->fillField('lastname','sheikh');
        $I->fillField('firstname','lala');
        $I->fillField('nhsnumber','9990');
        $I->fillField('dob','2000-09-12');
        $I->fillField('refname','928839');
        $I->fillField('ref_mail','902838');
        $I->fillField('refhospital','kcl');
        $I->fillField('gender','8');
        $I->fillField('email','baakza@yahoo.com');
        $I->fillField('address','nvkdnak');
        $I->fillField('postcode','82229');
        $I->fillField('homenumber','jdjsj');
        $I->fillField('mobilenumber','cbsnjs');
        $I->fillField('gpaddress','ifihwih');
        $I->fillField('gpnumber','whfjw');
        $I->click('Submit');
        $I->seeCurrentUrlEquals('/Team-S/public/register_patient.php');
    }

    public function registerPatientTestThree(AcceptanceTester $I)
    {
        $I->wantTo("verify");
        $I->amOnPage('/register_patient.php');
        $I->fillField('lastname2','');
        $I->fillField('firstname2','');
        $I->fillField('mail2','noorbaakza@nhs.net');
        $I->fillField('lastname','sheikh');
        $I->fillField('firstname','lala');
        $I->fillField('nhsnumber','9990888888');
        $I->fillField('dob','');
        $I->fillField('refname','928839');
        $I->fillField('ref_mail','902838');
        $I->fillField('refhospital','');
        $I->fillField('gender','8');
        $I->fillField('email','baakza@yahoo.com');
        $I->fillField('address','nvkdnak');
        $I->fillField('postcode','82229');
        $I->fillField('homenumber','jdjsj');
        $I->fillField('mobilenumber','cbsnjs');
        $I->fillField('gpaddress','ifihwih');
        $I->fillField('gpnumber','888889');
        $I->click('Submit Changes');
        $I->seeCurrentUrlEquals('/Team-S/public/register_patient.php');
    }

    public function editPatientEmpty(AcceptanceTester $I)
    {
        $I->wantTo("verify");
        $I->amOnPage('/editPatient.php');
        $I->fillField('first_name','');
        $I->fillField('last_name','');
        $I->fillField('date_of_birth','');
        $I->fillField('sex','');
        $I->fillField('email','');
        $I->fillField('home_address','');
        $I->fillField('postcode','');
        $I->fillField('home_phone','');
        $I->fillField('mobile_phone','');
        $I->fillField('gp_address','');
        $I->fillField('gp_phone','');
        $I->fillField('accessCode','');
        $I->click('Submit Changes');
        $I->seeCurrentUrlEquals('/Team-S/public/register_patient.php');

    }

    public function editPatientTestWorks(AcceptanceTester $I)
    {
        $I->wantTo("verify");
        $I->amOnPage('/editPatient.php');
        $I->fillField('first_name','noor');
        $I->fillField('last_name','baakza');
        $I->fillField('date_of_birth','02-03-2000');
        $I->fillField('sex','f');
        $I->fillField('email','nooriebaakza@yahoo.com');
        $I->fillField('home_address','zamzama street');
        $I->fillField('postcode','tw7 5uv');
        $I->fillField('home_phone','9372979');
        $I->fillField('mobile_phone','18908018081');
        $I->fillField('gp_address','nsknvndnv');
        $I->fillField('gp_phone','288082');
        $I->fillField('accessCode','1222');
        $I->click('Submit Changes');
        $I->seeCurrentUrlEquals('/Team-S/public/patients.php');

    }

    public function editPatientTestTwo(AcceptanceTester $I)
    {
        $I->wantTo("verify");
        $I->amOnPage('/editPatient.php');
        $I->fillField('first_name','94950');
        $I->fillField('last_name','144453');
        $I->fillField('date_of_birth','02-12-2000');
        $I->fillField('sex','');
        $I->fillField('email','');
        $I->fillField('home_address','iriwihgh');
        $I->fillField('postcode','849822');
        $I->fillField('home_phone','sfvnkln');
        $I->fillField('mobile_phone','knkwkn');
        $I->fillField('gp_address','');
        $I->fillField('gp_phone','wkdmkcwkmc');
        $I->fillField('accessCode','yoyo');
        $I->click('Submit Changes');
        $I->seeCurrentUrlEquals('/Team-S/public/register_patient.php');

    }

    
}

?>