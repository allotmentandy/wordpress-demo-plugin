<?php

  echo '<h1>My external Submenu Page</h1>';
 
// Define the RSS feed URL
$rss_feed_url = 'https://wordpress.tv/feed/';

// Read the RSS feed
$rss_feed = simplexml_load_file($rss_feed_url);

// Create a table to display the RSS feed items
echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>Title</th>';
echo '<th>Description</th>';
echo '<th>Link</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

// Loop through the RSS feed items and display them in the table
foreach ($rss_feed->channel->item as $item) {
  echo '<tr>';
  echo '<td>' . $item->title . '</td>';
  echo '<td>' . $item->description . '</td>';
  echo '<td><a href="' . $item->link . '">Link</a></td>';
  echo '</tr>';
}

// End the table
echo '</tbody>';
echo '</table>';

?>
