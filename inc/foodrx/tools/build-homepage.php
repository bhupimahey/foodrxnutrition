<?php
/**
 * Build trimmed Food Rx homepage content from demo Home page XML.
 */
$xml_path = __DIR__ . '/../../../framework/admin/inc/demo-content/main/content.xml';
$xml = file_get_contents($xml_path);

if (!preg_match(
	'#<item>\s*<title><!\[CDATA\[Home\]\]></title>\s*<link>https://healthy-living\.cmsmasters\.studio/demo/</link>.*?<content:encoded><!\[CDATA\[(.*?)\]\]></content:encoded>#s',
	$xml,
	$match
)) {
	fwrite(STDERR, "Home content not found in content.xml\n");
	exit(1);
}

$raw = $match[1];

if (!preg_match_all('#(\[cmsmasters_row[^\]]*\].*?\[/cmsmasters_row\])#s', $raw, $matches)) {
	fwrite(STDERR, "No rows found\n");
	exit(1);
}

$rows = $matches[1];

$delete_indexes = array(2, 3, 4, 6, 8, 9, 10, 11, 12, 13, 14, 15);

$out = array();

foreach ($rows as $index => $row) {
	if (in_array($index, $delete_indexes, true)) {
		continue;
	}

	if ($index === 1) {
		$row = strip_service_boxes($row);
	} elseif ($index === 5) {
		$row = image_only_row($row, 130, 130);
	} elseif ($index === 7) {
		$row = image_only_row($row, 110, 125);
	} elseif ($index === 16) {
		$row = strip_contact_info_boxes($row);
	}

	$out[] = $row;
}

$content = implode('', $out);
$content = strip_learn_more_buttons($content);

$export = "<?php\n/**\n * Trimmed CMSMasters homepage builder content for Food Rx.\n *\n * @package Healthy Living\n */\n\nif (!defined('ABSPATH')) {\n\texit;\n}\n\nreturn " . var_export($content, true) . ";\n";

file_put_contents(__DIR__ . '/../homepage-content.php', $export);

echo 'Rows kept: ' . count($out) . "\n";
echo 'Final length: ' . strlen($content) . "\n";

function strip_learn_more_buttons($row) {
	return preg_replace('#\[cmsmasters_button[^\]]*\]Learn More\[/cmsmasters_button\]#', '', $row);
}

function strip_service_boxes($row) {
	$row = preg_replace('#\[cmsmasters_heading[^\]]*\][^[]+\[/cmsmasters_heading\]#', '', $row);
	$row = strip_learn_more_buttons($row);
	return $row;
}

function image_only_row($row, $padding_top, $padding_bottom) {
	if (!preg_match('#(\[cmsmasters_row[^\]]*\])#', $row, $open)) {
		return $row;
	}

	$attrs = $open[1];
	$attrs = preg_replace('#data_padding_top="[^"]*"#', 'data_padding_top="' . $padding_top . '"', $attrs);
	$attrs = preg_replace('#data_padding_bottom="[^"]*"#', 'data_padding_bottom="' . $padding_bottom . '"', $attrs);

	return $attrs . '[cmsmasters_column data_width="1/1"][/cmsmasters_column][/cmsmasters_row]';
}

function strip_contact_info_boxes($row) {
	$row = preg_replace('#\[cmsmasters_heading[^\]]*\][^[]+\[/cmsmasters_heading\]#', '', $row);
	$row = strip_learn_more_buttons($row);
	return $row;
}
