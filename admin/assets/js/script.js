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