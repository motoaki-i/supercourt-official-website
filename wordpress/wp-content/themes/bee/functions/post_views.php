<?php
/*---------------------------------------------------------------------------

月間アクセスランキング

---------------------------------------------------------------------------*/

//アクセス数の取得
function get_post_views( $postID ) {
	$count_key = 'views_count';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '0' );
		return 0;
	}
	return $count;
}

//今月・先月のアクセスをセット
function set_views_count( $postID ) {
	if( is_singular() ) {
		$views_count 	= get_post_meta( $postID, 'views_count', true ); // トータルアクセス数
		$this_month 	= get_post_meta( $postID, 'this_month', true ); // 前回アクセスした月
		$date 			= date( 'n' );

		// カウントの制限
		$page 	= get_post( get_the_ID() );
		$c_key 	= 'theta-' . $page->post_name;
		$hour 	= 1;

		if( empty( $_COOKIE[ $c_key ] ) ) {

			//初回アクセス
			if( !$views_count ) {
				update_post_meta( $postID, 'views_count', 1 );
				update_post_meta( $postID, 'this_month', $date );
			} else {
				//同月のアクセス
				if ( $date == $this_month ) {
					update_post_meta( $postID, 'views_count', $views_count + 1 );
				}
				//月が変わってのアクセス
				else {
					update_post_meta( $postID, 'views_count' , 1 );
					update_post_meta( $postID, 'this_month', $date );
				}
			}
			setcookie( $c_key, 'view', time() + 60 * 60 * $hour );

		}
	}

}

/*
以下のカスタムフィールドが生成されます。
views_count: 	アクセス数
this_month: 	最終アクセスの月
※手動でアクセス数を変更したい場合は、views_countというカスタムフィールドを作成して数値を変更してください。

同一ユーザーは、1時間以上たたないとカウントされません。
時間を変更したい場合は、$hourを変更してください。
※デフォルトは1時間

以下の関数を実行することで、アクセス数をカウントできます。

カウントをとりたいシングルページの先頭で以下の関数を実行してください。
※cookieを使用しているため、ページの途中で実行するとエラーになる場合があります。
--------------------------------------------------
<?php set_views_count( get_the_ID() ); ?>
--------------------------------------------------

以下を実行することで、カウント数を表示できます。
--------------------------------------------------
<?php echo get_post_views( get_the_ID() ); ?>
--------------------------------------------------

以下のクエリでランキングを表示できます。
--------------------------------------------------
<?php
$args = array(
	'meta_key'			=> 'views_count',
	'orderby'			=> 'meta_value_num',
	'order'				=> 'DESC',
	'posts_per_page' 	=> 3
);
$the_query = new WP_Query( $args );
?>
--------------------------------------------------
*/
?>