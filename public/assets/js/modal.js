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


  async function startSpin(button, fileUrl) {
    const spinner = button.querySelector('.spinner');
    spinner.style.display = 'block';
    spinner.classList.add('spin-animation');

    try {
      const response = await fetch(fileUrl); 
      if (!response.ok) throw new Error('خطا در دانلود فایل');

      const blob = await response.blob();
      const link = document.createElement('a');
      link.href = URL.createObjectURL(blob);
      link.download = fileUrl.split('/').pop(); 
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);

      setTimeout(() => {
        const icon = document.getElementById("download");
        spinner.style.display = 'none';
        spinner.classList.remove('spin-animation');

        icon.classList.remove('fa-light', 'fa-download');
        icon.classList.add('fa-light', 'fa-file-check');

        setTimeout(() => {
          icon.classList.remove('fa-light', 'fa-file-check');
          icon.classList.add('fa-light', 'fa-download');
        }, 2000); 
      }, 1000);
    } catch (error) {
      console.error('Error downloading file:', error);
      alert('خطایی در دانلود فایل رخ داده است');
      spinner.style.display = 'none';
    }
  }

