window.onload = function () {
  var data = document.getElementsByName("data")[0].content;
  console.log(data);
  let clicks = 0;

  document
    .getElementById("image")
    .addEventListener("click", backgroundIterator);

  function backgroundIterator() {
    clicks++;

    var element = document.getElementById("image");
    clear(element);

    if (clicks === 1) {
      create(element, 1, 2);
    } else if (clicks === 2) {
      create(element, 2, 3);
    } else if (clicks === 3) {
      create(element, 3, 4);
    } else if (clicks === 4) {
      create(element, 4, 8);
    } else {
      clicks = 0;
      element.style.backgroundImage =
        "url(" + data + "/assets/Intersect.svg" + ")";
    }
    console.log(clicks);
  }

  function clear(div) {
    div.style.backgroundImage = "none";
    while (div.firstChild) {
      div.removeChild(div.firstChild);
    }
    console.log("cleared");
  }

  function create(element, iteration, max) {
    let imgDivs = [max, max];

    for (let i = iteration; i <= iteration; i++) {
      for (let j = 1; j <= max; j++) {
        let imageName = "dis" + i + "-" + j;
        console.log(imageName);

        imgDivs[(i, j)] = document.createElement("div");
        imgDivs[(i, j)].style.backgroundImage =
          "url(" + data + "/assets/" + imageName + ".svg)";
        imgDivs[(i, j)].className = "rowstyle " + imageName;
        element.appendChild(imgDivs[(i, j)]);
      }
    }
  }
};
