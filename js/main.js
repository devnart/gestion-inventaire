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
    if((item.checked==false))
    {
      deleteBtn.classList.add("disabled");
    }git 
    for(let i=0;i<items.length;i++)
    {
      if(items[i].checked==true)
      {
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
  const aside=document.querySelector("aside");
  

  burger.addEventListener("click", () => {
    //Toggle Nav
    nav.classList.toggle("side-active");

   aside.classList.toggle("aside-active");
    //Burger Animation
    burger.classList.toggle("toggle");
  });

}

navSlide();
