document.addEventListener('DOMContentLoaded', function() {
    // 監視対象に、元の .fade-in と .card-container を含めます
    // グラフ要素は .dashboard-box でまとめて監視します
    const targets = document.querySelectorAll('.fade-in, .card-container, .dashboard-box');

    const callback = (entries, observer) => {
        entries.forEach(entry => {
            // 画面内に入っていなければ何もしない
            if (!entry.isIntersecting) {
                return;
            }

            // --- .card-container に対する個別の処理（元の機能を維持） ---
            if (entry.target.classList.contains('card-container')) {
                const cards = entry.target.querySelectorAll('.card');
                cards.forEach((card, index) => {
                    // is-in-view が付与された際に、各カードが順番に表示されるように遅延を設定
                    card.style.transitionDelay = `${index * 350}ms`;
                });
                entry.target.classList.add('is-in-view'); // 専用のクラスを付与
            } 
            // --- .fade-in や .dashboard-box に対する共通の処理 ---
            else {
                // 画面内に入った要素に is-visible クラスを付与してアニメーションを開始
                entry.target.classList.add('is-visible');
            }

            // 一度処理が終わった要素は監視を停止する
            observer.unobserve(entry.target);
        });
    };

    const options = {
        root: null,
        threshold: 0.3, // 少し早めにアニメーションを開始
    };

    const observer = new IntersectionObserver(callback, options);

    // 監視を開始
    targets.forEach(target => {
        observer.observe(target);
    });
});
