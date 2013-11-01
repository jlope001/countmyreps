<?php

/**
 * format_as_table
 * @param  array  $all_records an array from the data model
 * @return string              an html table
 */
function format_as_table($all_records){

    // initialize empty array
    $init_array = Array();
    // quick fix. What is needed is an auto daily calendar type deal. For now, just manually create months passed (Jan.)
    for ($d = 1; $d <= 31; $d++){
	if ($d < 10) $d = "0$d";
	$init_array["2013-01-$d"] = array('burpees' => 0);
    }
    // feb 
    for ($d = 1; $d <= 28; $d++){
	if ($d < 10) $d = "0$d";
	$init_array["2013-02-$d"] = array('burpees' => 0);
    }
    // mar 
    for ($d = 1; $d <= 31; $d++){
	if ($d < 10) $d = "0$d";
	$init_array["2013-03-$d"] = array('burpees' => 0);
    }
    for ($d = 1; $d <= date('d'); $d++){
        // add leading zero if needed
	if ($d < 10) $d = "0$d";
	// make the key values equal to dates
	#$init_array[date('Y-m-') . $d] = array('situps' => 0, 'pushups' => 0, 'pullups' => 0);
	$init_array[date('Y-m-') . $d] = array('burpees' => 0);
    }

    // merge to arrays together, over writing with records passed in
    $all_records = array_merge($init_array, $all_records);

    #$content = "<table class='data'><th>Date/Time</th><th>Sit-ups</th><th>Push-ups</th><th>Pull-ups</th>";
    $content = "<table class='data'><th>Date/Time</th><th>Burpees</th>";
    foreach ($all_records as $date => $exercises_array){
        $content .= "<tr><td>$date</td>";
	foreach ($exercises_array as $index => $rep){
	    if ($index == "burpees")  $burpees = $rep;
	    #if ($index == "situps")  $situps  = $rep;
	    #if ($index == "pushups") $pushups = $rep;
	    #if ($index == "pullups") $pullups = $rep;
        }
        #$content .= "<td>$situps</td><td>$pushups</td><td>$pullups</td>";
        $content .= "<td>$burpees</td>";
        $content .= "</tr>";
    }
    $content .= "</table>";

    return $content;
}
