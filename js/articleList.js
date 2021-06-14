const openArticles = () => {
    //console.log("working")
    let element = document.getElementById("articles");
    //console.log(element)
    element.classList.toggle("open");

    let pics = document.getElementById("pic-wrapper");
    pics.classList.toggle("hidden2");
    //pics.classList.toggle("flex");
}