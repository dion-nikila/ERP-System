document.getElementById('customerForm').addEventListener('submit', function(event) {
    let firstName = document.getElementById('first_name').value;
    let lastName = document.getElementById('last_name').value;
    let contactNumber = document.getElementById('contact_number').value;
    let district = document.getElementById('district').value;

    if (firstName === '' || lastName === '' || contactNumber === '' || district === '') {
        alert('All fields are required.');
        event.preventDefault();
    } else if (!/^[a-zA-Z ]*$/.test(firstName) || !/^[a-zA-Z ]*$/.test(lastName)) {
        alert('Only letters and white space allowed in names.');
        event.preventDefault();
    } else if (!/^[0-9]{10}$/.test(contactNumber)) {
        alert('Invalid contact number format.');
        event.preventDefault();
    }
});

document.getElementById('itemForm').addEventListener('submit', function(event) {
    let itemCode = document.getElementById('item_code').value;
    let itemName = document.getElementById('item_name').value;
    let itemCategory = document.getElementById('item_category').value;
    let itemSubCategory = document.getElementById('item_sub_category').value;
    let quantity = document.getElementById('quantity').value;
    let unitPrice = document.getElementById('unit_price').value;

    if (itemCode === '' || itemName === '' || itemCategory === '' || itemSubCategory === '' || quantity <= 0 || unitPrice <= 0) {
        alert('All fields are required and must be valid.');
        event.preventDefault();
    }
});

document.getElementById('reportForm').addEventListener('submit', function(event) {
    let startDate = document.getElementById('start_date').value;
    let endDate = document.getElementById('end_date').value;

    if (new Date(startDate) > new Date(endDate)) {
        alert('Start date cannot be greater than end date.');
        event.preventDefault();
    }
});
