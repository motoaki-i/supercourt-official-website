<?php defined('ABSPATH' ) || wp_die; ?>
<?php
	// エラー
	$flg_error = false;
	
	// Webフォームから入力されたクォート文字を除去する
	$check_item					=	array('ex-image', 'in-image', 'th-image', 'ex-info', 'in-info', 'th-info' );
	foreach($check_item as $key ) {
		$this->options[$key]	=	stripslashes($this->options[$key] );
	}
	
	// サイトアイコン画像取得URL
	$key	=	'favicon-api';
	$url	=	$this->options[$key] ? $this->options[$key] : $this->defaults[$key] ;
	$url	=	$this->pz_EncodeURL($url );
	$url	=	preg_replace( array('/%DOMAIN%/i', '/%DOMAIN_URL%/i', '/%URL%/i' ), array('%DOMAIN%', '%DOMAIN_URL%', '%URL%'), $url );	// パラメータ文字を大文字にする
	$this->options[$key]	=	$url;
	
	// サムネイル画像取得URL
	$key	=	'thumbnail-api';
	$url	=	$this->options[$key] ? $this->options[$key] : $this->defaults[$key] ;
	$url	=	$this->pz_EncodeURL($url );
	$url	=	preg_replace( array('/%DOMAIN%/i', '/%DOMAIN_URL%/i', '/%URL%/i' ), array('%DOMAIN%', '%DOMAIN_URL%', '%URL%'), $url );	// パラメータ文字を大文字にする
	$this->options[$key]	=	$url;
	
	// 追加CSS用URL
	$key	=	'css-add-url';
	$url	=	isset($this->options[$key] ) ? $this->options[$key] : null ;
	$url	=	$this->pz_EncodeURL($url );
	$this->options[$key]	=	$url;
	
	// 数値
	$this->options['trim-title']		=	pz_TrimNum($this->options['trim-title'] );
	$this->options['trim-url']			=	pz_TrimNum($this->options['trim-url'] );
	$this->options['trim-excerpt']		=	pz_TrimNum($this->options['trim-excerpt'] );
	$this->options['trim-info']			=	pz_TrimNum($this->options['trim-info'] );

	// 数値（px）
	$this->options['width']				=	pz_TrimNumPx($this->options['width'] );				// カード幅
	$this->options['content-height']	=	pz_TrimNumPx($this->options['content-height'] );	// 記事の高さ
	$this->options['size-title']		=	pz_TrimNumPx($this->options['size-title'] );
	$this->options['size-url']			=	pz_TrimNumPx($this->options['size-url'] );
	$this->options['size-excerpt']		=	pz_TrimNumPx($this->options['size-excerpt'] );
	$this->options['size-more']			=	pz_TrimNumPx($this->options['size-more'] );
	$this->options['size-info']			=	pz_TrimNumPx($this->options['size-info'] );
	$this->options['size-added']		=	pz_TrimNumPx($this->options['size-added'] );
	$this->options['height-title']		=	pz_TrimNumPx($this->options['height-title'] );
	$this->options['height-url']		=	pz_TrimNumPx($this->options['height-url'] );
	$this->options['height-excerpt']	=	pz_TrimNumPx($this->options['height-excerpt'] );
	$this->options['height-more']		=	pz_TrimNumPx($this->options['height-more'] );
	$this->options['height-info']		=	pz_TrimNumPx($this->options['height-info'] );
	$this->options['height-added']		=	pz_TrimNumPx($this->options['height-added'] );
	$this->options['thumbnail-width']	=	pz_TrimNumPx($this->options['thumbnail-width'] );
	$this->options['thumbnail-height']	=	pz_TrimNumPx($this->options['thumbnail-height'] );
	$this->options['border-width']		=	pz_TrimNumPx($this->options['border-width'] );
