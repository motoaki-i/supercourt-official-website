// script.js (修正後)

document.addEventListener('DOMContentLoaded', () => {
    const tracks = document.querySelectorAll('.carousel-track');

    tracks.forEach(track => {
        const items = Array.from(track.children);
        const originalItemCount = items.length;

        // アイテムが1つもない場合は処理を中断
        if (originalItemCount === 0) return;

        // 1. 元のアイテムを複製してトラックの末尾に追加
        items.forEach(item => {
            const clone = item.cloneNode(true);
            track.appendChild(clone);
        });

        // 2. 実際に描画されたアイテムの幅を取得して、トラック全体の幅を計算【重要】
        // getBoundingClientRect()で正確な幅を取得する
        const itemWidth = items[0].getBoundingClientRect().width;
        const totalWidth = itemWidth * originalItemCount * 2;
        
        track.style.width = `${totalWidth}px`; // 単位をpxに変更
    });
});

