<?php
require_once('inc/database.php');
$pageTitle = "Lou's Cellar";
$section = "homepage";
include('inc/header.php');
?>

<!-- START -->

<div class="callout large">
	<h1>Lou's Cellar</h1>
  <p>It has an easy to override visual style, and is appropriately subdued.</p>
  <a href="#">It's dangerous to go alone, take this.</a>
  <div class="button-group">
  	<a class="edit button" href="allwines.php">Taste Some Wines</a>
  	<a class="success button" href="allbeers.php">Down Some Beers</a>
</div>
</div>

<p>

<div class="row">
	<div class="columns large-6 medium-6 small-12">
		<h3>This is a callout.</h3>
  <p>It has an easy to override visual style, and is appropriately subdued.</p>
  <a href="#">It's dangerous to go alone, take this.</a>
	</div>
	<div class="columns large-6 medium-6 small-12">
<h3>This is a callout.</h3>
  <p>It has an easy to override visual style, and is appropriately subdued.</p>
  <a href="#">It's dangerous to go alone, take this.</a>
	</div>
</div>

<p>
<!-- END -->

<?php include('inc/footer.php');?>