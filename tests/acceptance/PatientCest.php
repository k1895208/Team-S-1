<?php

class PatientCest

{

    public function registerPatientEmpty(AcceptanceTester $I) 
    {
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
        $I->click('btnsubmit');
        $I->canSee('REFERRAL FORM');
    }

    public function registerPatientTestOne(AcceptanceTester $I)
    {
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
        $I->fillField('email','hashim@gmail.com');
        $I->fillField('address','Street 1');
        $I->fillField('postcode','39460');
        $I->fillField('homenumber','03448857560');
        $I->fillField('mobilenumber','03448857560');
        $I->fillField('gpaddress','Street 1');
        $I->fillField('gpnumber','03448857560');
        $I->click('btnsubmit');
        $I->canSee('REFERRAL FORM');

    }

    public function registerPatientTestTwo(AcceptanceTester $I)
    {
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
        $I->click('btnsubmit');
        $I->canSee('REFERRAL FORM');
    }

    public function registerPatientTestThree(AcceptanceTester $I)
    {
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
        $I->click('btnsubmit');
        $I->canSee('REFERRAL FORM');
    }


}
?>
