<!DOCTYPE html>
<html lang="en">



<head>
    <?php echo $this->_metaHTTP;?>
	<?php echo $this->_metaName;?>
    <?php echo $this->_title;?>
    <?php echo $this->_cssFiles;?>
</head>

<body>
    <div class="loader_skeleton">
        <div class="typography_section">
            <div class="typography-box">
                <div class="typo-content loader-typo">
                    <div class="pre-loader"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- header start -->
        <?php require_once "html/header.php" ?>
    <!-- header end -->

    <?php require_once APPLICATION_PATH. $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';?>

    <!-- footer -->
        <?php require_once "html/footer.php" ?>
    <!-- footer end -->
    <!-- tap to top -->
        <?php require_once "html/taptop.php" ?>
    <!-- tap to top end -->

    <?php echo $this->_jsFiles;?> 
    <script>
        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
            document.getElementById("search-input").focus();
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }
    </script>
</body>

</html>