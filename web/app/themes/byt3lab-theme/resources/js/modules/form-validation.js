const FormValidation = {
  init() {
    const forms = document.querySelectorAll("form");

    forms.forEach(form => {
      form.addEventListener("submit", (e) => {
        const inputs = form.querySelectorAll("[required]");

        let valid = true;

        inputs.forEach(input => {
          if (!input.value) {
            valid = false;
            input.classList.add("error");
          }
        });

        if (!valid) e.preventDefault();
      });
    });
  }
};

export default FormValidation;