<?php

function populateDropdown($coaches, $select = ""){
    $html_dropdown = "";
    foreach ($coaches as $coach) {
        $selected = $select == $coach->first_name ? "selected" : "";
        $html_dropdown .= "<option $selected value='$coach->id'>$coach->first_name </option>";
    }

    return $html_dropdown;
}