const licence = document.querySelector("[data-licence]");
const qualification = document.querySelector("[data-qualification]");
const certificate = document.querySelector("[data-certificate]");
const selectBox = document.querySelector("[data-select-option]");
const value = selectBox.options[selectBox.selectedIndex].value;
const onOptionChange = (type) => {
  //   const type = selectBox.options[selectBox.selectedIndex].value;
  //   alert(type);

  if (type == 2 || type == 4) {
    qualification.classList.toggle("d-none");
    certificate.classList.toggle("d-none");

    licence.classList.add("d-none");
  } else if (type == 3) {
    licence.classList.toggle("d-none");
    qualification.classList.add("d-none");
    certificate.classList.add("d-none");
  } else {
    licence.classList.add("d-none");
    qualification.classList.add("d-none");
    certificate.classList.add("d-none");
  }
};
document.addEventListener("DOMContentLoaded", function () {
  onOptionChange(value);
  console.log(value);
});
