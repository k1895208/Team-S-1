<?php

class AppointmentsCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/user_login.php');
        $I->fillField('username','admin');
        $I->fillField('password','admin');
        $I->click('Sign in');
        
    }
        public function appointmentSuccessful(AcceptanceTester $I)
        {
            $I->amOnPage('/add_appointment.php');
            $I->fillField('patient_id','150');
            $I->fillField('date','2020-04-11');
            $I->fillField('option_admission','daycase');
            $I->fillField('time','2-3pm test');
            $I->click('submit');
            $I->click('submit');
            $I->canSee('Appointment has been created');
            $I->canSeeInCurrentUrl('/add_appointment.php');
            
        }

        public function appointmentEmptyName(AcceptanceTester $I)
        {
            $I->amOnPage('/add_appointment.php');
            $I->fillField('patient_id','');
            $I->fillField('date','2020-04-11');
            $I->fillField('option_admission','daycase');
            $I->fillField('time','2-3pm?');
            $I->click('submit');
            $I->canSee('Please select an item in the list.');
            $I->canSeeInCurrentUrl('/add_appointment.php');
            
        }


        public function appointmentEmptyDate(AcceptanceTester $I)
        {
            $I->amOnPage('/add_appointment.php');
            $I->fillField('patient_id','143');
            $I->fillField('date','');
            $I->fillField('option_admission','daycase');
            $I->fillField('time','2-3pm?');
            $I->click('submit');
            $I->canSee('Please fill in this field.');
            $I->canSeeInCurrentUrl('/add_appointment.php');
            
        }

        public function appointmentEmptyTime(AcceptanceTester $I)
        {
            $I->amOnPage('/add_appointment.php');
            $I->fillField('patient_id','143');
            $I->fillField('date','2020-04-11');
            $I->fillField('option_admission','daycase');
            $I->fillField('time','');
            $I->click('submit');
            $I->canSee('Please fill in this field.');
            $I->canSeeInCurrentUrl('/add_appointment.php');
            
        }


        public function appointmentViewPage(AcceptanceTester $I)
        {
            $I->amOnPage('/appointments.php');
            $I->see('Appointments');
            $I->seeLink('ADD AN APPOINTMENT');
            $I->see('Appointments confirmed by the patients');
            $I->see('Patient Name');
            $I->see('Date');
            $I->see('Admission');
            $I->see('Time');
            $I->see('Manage');
            $I->see('Appointments awaiting confirmation by the patients');
            $I->see('Patient Name');
            $I->see('Date');
            $I->see('Admission');
            $I->see('Time');
            $I->see('Manage');
            $I->canSeeInCurrentUrl('/appointments.php');

        }
        

    public function tryToTest(AcceptanceTester $I)
    {
    }
        

}