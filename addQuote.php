<?php

echo "<html>";
echo "<head>";
echo "<link rel='stylesheet' type='text/css' href='styles.css' />";
echo "</head>";
echo "<body>";
echo "<h3>Add a quote</h3>";
echo "<div class='generalBox inputFields'>";
echo "<form method='post' autocomplete='off' action='controller.php'>";
echo "<textarea id='addQuote' type='textarea' name='addQuote' placeholder='Enter a new quote' cols='70' rows='10'></textarea><br>";
echo "<input id='author' type='text' name='author' placeholder='Author'><br><br>";
echo "<input type='submit' value='Add Quote'>";
echo "</form>";
echo "</div>";
echo "</body>";
echo "</html>";
?>