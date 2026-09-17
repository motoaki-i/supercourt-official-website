	$(function() {

			// エラーメッセージ
			var errMsgs = [];
			errMsgs[0] = '$1にYYYY/MM/DDで日付を入力してください。';
			errMsgs[1] = '$1に$2以降の日付を入力してください。';
			errMsgs[2] = '$1は$2と同じ日付です。違う日付を選択してください。';

			// 初期化
			var minDate = 4;	// 4日以降の日(6日の場合は、9日以降)
			var inputDate,date1,date2,date3;

			/**
			 * 非表示の日付を取得
			 */
			var getDenyDays = function ( elem, date ){
				// 入力された日付を取得
				inputDate = elem.val();
				date1 = $('#datepicker').val();		// 第一希望の日付を取得
				date2 = $('#datepicker2').val();	// 第二希望の日付を取得
				date3 = $('#datepicker3').val();	// 第三希望の日付を取得

				// 除外対象の配列を生成
				var inputDays = [ date1, date2, date3 ];
				var days = [];
				var cnt = 0;
				var id1,id2;
				for( var i = 0,max = inputDays.length; i < max; i++ ){
					if ( inputDays[i] != '' ) {
						var id1 = new Date(inputDays[i]);
							var id2 = new Date(inputDate);
							if (
								! inputDate ||
								id1.getYear() != id2.getYear() ||
								id1.getMonth() != id2.getMonth() ||
								id1.getDate() != id2.getDate()
							) {
								days[cnt] = inputDays[i];	// 除外対象に追加
								cnt++;
							}
					}
				}
				return days;
			};

			// datepicker共通オプション
			var dateOption = {
				minDate: '+' + ( minDate - 1 ) + 'd',
				onClose: function( dateText , inst ) {
					$(this).blur();
				},
				beforeShowDay: function(date) {

					// 選択不可にする日付を取得（入力済みの日付）
					var denyDays = getDenyDays( $(this), date );

					// 選択不可の判定
					for (var i = 0, max = denyDays.length; i < max; i++) {
						var htime = Date.parse(denyDays[i]);	// 'YYYY-MM-DD' から time へ変換
						var denyDay = new Date();
						denyDay.setTime(htime);					// time を Date へ設定
						// 選択不可
						if (denyDay.getYear() == date.getYear() && denyDay.getMonth() == date.getMonth() && denyDay.getDate() == date.getDate()){
							return [false, ''];
						}
					}
					return [true, ''];
				}
			};

			// 1番目のカレンダー
			$("#datepicker")
				.blur(function(){
					checkDateInput($(this));
				})
				.datepicker(dateOption)
				.datepicker("option", "showOn", 'both');
			// 2番目のカレンダー
			$("#datepicker2")
				.blur(function(){
					checkDateInput($(this));
				})
				.datepicker(dateOption)
				.datepicker("option", "showOn", 'both');
			// 3番目のカレンダー
			$("#datepicker3")
				.blur(function(){
					checkDateInput($(this));
				})
				.datepicker(dateOption)
				.datepicker("option", "showOn", 'both');

			/**
			 * 日付エラーを表示
			 * @param mode メッセージタイプ（error1～error3）
			 * @param str1 エラーメッセージ内の置換文字（$1）
			 * @param str2 エラーメッセージ内の置換文字（$2）
			 */
			var checkDateInput = function ( elem ) {
				inputDate = elem.val();
				if ( inputDate == '' ) {
					return true;
				}

				// 初期化
				var label1,label2,error = '';

				// 入力された日付を取得
				date1 = $('#datepicker').val();		// 第一希望の日付を取得
				date2 = $('#datepicker2').val();	// 第二希望の日付を取得
				date3 = $('#datepicker3').val();	// 第三希望の日付を取得

				// 日付整合性チェック
				if ( ! dateFormatCheck( inputDate ) ){
					alert( getErrorMessage( 0 , '第一希望' ) );
					elem.val('');
					return false;
				}

				// 日付が4日以降かチェック
				var now = new Date();			// 現在の日付
				var nowms = now.getTime();		// 現在の日付をミリ秒単位に変換 
				after = (minDate-2)*24*60*60*1000;		// ミリ秒に変換
				var oa = new Date(nowms+after);	// 現在＋何日後 のミリ秒で日付オブジェクト生成
				var od = new Date( inputDate );	// 入力された日付オブジェクト生成
				if ( od < oa ) {
					after = (minDate-1)*24*60*60*1000;		// ミリ秒に変換
					var oa2 = new Date(nowms+after);	// 現在＋何日後 のミリ秒で日付オブジェクト生成
					var afterDate = oa2.getFullYear() + '/' + ("0"+(oa2.getMonth()+1)).slice(-2) + '/' + ("0"+oa2.getDate()).slice(-2);
					switch ( elem.attr('id') ) {
						case 'datepicker':
							error = getErrorMessage( 1 , '第一希望' , afterDate );
							break;
						case 'datepicker2':
							error = getErrorMessage( 1 , '第二希望' , afterDate );
							break;
						case 'datepicker3':
							error = getErrorMessage( 1 , '第三希望' , afterDate );
							break;
					}
					alert( error );
					elem.val('');
					return false;
				};

				// 日付の重複チェック
				switch ( elem.attr('id') ) {
					case 'datepicker':

						if ( !! date1 && date1 == date2 ) {
							error = getErrorMessage( 2 , '第一希望' , '第二希望' );
						}
						if ( !! date1 && date1 == date3 ) {
							error = getErrorMessage( 2 , '第一希望' , '第三希望' );
						}
						break;
					case 'datepicker2':
						if ( !! date2 && date2 == date1 ) {
							error = getErrorMessage( 2 , '第二希望' , '第一希望' );
						}
						if ( !! date2 && date2 == date3 ) {
							error = getErrorMessage( 2 , '第二希望' , '第三希望' );
						}
						break;
					case 'datepicker3':
						if ( !! date3 && date3 == date1 ) {
							error = getErrorMessage( 2 , '第三希望' , '第一希望' );
						}
						if ( !! date3 && date3 == date2 ) {
							error = getErrorMessage( 2 , '第三希望' , '第二希望' );
						}
						break;
				}

				// エラーがある場合
				if ( error.length ) {
					alert( error );
					elem.val('');
					return false;
				}
				return true;
			};


			/**
			 * 日付整合性チェック
			 * @param string date チェックする日付
			 * @return boolean 正しければtrue
			 */
			var dateFormatCheck = function ( date ){
				// 初期化
				var result = false;
				// 入力日付のフォーマットチェック yyyy-mm-dd
				var match = date.match(/^([0-9]{4})(\/|\-)([0-9]{1,2})(\/|\-)([0-9]{1,2})$/);
				if(!!match) {
					// 日付としての妥当性チェック
					var y = parseInt(match[1],10);
					var m = parseInt(match[3],10);
					var d = parseInt(match[5],10);
					var da = new Date(y,(m - 1),d);
					if(
						(da.getFullYear() == y) &&
						(da.getMonth() == (m - 1)) &&
						(da.getDate() == d)
					){
						result = true;
					}
				}
				return result;
			};

			/**
			 * エラーメッセージを取得
			 * @param mode エラーメッセージの種類
			 * @param label1 置換文字１
			 * @param label2 置換文字２
			 * @return msg エラーメッセージ
			 */
			var getErrorMessage = function( mode , label1 ) {
				var msg;
				if ( arguments.length < 2 ) {
					msg = errMsgs[mode].replace('$1',label1);
				} else {
					msg = errMsgs[mode].replace('$1',label1).replace('$2',arguments[2]);
				}
				return msg;
			};

		});
	