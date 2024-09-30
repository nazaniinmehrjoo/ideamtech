// Get modal element
var modal = document.getElementById("moreProductDtl");

var closeModal = document?.getElementsByClassName("closeModal")[0];

function openMoreBtn(element) {
  const productName =  element.parentElement.querySelector('#prodoctName a').innerText ;
  document.getElementById("productNameModal").innerHTML = productName
  modal.style.display = "block";
}


if (closeModal) {
  closeModal.onclick = function () {
    modal.style.display = "none";
    document.getElementById("productNameModal").innerHTML = "";
  };
}

window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
    document.getElementById("productNameModal").innerHTML = "";
  }
}


function startSpin(button) {
  const spinner = button.querySelector('.spinner');
  spinner.style.display = 'block';
  spinner.classList.add('spin-animation');

  setTimeout(() => {
    const icon = document.getElementById("download") ;
    spinner.style.display = 'none';
    spinner.classList.remove('spin-animation');

    icon.classList.remove('fa-light', 'fa-download');
    icon.classList.add('fa-light', 'fa-file-check');



    setTimeout(() => {
      icon.classList.remove('fa-light', 'fa-file-check');
      icon.classList.add('fa-light', 'fa-download');
    }, 2000); // Back to download mode
  }, 2000);
}


