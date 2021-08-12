const openArticles = () => {
    let element = document.getElementById("articles");
    element.classList.toggle("open");

    let pics = document.getElementById("pic-wrapper");
    pics.classList.toggle("hidden2");

    let articleButtonEl = document.getElementById('article-arrow')
    articleButtonEl.classList.toggle('hidden')

    let adjLogoEl = document.getElementById('adjLogo')
    adjLogoEl.classList.toggle('hidden')
}