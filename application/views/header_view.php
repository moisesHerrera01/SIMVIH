<html>
<head>
<title>Login</title>
</head>
<body>
<div class="header_content">
	<div class="navigation">
	<?php if(!$this->session->userdata('logged_in')) :?>
	<?php else:?>
	<?php endif;?>
	</div>
</div>
