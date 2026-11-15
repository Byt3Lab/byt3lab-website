const Slider = {
  init() {
    const sliders = document.querySelectorAll(".slider");

    sliders.forEach((slider) => {
      let index = 0;
      const slides = slider.querySelectorAll(".slide");

      setInterval(() => {
        slides[index].classList.remove("active");
        index = (index + 1) % slides.length;
        slides[index].classList.add("active");
      }, 4000);
    });
  }
};

export default Slider;