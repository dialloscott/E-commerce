/**
 * function generating product sku
 */
function generateSku() {
    document.querySelector('#sku').value = Math.floor(Math.random() * 900000000)
}

jQuery(document).ready(function ($) {
    $('.delete-product').on('click', function (event) {
        event.preventDefault();
        swal({
            title: 'Are you sure?',
            text: 'Are you sur you want delete this product?',
            buttons: [true, 'Yes, delete it!'],
            icon: 'warning',
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                swal('Poof! your product has been deleted',
                    {
                        icon: 'success',
                    });
                setTimeout(() => {
                    $(this).parent().submit()
                }, 1000);

            } else {
                swal('Your product is safe', {icon: 'info'})
            }
        })
    });
    $('#search').on('keyup', function (event) {
        event.preventDefault();
        let search = $('.search-display');
        search.on('mouseleave', () => {
            // console.log($(this))
        })
        if ($(this).val().length > 3) {
            axios.get('/api/products/search', {query: $(this).val()}).then(response => {
                 response.data.forEach(item => {
                         search.append(`<div class="card hover inherit"><a href="/products/${item}">${item}</a></div>`).show()
                  });
            })
        }
    })


})
