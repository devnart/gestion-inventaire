var items = document.querySelectorAll(".item");

items.forEach((item) => {
  var row = item.parentElement.parentElement;
  deleteBtn = document.querySelector(
    "body > section > div.options > a.btn.red"
  );
  item.addEventListener("change", () => {
    if (item.checked) {
      deleteBtn.classList.remove("disabled");
      row.classList.toggle("selected");
    } else {
      row.classList.toggle("selected");
    }
    //   if (item.classList.contains("selected")==false) {
    //     deleteBtn.classList.add("disabled")
    // }
    // row.classList.toggle("selected");
    // deleteBtn.classList.remove("disabled")
  });
});

items.forEach((item) => {
  var row = item.parentElement.parentElement;
  item.addEventListener("change", () => {
    if (row.classList.contains("selected")==false) {
      deleteBtn.classList.add("disabled");
    }
  });
});
