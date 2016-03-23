<?php
/* Functions for PM database example. */

/* Load sample data, an array of associative arrays. */
include "pms.php";

/* Search sample data for $name or $year or $state from form. */
function search($pmsearch) {
    global $pms; 
    // Filter $pms by $name
    $pmsearch = trim($pmsearch);
    if (!empty($pmsearch)) {
	$results = array();
	foreach ($pms as $pm) {
	    if ((stripos($pm['name'], $pmsearch) !== FALSE) || 
		   	(strpos($pm['from'], $pmsearch) !== FALSE) || 
		   	(strpos($pm['to'], $pmsearch) !== FALSE) || 
		   	(stripos($pm['state'], $pmsearch) !== FALSE) ||
		   	(stripos($pm['party'], $pmsearch) !== FALSE)) {
		$results[] = $pm;
	    }
	}
	$pms = $results;
    }
    return $pms;
}
?>
