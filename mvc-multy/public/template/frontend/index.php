<!DOCTYPE html>

<head>
  <?php echo $this->_metaHTTP; ?>
  <?php echo $this->_metaName; ?>
  <?php echo $this->_title; ?>
  <?php echo $this->_cssFiles; ?>

  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700&display=swap" rel="stylesheet" type="text/css" />
</head>

<body class="stretched overlay-menu">

  <div id="wrapper" class="clearfix bg-light">
    <?php
    require_once APPLICATION_PATH . $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';
    ?>
  </div>

  <!-- Go To Top
============================================= -->
  <div id="gotoTop" class="icon-angle-up rounded-circle"></div>

  <?php echo $this->_jsFiles; ?>
</body>

</html>