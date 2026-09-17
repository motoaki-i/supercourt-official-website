<?php get_header('recruit'); ?>

<main id="recruit">

<div class="top-visual">
    <div class="top-visual-content">
        <h1 class="txt-jp-s mb1 txt-bold fade-in"><span class="txt-en-2l">COMPANY</span><br>会社概要</h1>
    </div>
    <figure><img src="<?php bloginfo('template_directory');?>/assets/image/recruit/recruit_company_mv.jpg" alt=""></figure>
</div>

<!--
<div class="lower-mv">
  <figure class="lower-mv-image">
    <img src="<?php bloginfo('template_directory');?>/assets/image/recruit/mv.jpg" alt="">
  </figure>
</div>
-->

<!--
<ul class="pan">
    <li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
    <li class="txt-en-s">-</li>
    <li class="txt-jp-s"><?php the_title()?></li>
</ul>
-->


<div class="recruit-company-wrapper">





<section class="company-overview">
    <h2 class="ttl-jp-2l mb1 txt-center fade-in"><span class="txt-en-s txt-bold txt-center txt-orange">OVERVIEW</span><br>会社概要</h2>
    <dl class="card-container">
        <div class="company-overview-row card">
            <dt class="ttl-jp-s txt-orange">社名</dt>
            <dd>株式会社スーパー・コート</dd>
        </div>
        <div class="company-overview-row card">
            <dt class="ttl-jp-s txt-orange">設立</dt>
            <dd>平成7年</dd>
        </div>
        <div class="company-overview-row card">
            <dt class="ttl-jp-s txt-orange">代表取締役</dt>
            <dd>有料老人ホーム／高齢者住宅の運営・管理<br>ビル・マンションの運営・管理（実績6000余室）<br>賃貸マンションの企画・設計・施工（実績300余棟）</dd>
        </div>
        <div class="company-overview-row card">
            <dt class="ttl-jp-s txt-orange">資本金</dt>
            <dd>5,000万円</dd>
        </div>
        <div class="company-overview-row card">
            <dt class="ttl-jp-s txt-orange">売上高</dt>
            <dd>233億円（令和7年3月決算）</dd>
        </div>
        <div class="company-overview-row card">
            <dt class="ttl-jp-s txt-orange">決算期</dt>
            <dd>3月</dd>
        </div>
        <div class="company-overview-row card">
            <dt class="ttl-jp-s txt-orange">本社所在地</dt>
            <dd>〒550-0005 大阪市西区西本町1-7-7CE西本町ビル</dd>
        </div>
        <div class="company-overview-row card">
            <dt class="ttl-jp-s txt-orange">従業員数</dt>
            <dd>2,661人（令和7年4月）※派遣社員を除く</dd>
        </div>
        <div class="company-overview-row card">
            <dt class="ttl-jp-s txt-orange">主要取引銀行</dt>
            <dd>りそな銀行、三菱UFJ銀行</dd>
        </div>
        <div class="company-overview-row card">
            <dt class="ttl-jp-s txt-orange">宅建免許番号</dt>
            <dd>大阪府知事（1）第63044号</dd>
        </div>
    </dl>
</section>


<!--
<section class="company-dashboard" id="data">
    <h2 class="ttl-jp-2l mb1 txt-center fade-in"><span class="txt-en-s txt-bold txt-center txt-orange">DASHBOARD</span><br>数字で見るスーパー・コート</h2>

<div class="dashboard-wrapper">

    <div id="paidLeavePieChart" class="dashboard-box">
        <div class="dashboard-titlebox">
            <h3 class="ttl-jp-m mb1 txt-bold txt-center">年間休日数</h3>
        </div>
        <div class="pie-chart-wrapper">
            <div class="pie-chart-container" data-value="107日">
                 <div class="pie-chart-css single-value" style="--target-p: 29.3%;"></div>
            </div>
        </div>
    </div>

    <div id="paidLeavePieChart" class="dashboard-box">
        <div class="dashboard-titlebox">
            <h3 class="ttl-jp-m mb1 txt-bold txt-center">有給休暇取得率</h3>
        </div>
        <div class="pie-chart-wrapper">
            <div class="pie-chart-container" data-value="87.9%">
                <div class="pie-chart-css single-value" style="--target-p: 87.9%;"></div>
            </div>
        </div>
    </div>

    <div id="paidLeavePieChart" class="dashboard-box">
        <div class="dashboard-titlebox">
            <h3 class="ttl-jp-m mb1 txt-bold txt-center">産休・育休等の取得率</h3>
        </div>
        <div class="pie-chart-wrapper">
            <div class="pie-chart-container" data-value="83.8%">
                 <div class="pie-chart-css single-value" style="--target-p: 83.8%;"></div>
            </div>
        </div>
    </div>


<div id="rankChart" class="dashboard-box">
    <div class="dashboard-titlebox">
        <h3 class="ttl-jp-m mb1 txt-bold txt-center">ケアマイスター取得状況</h3>
    </div>
    <div class="bar-chart-container vertical-chart">
        <ul class="bar-chart-list">
            <li class="bar-chart-item">
                <span class="bar-value">179名</span>
                <span class="bar-chart-label">ブロンズ</span>
                <div class="bar-wrapper"><div class="bar bronze" style="--bar-width: 78.2%;"></div></div>
            </li>
            <li class="bar-chart-item">
                <span class="bar-value">229名</span>
                <span class="bar-chart-label">シルバー</span>
                <div class="bar-wrapper"><div class="bar silver" style="--bar-width: 100%;"></div></div>
            </li>
            <li class="bar-chart-item">
                <span class="bar-value">123名</span>
                <span class="bar-chart-label">ゴールド</span>
                <div class="bar-wrapper"><div class="bar gold" style="--bar-width: 53.7%;"></div></div>
            </li>
            <li class="bar-chart-item">
                <span class="bar-value">21名</span>
                <span class="bar-chart-label">プラチナ</span>
                <div class="bar-wrapper"><div class="bar platinum" style="--bar-width: 9.2%;"></div></div>
            </li>
            <li class="bar-chart-item">
                <span class="bar-value">5名</span>
                <span class="bar-chart-label">マイスター</span>
                <div class="bar-wrapper"><div class="bar meister" style="--bar-width: 2.2%;"></div></div>
            </li>
        </ul>
    </div>
</div>

<div id="dailyMonthlyChart" class="dashboard-box">
    <div class="dashboard-titlebox">
        <h3 class="ttl-jp-m mb1 txt-bold txt-center">ありがとうが飛び交う回数<br><span class="txt-center txt-jp-s">（サンクスバッヂ流通数）</span></h3>
    </div>
    <div class="bar-chart-container vertical-chart">
        <ul class="bar-chart-list">
            <li class="bar-chart-item vertical">
                <span class="bar-value">2046枚</span>
                <span class="bar-chart-label">1日あたり（平均）</span>
                <div class="bar-wrapper"><div class="bar thanks" style="--bar-width: 3.2%;"></div></div>
            </li>
            <li class="bar-chart-item vertical">
                <span class="bar-value">63416枚</span>
                <span class="bar-chart-label">1ヵ月（合計平均）</span>
                <div class="bar-wrapper"><div class="bar thanks" style="--bar-width: 100%;"></div></div>
            </li>
        </ul>
    </div>
</div>

    <div id="rolePieChart" class="dashboard-box">
        <div class="dashboard-titlebox">
            <h3 class="ttl-jp-m mb1 txt-bold txt-center">役職割合</h3>
        </div>
        <div class="pie-chart-wrapper">
            <div class="pie-chart-css multi-segment"></div>
            <ul class="pie-chart-legend">
                <li><span style="background-color: #D95300;"></span>介護職<span class="pie-chart-value">49.7%</span></li>
                <li><span style="background-color: #FF5F00;"></span>看護師・リハビリ師<span class="pie-chart-value">31.2%</span></li>
                <li><span style="background-color: #F88A00;"></span>副主任・リーダー<span class="pie-chart-value">9.2%</span></li>
                <li><span style="background-color: #F6AA00;"></span>主任・管理者<span class="pie-chart-value">4.7%</span></li>
                <li><span style="background-color: #FBC745;"></span>その他<span class="pie-chart-value">4.4%</span></li>
                <li><span style="background-color: #FDE68A;"></span>エリアマネージャー・施設長<span class="pie-chart-value">0.8%</span></li>
            </ul>
        </div>
    </div>

    <div id="genderGraph" class="dashboard-box">
        <div class="dashboard-titlebox">
            <h3 class="ttl-jp-m mb1 txt-bold txt-center">男女比</h3>
        </div>
        <div class="pie-chart-wrapper">
            <div class="pie-chart-css" style="--male-ratio: 23.7%;"></div>
            <ul class="pie-chart-legend">
                <li><span style="background-color: #F6AA00;"></span>男性<span class="pie-chart-value">23.7%</span></li>
                <li><span style="background-color: #FF5F00;"></span>女性<span class="pie-chart-value">76.3%</span></li>
            </ul>
        </div>
    </div>

    

    
    
</div>

</section>


<p class="txt-center txt-jp-s">※2025年4月現在の統計</p>
-->

</div>


<section class="entrybanner-wrapper">
    <div class="entrybanner-simple">
        <a href="https://forms.gle/wSGeTA46agEmdJxbA" target="_blank" class="entry-link">
            <p>持てる力を思う存分発揮したい方からの<br>ご応募を心よりお待ちしています。</p>
            <span class="txt-en-2l">キャリア採用ENTRY</span>
            <svg class="circle-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle></svg>
            <svg class="arrow-icon2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </a>
    </div>
    <div class="entrybanner-simple newgraduate">
        <a href="./recruit_newgraduateinfo" class="entry-link">
            <p>私たちと一緒に成長したい方からの<br>ご応募を心よりお待ちしています。</p>
            <span class="txt-en-2l">新卒ENTRY</span>
            <svg class="circle-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle></svg>
            <svg class="arrow-icon2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </a>
    </div>
</section>


<!--
<div>
<p class="ttl-en-2l txt-black">Recruit</p>
<h1 class="txt-white bg-black"><?php the_title()?></h1>
</div>

<div class="space-2s space-2s-bottom wrap-m">
<p class="ttl-jp-2l mb1">日本一、「ありがとう」が<br class="pc-only">溢れる場所になろう。</p>
<p>地域の方々に「スーパー・コートがあるから老後が安心」と思っていただくために。<br>株式会社スーパー・コートでは、新たな仲間を募集しています。</p>
</div>
-->

</main>

<?php get_footer('recruit'); ?>