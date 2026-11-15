const Modal = {
  init() {
    const triggers = document.querySelectorAll("[data-modal]");

    triggers.forEach(btn => {
      btn.addEventListener("click", () => {
        const target = document.querySelector(btn.dataset.modal);
        target.classList.add("open");
      });
    });
  }
};

export default Modal;