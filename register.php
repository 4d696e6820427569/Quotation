<?php

echo "<html>";
echo "<head>";
echo "<link rel='stylesheet' type='text/css' href='styles.css' />";
echo "</head>";
echo "<body>";
echo "<h3>Register</h3>";
echo "<div class='generalBox inputFields'>";
echo "<form method='post' autocomplete='off' action='controller.php'>";
echo "<input id='userName' type='text' name='userName' placeholder='Username'><br>";
echo "<input id='password' type='password' name='password' placeholder='Password'><br><br>";
echo "<input type='submit' value='Register'>";
echo "</form>";
echo "</div>";
echo "</body>";
echo "</html>";
?>