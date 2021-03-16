var items = document.querySelectorAll(".item");
var rows = document.querySelectorAll("tr");

items.forEach((item) => {
  var row = item.parentElement.parentElement;
  deleteBtn = document.querySelector(
    "body > section > form > div.options > div > input.btn.red.disabled"
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
var emptyAdd = document.querySelector(".empty-span");

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
emptyAdd.onclick = function() {
  content.style.filter = "blur(15px)";
  aside.style.filter = "blur(15px)";
  addModal.style.transform = "translateY(0)";
}
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
    document.querySelectorAll(".editForm label+input")[4].value = pr_price;

    var fileInput = document.querySelector("#editImg");
    var filename = pr_image.split("/").pop();

    spanImage = document.querySelector("#file-chosen-edit");
    spanImage.textContent = filename;
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

// Regex Validation

const numberPattern = /^\d+$/;
const textPattern = /^[a-zA-Z0-9 ]*$/;

var form = document.querySelector("#addModal");

form.addEventListener("submit", (e) => {
  var error = 0;

  if (error == 0) {
    inputText = form.querySelectorAll('input[type="text"]');
    inputNum = form.querySelectorAll('input[type="number"]');

    inputText.forEach((e) => {
      if (!textPattern.test(e.value)) {
        alert("Please insert a correct " + e.previousElementSibling.innerHTML);
        error++;
      }
    });

    inputNum.forEach((e) => {
      if (!numberPattern.test(e.value)) {
        alert("Please insert a correct " + e.previousElementSibling.innerHTML);
        error++;
      }
    });
  }
  if (error > 0) {
    e.preventDefault();
  }
});


// Table Rows Count
var empty = document.querySelector(".empty")
var rowCount =  document.querySelector("body > section > form > div.products > table > tbody").childElementCount;

if (rowCount == 1) {
  empty.style.display = "block"
} else {
  empty.style.display = "none"

}

document.querySelector("#total_products").innerHTML = rowCount -1

// // search
// var rowNames = document.querySelectorAll(".name")
// var rowInner = [];
// var i = 0;

// rowNames.forEach(e => {
//   rowInner[i] = e.innerHTML
//   i++
// })

// const searchBar = document.querySelector("input[name='search_p']")

// searchBar.addEventListener('keyup', (e)=> {
//   const searchString = e.target.value.toLowerCase();
//   rowNames.forEach((row) => {
//     row.textContent.toLowerCase().startsWith(searchString) ? row.parentElement.style.display = "" : row.parentElement.style.display = "none"
//   })
  
// })

function searchP()
{

  const sear = document.querySelector('#deleteSearch');
  sear.action="search.php";
}