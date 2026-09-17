<?php
// 2024リニューアル記載

//サイトタイトルのフック
add_theme_support( 'title-tag' ); //タイトルタグの出力

//ディスクリプションの設定
// コンテンツ用のディスクリプション
function get_meta_description() {
	global $post;
	$description = "";
	if ( is_home() ) {
		// ホームでは、ブログの説明文を取得
		$description = get_bloginfo( 'description' );
	}
	elseif ( is_category() ) {
		// カテゴリーページでは、カテゴリーの説明文を取得
		$description = category_description();
	}
	elseif ( is_single() ) {
		if ($post->post_excerpt) {
			// 記事ページでは、記事本文から抜粋を取得
			$description = $post->post_excerpt;
			} else {
				// post_excerpt で取れない時は、自力で記事の冒頭100文字を抜粋して取得
			$description = strip_tags($post->post_content);
			$description = str_replace("\n", "", $description);
			$description = str_replace("\r", "", $description);
			$description = mb_substr($description, 0, 100) . "...";
			}
	} else {
			;
	}
	
	return $description;
	}
	
	// 上記の取得データをメタデータに反映
	function echo_meta_description_tag() {
	if ( is_home() || is_category() || is_single() ) {
		echo '<meta name="description" content="' . get_meta_description() . '" />' . "\n";
	}
	}
	
	// すべてのアイキャッチ画像の有効化
	add_theme_support('post-thumbnails');
	
	
	// CSS,jsの読み込み
	function add_link_files() {
	
		// CSS ファイルの読み込み
		wp_enqueue_style('destyle', get_stylesheet_directory_uri() . '/assets/css/destyle.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/destyle.css'));

		wp_enqueue_style('base', get_stylesheet_directory_uri() . '/assets/css/base.css', array('destyle'), filemtime(get_stylesheet_directory() . '/assets/css/base.css'));
	
		wp_enqueue_style('style', get_stylesheet_directory_uri() . '/assets/css/style.css', array('destyle'), filemtime(get_stylesheet_directory() . '/assets/css/style.css'));
	
		wp_enqueue_style('cms', get_stylesheet_directory_uri() . '/assets/css/cms.css', array('destyle'), filemtime(get_stylesheet_directory() . '/assets/css/cms.css'));
	
		wp_enqueue_style('lp', get_stylesheet_directory_uri() . '/assets/css/lp.css', array('destyle'), filemtime(get_stylesheet_directory() . '/assets/css/lp.css'));


		wp_enqueue_script( 'facilities', get_template_directory_uri().'/assets/js/facilities.js', false, true );

		wp_enqueue_script( 'gsap', get_template_directory_uri().'/assets/js/gsap.min.js', array(), true, true );

		wp_enqueue_script( 'ScrollTrigger', get_template_directory_uri().'/assets/js/ScrollTrigger.min.js', array(), true, true );

		wp_enqueue_script( 'script', get_template_directory_uri().'/assets/js/script.js', array(), true, true );



		
		}
		
		add_action( 'wp_enqueue_scripts', 'add_link_files' );
	
	
	//adminbarの非表示
	function disable_admin_bar()
	{
	return false;
	}
	add_filter('show_admin_bar', 'disable_admin_bar');
	
	
	
	//URLスラッグの自動生成
	function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
		if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
		$slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
		}
		return $slug;
		}
		add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4 );
	
	
	function add_file_types_to_uploads($file_types){
		$new_filetypes = array();
		$new_filetypes['svg'] = 'image/svg+xml';
		$file_types = array_merge($file_types, $new_filetypes );
		return $file_types;
	}
	add_action('upload_mimes', 'add_file_types_to_uploads');
	
	
	
	
			//記事の表示順変更
	function sortpost($query) {
		if(is_admin() || !$query->is_main_query()){
				return;
		}
		//ASC:昇順、DESC:降順
		$query->set('order', 'DESC');
		//orderbyで何順に並べ替えるか指定
		$query->set('orderby', 'modified');
	}
	add_action('pre_get_posts', 'sortpost');
	
	
	//投稿アーカイブ
	function post_has_archive($args, $post_type)
	{
		if ('post' == $post_type) {
			$args['rewrite'] = true;
			$args['has_archive'] = 'news';
		}
		return $args;
	}
	add_filter('register_post_type_args', 'post_has_archive', 10, 2);


// 2024リニューアル記載ここまで





// ウィジェットエリア
// サイドバーのウィジェット thx for webcreatorbox
register_sidebar( array(
     'name' => __( 'Side Widget' ),
     'id' => 'side-widget',
     'before_widget' => '<li class="widget-container">',
     'after_widget' => '</li>',
     'before_title' => '<h3>',
     'after_title' => '</h3>',
) );

// フッターエリアのウィジェット
register_sidebar( array(
     'name' => __( 'Footer Widget' ),
     'id' => 'footer-widget',
     'before_widget' => '<div class="widget-area"><ul><li class="widget-container">',
     'after_widget' => '</li></ul></div>',
     'before_title' => '<h3>',
     'after_title' => '</h3>',
) );

// アイキャッチ画像
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size(220, 165, true ); // 幅 220px、高さ 165px、切り抜きモード

// カスタムナビゲーションメニュー
add_theme_support('menus');

add_action('pre_get_posts', function ( $query ) {
	if ( is_admin() || ! $query->is_main_query() ){
		return;
	}

	if ( $query->is_post_type_archive( 'topics' ) || is_tax( 'topics_category' )|| $query->is_search() ) {
		$query->set('posts_per_page', 10);
		$query -> set('order','DESC'); 
    $query -> set('orderby', 'date'); 
	}
	if ( $query->is_post_type_archive( 'news' ) || is_tax( 'news_category' )|| $query->is_search() ) {
		$query->set('posts_per_page', 10);
		$query -> set('order','DESC'); 
    $query -> set('orderby', 'date'); 
	}
});

// アクセスランキング
require_once locate_template( 'functions/post_views.php' );

add_filter( 'Easy_Plugins/Table_Of_Contents/Debug/Enabled', '__return_false' );

add_action('init', function() {
	register_post_type(
		'topics',
		array(
			'label' => '新着情報',
			'public' => true,
			'show_in_menu' => true,
			'has_archive' => true,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
		)
	);

	register_taxonomy(
		'topics_category',
		array( 'post', 'topics' ),
		array(
			'label' 		=> '新着情報カテゴリー',
			'hierarchical' 	=> true,
			'rewrite' 		=> true
		)
	);

	register_taxonomy(
		'author_category',
		array( 'post', 'topics' ),
		array(
			'label' 		=> '執筆者',
			'hierarchical' 	=> true,
			'rewrite' 		=> true
		)
	);

register_post_type(
    'facility-list',
    array(
        'label' => '施設情報',
        'public' => true,
        'show_in_menu' => true,
        'has_archive' => true,
        'hierarchical' => true, // 検索機能維持のため
        'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
        'rewrite' => false, // 【重要】自動ルールをオフにする
    )
);
	register_taxonomy(
		'facilitys_category',
		array('facility-list' ),
		array(
			'label' 		=> '都道府県',
			'hierarchical' 	=> true,
			'rewrite' 		=> true
		)
	);


	register_post_type(
		'news',
		array(
			'label' => 'お知らせ',
			'public' => true,
			'show_in_menu' => true,
			'has_archive' => true,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
		)
	);
	register_taxonomy(
		'news_category',
		array('news' ),
		array(
			'label' 		=> 'お知らせカテゴリー',
			'hierarchical' 	=> true,
			'rewrite' 		=> true,
			'supports' => array('title','editor','excerpt','thumbnail','author','revisions')
		)
	);
   //タグタイプの設定（カスタムタクソノミーの設定）
      register_taxonomy(
        'facilitys_tag',
        'facility-list',
        array(
          'hierarchical' => false, //タグタイプの指定（階層をもたない）
          'update_count_callback' => '_update_post_term_count',
          //ダッシュボードに表示させる名前
          'label' => 'タグ', 
          'public' => false,
          'show_ui' => true
        )
      );


			register_post_type(
				'link-list',
				array(
					'label' => 'リンク集',
					'public' => true,
					'show_in_menu' => true,
					'has_archive' => true,
					'supports' => array( 'title' ),
				)
			);
			register_taxonomy(
				'link-list_category',
				array('link-list' ),
				array(
					'label' 		=> 'リンク集カテゴリー',
					'hierarchical' 	=> true,
					'rewrite' 		=> true,
					'supports' => array('title','editor','excerpt','thumbnail','author','revisions')
				)
			);

});

// ブログ記事一覧ページの 記事表示順を変更
function set_post_types_admin_order( $wp_query ) {
	if (is_admin()) {
	$post_type = $wp_query->query['post_type'];
	if ( $post_type == 'news' ) {
	$wp_query->set('orderby', 'date'); 
	$wp_query->set('order', 'DESC');
	}
	}
	}
	add_filter('pre_get_posts', 'set_post_types_admin_order');

//カスタムタクソノミーをチェックボックスで選択できるようにする
function change_term_to_checkbox() {
  $args = get_taxonomy('facilitys_tag');
  $args -> hierarchical = true;
  $args -> meta_box_cb = 'post_categories_meta_box';
  register_taxonomy( 'facilitys_tag', 'facility-list', $args);
}
add_action( 'init', 'change_term_to_checkbox', 999 );



  add_action( 'admin_print_footer_scripts', 'select_to_radio_facilitys_category' );
  function select_to_radio_facilitys_category() {
?>
<script type="text/javascript">
jQuery(function($) {
  // 投稿画面
  $('#taxonomy-facilitys_category input[type=checkbox]').each(function() {
    $(this).replaceWith($(this).clone().attr('type', 'radio'));
  });
  // 一覧画面
  var facilitys_category_checklist = $('.facilitys_category-checklist input[type=checkbox]');
  facilitys_category_checklist.click(function() {
    $(this).parents('.facilitys_category-checklist').find(' input[type=checkbox]').attr('checked', false);
    $(this).attr('checked', true);
  });
});
</script>
<?php
}
add_action('admin_init',function(){
    add_editor_style();
});

/**
 * 内部リンクのリンクカードのサムネイル設定
 */
add_filter( 'do_shortcode_tag', function( $output, $tag, $attr, $m ) {
	if (
		$tag !== 'blogcard'
		|| strpos( $output, 'lkc-thumbnail' ) !== false		// サムネイルが既にある場合は除外
		|| strpos( $output, 'lkc-internal-wrap' ) === false // 内部リンク以外は除外
	) {
		return $output;
	}

	$thumbnailUrl = get_theme_file_uri( 'images/topics/noimage.png' );
	$thumbnailHtml = '<figure class="lkc-thumbnail"><img class="lkc-thumbnail-img" src="' . $thumbnailUrl . '"></figure>';
	$output = str_replace( '<div class="lkc-content">', '<div class="lkc-content">' . $thumbnailHtml, $output );

	return $output;
}, 10, 4 );

//管理画面の使用しないメニューを非表示にする
function remove_admin_menus() {
	global $menu;
	unset($menu[5]);	//投稿
}
add_action('admin_menu', 'remove_admin_menus');

add_filter('the_content', function ($the_content) {
	$the_content = preg_replace('/<table/i', '<div class="topics-content__table-wrapper"><table', $the_content);
	$the_content = preg_replace('/<\/table>/i', '</table></div>', $the_content);
	return $the_content;
});


add_filter('preview_post_link', function( $url, $post ) {
	if ( $post->post_type === 'topics' ) {
		$replace_url = str_replace('https://www.supercourt.jp/?', 'https://www.supercourt.jp/topics/?', $url);
		return $replace_url;
	}
	return $url;
}, 10, 2);

if ( ! function_exists( 'twentyeleven_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyeleven_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Eleven 1.0
 */
function twentyeleven_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyeleven' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 38;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 38;

						echo get_avatar( $comment, $avatar_size );
          
          
          ?>
          
          
          <div style="margin-left:50px;">
          
          <?php
        
						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s<br />%2$s', 'twentyeleven' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'twentyeleven' ), get_comment_date(), get_comment_time() )
							)
						);
					?>
					
					

					<?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
					
					</div>
					
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyeleven' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
			
			
			
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for twentyeleven_comment()





/* more-linkのハッシュ消し thanks for webdesignrecipes */
function remove_more_jump_link($link) {
  $offset = strpos($link, '#more-');
  if ($offset) {
    $end = strpos($link, '"',$offset);
  }
  if ($end) {
    $link = substr_replace($link, '', $offset, $end-$offset);
  }
  return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');





/* wpバージョン消す thanks for webdesignrecipes */

remove_action('wp_head','wp_generator');



/*コメントフィールドカスタマイズ*/


function custom_comment_fields($fields) {

$fields['author'] = '<div id="nameandurl"><div class="contentsbox" style="width:550px;"><p class="comment-form-author"><label for="author">名前:<span class="required">（必須）</span></label><br /><input id="author" name="author" type="text" value="" size="30" aria-required="true" /></p>';
$fields['email'] = '<p class="comment-form-email"><label for="email">メールアドレス:<span class="required">（必須）</span>※公開されません</label><br /><input id="email" name="email" type="text" value="" size="30" aria-required="true" /></p></div>';
$fields['url'] = '<p class="comment-form-url"><label for="url">ウェブサイト</label><br /><input id="url" name="url" type="text" value="" size="30" /></p></div>';


return $fields;


}

add_filter('comment_form_default_fields','custom_comment_fields');

function really_simple_csv_importer_save_meta_acf($meta, $post, $isUpdate)
{
    global $wpdb;

    $sqlNormal = "SELECT post_name
    FROM " . $wpdb->prefix . "posts
    WHERE post_type = 'acf-field' AND post_excerpt = '%s' LIMIT 1";

    $metaResult = [];

    foreach ($meta as $key => $value) {
        if (strpos($key, "acf_") === false) {
            $metaResult[$key] = $value;
            continue;
        }

        $acfKey = preg_replace('/^acf_(.*)/', '$1', $key);
        $metaResult[$acfKey] = $value;

        $keyStr = $acfKey;
        preg_match('/^(.*)_[0-9]{1,}_(.*)/', $acfKey, $keyMatches);
        if (isset($keyMatches[2])) {
            $keyStr = $keyMatches[2];
        }

        $prepared = $wpdb->prepare($sqlNormal, esc_sql($keyStr));
        $fieldKey = $wpdb->get_col($prepared);
        
        $metaResult["_" . $acfKey] = $fieldKey[0];
    }
    return $metaResult;
}

add_filter('really_simple_csv_importer_save_meta', 'really_simple_csv_importer_save_meta_acf', 10, 3);



/* 記事作成画面でエンターの改行を通常の行間にするための変更（2023年5月2日追記）　ここから */

function my_tiny_mce_before_init( $settings ) {
    $settings[ 'forced_root_block' ] = FALSE; //Shift+Enterの動きが逆になる
    return $settings;
}
add_filter( 'tiny_mce_before_init', 'my_tiny_mce_before_init' );

// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
} 
function wpcf7_custom_item_error_position( $items, $result ) {
    $class = 'wpcf7-not-valid-tip';
    $names = array( 'cue' ); // name属性を指定

    if ( isset( $items['invalid_fields'] ) ) {
        foreach ( $items['invalid_fields'] as $k => $v ) {
            $orig = $v['into'];
            $name = substr( $orig, strrpos($orig, ".") + 1 );
            if ( in_array( $name, $names ) ) {
                $items['invalid_fields'][$k]['into'] = ".{$class}.{$name}";
            }
        }
    }
    return $items;
}
add_filter( 'wpcf7_ajax_json_echo', 'wpcf7_custom_item_error_position', 10, 2 );

//データピッカー
function twpp_enqueue_styles() {
wp_enqueue_style( 'datetimepicker-css', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css', array(),'','all' );
}

add_action( 'wp_enqueue_scripts', 'twpp_enqueue_styles' );

function theme_import_scripts() {
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', array(), '1.8.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_import_scripts' );


add_action('wp_enqueue_scripts', 'my_enqueue_scripts');
function my_enqueue_scripts() {
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), '3.3.1');
}

/**
* contact-form-7でバリデーションを追加
*/
add_filter('wpcf7_validate_text', 'wpcf7_validate_post', 11, 2);
add_filter('wpcf7_validate_text*', 'wpcf7_validate_post', 11, 2);
add_filter('wpcf7_validate_tel', 'wpcf7_validate_post', 11, 2);
add_filter('wpcf7_validate_tel*', 'wpcf7_validate_post', 11, 2);
function wpcf7_validate_post($result,$tag){
$tag = new WPCF7_Shortcode($tag);
$name = $tag->name;
$value = isset($_POST[$name]) ? trim(wp_unslash(strtr((string) $_POST[$name], "\n", " "))) : "";
//$nameはContactForm7のフォーム要素(input等)のname="この部分"
//$valueはユーザーが入力した(選択した)値
//
//ここから項目を指定してバリデーションの追加
//

/**
*ふりがな
**/
if ($name === "your-huri") {
if(!preg_match("/^[ぁ-ん]+$/u", $value)) {
if (method_exists($result, 'invalidate')) {
$result->invalidate( $tag,"全角ひらがなで入力してください");
} else {
$result['valid'] = false;
$result['reason'][$name] = '全角ひらがなで入力してください';
}
}
}

/**
*郵便番号
**/
if ($name === "zipcode1") {
if(!preg_match("/^\d{3}\d{4}$/", $value)) {
if (method_exists($result, 'invalidate')) {
$result->invalidate( $tag,"半角７桁の郵便番号を入力してください");
} else {
$result['valid'] = false;
$result['reason'][$name] = '半角７桁の郵便番号を入力してください';
}
}
}

/**
*電話番号
**/
if ($name === "tel") {
if(!preg_match("/^\d{10,11}$/", $value)) {
if (method_exists($result, 'invalidate')) {
$result->invalidate( $tag,"電話番号の桁数を正しく入力してください");
} else {
$result['valid'] = false;
$result['reason'][$name] = '電話番号の桁数を正しく入力してください';
}
}
}



//
//ここまでバリデーションの追加
return $result;
}


function remove_redirect_guess_404_permalink( $redirect_url ) {
    if ( is_404() )
        return false;
    return $redirect_url;
}
add_filter( 'redirect_canonical', 'remove_redirect_guess_404_permalink' );





/* * --------------------------------------------------
 * カレンダー設定（jQuery UI Datepicker）と除外日設定
 * --------------------------------------------------
 */

// 1. jQuery UI Datepickerのスクリプトとスタイルを読み込む
function enqueue_custom_datepicker_assets() {
    // コンタクトフォームがあるページのみ読み込むのが理想ですが、今回は全体に読み込みます
    wp_enqueue_script('jquery-ui-datepicker');
    // デザインテーマ（Smoothness）を読み込み
    wp_enqueue_style('jquery-ui-style', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_datepicker_assets');

// 2. カレンダーの挙動設定（除外日設定）
function add_datepicker_script_footer() {
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        // 除外したい日付のリスト (YYYY-MM-DD形式)
        var disabledDates = [
            "2025-12-27", "2025-12-28", "2025-12-29", "2025-12-30", "2025-12-31",
            "2026-01-01", "2026-01-02", "2026-01-03", "2026-01-04", "2026-01-05"
        ];

        // 日本語化設定
        $.datepicker.regional['ja'] = {
            closeText: '閉じる',
            prevText: '<前',
            nextText: '次>',
            currentText: '今日',
            monthNames: ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
            monthNamesShort: ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
            dayNames: ['日曜日','月曜日','火曜日','水曜日','木曜日','金曜日','土曜日'],
            dayNamesShort: ['日','月','火','水','木','金','土'],
            dayNamesMin: ['日','月','火','水','木','金','土'],
            weekHeader: '週',
            dateFormat: 'yy-mm-dd',
            firstDay: 0,
            isRTL: false,
            showMonthAfterYear: true,
            yearSuffix: '年'
        };
        $.datepicker.setDefaults($.datepicker.regional['ja']);

        // カレンダー適用
        $('.date_box').datepicker({
            dateFormat: 'yy-mm-dd', // CF7に渡すフォーマット
            minDate: 3,             // 3日後から選択可能
            beforeShowDay: function(date) {
                // 日付を YYYY-MM-DD 形式に変換してチェック
                var y = date.getFullYear();
                var m = ("0" + (date.getMonth() + 1)).slice(-2);
                var d = ("0" + date.getDate()).slice(-2);
                var ymd = y + '-' + m + '-' + d;

                // 配列内の日付なら選択不可(false)にする
                if($.inArray(ymd, disabledDates) != -1) {
                    return [false, "ui-state-disabled"]; 
                }
                return [true];
            }
        });
    });
    </script>
    <?php
}
add_action('wp_footer', 'add_datepicker_script_footer');

// 3. サーバーサイドでのバリデーション（念のため送信時にもチェック）
add_filter('wpcf7_validate_text*', 'custom_date_validation_check', 20, 2);
add_filter('wpcf7_validate_text', 'custom_date_validation_check', 20, 2);

function custom_date_validation_check($result, $tag) {
    // 対象のフィールド名
    $target_fields = array('date-kengaku1', 'date-kengaku2', 'date-kengaku3');
    
    if (in_array($tag->name, $target_fields)) {
        $value = isset($_POST[$tag->name]) ? $_POST[$tag->name] : '';
        
        // 除外日リスト
        $excluded_dates = array(
            "2025-12-27", "2025-12-28", "2025-12-29", "2025-12-30", "2025-12-31",
            "2026-01-01", "2026-01-02", "2026-01-03", "2026-01-04", "2026-01-05"
        );

        if (in_array($value, $excluded_dates)) {
            $result->invalidate($tag, '選択された日付は休業日等のため選択できません。');
        }
    }
    return $result;
}



// === MT(Atom) フィードをPHPで取得して描画 ===
// 使用例: [mt_feed url="https://www.supercourt.jp/blog/osakajo/xml/atom.xml" count="3" more="https://www.supercourt.jp/blog/osakajo/"]

if ( ! function_exists('sc_extract_first_image') ) {
  function sc_extract_first_image( $html ) {
    $placeholder = 'https://placehold.co/320x180?text=No+Image';
    if ( preg_match('/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/i', $html, $m) ) {
      return $m[1];
    }
    return $placeholder;
  }
}

if ( ! function_exists('sc_format_jp_date') ) {
  function sc_format_jp_date( $iso8601 ) {
    try {
      $dt = new DateTime( $iso8601 );
    } catch (Exception $e) {
      return esc_html( $iso8601 );
    }
    $w = array('日','月','火','水','木','金','土');
    return $dt->format('Y.m.d') . '（' . $w[(int)$dt->format('w')] . '）';
  }
}

if ( ! function_exists('sc_fetch_mt_atom') ) {
  function sc_fetch_mt_atom( $url, $limit = 3 ) {
    $limit = max(1, (int)$limit);
    $tkey  = 'mt_atom_' . md5( $url . '|' . $limit );

    // キャッシュ（トランジェント）をまず見る
    $cached = get_transient( $tkey );
    if ( $cached !== false ) {
      return $cached;
    }

    // 取得
    $res = wp_remote_get( $url, array(
      'timeout' => 10,
      'headers' => array(
        'User-Agent' => 'WP-MT-Fetch/1.0 (+WordPress; Server-side fetch)'
      ),
      'sslverify' => true,
    ) );

    if ( is_wp_error( $res ) ) {
      return $res;
    }

    $code = wp_remote_retrieve_response_code( $res );
    if ( $code >= 400 ) {
      return new WP_Error( 'mt_http', 'MT feed HTTP error: ' . $code );
    }

    $body = wp_remote_retrieve_body( $res );
    if ( ! $body ) {
      return new WP_Error( 'mt_empty', 'MT feed body is empty.' );
    }

    // XMLパース
    libxml_use_internal_errors(true);
    $xml = simplexml_load_string( $body );
    if ( ! $xml ) {
      return new WP_Error( 'mt_xml', 'Failed to parse Atom XML.' );
    }

    $items = array();
    // Atom想定: <entry> が並ぶ
    if ( isset($xml->entry) ) {
      foreach ( $xml->entry as $entry ) {
        $title = isset($entry->title) ? (string)$entry->title : '';
        // link rel="alternate" 優先でリンク抽出
        $link  = '';
        if ( isset($entry->link) ) {
          foreach ( $entry->link as $ln ) {
            $rel = isset($ln['rel']) ? (string)$ln['rel'] : '';
            if ( $rel === 'alternate' || $rel === '' ) {
              $link = isset($ln['href']) ? (string)$ln['href'] : '';
              if ( $link ) break;
            }
          }
        }
        $published = (string)($entry->published ?? $entry->updated ?? '');
        $content   = (string)($entry->content ?? '');
        $image     = sc_extract_first_image( $content );

        $items[] = array(
          'title'     => $title,
          'link'      => $link,
          'published' => $published,
          'image'     => $image,
        );

        if ( count($items) >= $limit ) break;
      }
    }

    // 30分キャッシュ（好みで調整OK）
    set_transient( $tkey, $items, 30 * MINUTE_IN_SECONDS );
    return $items;
  }
}

if ( ! function_exists('sc_render_mt_feed_shortcode') ) {
  function sc_render_mt_feed_shortcode( $atts ) {
    $atts = shortcode_atts( array(
      'url'   => '',
      'count' => 3,
      'more'  => '', // 「もっと見る」リンク（任意）
    ), $atts, 'mt_feed' );

    if ( empty( $atts['url'] ) ) return '';

    $items = sc_fetch_mt_atom( $atts['url'], (int)$atts['count'] );
    if ( is_wp_error( $items ) ) {
      // 本番ではコメントアウトでもOK。デバッグ時は見えるようにしておくと便利。
      return '<!-- MT feed error: ' . esc_html( $items->get_error_message() ) . ' -->';
    }

    ob_start(); ?>
    <ul class="scfacility-blog__list">
      <?php if ( ! empty($items) ): ?>
        <?php foreach ( $items as $it ): ?>
          <li>
            <a href="<?php echo esc_url($it['link']); ?>" target="_blank">
              <div class="scfacility-blog__list-thumb">
                <img src="<?php echo esc_url($it['image']); ?>" alt="">
              </div>
              <div class="scfacility-blog__list-info scfacility__left-border-ttl txt-medium">
								<span class="scfacility-blog__list-date txt-12-14">
									<?php echo esc_html( sc_format_jp_date( $it['published'] ) ); ?>
								</span>
								<p class="scfacility-blog__list-ttl"><?php echo esc_html( $it['title'] ); ?></p>
							</div>
            </a>
          </li>
        <?php endforeach; ?>
      <?php else: ?>
        <p>現在、表示できる記事がありません。</p>
      <?php endif; ?>
    </う>

    <?php
    return ob_get_clean();
  }
  add_shortcode( 'mt_feed', 'sc_render_mt_feed_shortcode' );
}





/**
 * 施設一覧用のデータ取得最適化関数 (フェーズ1)
 * get_fields() を使わず get_post_meta() を直接叩くことで負荷を軽減します。
 */
function sc_get_facility_list_data($post_id) {
    if (!$post_id) return [];

    // メタデータを一括取得（1投稿あたり1クエリにする）
    $all_meta = get_post_custom($post_id);
    if (!$all_meta) return [];

    // 指定されたキーの値をデコードして返す補助関数
    $get_meta_value = function($key) use ($all_meta) {
        $val = isset($all_meta[$key][0]) ? $all_meta[$key][0] : '';
        if (is_serialized($val)) {
            return maybe_unserialize($val);
        }
        return $val;
    };

    $data = [];

    // 基本情報
    $data['area']     = $get_meta_value('area');
    $data['station']  = $get_meta_value('station');
    $data['type']     = $get_meta_value('type');
    $data['category'] = $get_meta_value('category');
    if (!is_array($data['category'])) {
        $data['category'] = $data['category'] ? [$data['category']] : [];
    }
    $data['commitment'] = $get_meta_value('commitment');
    if (!is_array($data['commitment'])) {
        $data['commitment'] = $data['commitment'] ? [$data['commitment']] : [];
    }

    // 画像
    $data['img_facility'] = $get_meta_value('img_facility'); // IDまたはURL（ACF設定による）
    $data['img_main']     = $get_meta_value('img_main');

    // 外部リンク / 特設ページ
    $data['special_page'] = [
        'url'          => $get_meta_value('special_page_url'),
        'target_blank' => $get_meta_value('special_page_target_blank'),
    ];

    // 料金プラン1 (価格と空室)
    $data['price1'] = [
        'move_in_fee'  => $get_meta_value('price1_move_in_fee'),
        'monthly_fee'  => [
            'monthly_fee_amount' => $get_meta_value('price1_monthly_fee_monthly_fee_amount'),
        ],
        'availability' => [
            'availability_answer' => $get_meta_value('price1_availability_availability_answer'),
            'availability_date'   => $get_meta_value('price1_availability_availability_date'),
        ],
    ];

    return $data;
}

/**
 * 施設検索のGETパラメータを取得・サニタイズする
 * フェーズ1: 検索ロジックの共通化
 * 
 * @return array {
 *     @type int    $entry_min          入居金下限
 *     @type int    $entry_max          入居金上限
 *     @type int    $month_min          月額下限
 *     @type int    $month_max          月額上限
 *     @type array  $ukeire             受け入れ条件配列
 *     @type array  $category           施設カテゴリ配列
 *     @type array  $area               エリア配列（キー指定可能）
 * }
 */
function sc_get_facility_search_params($area_key = '') {
    $params = [];

    // 数値パラメータ
    $params['entry_min'] = (isset($_GET['entry_min']) && $_GET['entry_min'] !== '') ? absint($_GET['entry_min']) : '';
    $params['entry_max'] = (isset($_GET['entry_max']) && $_GET['entry_max'] !== '') ? absint($_GET['entry_max']) : '';
    $params['month_min'] = (isset($_GET['month_min']) && $_GET['month_min'] !== '') ? absint($_GET['month_min']) : '';
    $params['month_max'] = (isset($_GET['month_max']) && $_GET['month_max'] !== '') ? absint($_GET['month_max']) : '';

    // 範囲スワップ（下限>上限のとき入れ替え）
    if ($params['entry_min'] !== '' && $params['entry_max'] !== '' && $params['entry_min'] > $params['entry_max']) {
        $tmp = $params['entry_min'];
        $params['entry_min'] = $params['entry_max'];
        $params['entry_max'] = $tmp;
    }
    if ($params['month_min'] !== '' && $params['month_max'] !== '' && $params['month_min'] > $params['month_max']) {
        $tmp = $params['month_min'];
        $params['month_min'] = $params['month_max'];
        $params['month_max'] = $tmp;
    }

    // 配列パラメータ（CSV/配列対応）
    $params['ukeire'] = sc_parse_array_param($_GET['ukeire'] ?? '');
    $params['category'] = sc_parse_array_param($_GET['category'] ?? '');

    // エリアパラメータ（area_osaka, area_hyougo など）
    if (!empty($area_key)) {
        $params['area'] = sc_parse_array_param($_GET[$area_key] ?? '');
    } else {
        $params['area'] = [];
    }

    return $params;
}

/**
 * 配列またはCSV文字列をサニタイズされた配列に変換
 * 
 * @param mixed $value 配列またはCSV文字列
 * @return array サニタイズされた配列
 */
function sc_parse_array_param($value) {
    if (is_array($value)) {
        return array_map('sanitize_text_field', array_filter($value, 'strlen'));
    } elseif ($value !== '') {
        return array_map('sanitize_text_field', array_filter(explode(',', $value), 'strlen'));
    }
    return [];
}

/**
 * 施設検索用のmeta_queryを構築する
 * フェーズ1: meta_query構築ロジックの共通化
 * 
 * @param array $params sc_get_facility_search_params()の戻り値
 * @param string $area_meta_key エリアのメタキー（'area_osaka', 'area_hyougo' など）
 * @return array WP_Queryで使用するmeta_query配列
 */
function sc_build_facility_meta_query($params, $area_meta_key = '') {
    $meta_query = ['relation' => 'AND'];

    $KEY_ENTRY    = 'price1_move_in_fee';
    $KEY_MONTH    = 'price1_monthly_fee_monthly_fee_amount';
    $KEY_UKEIRE   = 'price1_ukeire';
    $KEY_CATEGORY = 'category';

    // 入居金範囲
    if ($params['entry_min'] !== '') {
        $meta_query[] = [
            'key'     => $KEY_ENTRY,
            'value'   => $params['entry_min'],
            'type'    => 'NUMERIC',
            'compare' => '>='
        ];
    }
    if ($params['entry_max'] !== '') {
        $meta_query[] = [
            'key'     => $KEY_ENTRY,
            'value'   => $params['entry_max'],
            'type'    => 'NUMERIC',
            'compare' => '<='
        ];
    }

    // 月額範囲
    if ($params['month_min'] !== '') {
        $meta_query[] = [
            'key'     => $KEY_MONTH,
            'value'   => $params['month_min'],
            'type'    => 'NUMERIC',
            'compare' => '>='
        ];
    }
    if ($params['month_max'] !== '') {
        $meta_query[] = [
            'key'     => $KEY_MONTH,
            'value'   => $params['month_max'],
            'type'    => 'NUMERIC',
            'compare' => '<='
        ];
    }

    // 受け入れ条件（AND）
    if (!empty($params['ukeire'])) {
        $ukeire_group = ['relation' => 'AND'];
        foreach ($params['ukeire'] as $uk) {
            $ukeire_group[] = [
                'key'     => $KEY_UKEIRE,
                'value'   => '"' . $uk . '"',
                'compare' => 'LIKE'
            ];
        }
        $meta_query[] = $ukeire_group;
    }

    // カテゴリ（OR）
    if (!empty($params['category'])) {
        $cat_group = ['relation' => 'OR'];
        foreach ($params['category'] as $cat) {
            $cat_group[] = [
                'key'     => $KEY_CATEGORY,
                'value'   => '"' . $cat . '"',
                'compare' => 'LIKE'
            ];
        }
        $meta_query[] = $cat_group;
    }

    // エリア（OR）
    if (!empty($area_meta_key) && !empty($params['area'])) {
        $area_group = ['relation' => 'OR'];
        foreach ($params['area'] as $ar) {
            $area_group[] = [
                'key'     => $area_meta_key,
                'value'   => $ar,
                'compare' => '='
            ];
        }
        $meta_query[] = $area_group;
    }

    // 空のmeta_queryを返さない
    if (count($meta_query) === 1) {
        return [];
    }

    return $meta_query;
}

function my_custom_cta_shortcode() {
    $html = '
    <div class="cta-section">
<div class="cta-container">
<div class="cta-person"><img src="https://www.supercourt.jp/blog/common/img/model_cta.png" alt="案内スタッフ"></div>
<div class="cta-content">
<p class="cta-name"><span>＼</span>ご入居に関するお問い合わせはこちら<span>／</span></p>
<div class="cta-buttons"><a href="https://www.supercourt.jp/data_request_dl/" class="cta-btn" target="_blank"><img src="https://www.supercourt.jp/blog/common/img/btn_paper.png" alt="施設の情報をわかりやすく凝縮！資料ダウンロード（無料）"></a><a href="https://www.supercourt.jp/inspection/" class="cta-btn" target="_blank"><img src="https://www.supercourt.jp/blog/common/img/btn_kengaku.png" alt="現地の様子を丁寧にご説明！見学予約（無料）"></a></div>
<div class="cta-phone"><a href="tel:0120-532-029"><img src="https://www.supercourt.jp/blog/common/img/0120532029.png" alt="お電話でも受付中 0120-532-029"></a></div></div>
</div>
</div>';
    return $html;
}
add_shortcode('cta', 'my_custom_cta_shortcode');

// --- ここから追記 ---

/**
 * 【1】施設詳細のURLを強制的に /facility-list/都道府県/市区町村/施設名/ の形で作る
 */
add_filter('post_type_link', 'custom_facility_link', 1, 2);
function custom_facility_link($link, $post) {
    if ($post->post_type === 'facility-list') {
        $terms = get_the_terms($post->ID, 'facilitys_category');
        $pref_slug = ($terms && !is_wp_error($terms)) ? $terms[0]->slug : 'pref';

        // フィールド area_osaka 等から市区町村スラッグを取得
        $city_field_name = 'area_' . $pref_slug;
        $city_slug = get_post_meta($post->ID, $city_field_name, true);
        
        if (is_array($city_slug)) { $city_slug = $city_slug[0]; }
        if (!$city_slug) { $city_slug = 'city'; }

        // home_urlを使用して一から組み立てる（親のスラッグ重複を避けるため）
        return home_url( '/facility-list/' . $pref_slug . '/' . $city_slug . '/' . $post->post_name . '/' );
    }
    return $link;
}

/**
 * 【2】URLの「受け皿」となるリライトルールを設定（前回のホワイトリスト方式）
 */
add_action('init', 'custom_facility_rewrite_rules');
function custom_facility_rewrite_rules() {
    $city_slugs = [
        // 大阪
        'osakacity', 'sakaicity', 'higashiosakacity', 'toyonakacity', 
        'takatsukicity', 'suitacity', 'ibarakicity', 'ikedacity', 
        'minoocity', 'kadomacity', 'daitocity', 'yaocity', 
        'matsubaracity', 'takaishicity',
        // 京都
        'kyotocity', 'ujicity',
        // 兵庫
        'nishinomiyacity', 'takarazukacity', 'amagasakicity', 
        'kawanishicity', 'kobecity',
        // 奈良
        'naracity', 'yamatokoriyamacity',
        // 滋賀
        'rittocity'
    ];
    $city_regex = implode('|', $city_slugs);

    // 3階層の時だけ施設詳細として扱う
    add_rewrite_rule(
        'facility-list/([^/]+)/(' . $city_regex . ')/([^/]+)/?$',
        'index.php?facility-list=$matches[3]',
        'top'
    );

    // 施設一覧アーカイブ用
    add_rewrite_rule(
        'facility-list/?$',
        'index.php?post_type=facility-list',
        'top'
    );
}

// --- ここまで追記 ---
/**
 * 不適切な都道府県・市区町村を含むURLでアクセスされた場合、
 * 正しい階層のURLへ301リダイレクトさせる
 */
add_action('template_redirect', 'sc_enforce_facility_canonical_url');
function sc_enforce_facility_canonical_url() {
    // 施設詳細ページかつ、メインクエリの場合のみ実行
    if ( is_singular('facility-list') ) {
        global $wp;

        // 現在アクセスされているURL（ドメイン以下のパス部分）
        $current_path = home_url( $wp->request );
        $current_path = untrailingslashit($current_path); // 末尾の/を一旦消して比較

        // 本来あるべき正しいURL（custom_facility_link関数で生成されるもの）
        $canonical_url = get_permalink();
        $canonical_path = untrailingslashit($canonical_url);

        // アクセスされたURLと正しいURLが異なる場合、正しい方へ飛ばす
        if ( $current_path !== $canonical_path ) {
            wp_safe_redirect( $canonical_url, 301 );
            exit;
        }
    }
}
/**
 * コラム記事（topics）の見出し前後にバナーとCTAを自動挿入する
 */
add_filter('the_content', 'sc_insert_column_assets');
function sc_insert_column_assets($content) {
    // 投稿タイプ「topics」の詳細ページ、かつメインコンテンツの場合のみ実行
    if (!is_singular('topics') || !in_the_loop() || !is_main_query()) {
        return $content;
    }

    $template_uri = get_template_directory_uri();

    // 1. 最初のH2の後に挿入するバナーHTML
    $banner_html = <<<HTML
<div class="column_banner">
    <a href="https://www.supercourt.jp/service/nursing/">
        <picture>
            <source srcset="{$template_uri}/assets/image/cms/column_to_nursing_sp.webp" media="(max-width: 767px)"/>
            <img src="{$template_uri}/assets/image/cms/column_to_nursing.webp" loading="lazy" alt="パーキンソン病専門施設へのリンクバナー">
        </picture>
    </a>
</div>
HTML;

    // 2. 最後のH2の前に挿入するCTAエリアのHTML
    $cta_html = <<<HTML
<div class="column-cta bg-beige">
  <p class="column-cta__txt txt-medium txt-center lh-info">施設選びや介護にお悩みのかたは<br>お気軽にご相談ください。<br>介護相談のプロがあなたのお悩みに寄り添い、<br>最適な施設をご紹介いたします。</p>
  <div class="column-cta__list txt-center">
    <a class="column-cta__item column-cta__tel bg-white" href="tel:0120-532-029">
      <p class="column-cta__txt txt-medium">お電話でのお問合せはこちら</p>
      <p class="column-cta__dial bg-orange-gradiate txt-bold txt-white">ご入居相談専用ダイヤル</p>
      <p class="column-cta__tel-num txt-bold txt-orange">0120-532-029</p>
    </a>
    <div class="column-cta__item column-cta__form bg-white">
      <p class="column-cta__txt txt-medium">メールでのお問合せはこちら</p>
      <div class="column-cta__form-list txt-white">
        <a class="column-cta__form-visit" href="/inspection">
          <span class="column-cta__form-icon"><img src="{$template_uri}/assets/image/common/cta_visit.png" alt="見学申込"></span>
          <p class="column-cta__form-txt txt-bold">見学申込</p>
        </a>
        <a class="column-cta__form-document" href="/data_request">
          <span class="column-cta__form-icon"><img src="{$template_uri}/assets/image/common/cta_document.png" alt="資料請求"></span>
          <p class="column-cta__form-txt txt-bold">資料請求</p>
        </a>
        <a class="column-cta__form-contact" href="/inquirys">
          <span class="column-cta__form-icon"><img src="{$template_uri}/assets/image/common/cta_contact.png" alt="お問合せ"></span>
          <p class="column-cta__form-txt txt-bold">お問合せ</p>
        </a>
      </div>
    </div>
  </div>
</div>
HTML;

    // --- 挿入ロジック ---

    // <h2>タグを基準に分割
    $h2_pattern = '/<h2.*?>/i';
    if (preg_match_all($h2_pattern, $content, $matches, PREG_OFFSET_CAPTURE)) {
        
        // A. 最初のH2の直後にバナーを挿入
        // 最初の </h2> を探して、その直後に挿入
        $first_h2_end_pos = strpos($content, '</h2>') + 5; // </h2>の文字数分ずらす
        $content = substr_replace($content, $banner_html, $first_h2_end_pos, 0);

        // B. 最後のH2の直前にCTAを挿入
        // バナー挿入後のコンテンツから、改めて最後のH2の位置を探す
        if (preg_match_all($h2_pattern, $content, $matches, PREG_OFFSET_CAPTURE)) {
            $last_h2_match = end($matches[0]);
            $last_h2_pos = $last_h2_match[1];
            $content = substr_replace($content, $cta_html, $last_h2_pos, 0);
        }
    }

    return $content;
}
?>