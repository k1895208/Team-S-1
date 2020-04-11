<?php

class AppointmentsCest
{

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
            $I->click('submit');
            $I->canSee('Appointment has been created');
            $I->canSeeInCurrentUrl('/add_appointment.php');
            

        }

        public function appointmentCheckHTML(AcceptanceTester $I)
        {
            $I->seeElement('Appointment has been created');
            $I->dontSeeElement('error');
        }


    public function tryToTest(AcceptanceTester $I)
    {
    }
        

}
