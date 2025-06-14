function loadCategories() {
    const locationId = document.getElementById('location').value;
    const categorySelect = document.getElementById('category');
    categorySelect.innerHTML = '<option value="">Choose Category</option>';

    if (locationId) {
        console.log("Fetching categories for location:", locationId); // debug
        fetch(`/categories/${locationId}`)
            .then(response => response.json())
            .then(data => {
                console.log("Categories:", data); // debug
                data.forEach(category => {
                    const option = document.createElement('option');
                    option.value = category.id;
                    option.text = category.category_name;
                    categorySelect.appendChild(option);
                });
                categorySelect.disabled = false;
            })
            .catch(error => console.error('Error fetching categories:', error));
    } else {
        categorySelect.disabled = true;
    }
    resetSelect('item');
}

function loadItems() {
    const categoryId = document.getElementById('category').value;
    const itemSelect = document.getElementById('item');
    itemSelect.innerHTML = '<option value="">Choose Item</option>';

    if (categoryId) {
        console.log("Fetching items for category:", categoryId); // debug
        fetch(`/items/${categoryId}`)
            .then(response => response.json())
            .then(data => {
                console.log("Items:", data); // debug
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.id;
                    option.text = item.item_name;
                    itemSelect.appendChild(option);
                });
                itemSelect.disabled = false;
            })
            .catch(error => console.error('Error fetching items:', error));
    } else {
        itemSelect.disabled = true;
    }
}
