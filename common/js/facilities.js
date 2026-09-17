function facilityData( id ){							
							
	var ret = {						
							
		// osaka-city					
		mikuni: {					
			id: "mikuni",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・介護付有料老人ホーム",				
			name: "スーパー・コート三国",				
			region: "osaka",				
			group: "parkinson",				
			area_group: "osaka-city",				
			address: "大阪府大阪市淀川区新高4丁目4番7号",				
			url: "https://www.supercourt.jp/facility-list/osaka/mikuni/",				
			deposit: "0円",				
			monthly_price: "99,003円",				
            spec: [							
                "パーキンソン病専門","24時間看護体制","リハビリ特化","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		higashiyodogawa: {					
			id: "higashiyodogawa",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・介護付有料老人ホーム",				
			name: "スーパー・コート東淀川",				
			region: "osaka",				
			group: "parkinson",				
			area_group: "osaka-city",				
			address: "大阪府大阪市東淀川区大道南1丁目6番28号",				
			url: "https://www.supercourt.jp/facility-list/osaka/higashiyodogawa/",				
			deposit: "0円",				
			monthly_price: "99,703円",				
            spec: [							
                "パーキンソン病専門","24時間看護体制","リハビリ特化","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		osakajo: {					
			id: "osakajo",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・介護付有料老人ホーム",				
			name: "スーパー・コート大阪城公園",				
			region: "osaka",				
			group: "parkinson",				
			area_group: "osaka-city",				
			address: "大阪府大阪市城東区鴫野西2丁目19番28号",				
			url: "https://www.supercourt.jp/facility-list/osaka/osakajo/",				
			deposit: "0円",				
			monthly_price: "98,000円",				
            spec: [							
                "パーキンソン病専門","重度認知症対応","24時間看護体制","リハビリ特化","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		imazato: {					
			id: "imazato",				
			is_publish: true,				
			service: "介護付有料老人ホーム",				
			name: "スーパー・コート今里",				
			region: "osaka",				
			group: "osaka-city",				
			area_group: "osaka-city",				
			address: "大阪市東成区大今里西2丁目8番22号",				
			url: "https://www.supercourt.jp/facility-list/osaka/imazato/",				
			deposit: "0円",				
			monthly_price: "170,726円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		higashisumiyoshi: {					
			id: "higashisumiyoshi",				
			is_publish: true,				
			service: "有料老人ホーム",				
			name: "スーパー・コート東住吉1号館",				
			region: "osaka",				
			group: "osaka-city",				
			area_group: "osaka-city",				
			address: "大阪府大阪市東住吉区西今川4丁目26番14号",				
			url: "https://www.supercourt.jp/facility-list/osaka/higashisumiyoshi/",				
			deposit: "0円",				
			monthly_price: "128,905円～217,810円",				
			spec: [				
				前払いなし,"おいしい食事","旅行・レクリエーション"			
			]				
		},					
		higashisumiyoshi2: {					
			id: "higashisumiyoshi2",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・介護付有料老人ホーム",				
			name: "スーパー・コート東住吉2号館",				
			region: "osaka",				
			group: "parkinson",				
			area_group: "osaka-city",				
			address: "大阪府大阪市東住吉区西今川4丁目17番13号",				
			url: "https://www.supercourt.jp/facility-list/osaka/higashisumiyoshi2/",				
			deposit: "0円",				
			monthly_price: "99,703円",				
			spec: [				
                "パーキンソン病専門","がん末期・指定難病専門","24時間看護体制","リハビリ特化","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		hirano: {					
			id: "hirano",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・介護付有料老人ホーム",				
			name: "スーパー・コート平野",				
			region: "osaka",				
			group: "parkinson",				
			area_group: "osaka-city",				
			address: "大阪府大阪市平野区長吉長原4丁目15番24号",				
			url: "https://www.supercourt.jp/facility-list/osaka/hirano/",				
			deposit: "0円",				
			monthly_price: "98,000円",				
            spec: [							
                "パーキンソン病専門","24時間看護体制","リハビリ特化","リハビリ専門スペース","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		suminoe: {					
			id: "suminoe",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・介護付有料老人ホーム",				
			name: "スーパー・コート住之江",				
			region: "osaka",				
			group: "parkinson",				
			area_group: "osaka-city",				
			address: "大阪府大阪市住之江区新北島8丁目1番63号",				
			url: "https://www.supercourt.jp/facility-list/osaka/suminoe/",				
			deposit: "0円",				
			monthly_price: "98,000円",				
            spec: [							
                "パーキンソン病専門","24時間看護体制","リハビリ特化","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		kire: {					
			id: "kire",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・介護付有料老人ホーム",				
			name: "せいりょう平野喜連",				
			region: "osaka",				
			group: "parkinson",				
			area_group: "osaka-city",				
			address: "大阪府大阪市平野区喜連西5丁目4番18号",				
			url: "https://www.supercourt.jp/facility-list/osaka/kire/",				
			deposit: "0円",				
			monthly_price: "98,000円",				
			spec: [				
                "パーキンソン病専門","24時間看護体制","リハビリ特化","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		seiryo: {					
			id: "seiryo",				
			is_publish: true,				
			service: "在宅介護デイサービス",				
			name: "せいりょう",				
			region: "osaka",				
			group: "osaka-city",				
			area_group: "osaka-city",				
			address: "大阪府大阪市東住吉区公園南矢田4丁目10番6号",				
			url: "https://www.supercourt.jp/facility-list/osaka/seiryo/",				
			deposit: "-",				
			monthly_price: "-",				
			spec: [				
				おいしい食事,"旅行・レクリエーション"			
			]				
		},					
		tatsumi: {					
			id: "tatsumi",				
			is_publish: true,				
			service: "グループホーム・デイサービス",				
			name: "せいりょう巽北",				
			region: "osaka",				
			group: "osaka-city",				
			area_group: "osaka-city",				
			address: "大阪府大阪市生野区巽北3丁目4番13号",				
			url: "https://www.supercourt.jp/facility-list/osaka/tatsumi/",				
			deposit: "0円",				
			monthly_price: "146,350円",				
			spec: [				
				前払いなし,"おいしい食事","旅行・レクリエーション"			
			]				
		},					
		nagaikouenfront: {					
			id: "nagaikouenfront",				
			is_publish: true,				
			service: "高齢者住宅",				
			name: "スーパー・コート長居公園フロント",				
			region: "osaka",				
			group: "osaka-city",				
			area_group: "osaka-city",				
			address: "大阪府大阪市東住吉区鷹合3丁目11番19号",				
			url: "https://www.supercourt.jp/facility-list/osaka/nagaikouenfront/",				
			deposit: "142,000",				
			monthly_price: "42,000円～",				
			spec: [				
				おいしい食事,"旅行・レクリエーション"			
			]				
		},					
							
							
		// osaka-fu					
		pre_ikeda: {					
			id: "pre_ikeda",				
			is_publish: true,				
			service: "有料老人ホーム",				
			name: "スーパー・コート プレミアム池田",				
			region: "osaka",				
			group: "premium",				
			area_group: "osaka-fu",				
			address: "大阪府池田市井口堂3丁目1番9号",				
			url: "https://www.supercourt.jp/facility/osaka/pre_ikeda/",				
			deposit: "0円～17,976,000円",				
			monthly_price: "185,160円～399,160円",				
            spec: [							
                "プレミアム","リハビリ特化","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		olive_minamisenri: {					
			id: "olive_minamisenri",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・有料老人ホーム",				
			name: "オリーブ・南千里",				
			region: "osaka",				
			group: "parkinson",				
			area_group: "osaka-fu",				
			address: "大阪府吹田市千里山西6丁目56番3号",				
			url: "https://www.supercourt.jp/facility/osaka/olive_minamisenri/",				
			deposit: "0円",				
			monthly_price: "179,000円",				
            spec: [							
                "パーキンソン病専門","24時間看護体制","リハビリ特化","リハビリ専門スペース","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		ibaraki: {					
			id: "ibaraki",				
			is_publish: true,				
			service: "有料老人ホーム",				
			name: "スーパー・コート茨木彩都",				
			region: "osaka",				
			group: "osaka-fu",				
			area_group: "osaka-fu",				
			address: "大阪府茨木市彩都やまぶき2丁目5番36号",				
			url: "https://www.supercourt.jp/facility-list/osaka/ibaraki/",				
			deposit: "0円",				
			monthly_price: "183,726円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		sakuradori: {					
			id: "sakuradori",				
			is_publish: true,				
			service: "有料老人ホーム",				
			name: "スーパー・コート茨木さくら通り",				
			region: "osaka",				
			group: "osaka-fu",				
			area_group: "osaka-fu",				
			address: "大阪府茨木市沢良宜東町19番36号",				
			url: "https://www.supercourt.jp/facility-list/osaka/sakuradori/",				
			deposit: "0円",				
			monthly_price: "189,080円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		onobara: {					
			id: "onobara",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・有料老人ホーム",				
			name: "スーパー・コート箕面小野原",				
			region: "osaka",				
			group: "parkinson",				
			area_group: "osaka-fu",				
			address: "大阪府箕面市小野原西6丁目14番15号",				
			url: "https://www.supercourt.jp/facility-list/osaka/onobara/",				
			deposit: "0円",				
			monthly_price: "150,908円",				
            spec: [							
                "パーキンソン病専門","24時間看護体制","リハビリ特化","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		takatsuki: {					
			id: "takatsuki",				
			is_publish: true,				
			service: "介護付有料老人ホーム",				
			name: "スーパー・コート高槻",				
			region: "osaka",				
			group: "osaka-fu",				
			area_group: "osaka-fu",				
			address: "大阪府高槻市南庄所町14番4号",				
			url: "https://www.supercourt.jp/facility-list/osaka/takatsuki/",				
			deposit: "0円",				
			monthly_price: "229,080円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		takatsuki_jounai: {					
			id: "takatsuki_jounai",				
			is_publish: true,				
			service: "介護付有料老人ホーム",				
			name: "スーパー・コート高槻城内",				
			region: "osaka",				
			group: "osaka-fu",				
			area_group: "osaka-fu",				
			address: "大阪府高槻市城内町1番24号",				
			url: "https://www.supercourt.jp/facility-list/osaka/takatsuki_jounai/",				
			deposit: "0円",				
			monthly_price: "230,726円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		suitayamate: {					
			id: "suitayamate",				
			is_publish: true,				
			service: "有料老人ホーム",				
			name: "スーパー・コート吹田山手",				
			region: "osaka",				
			group: "osaka-fu",				
			area_group: "osaka-fu",				
			address: "大阪府吹田市山手町4丁目31番21号",				
			url: "https://www.supercourt.jp/facility-list/osaka/suitayamate/",				
			deposit: "0円",				
			monthly_price: "190,726円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		senrichuou: {					
			id: "senrichuou",				
			is_publish: true,				
			service: "有料老人ホーム",				
			name: "スーパー・コート千里中央",				
			region: "osaka",				
			group: "osaka-fu",				
			area_group: "osaka-fu",				
			address: "大阪府豊中市上新田4丁目5番30号",				
			url: "https://www.supercourt.jp/facility-list/osaka/senrichuou/",				
			deposit: "0円",				
			monthly_price: "204,726円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		toyonakamomoyamadai: {					
			id: "toyonakamomoyamadai",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・有料老人ホーム",				
			name: "スーパー・コート豊中桃山台",				
			region: "osaka",				
			group: "parkinson",				
			area_group: "osaka-fu",				
			address: "大阪府豊中市西泉丘2丁目2451番地",				
			url: "https://www.supercourt.jp/facility-list/osaka/toyonakamomoyamadai/",				
			deposit: "0円",				
			monthly_price: "123,000円",				
            spec: [							
                "パーキンソン病専門","リハビリ特化","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		toyonakaryokuchikouen: {					
			id: "toyonakaryokuchikouen",				
			is_publish: true,				
			service: "有料老人ホーム",				
			name: "スーパー・コート豊中緑地公園",				
			region: "osaka",				
			group: "osaka-fu",				
			area_group: "osaka-fu",				
			address: "大阪府豊中市北条町4丁目7番7号",				
			url: "https://www.supercourt.jp/facility-list/osaka/toyonakaryokuchikouen/",				
			deposit: "0円",				
			monthly_price: "174,908円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		kadoma: {					
			id: "kadoma",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・有料老人ホーム",				
			name: "スーパー・コート門真",				
			region: "osaka",				
			group: "parkinson",				
			area_group: "osaka-fu",				
			address: "大阪府門真市柳町11番27号",				
			url: "https://www.supercourt.jp/facility-list/osaka/kadoma/",				
			deposit: "0円",				
			monthly_price: "99,703円",				
            spec: [							
                "パーキンソン病専門","24時間看護体制","リハビリ特化","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		daito: {					
			id: "daito",				
			is_publish: true,				
			service: "介護付有料老人ホーム",				
			name: "スーパー・コート大東",				
			region: "osaka",				
			group: "osaka-fu",				
			area_group: "osaka-fu",				
			address: "大阪府大東市扇町13番1号",				
			url: "https://www.supercourt.jp/facility-list/osaka/daito/",				
			deposit: "0円",				
			monthly_price: "160,908円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		takaida: {					
			id: "takaida",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・介護付有料老人ホーム",				
			name: "スーパー・コート東大阪高井田",				
			region: "osaka",				
			group: "parkinson",				
			area_group: "osaka-fu",				
			address: "大阪府東大阪市森河内西1丁目26番21号",				
			url: "https://www.supercourt.jp/facility-list/osaka/takaida/",				
			deposit: "0円",				
			monthly_price: "124.908円",				
            spec: [							
                "パーキンソン病専門","24時間看護体制","リハビリ特化","リハビリ専門スペース","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		higashiosaka_shinishikiri: {					
			id: "higashiosaka_shinishikiri",				
			is_publish: true,				
			service: "有料老人ホーム",				
			name: "スーパー・コート東大阪新石切",				
			region: "osaka",				
			group: "osaka-fu",				
			area_group: "osaka-fu",				
			address: "大阪府東大阪市西石切町5丁目1番5号",				
			url: "https://www.supercourt.jp/facility-list/osaka/higashiosaka_shinishikiri/",				
			deposit: "0円",				
			monthly_price: "160,908円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		higashiosaka: {					
			id: "higashiosaka",				
			is_publish: true,				
			service: "有料老人ホーム",				
			name: "スーパー・コート東大阪みと",				
			region: "osaka",				
			group: "osaka-fu",				
			area_group: "osaka-fu",				
			address: "大阪府東大阪市友井2丁目20番5号",				
			url: "https://www.supercourt.jp/facility-list/osaka/higashiosaka/",				
			deposit: "0円",				
			monthly_price: "150,726円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		yao: {					
			id: "yao",				
			is_publish: true,				
			service: "有料老人ホーム",				
			name: "スーパー・コート八尾",				
			region: "osaka",				
			group: "osaka-fu",				
			area_group: "osaka-fu",				
			address: "大阪府八尾市北亀井町3丁目2番31号",				
			url: "https://www.supercourt.jp/facility-list/osaka/yao/",				
			deposit: "0円",				
			monthly_price: "152,080円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		matsubara: {					
			id: "matsubara",				
			is_publish: true,				
			service: "有料老人ホーム",				
			name: "スーパー・コート松原",				
			region: "osaka",				
			group: "osaka-fu",				
			area_group: "osaka-fu",				
			address: "大阪府松原市西野々1丁目1番1号",				
			url: "https://www.supercourt.jp/facility-list/osaka/matsubara/",				
			deposit: "0円",				
			monthly_price: "149,080円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		sakai: {					
			id: "sakai",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・介護付有料老人ホーム",				
			name: "スーパー・コート堺",				
			region: "osaka",				
			group: "parkinson",				
			area_group: "osaka-fu",				
			address: "大阪府堺市北区百舌鳥赤畑町4丁341番1号",				
			url: "https://www.supercourt.jp/facility-list/osaka/sakai/",				
			deposit: "0円",				

			monthly_price: "99,703円",				
            spec: [							
                "パーキンソン病専門","24時間看護体制","リハビリ特化","リハビリ専門スペース","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		shirasagi: {					
			id: "shirasagi",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・介護付有料老人ホーム",				
			name: "スーパー・コート堺白鷺",				
			region: "osaka",				
			group: "parkinson",				
			area_group: "osaka-fu",				
			address: "大阪府堺市中区新家町531番1号",				
			url: "https://www.supercourt.jp/facility-list/osaka/shirasagi/",				
			deposit: "0円",				
			monthly_price: "99,703円",				
            spec: [							
                "パーキンソン病専門","24時間看護体制","リハビリ特化","リハビリ専門スペース","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		kamiishi: {					
			id: "kamiishi",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・介護付有料老人ホーム",				
			name: "スーパー・コート堺神石",				
			region: "osaka",				
			group: "parkinson",				
			area_group: "osaka-fu",				
			address: "大阪府堺市堺区神石市之町7番28号",				
			url: "https://www.supercourt.jp/facility-list/osaka/kamiishi/",				
			deposit: "0円",				
			monthly_price: "99,703円",				
            spec: [							
                "パーキンソン病専門","がん末期受入れ可","24時間看護体制","リハビリ特化","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		kamiishi2: {					
			id: "kamiishi2",				
			is_publish: true,				
			service: "介護付有料老人ホーム",				
			name: "スーパー・コート堺神石2号館",				
			region: "osaka",				
			group: "osaka-fu",				
			area_group: "osaka-fu",				
			address: "大阪府堺市堺区神石市之町19番27号",				
			url: "https://www.supercourt.jp/facility-list/osaka/kamiishi2/",				
			deposit: "0円",				
			monthly_price: "151,608円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		takaishi: {					
			id: "takaishi",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・有料老人ホーム",				
			name: "スーパー・コート高石羽衣",				
			region: "osaka",				
			group: "parkinson",				
			area_group: "osaka-fu",				
			address: "大阪府高石市高師浜4丁目1番22号",				
			url: "https://www.supercourt.jp/facility-list/osaka/takaishi/",				
			deposit: "0円",				
			monthly_price: "99,003円",				
            spec: [							
				パーキンソン病専門,"がん末期・指定難病対応フロアあり","24時間看護体制","リハビリ特化","リハビリ専門スペース","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"			
            ]							
		},					
							
							
		// kyoto-fu					
		pre_ujiookubo: {					
			id: "pre_ujiookubo",				
			is_publish: true,				
			service: "有料老人ホーム",				
			name: "スーパー・コート プレミアム宇治",				
			region: "kyoto",				
			group: "premium",				
			area_group: "kyoto-fu",				
			address: "京都府宇治市大久保町北ノ山75番",				
			url: "https://www.supercourt.jp/facility/kyoto/pre_ujiookubo/",				
			deposit: "0円～10,920,000円",				
			monthly_price: "181,920円～311,920円",				
            spec: [							
                "プレミアム","リハビリ特化","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		shijo: {					
			id: "shijo",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・介護付有料老人ホーム",				
			name: "スーパー・コート京・四条大宮",				
			region: "kyoto",				
			group: "parkinson",				
			area_group: "kyoto-fu",				
			address: "京都府京都市中京区壬生坊城町14番8号",				
			url: "https://www.supercourt.jp/facility-list/kyoto/shijo/",				
			deposit: "0円",				
			monthly_price: "136,916円",				
            spec: [							
                "パーキンソン病専門","24時間看護体制","リハビリ特化","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		katsura: {					
			id: "katsura",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・介護付有料老人ホーム",				
			name: "スーパー・コート京・桂",				
			region: "kyoto",				
			group: "parkinson",				
			area_group: "kyoto-fu",				
			address: "京都府京都市西京区桂朝日町123",				
			url: "https://www.supercourt.jp/facility-list/kyoto/katsura/",				
			deposit: "0円",				
			monthly_price: "136,916円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		nishikyougoku: {					
			id: "nishikyougoku",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・介護付有料老人ホーム",				
			name: "スーパー・コート京・西京極",				
			region: "kyoto",				
			group: "parkinson",				
			area_group: "kyoto-fu",				
			address: "京都府京都市右京区西京極畔勝町55",				
			url: "https://www.supercourt.jp/facility-list/kyoto/nishikyougoku/",				
			deposit: "0円",				
			monthly_price: "136.916円",				
            spec: [							
                "パーキンソン病専門","24時間看護体制","リハビリ特化","リハビリ専門スペース","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		fujimori: {					
			id: "fujimori",				
			is_publish: true,				
			service: "介護付有料老人ホーム",				
			name: "スーパー・コート京・藤森",				
			region: "kyoto",				
			group: "kyoto-fu",				
			area_group: "kyoto-fu",				
			address: "京都府京都市伏見区深草池ノ内町11番3号",				
			url: "https://www.supercourt.jp/facility-list/kyoto/fujimori/",				
			deposit: "0円",				
			monthly_price: "191,821円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		rokujizo: {					
			id: "rokujizo",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・介護付有料老人ホーム",				
			name: "スーパー・コート京・六地蔵",				
			region: "kyoto",				
			group: "parkinson",				
			area_group: "kyoto-fu",				
			address: "京都府京都市伏見区桃山町大島312番地",				
			url: "https://www.supercourt.jp/facility-list/kyoto/rokujizo/",				
			deposit: "0円",				
			monthly_price: "136,916円",				
            spec: [							
                "パーキンソン病専門","24時間看護体制","リハビリ特化","リハビリ専門スペース","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		ujiookubo: {					
			id: "ujiookubo",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・有料老人ホーム",				
			name: "スーパー・コート宇治大久保",				
			region: "kyoto",				
			group: "parkinson",				
			area_group: "kyoto-fu",				
			address: "京都府宇治市大久保町北ノ山77番5号",				
			url: "https://www.supercourt.jp/facility-list/kyoto/ujiookubo/",				
			deposit: "0円",				
			monthly_price: "136,916円",				
			spec: [				
                "パーキンソン病専門","リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
							
		// hyogo-ken					
		olive_takarazuka: {					
			id: "olive_takarazuka",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・介護付有料老人ホーム",				
			name: "オリーブ・宝塚",				
			region: "hyougo",				
			group: "parkinson",				
			area_group: "hyogo-ken",				
			address: "兵庫県宝塚市光明町30番12号",				
			url: "https://www.supercourt.jp/facility/hyougo/olive_takarazuka/",				
			deposit: "0円",				
			monthly_price: "179,400円",				
            spec: [							
                "パーキンソン病専門","24時間看護体制","リハビリ特化","リハビリ専門スペース","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
							
		mukonosou: {					
			id: "mukonosou",				
			is_publish: true,				
			service: "有料老人ホーム",				
			name: "スーパー・コート武庫之荘",				
			region: "hyougo",				
			group: "hyogo-ken",				
			area_group: "hyogo-ken",				
			address: "兵庫県尼崎市南武庫之荘2丁目18番18号",				
			url: "https://www.supercourt.jp/facility-list/hyougo/mukonosou/",				
			deposit: "0円",				
			monthly_price: "184,908円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		inadera: {					
			id: "inadera",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・有料老人ホーム",				
			name: "スーパー・コート猪名寺",				
			region: "hyougo",				
			group: "parkinson",				
			area_group: "hyogo-ken",				
			address: "兵庫県尼崎市猪名寺2丁目10番8号",				
			url: "https://www.supercourt.jp/facility-list/hyougo/inadera/",				
			deposit: "0円",				
			monthly_price: "98,000円",				
            spec: [							
                "パーキンソン病専門","24時間看護体制","リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		kawanishi: {					
			id: "kawanishi",				
			is_publish: true,				
			service: "介護付有料老人ホーム",				
			name: "スーパー・コート川西",				
			region: "hyougo",				
			group: "hyogo-ken",				
			area_group: "hyogo-ken",				
			address: "兵庫県川西市東久代2丁目16番14号",				
			url: "https://www.supercourt.jp/facility-list/hyougo/kawanishi/",				
			deposit: "0円",				
			monthly_price: "174,726円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		kamo: {					
			id: "kamo",				
			is_publish: true,				
			service: "介護付有料老人ホーム",				
			name: "スーパー・コート川西加茂",				
			region: "hyougo",				
			group: "hyogo-ken",				
			area_group: "hyogo-ken",				
			address: "兵庫県川西市加茂2丁目6番23号",				
			url: "https://www.supercourt.jp/facility-list/hyougo/kamo/",				
			deposit: "0円",				
			monthly_price: "194,726円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
							
		},					
		minamihanayashiki: {					
			id: "minamihanayashiki",				
			is_publish: true,				
			service: "高齢者住宅",				
			name: "スーパー・コート南花屋敷",				
			region: "hyougo",				
			group: "hyogo-ken",				
			area_group: "hyogo-ken",				
			address: "兵庫県川西市南花屋敷4丁目10番11号",				
			url: "https://www.supercourt.jp/facility-list/hyougo/minamihanayashiki/",				
			deposit: "0円",				
			monthly_price: "159,800円",				
			spec: [				
				前払いなし,"おいしい食事","旅行・レクリエーション"			
			]				
		},					
		kobe_kita: {					
			id: "kobe_kita",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・介護付有料老人ホーム",				
			name: "スーパー・コート神戸北",				
			region: "hyougo",				
			group: "parkinson",				
			area_group: "hyogo-ken",				
			address: "兵庫県神戸市北区谷上南町15-10",				
			url: "https://www.supercourt.jp/facility-list/hyougo/kobe_kita/",				
			deposit: "0円",				
			monthly_price: "130,280円",				
			spec: [				
				パーキンソン病専門,"24時間看護体制","リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"			
			]				
		},					
							
		pre_nara_gakuenmae: {					
			id: "pre_nara_gakuenmae",				
			is_publish: true,				
			service: "有料老人ホーム",				
			name: "スーパー・コート プレミアム奈良・学園前",				
			region: "nara",				
			group: "premium",				
			area_group: "nara-ken",				
			address: "奈良県奈良市学園中2丁目1305-2",				
			url: "https://www.supercourt.jp/facility/nara/pre_nara_gakuenmae/",				
			deposit: "0円～17,724,000円",				
			monthly_price: "187,020円～398,020円",				
            spec: [							
                "プレミアム","リハビリ特化","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		jr_nara: {					
			id: "jr_nara",				
			is_publish: true,				
			service: "パーキンソン病専門住宅・有料老人ホーム",				
			name: "スーパー・コートJR奈良駅前",				
			region: "nara",				
			group: "parkinson",				
			area_group: "nara-ken",				
			address: "奈良県奈良市大宮町1丁目5番35号",				
			url: "https://www.supercourt.jp/facility-list/nara/jr_nara/",				
			deposit: "0円",				
			monthly_price: "129,908円",				
            spec: [							
                "パーキンソン病専門","24時間看護体制","リハビリ特化","リハビリ専門スペース","神経内科医・難病指定医","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		ayameike: {					
			id: "ayameike",				
			is_publish: true,				
			service: "有料老人ホーム",				
			name: "スーパー・コートあやめ池",				
			region: "nara",				
			group: "nara-ken",				
			area_group: "nara-ken",				
			address: "奈良県奈良市あやめ池南6丁目8番38号",				
			url: "https://www.supercourt.jp/facility-list/nara/ayameike/",				
			deposit: "0円",				
			monthly_price: "178,080円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
		koriyama: {					
			id: "koriyama",				
			is_publish: true,				
			service: "介護付有料老人ホーム",				
			name: "スーパー・コート郡山筒井",				
			region: "nara",				
			group: "nara-ken",				
			area_group: "nara-ken",				
			address: "奈良県大和郡山市筒井町856番2号",				
			url: "https://www.supercourt.jp/facility-list/nara/koriyama/",				
			deposit: "0円",				
			monthly_price: "154,908円",				
            spec: [							
                "リハビリ特化","前払いなし","おいしい食事","旅行・レクリエーション"							
            ]							
		},					
							
							
		// 必要？ 2021-10-18					
		seiryo_himejima: {					
			id: ",seiryo_himejima",				
			is_publish: false,				
			service: "特別養護老人ホーム",				
			name: "せいりょう姫島",				
			region: "osaka",				
			group: "osaka-city",				
			area_group: "osaka-city",				
			address: "大阪市西淀川区姫島２丁目15番8号",				
			url: "https://www.f-seiryou.com/info/himejima/",				
			deposit: "0円",				
			monthly_price: "52,510円～148,250円",				
			spec: [				
				前払いなし,"おいしい食事","旅行・レクリエーション"			
			]				
		}					
		// 必要？ 2021-10-18					
							
							
	};						
							
	if (id) return ret[id];						
							
	return ret;						
							
}							
							
function facilityList( ids, is_preview ){							
							
	var ret = [];						
							
	ids.forEach(function(id){						
							
		var sc = facilityData(id);					
							
		if (!sc) return;					
		if (!sc.is_publish && !is_preview) return;					
							
		var specs = [];					
							
		if(sc["spec"]){					
			sc["spec"].forEach(function(spec){				
				specs.push('<li>' + spec + '</li>');			
			});				
		}					
							
		if( specs.length ){					
			specs.unshift('<ul>');				
			specs.push('</ul>');				
		}					
							
		ret.push('<div>');					
		ret.push('<p class="photo"><a href="/facility/' + sc["region"] + '/' + id + '/"><img src="/images/facility/thumbs/' + id + '.jpg" alt="' + sc["name"] + '"/></a></p>');					
		ret.push('<p class="service">' + sc["service"] + '</p>');					
		ret.push('<h3><a href="' + sc["url"] + '">' + sc["name"] + '</a></h3>');					
		ret.push('<p class="address">' + sc["address"] + '</p>');					
		ret.push( specs.join("\n") );					
		ret.push('</div>');					
							
	});						
							
	return ret.join("\n");						
							
}							
							
function include(s){							
	document.write(s);						
}							
							
function filterGroup( area_id, is_preview ){							
	return Object.values( facilityData() ).filter(function(db){						
		if (!db.is_publish && !is_preview) return;					
		return db.area_group == area_id;					
	});						
}							
							
function filterSpec( search_str ){							
	return Object.values( facilityData() ).filter(function(db){						
		if (!db.spec) return false;					
		return db.spec.indexOf(search_str) > -1;					
	});						
}							
							
function convAreaHTML( data ){							
							
	var ret = [];						
							
	data.forEach(function(db){						
							
		var spec_html = [];					
		var thumb = "/images/facility/thumbs/"+ db.id +".jpg";					
							
		var db_spec = db.spec || [];					
		db_spec.forEach(function(spec){					
			spec_html.push('				
		});					
							
		if(spec_html.length){					
			spec_html.unshift('				<ul class="facility-spec">');
			spec_html.push('				</ul>');
		}					
							
		ret.push('	<li class="facility-list__item">');				
		ret.push('		<a class="facility facility-grid" href="'+ db.url +'">');			
		ret.push('			<div class="facility-grid__photo">');		
		ret.push('				<img src="'+ thumb +'" alt="" class="facility__photo" width="420" height="265">');	
		ret.push('			</div>');		
		ret.push('			<div class="facility-grid__body">');		
		ret.push('				<div class="facility__header">');	
		ret.push('					<p class="facility__service">'+ db.service +'</p>');
		ret.push('					<h3 class="facility__name">'+ db.name +'</h3>');
		ret.push('				</div>');	
		ret.push('				<table class="facility-desc">');	
		ret.push('					<tr>');
		ret.push('					
		ret.push('					
		ret.push('					</tr>');
		ret.push('					<tr>');
		ret.push('					
		ret.push('					
		ret.push('					</tr>');
		ret.push('					<tr>');
		ret.push('					
		ret.push('					
		ret.push('					</tr>');
		ret.push('				</table>');	
		ret.push(				spec_html.join("\n"));	
		ret.push('			</div>');		
		ret.push('		</a>');			
		ret.push('	</li>');				
	});						
							
	return ret.join("\n");						
}							
							
function otherCourtList(ids){							
	var ret = [];						
							
	ids.forEach(function(id, index){						
		var html = [];					
		var court = facilityData(id);					
							
		if (!court.is_publish) return true;					
							
		var thumb = "/images/facility/thumbs/"+ court.id +".jpg";					
							
		html.push('<a href="'+ court.url +'" class="court-list__item court">');					
		html.push('  <img src="'+ thumb +'" alt="" class="court__image">');					
		html.push('  <h3 class="court__name">');					
		html.push('    <span class="court__type">'+ court.service +'</span>');					
		html.push('    '+ court.name);					
		html.push('  </h3>');					
		html.push('  <address class="court__address">'+ court.address +'</address>');					
		html.push('</a>');					
		ret.push(html.join("\n"));					
	});						
	return ret;						
}							