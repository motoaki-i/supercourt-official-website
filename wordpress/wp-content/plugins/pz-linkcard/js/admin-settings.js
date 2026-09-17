( function( $ ) {

	// 画面表示された時に実行
    $(window).load(function() {

		// エラーモード・調査モード・管理者モード・開発者モードの切り替え
		var rs = switch_mode();

		// 設定画面
		if ( $('.pz-lkc-tab-now' ).is('*' ) != false ) {

			// タブの表示／非表示
			var rs = tab_display();

			// 最後に開いていたタブを開く
			var rs = tab_open_last();

			// 項目の有効化／無効化
			var rs = switch_enabled();

		}

		// イベント：ReadOnlyになったチェックボックスを動作させなくする
		$('input:checkbox' ).on('click', checkbox_readonly );

		// クリックしたらテキスト全選択
		$('.pz-click-all-select' ).on('click', all_select );

		// 設定画面
		if ( $('.pz-lkc-tab-now' ).is('*' ) != false ) {

			// イベント：タブが切り替わった
			$('.pz-lkc-tab' ).on('click', tab_open );

			// イベント：タブの表示／非表示が切り替わった
			$('.pz-lkc-display' ).on('change', tab_display );

			// イベント：ショートコードをコピーする
			$('.pz-lkc-shortcode-1' ).on('keyup', copy_shortcode );

			// イベント：カラーピッカーとテキストボックスの同期
			$('.pz-lkc-sync-text' ).on('keyup change', sync_text );

			// イベント：すべてのWP-Cronスケジュールを表示する
			$('.pz-lkc-cron-all' ).on('change', show_all_cron );

			// 自動変換のチェックが入っているときだけ、オプション設定を有効化
			$('.pz-lkc-sync-check,.pz-lkc-tab-show' ).on('change', switch_enabled );

			// エラーモード・調査モード・管理者モード・開発者モードの切り替え
			$('input[name="pz-lkc-error"],input[name="pz-lkc-debug"],input[name="pz-lkc-admin"],input[name="pz-lkc-develop"]' ).on('change', switch_mode );

		}

		$('.pz-lkc-dashboard' ).show();

	} );

	// タブの表示／非表示
	function tab_display() {
		$('.pz-lkc-tab' ).each(function() {
			var name = $(this).attr('name' );
			if ( ( $(`input[name="${name}"]`).is('*' ) == false ) || ( $(`input[name="${name}"]`).val() == true ) ) {
				$(this).removeClass("pz-lkc-hide");
				$(this).addClass("pz-lkc-show");
			} else {
				$(this).removeClass("pz-lkc-show");
				$(this).addClass("pz-lkc-hide");
			}
		})
	}

	// 最後に開いていたタブを開く
	function tab_open_last() {
		var name = $('.pz-lkc-tab-now' ).val();
		if ( ( $(`a[name="${name}"]`).is('*' ) == false ) || ( $(`a[name="${name}"]`).css('display' ) == 'none' ) ) {
			$('.pz-lkc-tab' ).each(function() {
				if ($(this).css('display' ) != 'none' ) {
					name = $(this).attr('name' );
					return false;
				}
			})
		}
		$(`a[name="${name}"]`).addClass('pz-lkc-tab-active' );
		$(`#${name}`).addClass('pz-lkc-page-active' );
	}

	// タブの切り替え
	function tab_open() {
		$('.pz-lkc-page' ).removeClass("pz-lkc-page-active");
		$('.pz-lkc-tab' ).removeClass('pz-lkc-tab-active' );
		$(this).addClass('pz-lkc-tab-active' );
		$($(this).attr("href")).addClass("pz-lkc-page-active");
		$('.pz-lkc-tab-now' ).val($(this).attr("name"));
		return false;
	}

	// 調査モード・管理者モード・開発者モードの切り替え
	function switch_mode() {
		if ($('input[name="pz-lkc-error"]' ).is('*' ) == false || $('input[name="pz-lkc-error"]' ).val() == 1 ) {
			$('.pz-lkc-error-url' ).show();
		} else {
			$('.pz-lkc-error-url' ).hide();
		}
		if ($('input[name="pz-lkc-debug"]' ).val() == 1 ) {
			$('.pz-lkc-debug-only' ).show();
		} else {
			$('.pz-lkc-debug-only' ).hide();
			$('input[name="pz-lkc-admin"]' ).val(0 );
		}
		if ($('input[name="pz-lkc-admin"]' ).val() == 1 ) {
			$('.pz-lkc-admin-only' ).show();
		} else {
			$('.pz-lkc-admin-only' ).hide();
		}
		if ($('input[name="pz-lkc-develop"]' ).val() == 1 ) {
			$('.pz-lkc-develop-only' ).show();
		} else {
			$('.pz-lkc-develop-only' ).hide();
		}
	}

	// 自動変換のチェックが入っているときだけ、オプション設定を有効化
	function switch_enabled() {
		// 外部サイト・サムネイル選択によって、サムネイルサイズを有効／無効
		if ( $('select[name="properties[ex-thumbnail]"]' ).val() == 1 || $('select[name="properties[ex-thumbnail]"]' ).val() == 13 ) {
			var flags = false;
		} else {
			var flags = true;
		}
		$('select[name="properties[ex-thumbnail-size]"]' ).prop('disabled', flags);
		// 内部サイト・サムネイル選択によって、サムネイルサイズを有効／無効
		if ( $('select[name="properties[in-thumbnail]"]' ).val() == 1 || $('select[name="properties[in-thumbnail]"]' ).val() == 13 ) {
			var flags = false;
		} else {
			var flags = true;
		}
		$('select[name="properties[in-thumbnail-size]"]' ).prop('disabled', flags);
		// リンク検査：ユーザーエージェント使用選択によってユーザーエージェント文字列を有効／無効
		if ( $('input[name="properties[flg-agent]"]' ).prop('checked' ) == true  || $('input[name="properties[auto-url]"]' ).prop('checked' ) == true ) {
			var flags = false;
		} else {
			var flags = true;
		}
		$('input[name="properties[user-agent]"]' ).prop('readonly', flags);
		// エディタまたは自動変換選択によって、外部のみとショートコード実行を有効／無効
		if ( $('input[name="properties[auto-atag]"]' ).prop('checked' ) == true  || $('input[name="properties[auto-url]"]' ).prop('checked' ) == true ) {
			var flags = false;
		} else {
			var flags = true;
		}
		$('input[name="properties[auto-external]"]' ).prop('readonly', flags);
		$('input[name="properties[flg-do-shortcode]"]' ).prop('readonly', flags);
		// メニューを有効化する項目にチェックがある
		$('input[name="pz-lkc-error"]' ).val(Number($('input[name="properties[error-mode]"]' ).prop('checked' ) == true & $('input[name="properties[error-mode-hide]"]' ).prop('checked' ) == false ) ).change();
		$('input[name="pz-lkc-debug"]' ).val(Number($('input[name="properties[debug-mode]"]' ).prop('checked' ) ) ).change();
		$('input[name="pz-lkc-admin"]' ).val(Number($('input[name="properties[admin-mode]"]' ).prop('checked' ) ) ).change();
		$('input[name="pz-lkc-initialize"]' ).val(Number($('input[name="properties[flg-initialize]"]' ).prop('checked' ) ) ).change();
	}

	// readonlyのチェックボックスを動作させない
	function checkbox_readonly() {
		if ($(this).prop('readonly' ) == true) {
			return false;
		}
	}

	// ショートコードをコピーする
	function copy_shortcode() {
		var t = $(this).val();
		$('.pz-lkc-shortcode-copy' ).each(function() {
			$(this).text(t);
			if (t.length == 0) {
				$('.pz-lkc-shortcode-enabled' ).prop('disabled', true);
			} else {
				$('.pz-lkc-shortcode-enabled' ).prop('disabled', false);
			}
		})
	}

	// カラーピッカーとテキストボックスの同期
	function sync_text() {
		var name = $(this).attr('name' );
		var value = $(this).val();
		$(`input[name="${name}"]`).val(value);
	}

	// テキストを全選択
	function all_select() {
		switch ($(this).prop('tagName' ) ) {
		case 'INPUT':
			$(this).select();
			break;
		case 'DIV':
			var range = document.createRange();
			range.selectNodeContents(this );
			var selection = window.getSelection();
			selection.removeAllRanges();
			selection.addRange(range);
			break;
		}
	}

	// すべてのWP-Cronスケジュールを表示する
	function show_all_cron() {
		if ($(this).prop('checked' ) == true ) {
			$('.pz-lkc-cron-list-other' ).show();
		} else {
			$('.pz-lkc-cron-list-other' ).hide();
		}
	}

} ) ( jQuery );
