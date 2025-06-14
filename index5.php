<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Github Users</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .card {
      display: flex;
      align-items: center;
      background-color: #f1f1f1;
      padding: 15px;
      margin: 10px;
      border-radius: 10px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }

    .card img {
      border-radius: 50%;
      margin-right: 20px;
    }

    .card ul {
      list-style: none;
      padding: 0;
    }

    .card li {
      margin: 5px 0;
    }
  </style>
</head>
<body>
  <h1>Get Products</h1>
  <div id="product">Loading users...</div>

  <script>
    function getProducts() {
      var xml = new XMLHttpRequest();
      xml.open('GET', 'https://lorndalin.tsdsolution.net/api/DriverController/product', true);
      xml.onload = function () {
        if (this.status === 200) {
          var product = JSON.parse(this.responseText);
          var output = '';
          for (var i in product) {
            output += `
              <div class="card">
                <img src="${product[i].image}" width="70" height="70" />
                <ul>
                  <li><strong>ID:</strong> ${product[i].name}</li>
                  <li><strong>Login:</strong> ${product[i].code}</li>
                </ul>
              </div>
            `;
          }
          document.getElementById('product').innerHTML = output;
        } else {
          document.getElementById('product').innerHTML = '<p>Failed to load users.</p>';
        }
      };
      xml.send();
    }
    window.onload = getProducts;
  </script>
  <?php
  public function product_GET()
  {
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: GET, OPTIONS");
      header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
      if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
          exit;
      }
  
      $datas = $this->db->where('image !=', 'no_image.png')->get('products')->result_array();
      $this->response($datas, REST_Controller::HTTP_OK);
  }
  ?>
</body>
</html>
