<?php defined('ABSPATH' ) || wp_die; ?>
<?php /* 開発者モード */ if ($this->options['develop-mode'] ) { echo '<div class="pz-lkc-develop-message">'.__('Currently working in a development environment.', $this->text_domain ).'</div>'; } ?>
<div class="pz-lkc-dashboard wrap">
	<h1 class="pz-lkc-header-manager"><span class="pz-lkc-header-manager-icon"><?php echo __('&#x1f5c3;&#xfe0f;', $this->text_domain ); ?></span>&nbsp;<?php _e('LinkCard Cache Manager', $this->text_domain ); ?>&ensp;<a href="<?php echo $this->options['author-url']; ?>/pz-linkcard-manager" rel="external noopener help" target="_blank"><img src="<?php echo $this->plugin_dir_url.'img/help.png'; ?>" width="16" height="16" title="<?php _e('Help', $this->text_domain ); ?>" alt="help"></a></h1>
	<div class="pz-lkc-header-goto"><a href="<?php echo $this->settings_url; ?>"><span class="pz-lkc-header-goto-icon"><?php echo __('&#x2699;&#xfe0f;', $this->text_domain ); ?></span><span class="pz-lkc-header-goto-text"><?php echo __('Settings', $this->text_domain ); ?></span></a></div>
	<div class="pz-lkc-clear-both">&nbsp;</div>
	<input type="text" class="pz-lkc-display pz-lkc-hide" name="pz-lkc-debug"      value="<?php echo $this->options['debug-mode']; ?>" />
	<input type="text" class="pz-lkc-display pz-lkc-hide" name="pz-lkc-admin"      value="<?php echo $this->options['admin-mode']; ?>" />
	<input type="text" class="pz-lkc-display pz-lkc-hide" name="pz-lkc-develop"    value="<?php echo $this->options['develop-mode']; ?>" />
<?php
	$data				=	null;
	if	(isset($_REQUEST['update'] ) ) {
		$action			=	'update';
		if	(isset($_REQUEST['data'] ) && is_array($_REQUEST['data'] ) ) {
			$data		=	$_REQUEST['data'];
		}
		$bulk_id		=	null;
	} elseif	(isset($_REQUEST['cancel'] ) ) {
		$action			=	null;
		$bulk_id		=	null;
	} else {
		$action			=	isset($_REQUEST['action'] )			? $_REQUEST['action']		: null;
		$bulk_id		=	isset($_REQUEST['id'] )				? $_REQUEST['id']			: null;
	}

	$param_refine		=	isset($_REQUEST['refine'] )			? $_REQUEST['refine']		: null;
	$param_keyword		=	isset($_REQUEST['keyword'] )		? $_REQUEST['keyword']		: null;
	$param_orderby		=	isset($_REQUEST['orderby'] )		? $_REQUEST['orderby']		: null;
	$param_order		=	isset($_REQUEST['order'] )			? $_REQUEST['order']		: null;

	$extraction			=	isset($_REQUEST['extraction'] )		? $_REQUEST['extraction']	: null;
	$cache_id			=	isset($_REQUEST['cache_id'] )		? $_REQUEST['cache_id']		: null;
	$confirm			=	isset($_REQUEST['confirm'] )		? $_REQUEST['confirm']		: null;
	$update_result		=	isset($_REQUEST['update_result'] )	? $_REQUEST['update_result']	: null;
	$alive_result		=	isset($_REQUEST['alive_result'] )	? $_REQUEST['alive_result']	: null;

	$paged_no			=	intval(isset($_REQUEST['paged_no'] )	? $_REQUEST['paged_no']	: 0);
	$paged				=	intval(isset($_REQUEST['paged'] )		? $_REQUEST['paged']	: 0);

	$mydomain			=	null;
	if	(preg_match('{https?://(.*)/}i', $this->home_url.'/',$m ) ) {
		$mydomain_url	=	$m[0];
		$mydomain		=	$m[1];
	}

	global	$wpdb;

	if	(isset($action ) ) {
		check_admin_referer('pz_cacheman');

		switch	($action ) {
		case	'edit':
			if	(isset($bulk_id ) && is_array($bulk_id ) ) {
				$data		= $this->pz_GetCache(array('id' => $bulk_id[0] ) );
				if	(isset($data ) && is_array($data ) ) {
					require_once ('pz-linkcard-cacheman-edit.php');
				}
			}
			break;
		case	'renew':
			$success_count	=	0;
			$skip_count		=	0;
			if	(!isset($bulk_id ) || !is_array($bulk_id ) ) {
				echo	'<div class="notice notice-info is-dismissible"><p><strong>'.__('Not selected', $this->text_domain ).'</strong></p></div>';
				break;
			}
			foreach ($bulk_id as $data_id ) {
				$data		= $this->pz_GetCache(array('id' => $data_id ) );
				if	(isset($data ) && is_array($data ) ) {
					$data		=	$this->pz_GetHTML( array('url' => $data['url'], 'force' => true ) );
					$data		=	$this->pz_SetCache( $data );
					$success_count++;
				} else {
					$skip_count++;
				}
			}
			echo	'<div class="notice '.($success_count ? 'notice-success' : 'notice-error' ).' is-dismissible"><p><strong>'.__('Renew Cache', $this->text_domain ).__('...', $this->text_domain ).__('(', $this->text_domain ).__('Success:', $this->text_domain ).$success_count.' '.__('Skip:', $this->text_domain ).$skip_count.__(')', $this->text_domain ).'</strong></p></div>';
			break;
		case	'delete':
			$success_count	=	0;
			$skip_count		=	0;
			if	(!isset($bulk_id ) || !is_array($bulk_id ) ) {
				echo	'<div class="notice notice-info is-dismissible"><p><strong>'.__('Not selected', $this->text_domain ).'</strong></p></div>';
				break;
			}
			foreach ($bulk_id as $data_id ) {
 				$result	=	$this->pz_DelCache(array('id' => $data_id ) );
 				if	($result ) {
 					$success_count++;
 				} else {
 					$skip_count++;
 				}
			}
			echo	'<div class="notice '.($success_count ? 'notice-success' : 'notice-error' ).' is-dismissible"><p><strong>'.__('Delete Cache', $this->text_domain ).__('...', $this->text_domain ).__('(', $this->text_domain ).__('Success:', $this->text_domain ).$success_count.' '.__('Skip:', $this->text_domain ).$skip_count.__(')', $this->text_domain ).'</strong></p></div>';
			break;
		case	'update':
			$success_count	=	0;
			$skip_count		=	0;
			if	(!isset($data ) || !is_array($data ) || !isset($data['id'] ) ) {
				echo	'<div class="notice notice-info is-dismissible"><p><strong>'.__('Not selected', $this->text_domain ).'</strong></p></div>';
				break;
			}
			$data['title']		=	stripslashes($data['title'] );
			$data['excerpt']	=	stripslashes($data['excerpt'] );
			$data['site_name']	=	stripslashes($data['site_name'] );
			if		($data['title']		==	$data['regist_title'] ) {
				$data['mod_title']		=	false;
			} else {
				$data['mod_title']		=	true;
			}
			if		($data['excerpt']	==	$data['regist_excerpt'] ) {
				$data['mod_excerpt']	=	false;
			} else {
				$data['mod_excerpt']	=	true;
			}
			$data	=	$this->pz_SetCache($data );
			if	(isset($data ) && is_array($data ) && isset($data['id'] ) ) {
				$success_count++;
			}
			echo	'<div class="notice '.($success_count ? 'notice-success' : 'notice-error' ).' is-dismissible"><p><strong>'.__('Update Cache', $this->text_domain ).__('...', $this->text_domain ).__('(', $this->text_domain ).__('Success:', $this->text_domain ).$success_count.' '.__('Skip:', $this->text_domain ).$skip_count.__(')', $this->text_domain ).'</strong></p></div>';
			break;
		case	'renew_sns':
			$success_count	=	0;
			$skip_count		=	0;
			if	(!isset($bulk_id ) || !is_array($bulk_id ) ) {
				echo	'<div class="notice notice-info is-dismissible"><p><strong>'.__('Not selected', $this->text_domain ).'</strong></p></div>';
				break;
			}
			foreach ($bulk_id as $data_id ) {
				$data		=	$this->pz_GetCache(array('id' => $data_id ) );
				if	(isset($data ) && is_array($data ) ) {
					$data['sns_nexttime']	=	0;
					$data	=	$this->pz_SetCache($data );
					$data	=	$this->pz_RenewSNSCount($data );
					$success_count++;
				} else {
					$skip_count++;
				}
			}
			echo	'<div class="notice '.($success_count ? 'notice-success' : 'notice-error' ).' is-dismissible"><p><strong>'.__('Renew SNS Count', $this->text_domain ).__('...', $this->text_domain ).__('(', $this->text_domain ).__('Success:', $this->text_domain ).$success_count.' '.__('Skip:', $this->text_domain ).$skip_count.__(')', $this->text_domain ).'</strong></p></div>';
			break;
		case	'renew_thumbnail':
			$success_count	=	0;
			$skip_count		=	0;
			if	(!isset($bulk_id ) || !is_array($bulk_id ) ) {
				echo	'<div class="notice notice-info is-dismissible"><p><strong>'.__('Not selected', $this->text_domain ).'</strong></p></div>';
				break;
			}
			$success_count	=	0;
			$skip_count		=	0;
			foreach ($bulk_id as $data_id ) {
				$data		=	$this->pz_GetCache(array('id' => $data_id ) );
				if	(isset($data ) && is_array($data ) ) {
					$data	=	$this->pz_GetThumbnail($data['thumbnail'] , true );
					$success_count++;
				} else {
					$skip_count++;
				}
				echo '..';
			}
			echo	'<div class="notice '.($success_count ? 'notice-success' : 'notice-error' ).' is-dismissible"><p><strong>'.__('Renew Thumbnail Image', $this->text_domain ).__('...', $this->text_domain ).__('(', $this->text_domain ).__('Success:', $this->text_domain ).$success_count.' '.__('Skip:', $this->text_domain ).$skip_count.__(')', $this->text_domain ).'</strong></p></div>';
			break;
		case	'renew_postid':
			$success_count	=	0;
			$skip_count		=	0;
			if	(!isset($bulk_id ) || !is_array($bulk_id ) ) {
				echo	'<div class="notice notice-info is-dismissible"><p><strong>'.__('Not selected', $this->text_domain ).'</strong></p></div>';
				break;
			}
			foreach ($bulk_id as $data_id ) {
				$data		=	$this->pz_GetCache(array('id' => $data_id ) );
				$result		=	null;
				if	(isset($data ) && is_array($data ) ) {
					$result	=	$this->pz_SetCache($data );
				}
				if	($result ) {
					$success_count++;
				} else {
					$skip_count++;
				}
			}
			echo	'<div class="notice '.($success_count ? 'notice-success' : 'notice-error' ).' is-dismissible"><p><strong>'.__('Renew Post Id', $this->text_domain ).__('...', $this->text_domain ).__('(', $this->text_domain ).__('Success:', $this->text_domain ).$success_count.' '.__('Skip:', $this->text_domain ).$skip_count.__(')', $this->text_domain ).'</strong></p></div>';
			break;
		case	'alive':
			$success_count	=	0;
			$skip_count		=	0;
			if	(!isset($bulk_id ) || !is_array($bulk_id ) ) {
				echo	'<div class="notice notice-info is-dismissible"><p><strong>'.__('Not selected', $this->text_domain ).'</strong></p></div>';
				break;
			}
			foreach ($bulk_id as $data_id ) {
				$data		=	$this->pz_GetCache(array('id' => $data_id ) );
				if	(isset($data ) && is_array($data ) ) {
					$data					=	$this->pz_GetCache($data );
					$after					=	$this->pz_GetCURL($data );
					$data['alive_result']	=	$after['update_result'];
					$data['alive_time']		=	$this->now;
					$data['alive_nexttime']	=	$this->now + WEEK_IN_SECONDS * 4;
					if	($data['title']		==	$after['title'] ) {
						$data['mod_title']	=	false;
					} else {
						$data['mod_title']	=	true;
					}
					if	($data['excerpt']		==	$after['excerpt'] ) {
						$data['mod_excerpt']	=	false;
					} else {
						$data['mod_excerpt']	=	true;
					}
					$data					=	$this->pz_SetCache($data );
					if	($data ) {
						$success_count++;
					} else {
						$skip_count++;
					}
				}
			}
			echo	'<div class="notice '.($success_count ? 'notice-success' : 'notice-error' ).' is-dismissible"><p><strong>'.__('Alive check', $this->text_domain ).__('...', $this->text_domain ).__('(', $this->text_domain ).__('Success:', $this->text_domain ).$success_count.' '.__('Skip:', $this->text_domain ).$skip_count.__(')', $this->text_domain ).'</strong></p></div>';
			break;
		case	'import-menu':
			// ファイルのインポート
?>
			<form id="import" name="import" method="post" enctype="multipart/form-data">
				<input type="hidden" name="action" value="import">
				<table class="pz-lkc-man-filemenu">
					<tr>
						<td><input type="file"     id="import_file"   name="import_file"  accept=".csv" required /></td>
						<td><button type="submit" id="import_button" name="import_exec" class="button button-primary" value="import_exec"><?php _e('Upload Import File', $this->text_domain ); ?></button></td>
						<td><label><input type="checkbox" id="import_clear" name="import_clear" value="1" /><?php _e('Clear all cache', $this->text_domain ); ?></label></td>
					</tr>
				</table>
			</form>
<?php
			break;
		case	'import';
			require_once ('pz-linkcard-file-import.php');
			break;
		case	'export':
			require_once ('pz-linkcard-file-export.php');
			break;
		default:
			break;
		}
	}
	require_once ('pz-linkcard-cacheman-list.php');

	if	($this->options['flg-filemenu'] ) {
		?>
		<table class="pz-lkc-man-filemenu">
			<tr>
				<th>
					<span class="pz-lkc-man-filemenu-title"><span class="pz-lkc-man-filemenu-title-icon"><?php _e('&#x1f4c4;&#xfe0f;', $this->text_domain ); ?></span>&nbsp;<?php _e('File Menu', $this->text_domain ); ?></span>
				</th>
				<td>
					<form id="import" method="get">
						<?php wp_nonce_field('pz_cacheman' ); ?>
						<input type="hidden" name="page"   value="pz-linkcard-cacheman">
						<input type="hidden" name="action" value="import-menu">
						<button type="submit" name="import" class="button" value="import-file"><?php _e('Import', $this->text_domain ); ?></button>
					</form>
				</td>
				<td>
					<form id="export" method="get">
						<?php wp_nonce_field('pz_cacheman' ); ?>
						<input type="hidden" name="page"   value="pz-linkcard-cacheman">
						<input type="hidden" name="action" value="export">
						<button type="submit" name="export" class="button" value="export-file"><?php _e('Export', $this->text_domain ); ?></button>
					</form>
				</td>
			</tr>
		</table>
	<?php
	}
	?>
</div>
