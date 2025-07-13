# 🧪 test-api — Laravel 11 RESTful API

**test-api** is a simple and beginner-friendly RESTful API built with **Laravel 11**.  
It’s designed to help new developers learn how to create, manage, and test API endpoints in a practical way.

---

## 📦 Features

- Add new products  
- List all products  
- Show single product by ID  
- Update product by ID  
- Delete product by ID  
- JSON input/output  
- Basic error handling

---

## 🚀 API Endpoints

### 1. Get All Products
- **Method:** `GET`  
- **URL:** `/api/products/index`  
- **Example:**


GET http://127.0.0.1:8000/api/products/index

### 2. Add New Product
**Method:** `POST`  
**URL:** `/api/products/store`  
**Body:**

{
  "name": "New Product",
  "description": "Product description",
  "price": 100,
  "quantity": 50
}

Example:


POST http://127.0.0.1:8000/api/products/store

3. Show Product by ID
Method: GET

URL: /api/products/show/{id}

Example:


GET http://127.0.0.1:8000/api/products/show/8
4. Update Product by ID
Method: PUT

URL: /api/products/update/{id}

Body (any field optional):

json
{
  "name": "Updated Product",
  "description": "Updated description",
  "price": 150,
  "quantity": 30
}
Example:

PUT http://127.0.0.1:8000/api/products/update/7

5. Delete Product by ID
Method: DELETE

URL: /api/products/destroy/{id}

Example:

DELETE http://127.0.0.1:8000/api/products/destroy/8
🛠 How to Test (Postman)
Open Postman

Choose request method (GET, POST, PUT, DELETE)

Set the correct URL (see above)

For POST/PUT, go to Body > raw > JSON and enter request data

Click Send to get the response

⚠️ Notes
Make sure the Laravel server is running:


php artisan serve
If invalid data or a missing product ID is submitted, an error with a relevant message and status code will be returned (e.g., 400 Bad Request).

🤝 Contributing
You’re welcome to contribute by:

Forking the repository

Making your changes

Submitting a Pull Request

Check out the contribution guidelines for more info.

📄 License
This project is open-source under the MIT License.
You can use, modify, and distribute it freely under the terms of this license.

💡 Tip
You can also test the API using cURL:

curl -X GET http://127.0.0.1:8000/api/products/index
Made with ❤️ using Laravel 11.
