<!DOCTYPE html>
<html lang="zh-Hant">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>商品登錄頁面</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #e9ecef;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
      width: 90%;
      max-width: 450px;
      display: flex;
      flex-direction: column;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #007bff;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      margin-bottom: 15px;
    }

    label {
      margin-bottom: 5px;
      color: #495057;
    }

    input,
    textarea {
      padding: 12px;
      border: 1px solid #ced4da;
      border-radius: 6px;
      font-size: 16px;
      transition: border-color 0.3s;
    }

    input:focus,
    textarea:focus {
      border-color: #007bff;
      outline: none;
    }

    textarea {
      resize: none;
      height: 100px;
    }

    button,
    .button {
      padding: 12px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
      text-align: center;
      transition: background-color 0.3s;
    }

    button:hover,
    .button:hover {
      background-color: #218838;
    }

    .scannerVideoContainer {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
      display: none;
      z-index: 1000;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }
    #photoBtn {
      display: none;
    }
    #scannerVideo {
      width: -webkit-fill-available;
      height: -webkit-fill-available;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    #info-container {
      display: none;
    }

    #productList {
      list-style-type: none;
      overflow-y: auto;
      max-height: 200px;
      display: flex;
      flex-direction: column;
      padding: 0;
      gap: 5px;
    }

    #productList>.product-item {
      padding: 10px;
      border: 1px solid #ced4da;
      border-radius: 6px;
      background-color: #f8f9fa;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 10px;
    }
    #productList>.product-item>.product {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    #productList>.product-item>.product>.name {
      font-size: large;
      font-weight: bold;
    }
    #productList>.product-item>.product>.code,
    #productList>.product-item>.product>.price {
      font-size: small;
    }
    #productList>.product-item>.product>.description {
      font-size: x-small;
    }

    #searchBtn {
      color: #495057;
    }

    #photoBtn {
      float: inline-start;
      margin-top: 10px;
      margin-left: 10px;
    }
    .close-btn {
      background-color: #f8f9fa;
      color: #495057;
      padding: 10px 15px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
      float: inline-end;
      margin-top: 10px;
      margin-right: 10px;
    }
    #startScanningBtn {
      display: none;
      background-color: #8f772e;
    }
    #startPhotographingBtn {
      background-color: #287885;
    }
    #startKeyboardInputBtn {
      background-color: #32537e;
    }
    .btn-group {
      display: flex;
      gap: 10px;
    }
    .btn-group>.button,
    .btn-group>button {
      flex: 1;
      margin-bottom: unset;
    }
    #openListContainerBtn {
      background-color: #dc3545;
    }

    label>input {
      display: none;
    }
  </style>
</head>

<body>
  <div id="list-container" class="container">
    <h2>
      商品條碼清單
      <i id="searchBtn" class="fas fa-search"></i>
    </h2>
    <div class="btn-group">
      <label id="startScanningBtn" class="button">
        掃描條碼
      </label>
      <label id="startPhotographingBtn" class="button">
        拍商品照
      </label>
      <button type="button" id="startKeyboardInputBtn">
        輸入條碼
      </button>
    </div>
    <div class="form-group">
      <ul id="productList"></ul>
    </div>
  </div>
  <div id="info-container" class="container">
    <h2>商品資訊登錄</h2>
    <div class="form-group">
      <label for="productCode">商品條碼:</label>
      <input type="text" id="productCode">
    </div>
    <div class="form-group">
      <label for="productImage">商品圖片:</label>
      <img id="productImage" width="100" height="100">
      <input type="file" id="productImageFile" accept="image/*" style="display: none;">
    </div>
    <div class="form-group">
      <label for="productName">商品名稱:</label>
      <input type="text" id="productName">
    </div>
    <div class="form-group">
      <label for="productPrice">商品價格:</label>
      <input type="number" id="productPrice">
    </div>
    <div class="form-group">
      <label for="productDescription">商品描述:</label>
      <textarea id="productDescription"></textarea>
    </div>
    <div class="form-group">
      <button type="button" id="openListContainerBtn">返回清單</button>
    </div>
    <div class="form-group">
      <button type="button" id="loginProductInfoBtn">登錄商品資訊</button>
    </div>
  </div>
  <div class="scannerVideoContainer">
    <button type="button" id="pauseScanningBtn" class="close-btn">X</button>
    <button type="button" id="photoBtn">拍照</button>
    <video id="scannerVideo" autoplay playsinline muted></video>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vconsole"></script>
  <script src="https://cdn.jsdelivr.net/npm/idb-keyval@6/dist/umd.min.js"></script>
  <script>
    let vConsole = new VConsole();
    let codeReader = new ZXing.BrowserMultiFormatReader();
    let scanning = false;
    let cameraOpen = false;
    let videoStream = null;
    const productCodeDB = idbKeyval.createStore('product', 'code');
    const videoElement = $('#scannerVideo')[0];
    const startScanningBtn = $('#startScanningBtn');
    const startPhotographingBtn = $('#startPhotographingBtn');
    const startKeyboardInputBtn = $('#startKeyboardInputBtn');
    const pauseScanningBtn = $('#pauseScanningBtn');
    $(document).ready(function() {
      openCamera();
      async function openCamera() {
        try {
          videoStream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } });
          videoElement.srcObject = videoStream;
          cameraOpen = true;
          startScanningBtn.show();
        } catch (err) {
          startPhotographingBtn.append(`<input type="file" accept="image/*" capture="environment">`);
        }
      }
      $(document).on('change', '#startPhotographingBtn>input[type="file"]', async function() {
        const file = this.files[0];
        if (!file) {
          return;
        }
        const reader = new FileReader();
        reader.onload = function() {
          const productImage = reader.result;
          insertProduct('', productImage);
        };
        reader.readAsDataURL(file);
      });

      startScanningBtn.click(async function() {
        if (!cameraOpen) {
          return;
        }
        $('.scannerVideoContainer').show();
        scanning = true;
        codeReader.decodeFromVideoDevice(null, videoElement, async (result, err) => {
          if (result) {
            console.log(result);
            // if ([
            //   ZXing.BarcodeFormat.EAN_8,
            //   ZXing.BarcodeFormat.EAN_13
            // ].includes(result.format)) {
              const code = result.text;
              const productImage = await getScanImageShot();
              insertProduct(code, productImage);
            // }
          }
          if (err && !(err instanceof ZXing.NotFoundException)) {
            console.error(err);
          }
        });
      });
      
      startPhotographingBtn.click(async function() {
        if (!cameraOpen) {
          return;
        }
        videoElement.srcObject = videoStream.clone();
        $('.scannerVideoContainer').show();
        scanning = false;
        $('#photoBtn').show().click(async function() {
          const productImage = await getScanImageShot();
          insertProduct('', productImage);
        });
      });

      startKeyboardInputBtn.click(function() {
        swal({
          title: '請輸入商品條碼',
          content: {
            element: 'input',
            attributes: {
              placeholder: '商品條碼',
              type: 'text'
            },
          },
          buttons: ['取消', '確認'],
        }).then((code) => {
          if (code === null) {
            return;
          }
          if (!code) {
            swal('商品條碼不可為空', '', 'warning');
            return;
          }
          insertProduct(code, '');
        });
      });

      pauseScanningBtn.click(function () {
        scanning = false;
        videoElement.srcObject.getTracks().forEach(track => track.stop());
        $('#photoBtn').hide();
        $('#openListContainerBtn').click();
        $('.scannerVideoContainer').hide();
      });

      $('#loginProductInfoBtn').on('click', function(event) {
        event.preventDefault();
        const productId = $(this).attr('data-product-id');
        updataProductInfo(productId);
      });

      $('#openListContainerBtn').click(function() {
        $('#list-container').css('display', 'flex');
        $('#info-container').hide();
      });

      $('#productImage').on('click', function() {
        $('#productImageFile').click();
      });
      
      $('#productImageFile').on('change', function() {
        const file = this.files[0];
        if (!file) {
          return;
        }
        const reader = new FileReader();
        reader.onload = function() {
          $('#productImage').attr('src', reader.result);
        };
        reader.readAsDataURL(file);
      });

      $(document).on('click', '.delete-btn', function() {
        swal({
          icon: 'warning',
          title: '確認刪除商品條碼',
          text: '刪除後將無法復原',
          buttons: ['取消', '確認']
        }).then((willDelete) => {
          if (willDelete) {
            const productId = $(this).attr('data-product-id');
            deleteProduct(productId);
          }
        });
      });

      $(document).on('click', '.product-image', function() {
        if (!$(this).attr('src')) {
          return;
        }
        swal({
          content: {
            element: 'img',
            attributes: {
              src: $(this).attr('src'),
              style: 'width: 100%;'
            }
          }
        });
      });

      $(document).on('click', '.product-item', function() {
        if ($(event.target).is('.delete-btn') || $(event.target).is('.product-image')) {
          return;
        }
        const product = $(this).data();
        $('#loginProductInfoBtn').attr('data-product-id', product.id);
        $('#productCode').val(product.code || '');
        $('#productImage').attr('src', product.image || '');
        $('#productName').val(product.name || '');
        $('#productPrice').val(product.price || '');
        $('#productDescription').val(product.description || '');
        $('#list-container').hide();
        $('#info-container').css('display', 'flex');
      });
      renderProductList();
    });

    async function getProductList() {
      const productList = await idbKeyval.get('productList', productCodeDB) || {};
      // console.log(productList);
      return productList;
    }

    function getProductIdByCode(products, code) {
      if (!code) {
        return null;
      }
      for (const key in products) {
        if (products[key].code === code) {
          return products[key].id;
        }
      }
      return null;
    }

    async function insertProduct(code, image) {
      const productList = await getProductList();
      let productId = await getProductIdByCode(productList, code) || Date.now();
      if (code && productList[productId]) {
        swal({
          icon: 'warning',
          title: '商品已登錄',
          text: code,
        });
        return;
      }
      swal({
        icon: image,
        imageHeight: 200,
        title: '商品登錄成功',
        text: code,
      });
      productList[productId] = {
        id: productId,
        code: code,
        image: image,
        name: '',
        price: '',
        description: ''
      };
      idbKeyval.set('productList', productList, productCodeDB);
      renderProductList();
    }

    async function deleteProduct(productId) {
      const productList = await getProductList();
      delete productList[productId];
      idbKeyval.set('productList', productList, productCodeDB);
      renderProductList();
    }

    async function renderProductList() {
      const productList = await getProductList();
      const productListElement = $('#productList');
      productListElement.empty();
      for (const productId in productList) {
        const product = productList[productId];
        const productElement = $(`
        <li class="product-item"
          data-id="${product['id']}"
          data-code="${product['code']}"
          data-image="${product['image']}"
          data-name="${product['name']}"
          data-price="${product['price']}"
          data-description="${product['description']}"
        >
          <div class="product">
            <span class="name">${product['name']}</span>
            <span class="code">${product['code']}</span>
            <span class="price">${product['price']}</span>
            <span class="description">${product['description']}</span>
          </div>
          <img src="${product['image'] || ''}" class="product-image" width="50" height="50">
          <button type="button" class="delete-btn" data-product-id="${product['id']}">刪除</button>
        </li>
        `);
        productListElement.prepend(productElement);
      }
    }

    async function updataProductInfo(productId) {
      const productList = await getProductList();
      const product = productList[productId];
      product.code = $('#productCode').val();
      product.image = $('#productImage').attr('src') || '';
      product.name = $('#productName').val();
      product.price = $('#productPrice').val();
      product.description = $('#productDescription').val();
      $('#loginProductInfoBtn').attr('data-product-code', '');
      idbKeyval.set('productList', productList, productCodeDB);
      renderProductList();
      $('#openListContainerBtn').click();
      $('#productName').val('');
      $('#productPrice').val('');
      $('#productDescription').val('');
      swal('商品資訊登錄成功', '', 'success');
    }

    async function getScanImageShot() {
      const canvas = document.createElement('canvas');
      canvas.width = videoElement.videoWidth;
      canvas.height = videoElement.videoHeight;
      canvas.getContext('2d').drawImage(videoElement, 0, 0, canvas.width, canvas.height);
      return canvas.toDataURL('image/jpeg');
    }
  </script>
</body>

</html>