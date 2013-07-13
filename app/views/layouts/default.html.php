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

	<div class="container-narrow">

		<div class="masthead">
			<ul class="nav nav-pills pull-right">
				<li>
					<a href="http://lithify.me/docs/manual/quickstart">Quickstart</a>
				</li>
				<li>
					<a href="http://lithify.me/docs/manual">Manual</a>
				</li>
				<li>
					<a href="http://lithify.me/docs/lithium">API</a>
				</li>
				<li>
					<a href="http://lithify.me/">More</a>
				</li>
			</ul>
			<a href="http://lithify.me/"><h3>&#10177;</h3></a>
		</div>

		<hr>

		<div class="content">
			<?php echo $this->content(); ?>
		</div>

		<hr>

		<div class="footer">
			<p>&copy; Union Of RAD 2013</p>
		</div>

	</div>
</body>
</html>