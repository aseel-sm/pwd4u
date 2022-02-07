const licence = document.querySelector("[data-licence]");
const qualification = document.querySelector("[data-qualification]");
const certificate = document.querySelector("[data-certificate]");
const district = document.querySelector("[data-district]");
const taluk = document.querySelector("[data-taluk]");
const selectBox = document.querySelector("[data-select-option]");
const value = selectBox.options[selectBox.selectedIndex].value;
const onOptionChange = (type) => {
  if (type == 2 || type == 4) {
    qualification.classList.toggle("d-none");
    certificate.classList.remove("d-none");
    district.classList.remove("d-none");
    licence.classList.add("d-none");
  } else if (type == 3) {
    licence.classList.toggle("d-none");
    qualification.classList.add("d-none");
    certificate.classList.remove("d-none");
    district.classList.add("d-none");
    taluk.classList.add("d-none");
  } else {
    licence.classList.add("d-none");
    qualification.classList.add("d-none");
    certificate.classList.add("d-none");
    district.classList.add("d-none");
    taluk.classList.add("d-none");
  }
  if (type == 2) {
    taluk.classList.remove("d-none");
    district.classList.remove("d-none");
  } else taluk.classList.add("d-none");
};
document.addEventListener("DOMContentLoaded", function () {
  onOptionChange(value);
});
