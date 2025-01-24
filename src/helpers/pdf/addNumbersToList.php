<?php

// Function to add custom numbering and styling
function addNumbersToList($content)
{
	// Convert <ol> lists to numbered lists with custom styling
	$content = preg_replace_callback(
		'/<ol>(.*?)<\/ol>/is', // Match <ol>...</ol>
		function ($matches) {
			// The list can be <ol> or <ul>, so check which one matched
			$listItems = '';
			$itemsContent = $matches[1] ?: $matches[2];  // Get content inside <ol> or <ul>

			preg_match_all('/<li data-list="ordered">(.*?)<\/li>/is', $itemsContent, $items); // Extract <li> items

			foreach ($items[1] as $index => $item) {
				$number = $index + 1;
				// Create a table row for each list item
				$listItems .= "<tr><td style='width: 3%; vertical-align: top; text-align: right; border: 0;'>$number.</td><td style='width: 2%; border: 0;'></td><td style='width: 90%; border: 0;'>$item</td></tr>";
			}

			// Wrap the <tr> rows inside a <table> tag
			return "<table style='width: 100%; margin-left: 5%; border: 0;'>$listItems</table>";
		},
		$content
	);

	return $content;
}
