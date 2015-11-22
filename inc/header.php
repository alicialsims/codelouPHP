<html lang="en">

<head>

  <meta charset="UTF-8">
  <title><?php echo $pageTitle; ?></title>
  <link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
  <link rel="stylesheet" href="css/style.css" />

</head>

<body id="home">

<!-- NAVIGATION BAR -->
<div class="top-bar">
<div class="top-bar-left">
<ul class="menu">
<li class="menu-text"><a href="index.php">Lou's Cellar</a></li>
</ul>
</div>
<div class="top-bar-right">
<ul class="menu">
<li class="allwines <?php if ($section == "allwines") { echo "on"; } ?>"><a href="allwines.php">Wines</a></li>
<li class="allbeers <?php if ($section == "allbeers") { echo "on"; } ?> "><a href="allbeers.php">Beers</a></li>
<li class="contact <?php if ($section == "contact") { echo "on"; } ?> "><a href="contact.php">Contact</a></li>
</ul>
</div>
</div>

<!-- END NAVIGATION BAR -->

