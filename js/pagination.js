document.addEventListener('DOMContentLoaded', function () {
  const products = document.querySelectorAll('.product');
  const productsPerPage = 6;
  let currentPage = 1;

  function showPage(page) {
    const startIndex = (page - 1) * productsPerPage;
    const endIndex = page * productsPerPage;

    products.forEach((product, index) => {
      if (index >= startIndex && index < endIndex) {
        product.style.display = 'block';
      } else {
        product.style.display = 'none';
      }
    });
  }

  function handlePageChange(direction) {
    if (direction === 'next') {
      currentPage++;
    } else if (direction === 'prev') {
      currentPage--;
    }

    if (currentPage < 1) {
      currentPage = 1;
    }

    const totalPages = Math.ceil(products.length / productsPerPage);

    if (currentPage > totalPages) {
      currentPage = totalPages;
    }

    showPage(currentPage);
  }

  showPage(currentPage);

  const prevButton = document.querySelector('.prev-page');
  const nextButton = document.querySelector('.next-page');

  prevButton.addEventListener('click', () => {
    handlePageChange('prev');
  });

  nextButton.addEventListener('click', () => {
    handlePageChange('next');
  });
});
