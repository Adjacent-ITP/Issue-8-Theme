const openArticles = () => {
    let element = document.getElementById("articles");
    element.classList.toggle("open");

    let pics = document.getElementById("pic-wrapper");
    pics.classList.toggle("hidden2");
}