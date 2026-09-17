/**
 * 施設情報を動的に追加
 *
 * WordPress の投稿タイプ「施設情報（facility_field）」の各投稿のカスタムフィールドから
 * 各施設情報を取得しています。
 */

$(function () {
	function facilityInfo(occupancy, residents, age) {
		const $target = $(".facility .wrap.outline").first();

		// 施設の空き状況
		const emptyStatusHtml = `
			<div class="wrap outline outline-empty-status">
				<h3>空き状況</h3>
				<div class="content">
					<div class="row${occupancy === "満室" ? " row--full" : ""}">
						${occupancy}
					</div>
				</div>
			</div>
		`;

		// 型チェック後挿入
		if (
			((occupancy && typeof occupancy === "string") ||
				occupancy instanceof String) &&
			occupancy !== "非表示"
		) {
			$target.before(emptyStatusHtml);
		}

		var menNum = null;
		var womenNum = null;
		var averageAge = null;

		// 型チェック
		if (residents) {
			if (
				residents.men &&
				(typeof residents.men === "string" || residents.men instanceof String)
			) {
				menNum = parseFloat(residents.men);
			}
			if (
				residents.women &&
				(typeof residents.women === "string" ||
					residents.women instanceof String)
			) {
				womenNum = parseFloat(residents.women);
			}
			age = parseFloat(age);
			if (Number.isFinite(age) && age >= 0) {
				averageAge = age;
			}
		}

		if ((menNum !== null && womenNum !== null) || averageAge !== null) {
			// 男女比率と平均年齢
			const residentsStatusHtml = `
				<div class="wrap outline outline-residents-status">
					<h3>施設情報</h3>
					<div class="content">
						<div class="residents-status">
							${
								menNum !== null && womenNum !== null
									? `
							<div class="residents-status__item">
								<h4 class="residents-status__ttl">男女比率</h4>
								<div class="residents-status__chart">
									<div class="residents-status__chart-area">
										<canvas id="residents-chart" width="221" height="221"></canvas>
										<div class="residents-status__chart-icon"></div>
									</div>
								</div>
							</div>`
									: ""
							}
							${
								averageAge !== null
									? `
							<div class="residents-status__item">
								<h4 class="residents-status__ttl">平均年齢</h4>
								<div class="residents-status__age">
									<span class="residents-status__age-int">${Math.floor(
										averageAge
									)}</span><span class="residents-status__age-frac"><span class="residents-status__age-icon"></span>${
											String(averageAge).match(/\.[0-9]+/)
												? String(averageAge).match(/\.[0-9]+/)[0]
												: ""
									  }歳</span>
								</div>
							</div>
							`
									: ""
							}
						</div>
					</div>
				</div>
			`;

			var $residentsStatus = $(residentsStatusHtml);
			
			$target.after($residentsStatus);
			$residentsStatus.ready(displayChart);

			function displayChart() {
				let context = document
					.querySelector("#residents-chart")
					.getContext("2d");

				new Chart(context, {
					type: "doughnut",
					data: {
						datasets: [
							{
								backgroundColor: ["#9D8A32", "#D8D09E"],
								data: [
									Math.round(100 * (womenNum / (menNum + womenNum))),
									Math.round(100 * (menNum / (menNum + womenNum))),
								],
							},
						],
					},
					options: {
						responsive: true,
						cutout: 65,
						legend: {
							display: false,
						},
						plugins: {
							datalabels: {
								color: "#fff",
								font: function (context) {
									if (window.innerWidth > 480) {
										return {
											weight: "bold",
											size: 22,
											lineHeight: 1,
										};
									} else {
										return {
											weight: "bold",
											size: 18,
											lineHeight: 1,
										};
									}
								},

								formatter: (value, ctx) => {
									return value + "\n%";
								},
							},
							legend: {
								display: false,
							},
						},
					},
					plugins: [ChartDataLabels],
				});
			}
		}
	}

	function qAndA(qa) {
		var $target = $(".facility .facility__inner .container").first();
		var $target_pre = $("#owner-box");
		var $facilityName =
			$(".facility .lead h1 em").text() + $(".facility .lead h1 strong").text();

		if ($facilityName.length === 0) {
			$facilityName = $(".premium-pankuzu__list").last().text();
		}

		// よくある質問
		const qaHtml = `
			<div class="facility-qa">
				<div class="facility-qa__head">	
					<h3 class="facility-qa__ttl">${
						$facilityName ? $facilityName + 'で<br class="sp">' : ""
					}よくある質問</h3>
					<p class="facility-qa__read">
						ご覧になりたい質問をクリックしてください。
					</p>
				</div>
				<div class="facility-qa__cont">
					<div class="facility-qa__list">
						${(function () {
							var text = "";
							for (item in qa) {
								if (
									qa[item]["質問"].length == 0 ||
									qa[item]["回答"].length == 0
								) {
									continue;
								}
								text =
									text +
									`
						<dl>
							<dt>
								<button>${qa[item]["質問"]}</button>
							</dt>
							<dd>
								<p>${qa[item]["回答"]}</p>
							</dd>
						</dl>
							`;
							}
							return text;
						})()}
					</div>
				</div>
			</div>
		`;

		// よくある質問の構造化データ
		const structuredData = `
			<script type="application/ld+json">
			{
				"@context": "https://schema.org",
				"@type": "FAQPage",
				"mainEntity": [
					${(function () {
						var text = "";
						var firstTime = true;
						for (item in qa) {
							if (
								qa[item]["質問"].length == 0 ||
								qa[item]["回答"].length == 0
							) {
								continue;
							}
							text =
								text +
								`
					${firstTime ? "" : ","}{
						"@type": "Question",
						"name": "${qa[item]["質問"]}",
						"acceptedAnswer": {
							"@type": "Answer",
							"text": "${qa[item]["回答"]}"
						}
					}`;
							firstTime = false;
						}
						return text;
					})()}
				]
			}
			</script>
		`;

		// よくある質問フィールドが空でないかチェック
		var emptyFlag = true;
		for (item in qa) {
			if (qa[item]["質問"].length != 0 && qa[item]["回答"].length != 0) {
				emptyFlag = false;
			}
		}

		if (!emptyFlag) {
			var $qaElm = $(qaHtml);
			// 挿入
			if ($target.length === 0) {
				$target = $target_pre;
				$qaElm = $('<div class="facility-qa__wrap"></div>').append($qaElm);
				$target.after(structuredData);
				$target.after($qaElm);
			} else {
				$target.append($qaElm);
				$target.append(structuredData);
			}
			$qaElm.ready(initQAAccordion);
		}

		function initQAAccordion() {
			const $toggleBtn = $(".facility-qa__list dl dt button");
			const $accordionCont = $(".facility-qa__list dl dd");
			$accordionCont.hide();

			$toggleBtn.on("click", function (e) {
				const $accordion = $(this).closest(".facility-qa__list dl");
				const $accordionCont = $accordion.find("dd");
				$accordionCont.hide();

				if ($accordion.hasClass("is-open")) {
					$accordion.removeClass("is-open");
					$accordionCont.show().slideUp(200);
				} else {
					$accordion.addClass("is-open");
					$accordionCont.hide().slideDown(200);
				}
			});
		}
	}

	/**
	 * お食事 - 施設情報カスタムフィールドを出力
	 * @param {*} foodCont - カスタムフィールド値
	 */
	function food(foodCont) {
		var $target = $(".facility .wrap.other");

		// コンテンツ出力
		function foodContOutput( foodCont ) {
			let foodTxt = "";
			for ( let i = 0; i < 3; i++ ) {

				// カスタムフィールド値
				let foodImage_1 = foodCont[i]["画像_1"];
				let	foodImage_2 = foodCont[i]["画像_2"];
				let foodImage_3 = foodCont[i]["画像_3"];
				let foodImage_4 = foodCont[i]["画像_4"];
				let foodImage_5 = foodCont[i]["画像_5"];
				let foodImage_6 = foodCont[i]["画像_6"];
				let foodDesc = foodCont[i]['詳細'];

				// 空の判定
				if( foodImage_1 || foodImage_2 || foodImage_3 || foodImage_4 || foodImage_5 || foodImage_6 || foodDesc ) {

					foodTxt += '<div class="food-box">';

					// 見出し
					foodTitle = "";
					if( i == 0 ) {
						foodTitle = '和食/洋食';
					} else if ( i == 1 ) {
						foodTitle = 'イベント食';
					} else if ( i == 2 ) {
						foodTitle = '面前提供';
					}
					foodTxt += '<h4 class="food-box__ttl">' + foodTitle + '</h4>';

					// 画像
					if( foodImage_1 || foodImage_2 || foodImage_3 || foodImage_4 || foodImage_5 || foodImage_6 ) {
						foodTxt += '<div class="food-list">';

						if( foodImage_1 ) {
							foodTxt += '<div class="food-item"><img src="' + foodImage_1 + '" alt="'+ foodTitle +'"></div>';
						}
						if( foodImage_2 ) {
							foodTxt += '<div class="food-item"><img src="' + foodImage_2 + '" alt="'+ foodTitle +'"></div>';
						}
						if( foodImage_3 ) {
							foodTxt += '<div class="food-item"><img src="' + foodImage_3 + '" alt="'+ foodTitle +'"></div>';
						}
						if( foodImage_4 ) {
							foodTxt += '<div class="food-item"><img src="' + foodImage_4 + '" alt="'+ foodTitle +'"></div>';
						}
						if( foodImage_5 ) {
							foodTxt += '<div class="food-item"><img src="' + foodImage_5 + '" alt="'+ foodTitle +'"></div>';
						}
						if( foodImage_6 ) {
							foodTxt += '<div class="food-item"><img src="' + foodImage_6 + '" alt="'+ foodTitle +'"></div>';
						}

						// food-list閉じタグ
						foodTxt += '</div>';
					}

					// 詳細
					if ( foodDesc ) {
						foodTxt += '<p class="food-box__txt">' + foodDesc + '</p>';
					}

					// food-box閉じタグ
					foodTxt += '</div>';

				}
			}

			return foodTxt;
		};

		// お食事
		const foodOutput = foodContOutput( foodCont );

		if ( foodOutput ) {
			const foodHtml = `
			<div class="wrap food">
				<h3 class="food-ttl">お食事</h3>
				<div class="content">
					<div class="row food-row">${foodContOutput( foodCont )}</div>
				</div>
			</div>
			`;

			var $foodElm = $(foodHtml);
			// 挿入
			if ( $target.length != 0 ) {
				$target.before($foodElm);
			} else {
				$target = $('.facility .wrap');
				if( $target.length != 0 ) {
					$target.eq(-1).after($foodElm);
				}
			}
		}
	}

	/**
	 * 施設長挨拶 - 施設情報カスタムフィールドを出力
	 * @param {*} facilityDirectorCont - カスタムフィールド値
	 */
	function facilityDirector(facilityDirectorCont) {
		var $target = $("#owner-box #img img");

		// 挿入
		if ( $target.length != 0 ) {
			$target.attr( 'src', facilityDirectorCont);
		}
	}

	function getFacilityName(currentPath) {
		if (RegExp(/^\/facility\/.+\/index\.html$/).test(currentPath)) {
			return currentPath.match(/\/([^\/]+)\/index\.html$/)[1];
		} else if (RegExp(/^\/facility\/.*\/.+\.html$/).test(currentPath)) {
			return currentPath.match(/\/([^\/]+)\.html$/)[1];
		} else if (RegExp(/^\/facility\/.*\/[^\/]+\/?$/).test(currentPath)) {
			return currentPath.match(/\/([^\/]+)\/?$/)[1];
		}
		return false;
	}

	function getFacilityNameTest() {
		function test(path, expect) {
			const result = getFacilityName(path);
			console.log("path: " + path);
			console.log("expect: " + expect);
			console.log("result: ", result);
			if (expect === result) {
				console.log("OK");
			} else {
				console.log("NG");
			}
			console.log("=========================");
		}
		test("/facility/osaka/nanika/index.html", "nanika");
		test("/facility/osaka/index.html", "osaka");
		test("/facility/index.html", false);
		test("/osaka/nanika/index.html", false);
		test("/facility/osaka/nanika.html", "nanika");
		test("/facility/osaka/nanika/", "nanika");
		test("/facility/osaka/nanika", "nanika");
		test("/facility/nanika", false);
		test("/osaka/nanika", false);
	}

	function main() {
		const facilityName = getFacilityName(location.pathname);

		if (!facilityName) {
			return;
		}

		// WordPressからデータを取得
		$.get(`/facility_field/${facilityName}/`)
			.done(function (data) {
				$("head").append(
					'<link rel="stylesheet" href="/css/facility-field.css">'
				);
				facilityInfo(
					data.status.occupancy,
					data.status.residents,
					data.status.age
				);
				qAndA(data.qa);
				if( data.foodCont ) {
					food(data.foodCont);
				}
				if(data.facilityDirectorCont) {
					facilityDirector(data.facilityDirectorCont);
					console.log( facilityDirectorCont );
				}
			})
			.fail(function (e) {
				// console.log("data fetch failed");
				// console.log(e);
			});
	}

	main();
	// getFacilityNameTest();
});
