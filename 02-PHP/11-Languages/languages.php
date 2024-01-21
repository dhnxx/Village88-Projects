<?php

$languages = array('PHP', 'JS', 'Ruby');


//* LOOP 
echo "<h1> LOOP </h1> <br>";
echo "<label for = 'languages'>Pick a language</label>";
echo "<select name = 'languages' id='languages'>";

for ($i = 0; $i < count($languages); $i++) {
    echo "<option value = '{$languages[$i]}'>{$languages[$i]}</option>";
}
echo "</select>";

//* FOR EACH LOOP 
echo "<h1> FOR EACH LOOP </h1> <br>";
echo "<label for = 'languages'>Pick a language</label>";
echo "<select name = 'languages' id='languages'>";

foreach ($languages as $language) {
    echo "<option value = '{$language}'>{$language}</option>";
}
echo "</select>";

//* ADD 2 NEW STATES 
echo "<h1 style='color:red'> ADDED HTML AND CSS </h1>";
array_push($languages, "HTML", "CSS");

//* Display a new drop-down menu with the 5 unique states.

echo "<label for = 'languages'>Pick a language</label>";
echo "<select name = 'languages' id='languages'>";

foreach ($languages as $language) {
    echo "<option value = '{$language}'>{$language}</option>";
}
echo "</select>";
