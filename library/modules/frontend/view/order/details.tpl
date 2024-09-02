<!-- https://getbootstrap.com/docs/5.0/examples/ -->
<html data-bs-theme="light" lang="en-US" dir="ltr" class="chrome windows fontawesome-i2svg-active fontawesome-i2svg-complete">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <style>
      [data-bs-toggle="collapse"][aria-expanded="true"] [collapse-icon="open"],
      [data-bs-toggle="collapse"][aria-expanded="false"] [collapse-icon="close"] {
        display: block;
      }
      [data-bs-toggle="collapse"][aria-expanded="true"] [collapse-icon="close"],
      [data-bs-toggle="collapse"][aria-expanded="false"] [collapse-icon="open"] {
        display: none;
      }
    </style>
  </head>
  <body>
    <main class="main" id="top">
      <div class="container" data-layout="container">
        <div class="content">
          <div class="alert alert-info" role="alert">
            <h2>訂單編號：{#$order['propertyB']#}</h2>
          </div>
          <!-- 訂單狀態 -->
          <div class="justify-content-center row">
            <div class="col-lg-7 col-md-10 col-sm-11">
              <div class="horizontal-steps mt-4 mb-4 pb-5">
                <div class="horizontal-steps-content">
                  <div class="step-item">
                    <span> Order Placed</span>
                  </div>
                  <div class="step-item current">
                    <span> Packed</span>
                  </div>
                  <div class="step-item">
                    <span>Shipped</span>
                  </div>
                  <div class="step-item">
                    <span>Delivered</span>
                  </div>
                </div>
                <div class="process-line" style="width: 33%;"></div>
              </div>
            </div>
          </div>

          <!-- 商品資訊 -->
          <div class="card mb-3">
            <div class="card-header" data-bs-toggle="collapse" data-bs-target="#orderList" aria-expanded="true">
              <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                  <i class="fa fa-shopping-cart fa-fw"></i>
                  商品資訊
                </div>
                <div class="col-auto ms-auto">
                  <i class="fa fa-angle-down fa-lg" collapse-icon="open"></i>
                  <i class="fa fa-angle-up fa-lg" collapse-icon="close"></i>
                </div>
              </div>
            </div>
            <div id="orderList" class="collapse show">
              <div class="card-body bg-body-tertiary">
                <table class="table table-striped mobile-table">
                  <thead>
                    <tr>
                      {#if $item['image']#}
                        <th scope="col">商品圖片</th>
                      {#/if#}
                      <th scope="col">商品名稱</th>
                      <th scope="col">單價</th>
                      <th scope="col">數量</th>
                      <th scope="col">小計</th>
                    </tr>
                  </thead>
                  <tbody>
                    {#foreach $order['subject']['shoppingCart'] as $item#}
                      <tr>
                        {#if $item['image']#}
                          <td>
                            <img src="{#$item['image']#}" alt="{#$item['name']#}" style="width: 50px;">
                          </td>
                        {#/if#}
                        <td>{#$item['name']#}</td>
                        <td>{#$item['quantity']#}</td>
                        <td>{#$item['price']#}</td>
                        <td>{#$item['subTotalPrice']#}</td>
                      </tr>
                    {#/foreach#}
                  </tbody>
                </table>
                <div class="d-flex justify-content-end">
                  <h3>總金額：NT ${#number_format($order['sortA'])#}</h3>
                </div>
              </div>
            </div>
          </div>
          <!-- 付款資訊 -->
          {#if $order['subject']['paidInfo']#}
            <div class="card mb-3">
              <div class="card-header" data-bs-toggle="collapse" data-bs-target="#paidInfo" aria-expanded="false">
                <div class="row flex-between-end">
                  <div class="col-auto align-self-center">
                    <i class="fa fa-credit-card fa-fw"></i>
                    付款資訊
                  </div>
                  <div class="col-auto ms-auto">
                    <i class="fa fa-angle-down fa-lg" collapse-icon="open"></i>
                    <i class="fa fa-angle-up fa-lg" collapse-icon="close"></i>
                  </div>
                </div>
              </div>
              <div id="paidInfo" class="collapse">
                <div class="card-body bg-body-tertiary">
                  <ul class="list-group">
                    <li class="list-group-item">付款方式：{#$order['subject']['paidInfo']['paymentMethod']#}</li>
                    <li class="list-group-item">付款金額：{#$order['subject']['paidInfo']['paymentMethod']#}</li>
                    <li class="list-group-item">付款時間：{#$order['subject']['paidInfo']['paidTime']#}</li>
                    <li class="list-group-item">付款狀態：{#$order['subject']['paidInfo']['paidStatus']#}</li>
                  </ul>
                </div>
              </div>
            </div>
          {#/if#}
          <!-- 發票資訊 -->
          {#if $order['subject']['invoiceInfo']#}
            <div class="card mb-3">
              <div class="card-header" data-bs-toggle="collapse" data-bs-target="#invoiceInfo" aria-expanded="false">
                <div class="row flex-between-end">
                  <div class="col-auto align-self-center">
                    <i class="fa fa-file-invoice fa-fw"></i>
                    發票資訊
                  </div>
                  <div class="col-auto ms-auto">
                    <i class="fa fa-angle-down fa-lg" collapse-icon="open"></i>
                    <i class="fa fa-angle-up fa-lg" collapse-icon="close"></i>
                  </div>
                </div>
              </div>
              <div id="invoiceInfo" class="collapse">
                <div class="card-body bg-body-tertiary">
                  <ul class="list-group">
                    <li class="list-group-item">發票類型：{#$order['subject']['invoiceInfo']['invoiceType']#}</li>
                  </ul>
                </div>
              </div>
            </div>
          {#/if#}
          <!-- 運送資訊 -->
          {#if $order['subject']['shippingInfo']#}
            <div class="card mb-3">
              <div class="card-header" data-bs-toggle="collapse" data-bs-target="#shippingInfo" aria-expanded="false">
                <div class="row flex-between-end">
                  <div class="col-auto align-self-center">
                    <i class="fa fa-truck fa-fw"></i>
                    運送資訊
                  </div>
                  <div class="col-auto ms-auto">
                    <i class="fa fa-angle-down fa-lg" collapse-icon="open"></i>
                    <i class="fa fa-angle-up fa-lg" collapse-icon="close"></i>
                  </div>
                </div>
              </div>
              <div id="shippingInfo" class="collapse">
                <div class="card-body bg-body-tertiary">
                  <ul class="list-group">
                    <li class="list-group-item">運送方式：{#$order['subject']['shippingInfo']['shippingMethod']#}</li>
                  </ul>
                </div>
              </div>
            </div>
          {#/if#}
        </div>
      </div>
    </main>
  </body>
</html>