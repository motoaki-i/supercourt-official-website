<?php get_header(); ?>

<main id="flow">

<div class="lower-mv">
  <figure class="lower-mv-image">
    <img src="<?php bloginfo('template_directory');?>/assets/image/flow/mv.jpg" alt="">
  </figure>
  <div class="ttl-lower-wrap">
    <p class="ttl-lower-up ttl-en-2l txt-white txt-black en-upper">flow</p>
    <h1 class="ttl-lower txt-white bg-black"><?php the_title()?></h1>
  </div>
</div>

<ul class="pan">
    <li class="txt-en-s"><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
    <li class="txt-en-s">-</li>
    <li class="txt-jp-s"><?php the_title()?></li>
</ul>

<section class="flow-wrap space-m">
  <div class="wrap-m">
  <h2 class="ttl-jp-2l txt-bold mb1">家よりも楽しくて、どこよりも安心。</h2>
  <p class="txt-medium space-2s-bottom">ご要望の施設へのご入居までの流れをご紹介いたします。<br>ご本人様はもちろんご家族様が安心してご利用いただけるよう、心を込めて対応させていただきます。</p>

  <p class="flow-item-number ttl-en-m bg-black txt-center txt-white txt-bold">FLOW<span class="big">1</span></p>
  <div class="flow-item">
    <h3 class="txt-jp-l txt-medium">お問合せ</h3>
    <p class="mt1 mb2">ご興味をお持ちいただけましたら、インターネットまたはお電話でお問合せください。<br>介護相談室の担当者が対応させていただきます。</p>
    <div class="flow-item-btn-wrap flex  g2">
      <p class="flow_telbtn"><a class="flow-item-btn" href="tel:0120-532-029"><i class="fas fa-phone-alt fa"></i><span>0120-532-029</span></a></p>
      <p><a class="flow-item-btn" href="<?php echo esc_url(home_url('/data_request/')); ?>"><img src="<?php bloginfo('template_directory');?>/assets/image/flow/document.svg" alt="資料請求"></a></p>
      <p><a class="flow-item-btn" href="<?php echo esc_url(home_url('/inquirys/')); ?>"><img src="<?php bloginfo('template_directory');?>/assets/image/flow/contact.svg" alt="お問い合わせ"></a></p>
    </div>
  </div>

  <figure class="arrow"><img src="<?php bloginfo('template_directory');?>/assets/image/flow/arrow.svg" alt="tel"></figure>

  <p class="flow-item-number ttl-en-m bg-black txt-center txt-white txt-bold">FLOW<span class="big">2</span></p>
  <div class="flow-item">
    <h3 class="txt-jp-l txt-medium">ご見学</h3>
    <p class="mt1 mb2">お部屋や食堂、浴室など施設内の見学、料金についてもご案内させていただきます。ご予約優先となりますので、ご都合に合わせて下記より見学をお申し込みください。ご入居に関するご不安なども、お気軽にご相談くだい。<br>※所要時間は1時間〜1時間半が目安です。</p>
    <p class="flex flex-start"><a class="flow-item-btn" href="<?php echo esc_url(home_url('/inspection/')); ?>"><img src="<?php bloginfo('template_directory');?>/assets/image/flow/tour.svg" alt="見学申込"></a></p>
  </div>

  <figure class="arrow"><img src="<?php bloginfo('template_directory');?>/assets/image/flow/arrow.svg" alt="tel"></figure>

  <p class="flow-item-number ttl-en-m bg-black txt-center txt-white txt-bold">FLOW<span class="big">3</span></p>
  <div class="flow-item">
    <h3 class="txt-jp-l txt-medium">施設利用申込み</h3>
    <p class="mt1 mb1">ご利用申込みに際し、書類のご提出をお願いいたします。<br>所定様式の健康診断書、ご入居者アンケートへのご回答、ご家族様（ご本人様）より、収入証明書・保険証のコピー（介護保険・医療保険）をご準備ください。</p>
  </div>

  <figure class="arrow"><img src="<?php bloginfo('template_directory');?>/assets/image/flow/arrow.svg" alt="tel"></figure>

  <p class="flow-item-number ttl-en-m bg-black txt-center txt-white txt-bold">FLOW<span class="big">4</span></p>
  <div class="flow-item">
    <h3 class="txt-jp-l txt-medium">入居前面談</h3>
    <p class="mt1 mb1">必要書類のご提出後、面談の日時をご相談させていただきます。ご自宅や病院などへ担当者が伺い、ご提出いただいた書類をもとに確認のため、ご本人様とご家族様の両方とご一緒に面談させていただきます。<br>※面談結果によっては入居をお断りさせていただくこともございます。予めご了承ください。</p>
  </div>

  <figure class="arrow"><img src="<?php bloginfo('template_directory');?>/assets/image/flow/arrow.svg" alt="tel"></figure>

  <p class="flow-item-number  flow-item-last ttl-en-m bg-black txt-center txt-white txt-bold">FLOW<span class="big">5</span></p>
  <div class="flow-item flow-item-last bg-white">
    <h3 class="txt-jp-l txt-medium">契約ご入居</h3>
    <p class="mt1 mb1">入居日が決定しましたら、ご入居いただけます。<br>本契約日を入居日とし、契約書をお渡しいたします。</p>
    
  </div>

  </div>

  <div class="bottom-band"></div>

</section>

<section class="second-home bg-yellow space-3l-bottom">

<figure class="arrow"><img src="<?php bloginfo('template_directory');?>/assets/image/flow/arrow-w.svg" alt="tel"></figure>

<p class="block ttl-jp-2l txt-center txt-white txt-bold"><span class="underline-white2">第二のわが家、スーパー・コートで、<br>イキイキした生活をお送りください。</span></p>
<p class="second-home-ttl txt-en-3l txt-medium txt-yellow2 txt-center en-upper">second home</p>
</section>

</main>

<?php get_footer(); ?>