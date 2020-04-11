<?php require_once('../private/initialise.php'); ?>
    <div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>
<?php
$page_title = 'KCL Paedriatic Liver Service';
$appointment_set = find_all_appointments();

settype($var, 'integer');
$var = $_GET["delete"] ?? '';
if (isset($_GET["delete"])) {
    delete_appointment($var);
    header('Location: appointments.php');
}
if (isset($_POST['submitbtn'])) {
    $q = $_POST['search'];
    $appointment_set = search_by_date($q);
    
}       
        
?>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">      
        
        <style>

            tr:nth-child(odd) {background-color: #f2f2f2;}

            table {
                border-collapse: collapse;
                width: 50%;
            }
        </style>

    <div class="public">

        <title>KCL Paedriatic Liver Service</title>


        <center>


        <h1 id="title-page">Appointments</h1>

           
            <form method="post" class="example" id="searchbar" action="appointments.php" style="margin:auto;max-width:500px">
                    <input type="text" name="search" id="searchinput" placeholder="Enter Date to Search (yyyy-mm-dd)">
                    <button name="submitbtn" id="searchbutton" type="submit" style = " margin-left :10px; height:5%"><i class="fa fa-search"></i></button>
                </form>  
            <br>

            <center> <br><td><a href=add_appointment.php>Add an appointment</a></td> </center>

            <br>

                <table>
                    <tr>
                        <th id = "darkblue"><b>ID</b></th>
                        <th id = "lightblue"><b>Patient Name</b></th>
                        <th id = "darkblue"><b>Date</b></th>
                        <th id = "lightblue"><b>Admission</b></th>
                        <th id = "darkblue"><b>Time</b></th>

                        <th id = "lightblue" colspan="3"><b>Manage</b></th>
                    </tr>
                    <?php
                    while ($appointment = mysqli_fetch_assoc($appointment_set)) {
         echo "<tr><td >" . $appointment["id"] . "</td>
                    <td>" . $appointment["first_name"].' '.$appointment["last_name"]. "</td>
                    <td>" . $appointment["date"] . "</td>
                    <td>" . $appointment["option_admission"] . "</td>
                    <td>" . $appointment["time"] . "</td>

                <td><a href=?delete=" . $appointment["id"] . " onclick=\"return confirm('Are you sure that you want to delete this Appointment?');\">Delete</a></td></tr>";
                    } ?>

                </table>
           

        </center>

    </div>

    <style>
        a {
                background-color: white;
    box-shadow: -1 1px 0 blue;
    color: rgb(42,103,204);
    padding: 0.3em 1em;
    position: relative;
    text-decoration: none;
    text-transform: uppercase;
} 

a:hover {
  background-color: rgb(19, 26, 102);
  cursor: pointer;
}

a:active {
  box-shadow: none;
  top: 5px;
}
</style>
<?php include(SHARED_PATH . '/footer.php'); ?>
