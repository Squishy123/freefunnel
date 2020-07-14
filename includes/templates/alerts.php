<?php

function admin_alert_success($message)
{
?>

	<div class="notice notice-success is-dismissible">
		<p><?php echo $message ?></p>
	</div>

<?php
}

function add_admin_success_alert($message)
{

	add_action('admin_init', call_user_func('admin_alert_success', $message));
}
