signin_page.php - here the customer logs into their account using the username and the corresponding password

//have user type username
//and email
//new password
//confirm password
//make sure user is valid
//if valid add user to database and send 
//else if user is not valid print error and send back to this page
<html>
<body>
Welcome back! Please enter your information below:
</br>
</br>
<form action="backend_signin_page.php" method="get">
</br>
Username: <input type="text" name="username" />
</br>
Password: <input type="text" name="password" />
</br>
<input type="submit" />

</form>

</body>
</html>
