const openArticles = () => { // Articles button
    let element = document.getElementById("articles");
    element.classList.toggle("open");

    let articleButtonEl = document.getElementById('article-arrow')
    articleButtonEl.classList.toggle('hidden')

    let closeButtonEl = document.getElementById('article-close')
    closeButtonEl.classList.toggle('open')

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

function openArticlesMobile() {
    let element = document.getElementById("articles")
    element.classList.toggle("open")
    let disembodimentLogoEl = document.getElementsByClassName('disembodiment-logo')[0]
    disembodimentLogoEl.classList.toggle('open')
    let previewEl = document.getElementById('pic-wrapper')
    if (previewEl) {
        previewEl.classList.toggle('hidden')
    }
}