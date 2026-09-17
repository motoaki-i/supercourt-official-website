<?php defined('ABSPATH' ) || wp_die; ?>
<?php
	// ドメイン一覧作成
	$domain_list		=	$wpdb->get_results("SELECT domain, site_name, count(*) AS count FROM $this->db_name GROUP BY DOMAIN ASC", ARRAY_A );

	// ドメイン存在チェック
	$refine				=	null;
	if	($param_refine ) {
		foreach	($domain_list as $item ) {
			if	($param_refine	==	$item['domain'] ) {
				$refine		=	$item['domain'];
				break;
			}
		}
	}

	// キーワード
	if	($param_keyword ) {
		$keyword		=	stripslashes(esc_attr($param_keyword ) );
	} else {
		$keyword		=	null;
	}

	// ソート項目パラメータ
	$column_rec			=	$wpdb->get_results("SELECT * FROM $this->db_name LIMIT 1", ARRAY_A );	// 1レコード目を取得
	$param_orderby		=	isset($param_orderby ) ? strtolower($param_orderby ) : null ;
	if	(isset($column_rec[0] ) && array_key_exists($param_orderby, $column_rec[0] ) ) {			// 項目名に存在するかチェック
		$orderby		=	$param_orderby;															// 存在したら項目名にセットする
	} else {
		$orderby		=	'id';																	// 存在しない項目名の場合 'id' をセットする
	}

	// ソート順パラメータ
	$param_order		=	isset($param_order ) ? strtolower($param_order ) : null ;
	if	($param_order	==	'asc' ) {
		$order			=	'asc';		// 昇順
	} else {
		$order			=	'desc';		// 降順
	}

	// 抽出条件
	$where			=	null;
	$extraction		=	isset($extraction ) ? strtolower($extraction ) : null ;
	switch	($extraction ) {
	case	'all':
		$where		=	"";
		break;
	case	'internal':
		$where		=	"domain = '".$this->domain."'";
		break;
	case	'external':
		$where		=	"domain <> '".$this->domain."'";
		break;
	case	'modify':
		$where		=	"alive_result <> update_result";
		break;
	case	'unlink':
		$where		=	"( alive_result < 100 OR alive_result >= 400 )";
		break;
	default:
		if	($this->options['flg-alive'] && $this->options['flg-alive-count']) {
			$extraction	=	'unlink';
			$where		=	"( alive_result < 100 OR alive_result >= 400 )";
		} else {
			$extraction	=	'all';
			$where		=	"";
		}
	}	

	// キーワード指定
	$param				=	array();
	if	($keyword ) {
		$like			=	'%' . $wpdb->esc_like($keyword ) . '%';
		$param[]		=	$like;
		$param[]		=	$like;
		if	($where ) {
			$where		.=	" AND ";
		}
		$where			.=	"( title LIKE '%s' OR excerpt LIKE '%s' )";
	}

	// ドメイン指定
	if	($refine ) {
		$param[]		=	$refine;
		if	($where ) {
			$where		.=	" AND ";
		}
		$where			.=	"domain = %s";
	}

	// 検索SQL作成
	$sql				=	"SELECT * FROM $this->db_name";
	if	($where ) {
		$sql			.=	" WHERE $where";
	}
	if	($orderby ) {
		$sql			.=	" ORDER BY $orderby $order";
	}
	if	(strpos($sql, 'UPDATE' ) || strpos($sql, 'UNION' ) ) { // 気持ち程度のインジェクション対策
		$sql			=	null;
	}

	// データ抽出
	switch	(count($param ) ) {
	case	1:
		$data_now	=	$wpdb->get_results($wpdb->prepare($sql, $param[0] ) );
		break;
	case	2:
		$data_now	=	$wpdb->get_results($wpdb->prepare($sql, $param[0], $param[1] ) );
		break;
	case	3:
		$data_now	=	$wpdb->get_results($wpdb->prepare($sql, $param[0], $param[1], $param[2] ) );
		break;
	default:
		$data_now	=	$wpdb->get_results($sql );
		break;
	}
	$count_now		=	count($data_now );

	// ページ数
	if	($paged_no	<>	0) {
		$paged		=	$paged_no;
	}
	$page_limit		=	10;																	// ページ内の行数
	$page_min		=	intval(($count_now > 0 ) ? 1 : 0 );									// 最初のページ数
	$page_max		=	intval(ceil($count_now / $page_limit ) );							// 最後のページ数
	$page_now		=	intval(($paged < $page_min ) ? $page_min : (($paged > $page_max ) ? $page_max : $paged ) );	// 今のページ数
	$page_prev		=	intval(($page_now > 1 ) ? $page_now - 1 : null );					// 前のページ数
	$page_next		=	intval(($page_now < $page_max ) ? $page_now + 1 : null );			// 次のページ数
	$page_top		=	intval(($page_now < 1 ) ? 0 : (($page_now - 1 ) * $page_limit ) );	// ページの最初（0 origin）

	// 件数確認
	$sql			=	"SELECT COUNT( * ) AS count_all, ";
	$sql			.=	"COUNT( CASE WHEN url LIKE '".get_bloginfo('url' )."%' THEN 1 END ) AS count_internal, ";
	$sql			.=	"COUNT( CASE WHEN url NOT LIKE '".get_bloginfo('url' )."%' THEN 1 END ) AS count_external, ";
	$sql			.=	"COUNT( CASE WHEN alive_result <> update_result THEN 1 END ) AS count_modify, ";
	$sql			.=	"COUNT( CASE WHEN ( alive_result < 100 OR alive_result >= 400 ) THEN 1 END ) AS count_unlink ";
	$sql			.=	"FROM $this->db_name";
	$result			=	$wpdb->get_row($sql );
	if	(isset($result ) ) {
		$count_all		=	isset($result->count_all )		?	$result->count_all		:	0;
		$count_internal	=	isset($result->count_internal )	?	$result->count_internal	:	0;
		$count_external	=	isset($result->count_external )	?	$result->count_external	:	0;
		$count_modify	=	isset($result->count_modify )	?	$result->count_modify	:	0;
		$count_unlink	=	isset($result->count_unlink )	?	$result->count_unlink	:	0;
	}

	// ソートアイコン
	$asc_chr		=	__('▼', $this->text_domain );
	$desc_chr		=	__('▲', $this->text_domain );

?>
	<form id="posts-filter" action="" method="post">
		<?php wp_nonce_field('pz_cacheman' ); ?>
		<input type="hidden" name="page"     value="pz-linkcard-cache">
		<!-- input type="hidden" name="page_now" value="<?php echo $page_now; ?>" -->
		<div class="pz-lkc-man-count-list">
			<ul class="subsubsub">
				<li class="all">		<?php echo '<a href="'.esc_url($this->cacheman_url.'&extraction=all&orderby=regist&order=desc'		).'"'.(($extraction === 'all'		) ? ' class="current"' : '' ).'>'.__('All',		$this->text_domain ); ?> <span class="count"><?php echo esc_attr('('.number_format($count_all      ).')' ); ?></span></a> |</li>
				<li class="internal">	<?php echo '<a href="'.esc_url($this->cacheman_url.'&extraction=internal&orderby=regist&order=desc'	).'"'.(($extraction === 'internal'	) ? ' class="current"' : '' ).'>'.__('Internal',$this->text_domain ); ?> <span class="count"><?php echo esc_attr('('.number_format($count_internal ).')' ); ?></span></a> |</li>
				<li class="external">	<?php echo '<a href="'.esc_url($this->cacheman_url.'&extraction=external&orderby=regist&order=desc'	).'"'.(($extraction === 'external'	) ? ' class="current"' : '' ).'>'.__('External',$this->text_domain ); ?> <span class="count"><?php echo esc_attr('('.number_format($count_external ).')' ); ?></span></a> |</li>
				<li class="modify">		<?php echo '<a href="'.esc_url($this->cacheman_url.'&extraction=modify&orderby=regist&order=desc'	).'"'.(($extraction === 'modify'	) ? ' class="current"' : '' ).'>'.__('Modify',	$this->text_domain ); ?> <span class="count"><?php echo esc_attr('('.number_format($count_modify   ).')' ); ?></span></a> |</li>
				<li class="unlink">		<?php echo '<a href="'.esc_url($this->cacheman_url.'&extraction=unlink&orderby=regist&order=desc'	).'"'.(($extraction === 'unlink'	) ? ' class="current"' : '' ).'>'.__('Unlink',	$this->text_domain ); ?> <span class="count"><?php echo esc_attr('('.number_format($count_unlink   ).')' ); ?></span></a></li>
			</ul>
		</div>

		<div class="pz-lkc-man-search-box">
			<p class="search-box" title="<?php _e('Text search by title and excerpt', $this->text_domain ); ?>">
				<span class="pz-lkc-man-search-box-icon"><?php echo __('&#x1f50d;&#xfe0f;', $this->text_domain ); ?></span>
				<input type="search" id="post-search-input" name="keyword" value="<?php echo $keyword; ?>">
				<input type="submit" id="search-submit" class="button action" value="<?php _e('Search', $this->text_domain ); ?>">
			</p>
		</div>

		<div class="pz-lkc-man-navi tablenav top">
			<div class="pz-lkc-man-batch-list alignleft actions bulkactions">
				<select name="action" id="bulk-action-selector-top">
					<option value="-1" selected="selected"><?php _e('Select', $this->text_domain ); ?></option>
					<option value="renew"><?php _e('Renew Cache', $this->text_domain ); ?></option>
					<option value="renew_thumbnail"><?php _e('Renew Thumbnail Image', $this->text_domain ); ?></option>
					<option value="renew_sns"><?php _e('Renew SNS Count', $this->text_domain ); ?></option>
					<option value="renew_postid"><?php _e('Renew Post ID', $this->text_domain ); ?></option>
					<option value="alive"><?php _e('Check Status', $this->text_domain ); ?></option>
					<option value="delete"><?php _e('Delete from Cache', $this->text_domain ); ?></option>
				</select>
				<input type="submit" class="button action" value="<?php _e('Submit', $this->text_domain ); ?>" onclick="return confirm(\''.__('Are you sure?', $this->text_domain ).'\' );" />
				&ensp;
			</div>

			<div class="pz-lkc-man-domain-list alignleft actions bulkactions">
				<select name="refine" id="bulk-action-selector-top">
					<option value="" selected="selected"><?php _e('All Domain', $this->text_domain ); ?></option>
						<?php
							foreach ($domain_list as $rec ) {
								if (isset($rec['domain'] ) == true && isset($rec['count'] ) == true) {
									$disp_domain	=	(function_exists('idn_to_utf8' ) && mb_substr($rec['domain'], 0, 4) == 'xn--') ? idn_to_utf8($rec['domain'], 0, INTL_IDNA_VARIANT_UTS46 ) : $rec['domain'] ;
									$selected		=	($rec['domain'] === $refine) ? ' selected="selected"' : null ;
									echo	'<option value="'.htmlspecialchars($rec['domain'] ).'"'.$selected.'>'.htmlspecialchars($disp_domain ).' ('.$rec['count'].')</option>';
								}
							}
						?>
					</select>
				<input type="submit" class="button action" value="<?php _e('Refine Search', $this->text_domain ); ?>" />
			</div>

			<div class="pz-lkc-man-pages tablenav-pages">
				<span class="displaying-num"><?php printf(($count_now == 1 ? __('%d item', $this->text_domain ) : __('%d items', $this->text_domain ) ), $count_now ); ?></span>
				<span class="pagination-links">
					<?php $href = $this->cacheman_url.'&extraction='.$extraction.'&orderby='.$orderby.'&order='.$order.'&refine='.$refine.'&keyword='.$keyword.'&paged='; ?>
					<?php echo strPageButton('first-page',	$href, $page_now, $page_min); ?>
					&nbsp;
					<?php echo strPageButton('prev-page',	$href, $page_now, $page_min); ?>
					&nbsp;
					<span class="paging-input">
						<input type="text" name="paged_no" id="current-page-selector" class="current-page" value="<?php echo $page_now; ?>" size="2" aria-describedby="table-paging" />
						&nbsp;/&nbsp;
						<span class="total-pages"><?php echo $page_max; ?></span>
					</span>
					&nbsp;
					<?php echo strPageButton('next-page',	$href, $page_now, $page_max); ?>
					&nbsp;
					<?php echo strPageButton('last-page',	$href, $page_now, $page_max); ?>
				</span>
			</div>

			<br class="clear">
		</div>

		<table class="pz-lkc-man-cache-list widefat striped">
			<thead>
				<tr>
					<td id="cb" class="pz-lkc-man-head-check manage-column column-cb check-column"><input id="cb-select-all-1" type="checkbox" /></td>
					<th scope="col" class="pz-lkc-man-head-id">
						<?php echo strHeaderTitleWithSort('id', __('ID', $this->text_domain ), $this->cacheman_url ); ?>
					</th>
					<th scope="col" class="pz-lkc-man-head-url">
						<?php echo strHeaderTitleWithSort('url', __('URL', $this->text_domain ), $this->cacheman_url ); ?>
					</th>
					<th scope="col" class="pz-lkc-man-head-title">
						<?php echo strHeaderTitleWithSort('title', __('Title', $this->text_domain ), $this->cacheman_url ); ?>
					</th>
					<th scope="col" class="pz-lkc-man-head-excerpt">
						<?php echo strHeaderTitleWithSort('excerpt', __('Excerpt', $this->text_domain ), $this->cacheman_url ); ?>
					</th>
					<th scope="col" class="pz-lkc-man-head-charset pz-lkc-admin-only">
						<?php echo strHeaderTitleWithSort('charset', __('Charset', $this->text_domain ), $this->cacheman_url ); ?>
					</th>
					<th scope="col" class="pz-lkc-man-head-domain">
						<?php echo strHeaderTitleWithSort('domain', __('Domain', $this->text_domain ), $this->cacheman_url ); ?>
					</th>
					<th scope="col" class="pz-lkc-man-head-sns">
						<?php echo strHeaderTitleWithSort('sns_twitter', __('Tw', $this->text_domain ), $this->cacheman_url ).'<br>'.strHeaderTitleWithSort('sns_facebook', __('fb', $this->text_domain ), $this->cacheman_url ).'<br>'.strHeaderTitleWithSort('sns_hatena', __('B!', $this->text_domain ), $this->cacheman_url ).'<br>'.strHeaderTitleWithSort('sns_pocket', __('Po', $this->text_domain ), $this->cacheman_url ); ?>
					</th>
					<th scope="col" class="pz-lkc-man-head-resist-time pz-lkc-admin-only">
						<?php echo strHeaderTitleWithSort('regist_time', __('Regist<br>date', $this->text_domain ), $this->cacheman_url ); ?>
					</th>
					<th scope="col" class="pz-lkc-man-head-update-time">
						<?php echo strHeaderTitleWithSort('update_time', __('Update<br>date', $this->text_domain ), $this->cacheman_url ); ?>
					</th>
					<th scope="col" class="pz-lkc-man-head-sns-time pz-lkc-admin-only">
						<?php echo strHeaderTitleWithSort('sns_time', __('SNS<br>check<br>date', $this->text_domain ), $this->cacheman_url ); ?>
					</th>
					<th scope="col" class="pz-lkc-man-head-alive-time pz-lkc-admin-only">
						<?php echo strHeaderTitleWithSort('alive_time', __('Alive<br>check<br>date', $this->text_domain ), $this->cacheman_url ); ?>
					</th>
					<th scope="col" class="pz-lkc-man-head-post-id">
						<?php echo strHeaderTitleWithSort('use_post_id1', __('Post ID', $this->text_domain ), $this->cacheman_url ); ?>
					</th>
					<th scope="col" class="pz-lkc-man-head-result-update">
						<?php echo strHeaderTitleWithSort('update_result', __('Result<br>code', $this->text_domain ), $this->cacheman_url ).'<br>'.strHeaderTitleWithSort('alive_result', __('(last )', $this->text_domain ), $this->cacheman_url ); ?>
					</th>
				</tr> 
			</thead>
			<tbody>
				<?php
					for ($i = $page_top; $i <= ($page_top + $page_limit - 1 ); $i++ ) {
						if	($i >= count($data_now ) ) {
							break;
						}
						$data		=	$data_now[$i];

						// データID
						$data_id	=	$data->id;

						// URL
						$url		=	$data->url;

						// URL解析（自サイトチェック）
						$url_info		=	$this->Pz_GetURLInfo($url );
						$scheme			=	$url_info['scheme'];		// スキーム
						$domain			=	$url_info['domain'];		// ドメイン名
						$domain_url		=	$url_info['domain_url'];	// ドメインURL
						$is_external	=	$url_info['is_external'];	// 外部リンク
						$is_internal	=	$url_info['is_internal'];	// 内部リンク
						$is_samepage	=	$url_info['is_samepage'];	// 同一ページ

						// 表示用のURLを作成
						$html_url			=	null;
						if	($data->alive_result < 100 || $data->alive_result >= 400 ) {
							if	($data->no_failure ) {
								$html_url	.=	'<span class="pz-lkc-man-body-url-error-ignore" title="'.__('The latest HTTP code is in error, but ignore it.', $this->text_domain ).'">'.__('&#x26a0;&#xfe0f;', $this->text_domain ).'</span>&nbsp;';
							} else {
								$html_url	.=	'<span class="pz-lkc-man-body-url-error" title="'.__('The latest HTTP code is in error. You can change it to ignore the error from the edit screen.', $this->text_domain ).'">'.__('&#x26d4;&#xfe0f;', $this->text_domain ).'</span>&nbsp;';
							}
						}
						if	($is_internal ) {
							$html_url		.=	'<a href="'.esc_url($url ).'" title="'.esc_url($url ).'" rel="internal" target="_self">';
						} else {
							$html_url		.=	'<a href="'.esc_url($url ).'" title="'.esc_url($url ).'" rel="external noopenner noreferrer" target="_blank">';
						}
						$html_url			.=	esc_url($this->pz_DecodeURL($url ) ).'</a>';

						// タイトル
						if			($str	=	$data->title ) {						// 代入しながら判定
							if		($str	=	strip_tags($str ) ) {					// HTMLタグ除去
								if	($str	=	esc_html($str ) ) {						// HTMLエスケープ
									$str	=	mb_strimwidth($str, 0, 200 , '...' );	// 200文字にする
								}
							}
						}
						$title				=	$str;
						$html_title			=	$str;
						if	($data->title	<>	$data->regist_title ) {
							$html_title		=	'<b>'.$html_title.'</b>';
						}

						// 抜粋文
						if			($str	=	$data->excerpt ) {						// 代入しながら判定
							if		($str	=	strip_tags($str ) ) {					// HTMLタグ除去
								if	($str	=	esc_html($str ) ) {						// HTMLエスケープ
									$str	=	mb_strimwidth($str, 0, 500 , '...' );	// 500文字にする
								}
							}
						}
						$excerpt			=	$str;
						$html_excerpt		=	$str;
						if	($data->excerpt	<>	$data->regist_excerpt ) {
							$html_excerpt	=	'<b>'.$html_excerpt.'</b>';
						}

						// SNSカウント
						$html_sns	=	sns_counter($data->sns_twitter  ).'<br>';
						$html_sns	.=	sns_counter($data->sns_facebook ).'<br>';
						$html_sns	.=	sns_counter($data->sns_hatena   ).'<br>';
						$html_sns	.=	sns_counter($data->sns_pocket   ).'<br>';

						// サムネイル
						$thumbnail_url				=	null;
						$html_thumbnail				=	null;
						if	($domain == $this->domain ) {
							$post_id				=	url_to_postid($data->url );											// 記事IDを取得
							$thumbnail_id			=	get_post_thumbnail_id($post_id );									// サムネイルIDを取得
							if	($thumbnail_id ) {
								$thumbnail_size		=	$this->options['in-thumbnail-size'] ? $this->options['in-thumbnail-size'] : 'thumbnail' ;
								$attach				=	wp_get_attachment_image_src($thumbnail_id, $thumbnail_size, true );	// サムネイルを取得
								if	(isset($attach ) && count($attach ) > 3 && isset($attach[0]) ) {
									$thumbnail_url	=	$attach[0];
								}
							}
						} else {
							if	($data->thumbnail ) {
								$thumbnail_url		=	$this->pz_GetThumbnail($data->thumbnail );
							}
						}
						if	($thumbnail_url ) {
							$html_thumbnail			=	'<a href="'.esc_url($thumbnail_url ).'" target="_blank" class="pz-lkc-man-thumbnail"><div><img src="'.esc_url($thumbnail_url ).'" alt="" class="pz-lkc-man-thumbnail-img"></div></a>';
						}

						// 記事ID
						$html_post_id		=	null;
						for	($j = 1; $j < 5; $j++ ) {
							$use_post_id	=	'use_post_id'.$j;
							$post_id		=	$data->$use_post_id;
							if	($post_id > 0 ) {
								$html_post_id	.=	'<a href="'.esc_url(get_permalink($post_id ) ).'" target="_blank" title="'.get_the_title($post_id ).'">'.$post_id.'</a><br>';
							}
						}

						// HTTPレスポンス
						$html_result		=	'<span class="pz-lkc-man-body-result-update">'.strHTTPCode($data->update_result, $this->pz_HTTPMessage($data->update_result ) ).'</span>';
						if	($data->update_result <> $data->alive_result ) {
							$html_result	.=	'<br><span class="pz-lkc-man-body-result-alive">('.strHTTPCode($data->alive_result, $this->pz_HTTPMessage($data->alive_result ) ).')</span>';
						}
						if	($data->no_failure ) {
							$html_result	=	'<span class="pz-lkc-man-body-result-ignore">'.__('Ignore', $this->text_domain ).'</span><br>'.$html_result;
						}

						// HTML 明細行
				?>
				<tr>
					<th scope="row" class="pz-lkc-man-body-check check-column"><input id="cb-select-<?php echo $data_id; ?>" type="checkbox" name="id[]" value="<?php echo $data_id; ?>" /><div class="locked-indicator"></div></th>
					<td class="pz-lkc-man-body-id"><?php echo $data_id.$html_thumbnail; ?></td>
					<td colspan="2">
						<div class="pz-lkc-man-body-url"><?php echo $html_url; ?></div>
						<div class="pz-lkc-man-body-title"><span title="<?php echo esc_attr($title ); ?>"><?php echo $html_title; ?></span></div>
						<div id="inline_<?php echo $data_id; ?>" class="pz-lkc-man-body-menu row-actions">
							<a href="<?php echo wp_nonce_url($this->cacheman_url.'&extraction='.$extraction.'&orderby='.$orderby.'&order='.$order.'&paged='.$page_now.'&refine='.$refine.'&action=edit&id[0]='.$data_id, 'pz_cacheman' ); ?>"><?php _e('Edit',$this->text_domain ); ?></a> | 
							<a href="<?php echo wp_nonce_url($this->cacheman_url.'&extraction='.$extraction.'&orderby='.$orderby.'&order='.$order.'&paged='.$page_now.'&refine='.$refine.'&action=renew&id[0]='.$data_id, 'pz_cacheman' ); ?>" onclick="return confirm(<?php echo "'".__('Are you sure?', $this->text_domain )."'"; ?> );"><?php _e('Renew',$this->text_domain ); ?></a> | 
							<a href="<?php echo wp_nonce_url($this->cacheman_url.'&extraction='.$extraction.'&orderby='.$orderby.'&order='.$order.'&paged='.$page_now.'&refine='.$refine.'&action=delete&id[0]='.$data_id, 'pz_cacheman' ); ?>" onclick="return confirm(<?php echo "'".__('Are you sure?', $this->text_domain )."'"; ?> );"><?php _e('Delete',$this->text_domain ); ?></a>
						</div>
					</td>
					<td><div class="pz-lkc-man-body-excerpt" title="<?php echo esc_attr($excerpt); ?>"><?php echo $html_excerpt; ?></div></td>
					<td class="pz-lkc-man-body-charset pz-lkc-admin-only"><?php echo htmlspecialchars($data->charset ); ?></td>
					<td>
						<div class="pz-lkc-man-body-domain">
							<?php
								$disp_domain	=	(function_exists('idn_to_utf8' ) && mb_substr($domain, 0, 4) == 'xn--') ? idn_to_utf8($domain, 0, INTL_IDNA_VARIANT_UTS46 ) : $domain ;
								$disp_sitename	=	esc_html($data->site_name );
							?>
							<span class="pz-lkc-man-body-domain"   title="<?php echo $disp_domain;   ?>"><?php echo $disp_domain;   ?></span><br>
							<span class="pz-lkc-man-body-sitename" title="<?php echo $disp_sitename; ?>"><?php echo $disp_sitename; ?></span>
						</div>
					</td>
					<td class="pz-lkc-man-body-sns"><?php echo $html_sns; ?></td>
					<td class="pz-lkc-man-body-resist-time pz-lkc-admin-only"><?php $dt=$data->regist_time; ?><span title="<?php echo date($this->datetime_format, $dt); ?>"><?php echo date('Y', $dt ); ?><br><?php echo date('m/d', $dt ); ?><br><?php echo date('H:i', $dt ); ?></span></td></td>
					<td class="pz-lkc-man-body-update-time"><?php $dt=$data->update_time; ?><span title="<?php echo date($this->datetime_format, $dt); ?>"><?php echo date('Y', $dt ); ?><br><?php echo date('m/d', $dt ); ?><br><?php echo date('H:i', $dt ); ?></span></td></td>
					<td class="pz-lkc-man-body-sns-time pz-lkc-admin-only"><?php $dt=$data->sns_time; ?><span title="<?php echo date($this->datetime_format, $dt); ?>"><?php echo date('Y', $dt ); ?><br><?php echo date('m/d', $dt ); ?><br><?php echo date('H:i', $dt ); ?></span></td></td>
					<td class="pz-lkc-man-body-alive-time pz-lkc-admin-only"><?php $dt=$data->alive_time; ?><span title="<?php echo date($this->datetime_format, $dt); ?>"><?php echo date('Y', $dt ); ?><br><?php echo date('m/d', $dt ); ?><br><?php echo date('H:i', $dt ); ?></span></td></td>
					<td class="pz-lkc-man-body-post-id"><?php echo $html_post_id; ?></td>
					<td class="pz-lkc-man-body-result"><?php echo $html_result; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

			<div class="pz-lkc-man-navi tablenav bottom">
				<div class="pz-lkc-man-pages tablenav-pages">
				<span class="displaying-num"><?php printf(($count_now == 1 ? __('%d item', $this->text_domain ) : __('%d items', $this->text_domain ) ), $count_now ); ?></span>
				<span class="pagination-links">
					<?php $href = $this->cacheman_url.'&extraction='.$extraction.'&orderby='.$orderby.'&order='.$order.'&refine='.$refine.'&keyword='.$keyword.'&paged='; ?>
					<?php echo strPageButton('first-page',	$href, $page_now, $page_min); ?>
					&nbsp;
					<?php echo strPageButton('prev-page',	$href, $page_now, $page_min); ?>
					&nbsp;
					<span class="paging-input">
						<input type="text" id="current-page-selector" name="paged" class="current-page" value="<?php echo $page_now; ?>" size="2" aria-describedby="table-paging" />
						&nbsp;/&nbsp;
						<span class="total-pages"><?php echo $page_max; ?></span>
					</span>
					&nbsp;
					<?php echo strPageButton('next-page',	$href, $page_now, $page_max); ?>
					&nbsp;
					<?php echo strPageButton('last-page',	$href, $page_now, $page_max); ?>
				</span>
			</div>

	</form>
<?php
	// ページナビゲータボタン
	function strPageButton($class_name, $href, $page_now, $page_value ) {
		$enabled			=	false;

		switch	($class_name ) {
		case	'first-page':
			$button			=	'&laquo;';
			if	($page_now - 1 > $page_value ) {
				$enabled	=	true;
				$page_link	=	$page_value;
			}
			break;
		case	'prev-page':
			$button			=	'&lsaquo;';
			if	($page_now > $page_value ) {
				$enabled	=	true;
				$page_link	=	$page_now - 1;
			}
			break;
		case	'next-page':
			$button			=	'&rsaquo;';
			if	($page_now < $page_value ) {
				$enabled	=	true;
				$page_link	=	$page_now + 1;
			}
			break;
		case	'last-page':
			$button			=	'&raquo;';
			if	($page_now + 1 < $page_value ) {
				$enabled	=	true;
				$page_link	=	$page_value;
			}
			break;
		}

		if	($enabled ) {
			return	'<a class="'.$class_name.' button" href="'.$href.$page_link.'">'.$button.'</a>';
		} else {
			return	'<span class="tablenav-pages-navspan button disabled">'.$button.'</span>';
		}
	}

	// ヘッダー表示（ソート用のボタン付）
	function strHeaderTitleWithSort($item, $text, $cacheman_url ) {
		$orderby		=	isset($_REQUEST['orderby'] )	? $_REQUEST['orderby']		: null;
		$order			=	isset($_REQUEST['order'] )		? $_REQUEST['order']		: null;
		$refine			=	isset($_REQUEST['refine'] )		? $_REQUEST['refine']		: null;
		$keyword		=	isset($_REQUEST['keyword'] )	? $_REQUEST['keyword']		: null;
		$extraction		=	isset($_REQUEST['extraction'] )	? $_REQUEST['extraction']	: null;

		$asc_chr  = '<span class="pz-lkc-man-head-orderby">🔽</span>';
		$desc_chr = '<span class="pz-lkc-man-head-orderby">🔼</span>';

		if	($item == $orderby ) {
			if	($order	==	'desc' ) {
				$mark	=	$asc_chr;
				$order	=	'asc';
			} else {
				$mark	=	$desc_chr;
				$order	=	'desc';
			}
		} else {
			$mark		=	null;
			$order		=	'desc';
		}
		return	'<a href="'.esc_url($cacheman_url.'&extraction='.$extraction.'&orderby='.$item.'&order='.$order.'&refine='.$refine.'&keyword='.$keyword ).'">'.$text.$mark.'</a>';
	}

	// HTTP結果コード
	function strHTTPCode($result, $message ) {
		if	($message ) {
			$message	=	' title="'.$message.'"';
		}
		if	(($result == 0 ) || ($result >= 100 && $result <= 399 ) ) {
			return	'<span class="pz-http-ok"'.$message.'>'.$result.'</span>';
		}
		return		'<span class="pz-http-error"'.$message.'">'.$result.'</span>';
	}

	// SNSカウントの表示（kilo → k , million → m）
	function sns_counter($count ) {
		$count		=	intval($count );
		if	($count < 0) {
			return	'-';
		}
		if			($count >= 10000000 ) {
			return	number_format($count / 1000000 ).'&nbsp;m';
		} elseif	($count >= 1000 ) {
			return	number_format($count / 1000 ).'&nbsp;k';
		} else {
			return	number_format($count );
		}
	}
