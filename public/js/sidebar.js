const toggleIcon = document.getElementById("toggle-icon");
const toggleDiv1 = document.getElementById("toggle-div1");
const toggleDiv2 = document.getElementById("toggle-div2");
const toggleDiv3 = document.getElementById("toggle-div3");

toggleIcon.addEventListener("click", function() {
  if (toggleDiv1.classList.contains("none")) {
    toggleDiv1.classList.remove("none");
    toggleDiv2.classList.remove("none");
    toggleDiv3.classList.remove("none");
    toggleIcon.classList.remove("bx-bxs-chevron-down");
    toggleIcon.classList.add("bx-bxs-chevron-up", "rotate");
  } else {
    toggleDiv1.classList.add("none");
    toggleDiv2.classList.add("none");
    toggleDiv3.classList.add("none");
    toggleIcon.classList.remove("bx-bxs-chevron-up","rotate");
    toggleIcon.classList.add("bx-bxs-chevron-down");
  }
});