// HBメニュー
document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".drawer-toggle").forEach(button => {
    button.addEventListener("click", () => {
      document.body.classList.toggle("drawer-show");
    });
  });
});





// ヘッダースクロール
window.addEventListener("scroll", function () {
  const header = document.querySelector(".header");
  header.classList.toggle("header-scroll", window.scrollY > 500);
});


// :active
document.getElementsByTagName('body')[0].setAttribute('ontouchstart', '');


// 内部リンクスムーススクロール
document.querySelectorAll('.page-link a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
      e.preventDefault(); // デフォルトの動作を防ぐ
      const target = document.querySelector(this.getAttribute('href')); // ターゲット要素を取得
      if (target) {
          target.scrollIntoView({
              behavior: 'smooth' // 滑らかにスクロール
          });
      }
  });
});

// タブメニュー
document.addEventListener('DOMContentLoaded', function() {
    
    var tabContents = document.querySelectorAll('.tabs-cont');
    var tabButtons = document.querySelectorAll('.tabs-btn');
  
    if (tabContents.length > 0) {
      tabContents[0].style.display = 'grid';
    }
  
    if (tabButtons.length > 0) {
      tabButtons[0].classList.add('active');
    }
  
    tabButtons.forEach(function(button) {
      button.addEventListener('click', function() {
        var tabIndex = this.getAttribute('data-tab');
        
        // コンテンツとボタンの状態をリセット
        tabContents.forEach(function(content) {
          content.style.display = 'none';
        });
        tabButtons.forEach(function(btn) {
          btn.classList.remove('active');
        });
  
        // 対応するタブを表示
        var tabToShow = document.getElementById('tab' + tabIndex);
        if (tabToShow) {
          tabToShow.style.display = 'grid';
        }
  
        this.classList.add('active');
      });
    });
  });




// gsap

const topMvMovie = document.querySelectorAll('.top-mv__movie')
topMvMovie.forEach(el =>{
  gsap.to(el,0.7,{
    opacity:"1",
    delay: 0.18,
    ease: "power1.out",
  },
  )
})
const mvLogo = document.querySelectorAll('.mv-logo')
mvLogo.forEach(el =>{
  gsap.to(el,0.5,{
    opacity:"1",
    delay: 0.25,
    ease: "power1.out",
  },
  )
})
const topHeaderRight = document.querySelectorAll('.top-header .header-right')
topHeaderRight.forEach(el =>{
  gsap.to(el,0.5,{
    opacity:"1",
    delay: 0.3,
    ease: "power1.out",
  },
  )
})
const topHeaderCta = document.querySelectorAll('.top-header .header-cta')
topHeaderCta.forEach(el =>{
  gsap.to(el,0.4,{
    opacity:"1",
    delay: 0.35,
    ease: "power1.out",
  },
  )
})

// scroll

const fadeIn = document.querySelectorAll('.fade-in');
fadeIn.forEach(el => {
  gsap.fromTo(el, 
    {
      opacity:"0",
    }, 
    {
      opacity:"1",
      duration: "0.3",
      ease: 'linear',
      scrollTrigger: {
        trigger: el,
        start: "top 100%",
        once: true,
      }
    }
  );
});

const fadeBlur = document.querySelectorAll('.fade-blur');
fadeBlur.forEach(el => {
  gsap.fromTo(el, 
    {
      opacity:"0",
      filter:"blur(0.5em)",
      rotate:"0.5deg",
    }, 
    {
      opacity:"1",
      filter:"blur(0em)",
      rotate:"0deg",
      duration: "0.8",
      ease: 'power4.out',
      scrollTrigger: {
        trigger: el,
        start: "top 95%",
        once: true,
      }
    }
  );
});


const imageZoom = document.querySelectorAll('.image-zoom__inner');
imageZoom.forEach(el => {
  gsap.fromTo(el, 
    {
      opacity:"0",
    }, 
    {
      opacity:"1",
      duration: "0.4",
      ease: "linear",
      scrollTrigger: {
        trigger: el,
        start: "top 98%",
        once: true,
      }
    }
  );
  gsap.fromTo(el, 
    {
      scale:"1.03",
      rotate:"0.5deg",
    }, 
    {
      scale:"1",
      rotate:"0deg",
      duration: "0.7",
      ease: "power1.out",
      scrollTrigger: {
        trigger: el,
        start: "top 100%",
        once: true,
      }
    }
  );
});