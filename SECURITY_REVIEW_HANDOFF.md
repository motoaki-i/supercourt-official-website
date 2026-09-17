# Security Review Handoff

この文書は、Claude Code Sonnetにこのサイトの脆弱性レビューを引き継ぐための作業指示です。

## リポジトリの前提

- 公式サイトの保存ソースであり、静的HTML、旧版バックアップ、WordPress、CGIが混在している。
- 約15,700ファイルあるため、リポジトリ全体を一度にレビューしない。
- 画像、PDF、CSS、翻訳ファイル、minifiedライブラリ、WordPressコア、第三者プラグイン全体は一次レビューの対象外とする。
- このリポジトリに含まれるコードが現在本番で有効かどうかは、別途サーバー構成と公開URLで確認する。

## 第一優先: サイト固有の入力処理

次の順番でレビューする。

1. `contactest/mailform/check.cgi`
2. `contactest/mailform/send.cgi`
3. `contactest/mailform/send.cgiBK`（旧版だが、現行との差分確認用）
4. `contactest/mailform/Jcode/` と、上記CGIから読み込まれるファイル
5. `forminclude/*.php`
6. `wordpress/wp-content/themes/bee/*.php`
7. `wordpress/wp-content/uploads/**/*.php`

### 特に確認する脆弱性

- CGI/PHPの外部入力の取得と検証不足
- メールヘッダーインジェクション、宛先・送信元の改ざん
- HTMLメールや確認画面でのXSS
- CSRF対策の有無
- ファイル読み込み、任意ファイル書き込み、コマンド実行
- 認証・権限チェックの欠落
- WordPressのnonce、`sanitize_*`、`esc_*` の不足
- アップロード領域にある実行可能PHPの意図と公開可否
- エラー内容、秘密情報、内部パスの露出

## 検出済みの注意候補

これは脆弱性確定ではなく、Sonnetが最初に確認する候補である。

- `contactest/mailform/` にメール送信CGI、旧版バックアップ、郵便番号CGIがある。
- `forminclude/*.php` はフォームのHTMLを出力し、外部のフォーム処理へ入力を渡している可能性がある。
- `wordpress/wp-content/uploads/2025/01/WPInjector.php` はアップロード領域にあるPHPであり、最優先で実体・更新日時・参照元・本番公開状態を確認する。
- `wordpress/wp-content/themes/bee/` にサイト固有のWordPressテーマがある。
- `wordpress/wp-content/themes/bee/assets/`、WordPressコア、第三者プラグインには大量の配布コードがあるため、サイト固有コードと混ぜて判定しない。
- Adminer相当の管理ツールがテーマまたはアップロード可能な領域に含まれていないか確認する。

## Sonnetへの依頼文

このリポジトリは巨大な公式サイトの保存ソースです。まず、以下の対象だけを読み、脆弱性レビューをしてください。

```text
contactest/mailform/check.cgi
contactest/mailform/send.cgi
contactest/mailform/send.cgiBK
contactest/mailform/Jcode/
forminclude/*.php
wordpress/wp-content/themes/bee/*.php
wordpress/wp-content/uploads/**/*.php
```

画像、PDF、CSS、翻訳、minifiedライブラリ、WordPressコア、第三者プラグイン全体は、対象コードから呼び出される場合を除いて読まないでください。

各指摘は次の形式で出してください。

```text
[ID] 例: FORM-001
重要度: Critical / High / Medium / Low / Informational
確信度: High / Medium / Low
場所: 相対パスと行番号
問題: 何が起きるか
成立条件: 攻撃者が何を操作できる必要があるか
根拠: 入力から危険な処理までのデータフロー
影響: 機密性・完全性・可用性への影響
修正案: 既存構成を壊さない最小の修正
確認方法: 修正後に何をテストするか
```

「危険そう」という理由だけで脆弱性確定にせず、入力元、出力先、実行経路が確認できない場合は「要確認」としてください。バックアップファイルは、本番で公開・実行可能かどうかを分けて判定してください。

## レビュー後の追加確認

Sonnetの結果を次の観点で再確認する。

1. 指摘されたファイルが現在の公開サイトから実際に呼ばれているか。
2. Webサーバーが `.cgi` と `.php` を実行可能にしているか。
3. WordPressの実運用バージョン、プラグインバージョン、PHPバージョンが何か。
4. `WPInjector.php` やAdminerが意図した管理用ファイルか、侵入後に置かれた可能性があるか。
5. 修正前後にフォームの正常送信、確認画面、メール送信、エラー処理をテストできるか。

## 依存関係について

依存関係ファイルは複数のプラグイン配下に分散している。依存関係監査はサイト固有コードのレビューと分け、次のファイルを起点に別途実施する。

- `wordpress/wp-content/plugins/contact-form-7-5.7.7/package.json`
- `wordpress/wp-content/plugins/ewww-image-optimizer/composer.json`
- `wordpress/wp-content/plugins/ewww-image-optimizer/composer.lock`
- `wordpress/wp-content/plugins/wps-hide-login/composer.json`
- `wordpress/wp-content/plugins/wps-hide-login/composer.lock`
- `wordpress/wp-content/themes/twentytwentyone/package.json`

依存関係の警告は、そのパッケージが本番で有効か、該当機能が公開されているかを確認してから優先度を決める。