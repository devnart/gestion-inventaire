var items = document.querySelectorAll(".item");
var rows = document.querySelectorAll("tr");
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
      rows.forEach((e) => {

        if (e.classList.contains("selected")==false) {
            console.log("Hello")
          deleteBtn.classList.add("disabled");
        }});
    }


    //   if (item.classList.contains("selected")==false) {
    //     deleteBtn.classList.add("disabled")
    // }
    // row.classList.toggle("selected");
    // deleteBtn.classList.remove("disabled")
  });
});

var rows = document.querySelectorAll("tr");



