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
			'has_archive' => false,
			'supports' => array( 'title' ),
		)
	);
	register_taxonomy(
		'facilitys_category',
		array('facility-list' ),
		array(
			'label' 		=> '施設情報地域選択',
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




?>

