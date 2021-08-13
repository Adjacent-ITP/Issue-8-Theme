const openArticles = () => { // Articles button
    let element = document.getElementById("articles");
    element.classList.toggle("open");

    let articleButtonEl = document.getElementById('article-arrow')
    articleButtonEl.classList.toggle('hidden')

    let menuEl = document.getElementById('menu')
    if (menuEl) {
        if (menuEl.classList.contains('open')) return
    }

    let previewEl = document.getElementById('pic-wrapper')
    if (previewEl) {
        previewEl.classList.toggle('hidden')
    }

    let adjLogoEl = document.getElementById('adjLogo')
    adjLogoEl.classList.toggle('hidden')
}