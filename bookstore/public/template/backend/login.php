<!DOCTYPE html>
<html>

<head>
    <?php echo $this->_metaHTTP;?>
	<?php echo $this->_metaName;?>
    <?php echo $this->_title;?>
    <?php echo $this->_cssFiles;?>
</head>


<head>
    <?php require_once 'html/head.php'; ?>
</head>

    <?php require_once APPLICATION_PATH. $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';?>

   <!-- script -->
   <?php echo $this->_jsFiles;?> 
</body>

</html>