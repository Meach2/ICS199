<?php include 'header.php' ; ?>
<link href='css/style.css' rel='stylesheet' />
<br>
<br>
<h1 class="centeredText"> Welcome to Green Grocer, to serve you better please read the following legal information and accept if you agree prior to registration! </h1> 
<br>
<br>

<p class="centeredText"> Green Grocer is 100% compliant with the General Data Protection Regulation (GDPR) .To learn more about how we collect, keep, and process your private information in compliance with GDPR, please view our privacy policy. This policy was last updated on 6/6/2021.
<br>
Under the General Data Protection Regulation (GDPR) (EU) 2016/679, we have a legal duty to protect any information we collect from you. Information contained in this email and any attachments may be privileged or confidential and intended for the exclusive use of the original recipient. If you have received this email by mistake, please advise the sender immediately and delete the email, including emptying your deleted email box.
<br>
Any email and files/attachments transmitted with it are confidential and are intended solely for the use of the individual or entity to whom they are addressed. If this message has been sent to you in error, you must not copy, distribute or disclose of the information it contains. Please notify us immediately and delete the message from your system.
<br>
Green Grocer is committed to ensuring the security and protection of the personal information that we process, and to provide a compliant and consistent approach to data protection. If you have any questions related to our GDPR compliance, please contact our Data Protection Officer or make a Data Subject Access Request.
<br>
You are receiving this email because you opted in to receiving emails from Green Grocer. If you would rather not receive this type of communication, please click here to unsubscribe or click here to adjust your preferences.
</p>
<?php 
 
$server = 'localhost';
$user = 'root';
$password = '';
$db = 'ics199greengrocerdb';
if (isset($_SESSION["userid"])) {
$USERID = $_SESSION['userid']; //get user id from session

$dbc = new mysqli($server,$user,$password,$db); //connect to db 
$query = "SELECT * FROM users WHERE user_name = '$USERID'"; //query to get data from users table based of session 
$result = mysqli_query ($dbc, $query); //run query
$row = $result->fetch_assoc();

$legal = $row['legalagreement'];
}

if (isset($legal) && $legal == 1 && isset($_SESSION["userid"])) {
    echo "
<form action='shoppingcart.php' method='get'>
  <button type='submit' value='Submit' class='submitCancelButtons btn-success'>I Still Accept</button>
</form>
<form action='decline.php'>
  <button type='cancel' class='submitCancelButtons btn-danger' onclick='javascript:window.location='index.php' >I have changed my mind, I Decline</button>
</form> ";

}
elseif (isset($_SESSION['userid']) && isset($legal) && $legal == 0){
  echo "
<form action='accept.php' method='get'>
  <button type='submit' value='Submit' class='submitCancelButtons btn-success'>I accept</button>
</form>
<form action='decline.php'>
  <button type='cancel' class='submitCancelButtons btn-danger' onclick='javascript:window.location='decline.php'>Decline</button>
</form> ";
} 
else {
echo "
<form action='userSignUp.php' method='get'>
  <button type='submit' value='Submit' class='submitCancelButtons btn-success'>Accept</button>
</form>
<form action='index.php'>
  <button type='cancel' class='submitCancelButtons btn-danger' onclick='javascript:window.location='index.php'>Decline</button>
</form> ";
}
?>
<?php include 'footer.php' ; ?>