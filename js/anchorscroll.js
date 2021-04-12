const anchorObserve = (topSwitch,botSwitch) => {

    const options = {
        root: null,
        rootMargin: '0px',
        threshold: 0.5
    };

    const callback = (entries) => {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                if (entry.target == topSwitch) {
                    topSwitch.classList.add("first");
                    botSwitch.classList.remove("first");
                } else {
                    topSwitch.classList.remove("first");
                    botSwitch.classList.add("first");
                }
            }
        })
    }

    const observer = new IntersectionObserver(callback,options);

    observer.observe(topSwitch);
    observer.observe(botSwitch);
}