// Swiperを初期化
const swiper = new Swiper('.top-interview-swiper', {
  // オプションを設定

  // CSSで設定した幅を自動で認識させる
  slidesPerView: 'auto',

  // スライドとスライドの間の余白（px）
  spaceBetween: 50,

  // アクティブなスライドを中央に配置する
  centeredSlides: true,

  // 無限ループさせる
  loop: false,

  // 自動再生
  autoplay: {
    delay: 3000, // 3秒ごとにスライド
    disableOnInteraction: false, // ユーザーが操作した後も自動再生を続ける
  },

  // ページネーション（点々）を有効にする
  pagination: {
    el: '.swiper-pagination',
    clickable: true, // 点々をクリックしてスライドを切り替えられるようにする
  },

  // ナビゲーション（矢印）を有効にする
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});
