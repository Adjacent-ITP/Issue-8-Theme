window.onload = function () {
  var data = document.getElementsByName("data")[0].content;
  var element = document.getElementById("image");
  create(element, 1)
  let clicks = 0;

  document
    .getElementById("image")
    .addEventListener("click", backgroundIterator);

  function backgroundIterator() {
    clicks++;
    clear(element);

    // if (clicks === 1) {
    //   create(element, 1, 2);
    // } else if (clicks === 2) {
    //   create(element, 2, 3);
    // } else if (clicks === 3) {
    //   create(element, 3, 4);
    // } else if (clicks === 4) {
    //   create(element, 4, 8);
    // } else {
    //   clicks = 0;
    //   element.style.backgroundImage =
    //     "url(" + data + "/assets/15.png" + ")";
    // }
    if (clicks <= 8) {
      create(element, clicks);
    } else {
      clicks = 0;
      create(element, 1)
    }
  }

  function clear(div) {
    div.style.backgroundImage = "none";
    while (div.firstChild) {
      div.removeChild(div.firstChild);
    }
  }

  // function create(element, iteration, max) {
  // let imgDivs = [max, max];

  // for (let i = iteration; i <= iteration; i++) {
  // for (let j = 1; j <= max; j++) {
  // let imageName = "dis" + i + "-" + j;

  // imgDivs[(i, j)] = document.createElement("img");
  // imgDivs[(i, j)].src =
  //   data + "/assets/" + imageName + ".svg";
  // imgDivs[(i, j)].className = "rowstyle " + imageName;

  // element.appendChild(imgDivs[(i, j)]);
  // }
  // }
  // }
  function create(element, clicks) {
    let imageName = "background" + clicks;
    let imgCreate = document.createElement("img");
    imgCreate.src = data + "/assets/" + imageName + ".png";
    element.appendChild(imgCreate);
  }
};
