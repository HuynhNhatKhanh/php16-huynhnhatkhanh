<?php
$items = $this->items;
$xml = '';
foreach ($items as $key => $value) {
	$xml = file_get_contents($value['link']);
}


//$xml = file_get_contents('https://vnexpress.net/rss/tin-moi-nhat.rss');
$data = new SimpleXMLElement($xml);
//$xml = simplexml_load_file('https://vnexpress.net/rss/so-hoa.rss');

//$data = $xml->channel;
//$data = json_decode(json_encode($data), true);
//$data = $data['item'];

$xhtml = '';

$i = 0;
foreach ($data->channel->item as $item) {
	if ($i == 11) break;
	$link = $item->link;
	$title = $item->title;
	$pubDate = $item->pubDate;
	//date_format($pubDate,"d/m/Y H:i:s");
	//echo $item->description;

	preg_match_all('#.*src="(.*)" ></a></br>(.*)<end>#imsU', $item->description . '<end>', $matches);
	$image = @$matches[1][0];
	$title_dis = $image ? @$matches[2][0] : $item->description;

	// $tmp = $item->description;
	// if($tmp['image'])
	// {
	//     preg_match_all('#.*/a></br>(.*)<end>#imsU', $item->description . '<end>', $matches);
	//     $title_dis = $matches[1][0];
	//     echo '<pre>';
	//     print_r($matches);
	//     echo '</pre>';
	// }

	$xhtml .= '
        <div class="col-md-6 col-lg-4 p-3">
			<div class="entry mb-1 clearfix">
				<div class="entry-image mb-3">
					<a href="' . $link . '" data-lightbox="image" style="background: url(' . $image . ') no-repeat center center; background-size: cover; height: 278px;"></a>
				</div>
				<div class="entry-title">
					<h3><a href="' . $link . '" target="_blank">' . $title . '</a>
					</h3>
				</div>
				<div class="entry-content">
					' . $title_dis . '
				</div>
				<div class="entry-meta no-separator nohover">
					<ul class="justify-content-between mx-0">
						<li><i class="icon-calendar2"></i> ' . $pubDate . '</li>
						<li>vnexpress.net</li>
					</ul>
				</div>
				<div class="entry-meta no-separator hover">
					<ul class="mx-0">
						<li><a href="' . $link . '" target="_blank">Xem &rarr;</a></li>
					</ul>
				</div>
			</div>
        </div>
        ';
	$i++;
}

?>


<?= $xhtml ?>
<!-- <div class="col-md-6 col-lg-4 p-3">
	<div class="entry mb-1 clearfix">
		<div class="entry-image mb-3">
			<a href="https://i1-thethao.vnecdn.net/2021/01/19/ibra-1611012987-1611012996-7334-1611013230.png?w=1200&h=0&q=100&dpr=1&fit=crop&s=Yg-XociucOw7q5BRQLTzDA" data-lightbox="image" style="background: url(images/items/1.jpg) no-repeat center center; background-size: cover; height: 278px;"></a>
		</div>
		<div class="entry-title">
			<h3><a href="https://vnexpress.net/ibrahimovic-danh-got-chuyen-bong-kieu-taekwondo-4223019.html" target="_blank">Ibrahimovic đánh gót chuyền bóng kiểu taekwondo</a>
			</h3>
		</div>
		<div class="entry-content">
			Tiền đạo 39 tuổi Zlatan Ibrahimovic gây sốt với cú đá xoay móc chuyền bóng
			tầm cao cho đồng đội ở trận đấu của Milan tại Serie A.
		</div>
		<div class="entry-meta no-separator nohover">
			<ul class="justify-content-between mx-0">
				<li><i class="icon-calendar2"></i> 19/01/2021 08:24:15</li>
				<li>vnexpress.net</li>
			</ul>
		</div>
		<div class="entry-meta no-separator hover">
			<ul class="mx-0">
				<li><a href="https://vnexpress.net/ibrahimovic-danh-got-chuyen-bong-kieu-taekwondo-4223019.html" target="_blank">Xem &rarr;</a></li>
			</ul>
		</div>
	</div>
</div> -->