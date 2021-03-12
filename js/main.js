var items = document.querySelectorAll(".item");
var rows = document.querySelectorAll("tr");
items.forEach((item) => {
  var row = item.parentElement.parentElement;
  deleteBtn = document.querySelector(
    "body > section > div.options > div > a.btn.red.disabled"
  );
  item.addEventListener("change", () => {
    if (item.checked) {
      deleteBtn.classList.remove("disabled");
      row.classList.toggle("selected");
    } else {
      row.classList.toggle("selected");
      rows.forEach((e) => {
        if (e.classList.contains("selected") == false) {

          deleteBtn.classList.add("disabled");
        }
      });
    }
    if (item.checked == false) {
      deleteBtn.classList.add("disabled");
    }
    for (let i = 0; i < items.length; i++) {
      if (items[i].checked == true) {
        deleteBtn.classList.remove("disabled");
      }
    }
    //   if (item.classList.contains("selected")==false) {
    //     deleteBtn.classList.add("disabled")
    // }
    // row.classList.toggle("selected");
    // deleteBtn.classList.remove("disabled")
  });
});

// items.forEach((item) => {
//   var row = item.parentElement.parentElement;
//   item.addEventListener("change", () => {
//     if (row.classList.contains("selected")==false) {
//       deleteBtn.classList.add("disabled");
//     }

//   });
// });

// my comment

function navSlide() {
  const burger = document.querySelector(".burger");
  const nav = document.querySelector(".side-menu");
  const aside = document.querySelector("aside");

  burger.addEventListener("click", () => {
    //Toggle Nav
    nav.classList.toggle("side-active");

    aside.classList.toggle("aside-active");
    //Burger Animation
    burger.classList.toggle("toggle");
  });
}

navSlide();

// custom Upload Btn
const actualBtn = document.getElementById("uploadImg");

const fileChosen = document.getElementById("file-chosen");

actualBtn.addEventListener("change", function () {
  fileChosen.textContent = this.files[0].name;
});

// Add Modal

var addModal = document.getElementById("addModal");
var addBtn = document.getElementById("addBtn");
var span = document.querySelectorAll(".close");
var content = document.querySelector("section.container");
var aside = document.querySelector("aside");

// edit Modal
var editBtn = document.querySelectorAll(".editBtn");
var editModal = document.getElementById("editModal");

// Info Modal

var info = document.getElementById("info");
var infoBtn = document.querySelectorAll(".moreInfo");
var infoRow = document.querySelectorAll("td:nth-child(3)");

span[0].onclick = function () {
  addModal.style.transform = "translateY(-100%)";
  aside.style.filter = "none";
  content.style.filter = "none";
};

addBtn.onclick = function () {
  content.style.filter = "blur(15px)";
  aside.style.filter = "blur(15px)";
  addModal.style.transform = "translateY(0)";
};
// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (
    event.target == addModal ||
    event.target == editModal ||
    event.target == info
  ) {
    addModal.style.transform = "translateY(-100%)";
    editModal.style.transform = "translateY(-100%)"; // edit modal
    info.style.transform = "translateY(-100%)"; // info modal

    aside.style.filter = "none";
    content.style.filter = "none";
  }
};

editBtn.forEach((e) => {
  e.onclick = function () {
    content.style.filter = "blur(15px)";
    aside.style.filter = "blur(15px)";
    editModal.style.transform = "translateY(0)";
    tr = this.parentElement.parentElement.parentElement.parentElement;
    pr_id = tr.children[1].innerHTML;
    pr_name = tr.children[2].innerHTML;
    pr_brand = tr.children[3].innerHTML;
    pr_qty = tr.children[4].innerHTML;
    pr_price = tr.children[5].innerHTML;
    pr_category = tr.children[6].innerHTML;
    pr_image = tr.children[7].firstElementChild.src;
    pr_description = tr.children[8].innerHTML;

    document.querySelectorAll(".editForm label+input")[0].value = pr_id;
    document.querySelectorAll(".editForm label+input")[1].value = pr_name;
    document.querySelectorAll(".editForm label+input")[2].value = pr_brand;
    document.querySelectorAll(".editForm label+select")[0].value = pr_category;
    document.querySelectorAll(".editForm label+input")[3].value = pr_qty;
    document.querySelectorAll(".editForm label+input")[4].value = pr_price;
    document.querySelectorAll(
      ".editForm label+textarea"
    )[0].value = pr_description;
    document.querySelector("#imgThumb").src = pr_image;
  };
});
span[1].onclick = function () {
  editModal.style.transform = "translateY(-100%)"; // edit modal
  aside.style.filter = "none";
  content.style.filter = "none";
};

infoBtn.forEach((e) => {
  e.onclick = function () {
    content.style.filter = "blur(15px)";
    aside.style.filter = "blur(15px)";
    info.style.transform = "translateY(0)";

    tr = this.parentElement;

    pr_name = tr.children[2].innerHTML;
    pr_brand = tr.children[3].innerHTML;
    pr_qty = tr.children[4].innerHTML;
    pr_price = tr.children[5].innerHTML;
    pr_category = tr.children[6].innerHTML;
    pr_image = tr.children[7].firstElementChild.src;
    pr_description = tr.children[8].innerHTML;

    //info modal
    document.querySelector(".product-image").src = pr_image;
    document.querySelector(".product-title").innerHTML = pr_name;
    document.querySelector(".product-brand").innerHTML = pr_brand;
    document.querySelector(".product-parag").innerHTML = pr_description;
    document.querySelector(".product-qty").innerHTML = pr_qty;
    document.querySelector(".product-price").innerHTML = pr_price;
  };
});

span[2].onclick = function () {
  info.style.transform = "translateY(-100%)"; // edit modal
  aside.style.filter = "none";
  content.style.filter = "none";
};

infoRow.forEach((e) => {
  e.onclick = function () {
    content.style.filter = "blur(15px)";
    aside.style.filter = "blur(15px)";
    info.style.transform = "translateY(0)";
  };
});

// Regex Validation

const numberPattern = /^\d+$/

function validate(){
  
}
