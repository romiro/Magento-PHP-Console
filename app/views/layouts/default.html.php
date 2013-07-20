<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Magento/Zend/PHP Debug Console</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css" />
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="./css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="./css/docs.css" />
    <script src="/js/jquery-1.7.1.min.js"></script>
    <script src="/js/jquery-tmpl-min.js"></script>
    <script src="/js/ace/ace.js"></script>
    <script src="/js/ace/mode-php.js"></script>
    <script src="/js/php-console.js"></script>
    <script src="/js/google-code-prettify/prettify.js"></script>
    <script src="/js/storage.js"></script>
    <script src="/js/bootstrap-dropdown.js"></script>
    <link rel="stylesheet" type="text/css" href="/js/google-code-prettify/prettify.css" />
    <script>
        $.console({
            tabsize: <?php echo json_encode($options['tabsize']) ?>
        });
    </script>
</head>
<body onload="prettyPrint()">
    <div class="content">
        <?php echo $this->content(); ?>
    </div>
</body>
</html>