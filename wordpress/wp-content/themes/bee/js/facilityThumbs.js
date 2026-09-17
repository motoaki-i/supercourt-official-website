function facilityThumbs(facilityName) {
	var y = facilityName;

	var obj = {
		imazato: {
			service: '介護付有料老人ホーム',
			name: 'スーパー・コート今里',
			region: 'osaka',
			address: '大阪市東成区大今里西2丁目8番22号'
		},
		takatsuki_jounai: {
			service: '介護付有料老人ホーム',
			name: 'スーパー・コート高槻城内',
			region: 'osaka',
			address: '大阪府高槻市城内町1番24号'
		},
		rokujizo: {
			service: '介護付有料老人ホーム',
			name: 'スーパー・コート京・六地蔵',
			region: 'kyoto',
			address: '京都府京都市伏見区桃山町大島97-2'
		},
		mikuni: {
			service: '介護付有料老人ホーム',
			name: 'スーパー・コート三国',
			region: 'osaka',
			address: '大阪府大阪市淀川区新高4丁目4番7号'
		},
		higashiosaka_shinishikiri: {
			service: '有料老人ホーム',
			name: 'スーパー・コート東大阪新石切',
			region: 'osaka',
			address: '大阪府東大阪市西石切町5丁目1番5号'
		},
		fujimori: {
			service: 'サービス付高齢者住宅・有料老人ホーム',
			name: 'スーパー・コート京・藤森',
			region: 'kyoto',
			address: '京都府京都市伏見区深草池ノ内町11'
		},
		senrichuou: {
			service: '有料老人ホーム',
			name: 'スーパー・コート千里中央',
			region: 'osaka',
			address: '大阪府豊中市上新田4丁目5番30号'
		},
		takaida: {
			service: '介護付有料老人ホーム',
			name: 'スーパー・コート東大阪高井田',
			region: 'osaka',
			address: '大阪府東大阪市森河内西1丁目26番21号'
		},
		nishikyougoku: {
			service: 'サービス付高齢者住宅・有料老人ホーム',
			name: 'スーパー・コート京・西京極',
			region: 'kyoto',
			address: '京都府京都市右京区西京極畔勝町55'
		},
		higashiyodogawa: {
			service: '介護付有料老人ホーム',
			name: 'スーパー・コート東淀川',
			region: 'osaka',
			address: '大阪府大阪市東淀川区大道南1丁目6-28'
		},
		toyonakamomoyamadai: {
			service: '有料老人ホーム',
			name: 'スーパー・コート豊中桃山台',
			region: 'osaka',
			address: '大阪府豊中市西泉丘2丁目2451番地'
		},
		suitayamate: {
			service: '有料老人ホーム',
			name: 'スーパー・コート吹田山手',
			region: 'osaka',
			address: '大阪府吹田市山手町4丁目31番21号'
		},
		mukonosou: {
			service: '有料老人ホーム',
			name: 'スーパー・コート武庫之荘',
			region: 'hyougo',
			address: '兵庫県尼崎市南武庫之荘2-18-18'
		},
		ayameike: {
			service: '有料老人ホーム',
			name: 'スーパー・コートあやめ池',
			region: 'nara',
			address: '奈良県奈良市あやめ池南6-8-38'
		},
		nagaikouenfront: {
			service: '高齢者住宅',
			name: 'スーパー・コート長居公園フロント',
			region: 'osaka',
			address: '大阪府大阪市東住吉区鷹合3丁目11-19'
		},
		toyonakaryokuchikouen: {
			service: '有料老人ホーム',
			name: 'スーパー・コート豊中緑地公園',
			region: 'osaka',
			address: '大阪府豊中市北条町4丁目7番7号'
		},
		takatsuki: {
			service: '介護付有料老人ホーム',
			name: 'スーパー・コート高槻',
			region: 'osaka',
			address: '大阪府高槻市南庄所町14-4'
		},
		ujiookubo: {
			service: '有料老人ホーム',
			name: 'スーパー・コート宇治大久保',
			region: 'kyoto',
			address: '京都府宇治市大久保町北ノ山77-5'
		},
		kadoma: {
			service: '有料老人ホーム',
			name: 'スーパー・コート門真',
			region: 'osaka',
			address: '大阪府門真市柳町11番27号'
		},
		onobara: {
			service: '有料老人ホーム',
			name: 'スーパー・コート箕面小野原',
			region: 'osaka',
			address: '大阪府箕面市小野原西6丁目14番15号'
		},
		kire: {
			service: '介護付有料老人ホーム',
			name: 'せいりょう平野喜連',
			region: 'osaka',
			address: '大阪府大阪市平野区喜連西5-4-18'
		},
		hirano: {
			service: '介護付有料老人ホーム',
			name: 'スーパー・コート平野',
			region: 'osaka',
			address: '大阪府大阪市平野区長吉長原4丁目15-24'
		},
		yao: {
			service: '有料老人ホーム',
			name: 'スーパー・コート八尾',
			region: 'osaka',
			address: '大阪府八尾市北亀井町3丁目2-31'
		},
		minamihanayashiki: {
			service: '高齢者住宅',
			name: 'スーパー・コート南花屋敷',
			region: 'hyougo',
			address: '兵庫県川西市南花屋敷4-10-11'
		},
		jr_nara: {
			service: '有料老人ホーム',
			name: 'スーパー・コートJR奈良駅前',
			region: 'nara',
			address: '奈良県奈良市大宮町1-5-35'
		},
		higashiosaka: {
			service: '有料老人ホーム',
			name: 'スーパー・コート東大阪みと',
			region: 'osaka',
			address: '大阪府東大阪市友井2丁目20番5号'
		},
		higashisumiyoshi2: {
			service: '有料老人ホーム',
			name: 'スーパー・コート東住吉2号館',
			region: 'osaka',
			address: '大阪府大阪市東住吉区西今川4丁目17-13'
		},
		higashisumiyoshi: {
			service: '有料老人ホーム',
			name: 'スーパー・コート東住吉1号館',
			region: 'osaka',
			address: '大阪府大阪市東住吉区西今川4丁目26番14号'
		},
		inadera: {
			service: '有料老人ホーム',
			name: 'スーパー・コート猪名寺',
			region: 'hyougo',
			address: '兵庫県尼崎市猪名寺2丁目10-8'
		},
		daito: {
			service: '介護付有料老人ホーム',
			name: 'スーパー・コート大東',
			region: 'osaka',
			address: '大阪府大東市扇町13-1'
		},
		osakajo: {
			service: '介護付有料老人ホーム',
			name: 'スーパー・コート大阪城公園',
			region: 'osaka',
			address: '大阪府大阪市城東区鴫野西2-19-28'
		},
		kamo: {
			service: '介護付有料老人ホーム',
			name: 'スーパー・コート川西加茂',
			region: 'hyougo',
			address: '兵庫県川西市加茂2丁目6番23号'
		},
		kawanishi: {
			service: '介護付有料老人ホーム',
			name: 'スーパー・コート川西',
			region: 'hyougo',
			address: '兵庫県川西市東久代2丁目16番14号'
		},
		matsubara: {
			service: '有料老人ホーム',
			name: 'スーパー・コート松原',
			region: 'osaka',
			address: '大阪府松原市西野々1丁目1番1号'
		},
		shirasagi: {
			service: '有料老人ホーム',
			name: 'スーパー・コート堺白鷺',
			region: 'osaka',
			address: '大阪府堺市中区新家町531番1'
		},
		kamiishi2: {
			service: '介護付有料老人ホーム',
			name: 'スーパー・コート堺神石2号館',
			region: 'osaka',
			address: '大阪府堺市堺区神石市之町19番27号'
		},
		kamiishi: {
			service: '介護付有料老人ホーム',
			name: 'スーパー・コート堺神石',
			region: 'osaka',
			address: '大阪府堺市堺区神石市之町7番28号'
		},
		sakai: {
			service: '介護付有料老人ホーム',
			name: 'スーパー・コート堺',
			region: 'osaka',
			address: '大阪府堺市北区百舌鳥赤畑町4-341-1'
		},
		takaishi: {
			service: '有料老人ホーム',
			name: 'スーパー・コート高石羽衣',
			region: 'osaka',
			address: '大阪府高石市高師浜4丁目1番22号'
		},
		koriyama: {
			service: '介護付有料老人ホーム',
			name: 'スーパー・コート郡山筒井',
			region: 'nara',
			address: '奈良県大和郡山市筒井町856-2'
		},
		shijo: {
			service: '有料老人ホーム',
			name: 'スーパー・コート京・四条大宮',
			region: 'kyoto',
			address: '京都府京都市中京区壬生坊城町14-8'
		},
		katsura: {
			service: '有料老人ホーム',
			name: 'スーパー・コート京・桂',
			region: 'kyoto',
			address: '京都府京都市西京区桂朝日町123'
		},
		ibaraki: {
			service: '有料老人ホーム',
			name: 'スーパー・コート茨木彩都',
			region: 'osaka',
			address: '大阪府茨木市彩都やまぶき2丁目5-36'
		},
		sakuradori: {
			service: '有料老人ホーム',
			name: 'スーパー・コート茨木さくら通り',
			region: 'osaka',
			address: '大阪府茨木市沢良宜東町19番36号'
		},
		tatsumi: {
			service: 'グループホーム・デイサービス',
			name: 'せいりょう巽北',
			region: 'osaka',
			address: '大阪府大阪市生野区巽北3丁目4-13'
		},
		seiryo: {
			service: '在宅介護デイサービス',
			name: 'せいりょう',
			region: 'osaka',
			address: '大阪府大阪市東住吉区公園南矢田4-10-6'
		}
	};

	document.write('<div>');
	document.write('<p class="photo"><a href="/' + obj[y]['region'] + '/' + y + '.html"><img src="/images/facility/thumbs/' + y + '.jpg" alt="' + obj[y]['name'] + '"/></a></p>');
	document.write('<p class="service">' + obj[y]['service'] + '</p>');
	document.write('<h5><a href="/' + obj[y]['region'] + '/' + y + '.html">' + obj[y]['name'] + '</a></h5>');
	document.write('<p class="address">' + obj[y]['address'] + '</p>');
	document.write('</div>');

}