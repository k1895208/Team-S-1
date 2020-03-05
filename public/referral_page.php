<?php require_once('../private/initialise.php'); ?>
<?php $page_title = 'Register patient'; ?>
<div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>

<?php
if(is_post_request()){
  $consultant_name = $_POST["consultantName"];
  $consultant_specialty = $_POST["consultantSpecialty"];
  $organisation_hospital_name = $_POST["orgName"];
  $organisation_hospital_number = $_POST["orgNumber"];
  $bleep_number = $_POST["bleepNumber"];
  $is_patient_aware = $_POST["isAware"];
  $is_interpreter_needed = $_POST["isInterpreterNeeded"];
  $interpreter_language = $_POST["interpreterLanguage"];
  $kch_doc_name = $_POST["kchDocName"];
  $current_issue = $_POST["currentIssue"];
  $history_of_present_complaint = $_POST["complaintHistory"];
  $family_history = $_POST["familyHistory"];
  $current_feeds = $_POST["currentFeeds"];
  $medications = $_POST["medications"];
  $other_investigations = $POST["otherInvestigations"];
  $datetime = $_POST["datetime"];


  if(count(array_filters($_POST))!=count($_POST)){
    echo 'label class = "text-danger">Please fill in all required fields</label';
  }
  else {
    //redirect_to
  }
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Referral Form</title>
        <!--<link rel="stylesheet" href="style.css">-->
    </head>
<body>
    <h1><b>REFERRAL FORM</b></h1>

<h3> <div>Patient Details(Please complete all fields) </div></h3>
<h3><b><div> Referral is NOT accepted without filling ALL Fields in this page </div></b></h3>
<br>
<!--<form class = "form" action="contactform.php" method="post">  -->
    <!-- patient details form -->
    <form action="<?php echo url_for("/referral_page.php"); ?>" method="post">    <!-- Consultant Name -->
      <div class="field-column">
      <label>Consultant Name</label>
         <input type="text" name="consultantName" placeholder="Required" required>
        </div>
    <!-- Consultant Specialty -->
    <div class="field-column">
      <label>Consultant Specialty</label>
       <input type="text" name="consultantSpecialty" >
    </div>
    <!-- Organisation Name -->
    <div class="field-column">
     <label>Organisation Hospital Name</label>
      <input type="text" name="orgName" required>
   </div>
     <!-- Organisation Hospital Number -->
     <div class="field-column">
      <label>Organisation Hospital Number</label>
       <input type="number" name="orgNumber" required>
    </div>
     <!-- Bleep Number -->
     <div class="field-column">
      <label>Bleep Number</label>
       <input type = "number" name = "bleepNumber" required>
    </div>

     <!-- Patient Aware -->
     <div class="field-column">
      <label>Is the patient aware of the referral?</label>
        <input type = "checkbox" name = "isAware" required>
     </div>

     <!-- Interpreter Needed -->
     <div class="field-column">
      <label>Will there be a language interpreter needed?</label>
       <input type = "checkbox" name = "isInterpreterNeeded" required>
    </div>
     <!-- Interpreter Language -->
     <div class="field-column">
      <label>Interpreter language(To be left empty if no interpreter is needed)</label>
      <input type = "text" name = "interpreterLanguage" optional>
    </div>
     <!-- Doctor at Kings -->
     <div class="field-column">
      <label>Doctor at King's College Hospital this case was discussed with(To be left empty if the case wasn't discussed with anyone at King's)</label>
      <input type="text" name="kchDocName">
    </div>

    <!-- Asking for indication of urgent symptoms -->
    <div class="field-column">
      <label>Does the patient have any of the following symptoms?</label>

      <!-- The checkboxes for urgent symptoms-->
        <div class="checkbox-container">
          <input type = "checkbox" name = "hasAbnormalClotting" required> <label> Abnormal clotting</label>
        </div>
        <div class="checkbox-container">
          <input type = "checkbox" name = "hasConjugatedJaundice" required> <label> Conjugated jaundice</label>
        </div>
        <div class="checkbox-container">
          <input type = "checkbox" name = "hasPaleStools" required> <label> Pale stools</label>
        </div>
        <div class="checkbox-container">
          <input type = "checkbox" name = "hasAcuteHepatitisPlus" required> <label> Acute hepatitis with elevated transaminase levels and jaundice</label>
        </div>
        <div class="checkbox-container">
          <input type = "checkbox" name = "hasParacetamolOD" required> <label> Paracetamol overdose</label>
        </div>
      </div>

     <!-- Current Issue -->

     <div class="field-column">
      <label>Current Issue</label>
      <textarea name= "currentIssue"> </textarea>
    </div>
     <!-- History of Present Complaint -->
     <div class="field-column">
      <label>History of Present Complaint</label>
       <textarea name = "complaintHistory"> </textarea>
    </div>
     <!-- Family History -->
     <div class="field-column">
      <label>Family History</label>
        <textarea name = "familyHistory"> </textarea>
    </div>
    <!-- Current Feeds -->
    <div class="field-column">
     <label>Current Feeds</label>
       <textarea name = "currentFeeds"> </textarea>
   </div>
   <!-- Medications  -->
   <div class="field-column">
    <label>Medications</label>
      <textarea name = "medications"> </textarea>
  </div>
  <!-- Other Investigations -->
  <div class="field-column">
   <label>Other Investigations</label>
     <textarea name = "otherInvestigations"> </textarea>
 </div>
 <!-- Family History -->
 <div class="field-column">
  <label>Date and Time</label>
    <input type = "datetime-local" name="datetime" required>
</div>
     <!-- submit -->
     <!--<input type ="submit" name="submit"> -->
     <div class="field-column">
     <button type = "submit" name="submit">Submit</button>
</div>
     <!-- reset button -->
     <div class="field-column">
     <button type = "reset" name="reset">Reset</button>
    </div>
</form>


<?php include(SHARED_PATH . '/footer.php'); ?>
