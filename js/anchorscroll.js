observer = new IntersectionObserver((entry, observer) => {
    console.log('entry:', entry);
    console.log('observer:', observer);
  });