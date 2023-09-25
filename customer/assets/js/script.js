const preloader = document.querySelector("[data-preaload]");

window.addEventListener("load", function () {
  preloader.classList.add("loaded");
  // document.body.classList.add("loaded");
});


function displayImage(fileinpt, imgcont){
  // Get a reference to the file input element and the display element and the image container
  const fileInput = document.getElementById(fileinpt);
  const imageContainer = document.getElementById(imgcont);
  // Check if a file has been selected
  if (fileInput.files.length > 0) {
      // Get the first selected file
      const selectedFile = fileInput.files[0];
      // Check if the selected file is an image (you can add more validation)
      if (selectedFile.type.startsWith('image/')) {
          // Set the source (URL) of the image to the selected file
          imageContainer.style.backgroundImage = 'url("' + URL.createObjectURL(selectedFile) + '")';
      } else {
          // Display a message if the selected file is not an image
          imageContainer.alt = 'Please select an image file.';
      }
  }
}
// // Get a reference to the file input element and the display element and the image container
// const fileInput = document.getElementById('fileInput');
// const imageContainer = document.getElementById('imageContainer');

// // Add an event listener to the file input element
// fileInput.addEventListener('change', function() {
//     // Check if a file has been selected
//     if (fileInput.files.length > 0) {
//         // Get the first selected file
//         const selectedFile = fileInput.files[0];
//         // Check if the selected file is an image (you can add more validation)
//         if (selectedFile.type.startsWith('image/')) {
//             // Set the source (URL) of the image to the selected file
//             imageContainer.style.backgroundImage = 'url("' + URL.createObjectURL(selectedFile) + '")';
//         } else {
//             // Display a message if the selected file is not an image
//             imageContainer.alt = 'Please select an image file.';
//         }
//     }
// });


function showCatIngredients(){
  for($i=1; $i<5; $i++){
    document.getElementById('category' + $i + '').style.display = "inline-block";
  }
}

function hiddeCatIngredients(){
  for($i=1; $i<5; $i++){
    document.getElementById('category' + $i + '').style.display = "none";
  }
}

function showProdButtons($btn, $select1, $select2){

  const btn = document.getElementById('btn' + $btn);
  const select1 = document.getElementById('select' + $select1);
  const select2 = document.getElementById('select' + $select2);
  
  btn.classList.toggle('block');
  if (select1.style.display === 'none' || select1.style.display === '') {
    select1.style.display = 'block';
    select2.style.display = 'block';
  } else {
    select1.style.display = 'none';
    select2.style.display = 'none';
  }
}

function showIngOption($id){
  const select1 = document.getElementById('' + $id + '');
  
  if (select1.style.display === 'none' || select1.style.display === '') {
    select1.style.display = 'block';
  } else {
    select1.style.display = 'none';
  }
}



// Get the current page URL
const currentPage = window.location.href;

// Check if the current page URL matches the link's href attribute
document.querySelectorAll('nav ul li a').forEach(link => {
    if (currentPage === link.href) {
        link.classList.add('active');
    }
});

// Get the current page URL
const currentPage1 = window.location.href;

// Check if the current page URL matches the link's href attribute
document.querySelectorAll('showMenu buttons a').forEach(link => {
    if (currentPage1 === link.href) {
        link.classList.add('active');
    }
});


// thanks, i want do the same thing but  now not in the header
//             <form action="" method="post">
//                 <button class="categoryBtn" class="text" type="submit">
//                     <div class="categoryImg" style="background-image: url('uploads/<?php echo $row['image']?>')"></div><?php echo $row['name']?>
//                 </button>
//                 <input type="hidden" name="hdnId" value="<?php echo $row['id']?>">
//             </form>
// there is 4 of this form
// i want if the user click on a button, this button change the style



// // Get all the buttons with the class "categoryBtn"
// const buttons = document.querySelectorAll('.categoryBtn');

// // Add a click event listener to each button
// buttons.forEach(button => {
//     button.addEventListener('click', function(event) {
//         event.preventDefault(); // Prevent the form submission (if needed)

//         // Remove the "clicked" class from all buttons
//         buttons.forEach(btn => btn.classList.remove('clicked'));

//         // Add the "clicked" class to the clicked button
//         this.classList.add('clicked');

//         // Handle any other actions you need when a button is clicked
//     });
// });




