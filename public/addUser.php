<?php require_once('../private/initialise.php'); ?>
    <div class="public">
        <?php include(SHARED_PATH . '/header.php'); ?>
        <?php
        $page_title = 'KCL Paedriatic Liver Service';

        ?>

        <?php







        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user = [];

            $user['username'] = $_POST['username'] ?? '';
            $user['name'] = $_POST['name'] ?? '';
            $user['surname'] = $_POST['surname'] ?? '';
            $user['email'] = $_POST['email'] ?? '';
            $user['password'] = $_POST['password'] ?? '';
            $user['userLevel'] = $_POST['userLevel'] ?? '';

            $result = add_user($user);
            if($result === true) {
                header('Location: users.php');
                exit;
            } else {
                $errors = $result; 
                var_dump($errors);
            }

        }
        ?>
<style>textarea {
        width: 200px;
    }</style>

           <center>
               <h1>Add user</h1>


                            <form method="post" id="form">
                                <div class="form-group" align="center">
                                    <span id="alert_message" style="color:red"></span>
                                    <table>
                                        <tr><td>Username:</td><td> <textarea minlength="2" maxlength="10" required="" name="username" id="username" onfocusout="isEmpty(this,'Username')"  rows="1" cols="10"></textarea></td></tr>
                                        <tr><td>Name:</td><td> <textarea name="name" minlength="2" maxlength="10" id="name" onfocusout="isOnlyCharacter(this,'Name')" required="" name="name" rows="1" cols="10"></textarea></td></tr>
                                        <tr><td>Surname:</td><td> <textarea name="surname" minlength="2" maxlength="10" id="surname" onfocusout="isOnlyCharacter(this,'Surname')" required=""  name="surname" rows="1" cols="10"></textarea></td></tr>
                                        <tr><td>Email:</td><td> <textarea required="" name="email" id="email" onfocusout="ValidateEmail()" name="email" rows="1" cols="10"></textarea></td></tr>
                                        <tr><td>Password:</td><td> <textarea name="password" id="password" onfocusout="isEmpty(this,'Password')" minlength="2" maxlength="32" required="" name="password" rows="1" cols="10"></textarea></td></tr>
                                        <tr><td>userLevel:</td><td> <input type="text" name="userLevel" id="userLevel" onfocusout="isOnlyNumber(this,'UserLevel')" required="" name="userLevel" rows="1" cols="10"></textarea></td></tr>

                                    </table>

                                <button type="button" onclick="validateForm()" class="btn btn-sm btn-primary"><i class="far fa-save"></i> Submit Changes</button>
                            </form>
               <br><br>

                      </center>
<?php include(SHARED_PATH . '/footer.php'); ?>
<script type="text/javascript">
    var append = false;
</script>
<script type="text/javascript">
    function isEmpty(r,e){
       if(r.value.trim()==""){
            if(append)
                document.getElementById("alert_message").innerHTML += e+" can't be empty.</br>";
            else
                document.getElementById("alert_message").innerHTML =e+" can't be empty";
            return true;
       }
       if(append) 
            document.getElementById("alert_message").innerHTML += "";
        else
            document.getElementById("alert_message").innerHTML = "";
       return false;
    }
</script>
<script type="text/javascript">
    function isOnlyCharacter(r,e){
        if(!isEmpty(r,e)){
            if(r.value.length<2){
                if(append)
                    document.getElementById("alert_message").innerHTML += e+" must have more than equal to 2 characters<br/>";
                else
                    document.getElementById("alert_message").innerHTML = e+" must have more than equal to 2 characters";
                return false;
            }
            if(r.value.length>10){
                if(append)
                    document.getElementById("alert_message").innerHTML += e+" must have less than equal to 10 characters<br/>";
                else
                    document.getElementById("alert_message").innerHTML = e+" must have less than equal to 10 characters";
                return false;
            }
            if (/^([a-zA-Z]+\s)*[a-zA-Z]+$/.test(r.value.trim()))
            {
                if(append)
                    document.getElementById("alert_message").innerHTML += "";
                else
                    document.getElementById("alert_message").innerHTML = "";
                return (true)
            }
            if(append)
                document.getElementById("alert_message").innerHTML += e+" can only contain characters<br/>";
            else
                document.getElementById("alert_message").innerHTML = e+"can only contain characters";
            return (false)    
        }
        return false;
    }
</script>
<script type="text/javascript">
    function ValidateEmail() 
    {
        var mail = document.getElementById("email");
        if(!isEmpty(mail,"Mail")){
            mail = mail.value;
            if (/^\w+([\.-]?\w+)*@nhs.net$/.test(mail))
            {
                if(append)
                    document.getElementById("alert_message").innerHTML += "";
                else
                    document.getElementById("alert_message").innerHTML = "";
                return (true)
            }else if (/^\w+([\.-]?\w+)*@[0-9a-zA-Z]+.nhs.uk$/.test(mail))
            {
                if(append)
                    document.getElementById("alert_message").innerHTML += "";
                else
                    document.getElementById("alert_message").innerHTML = "";
                return (true)
            }
            if(append)
                document.getElementById("alert_message").innerHTML += "Invalid Email<br/>";
            else
                document.getElementById("alert_message").innerHTML = "Invalid Email";
            return (false)    
        }
        return false;
        
    }
</script>
<script type="text/javascript">
    function isOnlyNumber(r,e){
        if(!isEmpty(r,e)){
            if (/^\d+$/.test(r.value.trim()))
            {
                if(append)
                    document.getElementById("alert_message").innerHTML += "";
                else
                    document.getElementById("alert_message").innerHTML = "";
                return (true)
            }
            if(append)
                document.getElementById("alert_message").innerHTML += e+" can only contain Numbers<br/>";
            else
                document.getElementById("alert_message").innerHTML = e+" can only contain Numbers";
            return (false)    
        }
        return false;
    }
</script>
<script type="text/javascript">
    function validateForm(){
        document.getElementById("alert_message").innerHTML ="";
        append = true;
        var username = document.getElementById("username");
        var name = document.getElementById("name");
        var surname = document.getElementById("surname");
        var email = document.getElementById("email");
        var password = document.getElementById("password");
        var userLevel = document.getElementById("userLevel");
        var isOkay = true;
        if(isEmpty(username,"Username")){
            isOkay = false;
        }
        if(!isOnlyCharacter(name,"Name")){
            isOkay = false;
        }
        if(!isOnlyCharacter(surname,"Surname")){
            isOkay = false;
        }
        if(!ValidateEmail()){
            isOkay = false;
        }
        if(isEmpty(password,"Password")){
            isOkay = false;
        }
        if(!isOnlyNumber(userLevel,"userLevel")){
            isOkay = false;
        }
        if(isOkay){
            document.getElementById("form").submit();
           
            return true;
        }
        // if(!isEmpty(username,"Username")&&isOnlyCharacter(name,"Name")&&isOnlyCharacter(surname,"Surname")&&ValidateEmail()&&!isEmpty(password,"Password")&&isOnlyNumber(userLevel,"userLevel")){
        //     document.getElementById("form").submit();
           
        //     return true;
        // }
        append = false;
        return false;
    }
</script>
