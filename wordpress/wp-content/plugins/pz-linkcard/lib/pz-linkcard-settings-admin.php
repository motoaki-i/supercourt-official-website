<?php defined('ABSPATH' ) || wp_die; ?>
<?php
	switch	($action) {
	case	'run-pz_linkcard_check':
		wp_clear_scheduled_hook('pz_linkcard_check' );
		$cron_log		=	$this->schedule_hook_check();
		if ($this->options['sns-position'] && !wp_next_scheduled('pz_linkcard_check' ) ) {
			wp_schedule_event(time() + HOUR_IN_SECONDS, 'hourly', 'pz_linkcard_check' );
		}
		break;
	case	'run-pz_linkcard_alive':
		wp_clear_scheduled_hook('pz_linkcard_alive' );
		$cron_log		=	$this->schedule_hook_alive();
		if ($this->options['flg-alive'] && !wp_next_scheduled('pz_linkcard_alive' ) ) {
			wp_schedule_event(time() + DAY_IN_SECONDS, 'daily', 'pz_linkcard_alive' );
		}
		break;
	}

	// WP-Cron の実行結果
	if (isset($cron_log ) ) {
		$cron_log			=	esc_html($cron_log );
		$cron_log			=	str_replace(PHP_EOL, '<br>', $cron_log );
	}

	// WP-Cronスケジュールを取得
	$cron_schedule	=	_get_cron_array();
	$schedules		=	wp_get_schedules();
	$prefix			=	'pz_';
	foreach			($cron_schedule	as $timestamp	=> $cronhooks ) {
		foreach		($cronhooks		as $hook		=> $dings ) {
			foreach	($dings			as $signature	=> $data ) {
				if	(mb_substr($hook, 0, mb_strlen($prefix) ) == $prefix ) {
					$myjob		=	true;
					$button		=	'class="pz-lkc-button-sure" value="run-'.$hook.'"';
					$display	=	'class="pz-lkc-cron-list-lkc"';
				} else {
					$myjob		=	false;
					$button		=	'class="pz-lkc-button-disabled" disabled="disabled"';
					$display	=	'class="pz-lkc-cron-list-other pz-lkc-hide"';
				}
				$schedule		=	isset($schedules[$data['schedule']]['display'] ) ? $schedules[$data['schedule']]['display'] : $data['schedule'] ;
				$interval		=	isset($data['interval'] ) ? $data['interval'].' '.__('Sec.', $this->text_domain ) : null ;
				$cron_list[]	=	array(
					//'key'			=>	($myjob ? '1' : '2' ).$hook,
					'key'			=>	$timestamp,
					'hook'			=>	$hook,
					'myjob'			=>	$myjob,
					'next_time'		=>	get_date_from_gmt( date( 'Y-m-d H:i:s', $timestamp ), $this->datetime_format ),
					'schedule'		=>	$schedule,
					'interval'		=>	$interval,
					'button'		=>	'<button type="submit" name="action" '.$button.' onclick="return confirm(\''.__('Are you sure?', $this->text_domain ).'\' );">'.__('Run Now', $this->text_domain ).'</button>',
					'display'		=>	$display
					);
			}
		}
	}
	asort($cron_list );

?>
<h2><?php echo	__('Information', $this->text_domain ); ?></h3>
<table class="form-table">
	<tr>
		<th scope="row"><?php _e('Table Name', $this->text_domain ); ?></th>
		<td><input type="text" size="40" value="<?php echo esc_html($this->db_name ); ?>" readonly="readonly" /></td>
	</tr>
	<tr>
		<th scope="row"><?php echo __('WordPress', $this->text_domain ).' '.__('Version', $this->text_domain ); ?></th>
		<td><input type="text" size="20" value="<?php echo bloginfo('version' ); ?>" readonly="readonly" ?></td>
	</tr>
	<tr>
		<th scope="row"><?php echo __('PHP', $this->text_domain ).' '.__('Version', $this->text_domain ); ?></th>
		<td><input type="text" size="20" value="<?php echo phpversion(); ?>" readonly="readonly" ?></td>
	</tr>
	<tr>
		<th scope="row"><?php echo __('DB', $this->text_domain ).' '.__('Version', $this->text_domain ); ?></th>
		<td><input type="text" size="20" value="<?php global $wpdb; echo $wpdb->db_version(); ?>" readonly="readonly" ?></td>
	</tr>
</table>

<?php if (isset($cron_log ) ) { ?>
	<h2><?php echo	__('Execution Result', $this->text_domain ); ?></h3>
	<div>
		<?php _e('Execution Result', $this->text_domain ); ?>
	</div>
	<div class="pz-lkc-cron-log">
		<?php echo $cron_log; ?>
	</div>
<?php } ?>

<h2><?php echo	__('WP-Cron Information', $this->text_domain ); ?></h3>
<div class="pz-lkc-cron-margin"><label><input type="checkbox" value="1" class="pz-lkc-cron-all" /><?php _e('View all schedules.', $this->text_domain ); ?></label></div>
<table class="pz-lkc-cron-list widefat striped">
	<thead>
		<tr>
			<th scope="col" class="pz-lkc-cron-head-run"><?php _e('Run', $this->text_domain ); ?></th>
			<th scope="col" class="pz-lkc-cron-head-hook"><?php _e('Hook', $this->text_domain ); ?></th>
			<th scope="col" class="pz-lkc-cron-head-next-time"><?php echo __('Next Time', $this->text_domain ).__('▼', $this->text_domain ); ?></th>
			<th scope="col" class="pz-lkc-cron-head-schedule"><?php _e('Schedule', $this->text_domain ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($cron_list as $key => $cron ) { ?>
			<tr <?php echo $cron['display']; ?>>
				<td class="pz-lkc-cron-body-run"><?php echo $cron['button']; ?></td>
				<td class="pz-lkc-cron-body-hook"><?php echo $cron['hook']; ?></td>
				<td class="pz-lkc-cron-body-next-time"><?php echo $cron['next_time']; ?></td>
				<td class="pz-lkc-cron-body-schedule"><?php echo $cron['schedule']; ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
