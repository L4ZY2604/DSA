<?php

$records_per_page = 5;
$total_pages = 5; 
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $records_per_page;

echo "Displaying records " . ($offset + 1) . " to " . min($offset + $records_per_page, $records_per_page * $total_pages) . ".<br>";


echo "<div class='pagination'>";

if ($current_page > 1) echo "<a href='?page=" . ($current_page - 1) . "'>&laquo; Previous</a> ";

for ($i = 1; $i <= $total_pages; $i++) {

    echo ($i == $current_page) ? "<strong>$i</strong> " : "<a href='?page=$i'>$i</a> ";
}
if ($current_page < $total_pages) echo "<a href='?page=" . ($current_page + 1) . "'>Next &raquo;</a>";
echo "</div>";
?>