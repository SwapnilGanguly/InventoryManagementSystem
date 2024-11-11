function showSection(sectionId) {
    document.querySelectorAll('.section').forEach(section => section.classList.add('hidden'));
    document.getElementById(sectionId).classList.remove('hidden');
}

function addProduct() {
    const name = document.getElementById("productName").value;
    const description = document.getElementById("productDescription").value;
    const price = document.getElementById("productPrice").value;
    const quantity = document.getElementById("productQuantity").value;

    fetch('/inventory_management/api/add_product.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `name=${name}&description=${description}&price=${price}&quantity=${quantity}`
    })
    .then(response => response.text())
    .then(data => {
        console.log("Response from server:", data); // Debugging line
        document.getElementById("addProductResult").innerHTML = data;})
    .catch(error => console.error("Error:", error)); // Debugging line
}

function viewInventory() {
    fetch('/inventory_management/api/view_inventory.php')
    .then(response => response.text())
    .then(data => document.getElementById("inventoryList").innerHTML = data);
}

function placeOrder() {
    const customerName = document.getElementById("customerName").value;
    const productId = document.getElementById("orderProductId").value;
    const quantity = document.getElementById("orderQuantity").value;

    fetch('/inventory_management/api/place_order.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `customer_name=${customerName}&product_id=${productId}&quantity_ordered=${quantity}`
    })
    .then(response => response.text())
    .then(data => document.getElementById("placeOrderResult").innerHTML = data);
}

function restockProduct() {
    const productId = document.getElementById("restockProductId").value;
    const quantity = document.getElementById("restockQuantity").value;

    fetch('/inventory_management/api/restock.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `product_id=${productId}&quantity=${quantity}`  // Removed supplier_id
    })
    .then(response => response.text())
    .then(data => document.getElementById("restockResult").innerHTML = data);
}

