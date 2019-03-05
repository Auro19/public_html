
<head>
<script type="text/javascript">

/*
Clear default form value script- by JavaScriptKit.com
Featured on JavaScript Kit (http://javascriptkit.com)
Visit javascriptkit.com for 400+ free scripts!
*/

function clearText(thefield){
if (thefield.defaultValue==thefield.value)
thefield.value = ""
} 
</script>
</head>

<?php

// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );

// Variables for Email.


$myemail = $params->get('from_email');
$subject = $params->get('from_subject');
$thanks = $params->get('thanks');
$error = $params->get('error');
$introduction = $params->get('introduction');


$op = $_POST[op];

if($op == 'contact')
{
    $name = stripslashes($_POST[name]);
    $email = stripslashes($_POST[email]);
    $text = stripslashes($_POST[text]);
    $referer = $_POST[referer];
    $remote_host = $_SERVER[REMOTE_ADDR];
    $server = $_SERVER[SERVER_NAME];
    $browser = $_SERVER[HTTP_USER_AGENT];

    if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$",$email)) 
    { 
        $status = "$error";
               $introduction = "";
    }
    if(!$name)
    {
        $status .= "$error";
               $introduction = "";
    }

  

    if(!$status)
    {
        $header = "From: $email

";

        $message = "
            Name: $name
            Email: $email
    

            $text
        ";

        if(mail($myemail, $subject, $message, $header))
        {
            $status = "$thanks" ;
            $introduction = "";
        }
        else
        {
            
            $status = "$error";
       $introduction = "";
        }

    }
   
}    


     

// Now check the referer page and ensure it's a proper URL

$referer = $_SERVER[HTTP_REFERER];

if(!preg_match('#^http\\:\\/\\/[a-z0-9\-]+\.([a-z0-9\-]+\.)?[a-z]+#i', $referer))
{
    unset($referer);
}

?>
<?php print $introduction; ?>
<?php print $status; ?><br><br>


<form method="post" action="<?php print $_SELF; ?>">
<input type="hidden" name="op" value="contact"/>
<input type="hidden" name="referer" value="<?php print $referer; ?>"/>


<input name="name" size="25" value="Su nombre va aqui"onFocus="clearText(this)"/><br><br>

<input name="email" size="25" value="Dirección de email"onFocus="clearText(this)"/><br><br>

<textarea name="text" cols="20" rows="10"value=""></textarea><br><br>


<input type="submit" value="Contactar"/>
</form>