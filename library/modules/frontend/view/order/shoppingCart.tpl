<link href="{#$__PLUGIN_Web#}/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="{#$__PLUGIN_Web#}/bootstrap/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.css">

<script type="text/javascript" src="{#$__PLUGIN_Web#}/bootstrap/jquery-3.3.1.min.js"></script>
<script type='text/javascript' src='{#$__PLUGIN_Web#}/blackUI/blackUI.js'></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.js"></script>
<script src="{#$__PLUGIN_Web#}/bootstrap/bootstrap.min.js"></script>

<div class="form-group">
    <label for="shoppingCartItems">
        購物車內容
        <div id="clearShoppingCartBtn" class="btn btn-danger btn-xs">清空購物車</div>
    </label>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>商品名稱</th>
                <th>數量</th>
                <th>單價</th>
                <th>小計</th>
            </tr>
        </thead>
        <tbody>
            {#foreach $shoppingCartItems as $itemKey=>$product#}
                <tr>
                    <td>{#$product.name#}</td>
                    <td>{#$product.quantity#}</td>
                    <td>{#$product.price#}</td>
                    <td>{#$product.quantity * $product.price#}</td>
                </tr>
            {#/foreach#}
        </tbody>
    </table>
</div>

<div class="form-group">
    *<label for="payment">付款方式</label>
    <select name="fields[payment]" class="form-control select2">
    <option value="">請選擇</option>
    {#foreach $getPayments as $paymentKey=>$paymentValue#}
        <option value="{#$paymentValue.id#}"
            {#if ($choosePayment && $paymentValue.id==$choosePayment)#}selected{#/if#}>
            {#$paymentValue.subject.subject#}
        </option>
    {#/foreach#}
    </select>
</div>

<div class="btn-group">
    <div id="confirmBtn" class="btn btn-default">前往付款</button>
</div>

<script>
    $(function(){
        $('select[name="fields[payment]"]').change(function(){
            $.ajax({
                url: '/ft/order/process/ps/setChoosePayment',
                type: 'POST',
                dataType: 'json',
                data: {
                    paymentId: $('select[name="fields[payment]"]').val(),
                },
            });
        });
        $('#clearShoppingCartBtn').click(function(){
            swal({
                title: '確定要清空購物車嗎？',
                text: '清空購物車後，將無法復原',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: '確定',
                cancelButtonText: '取消',
            }).then(function(result){
                if(result){
                    $.ajax({
                        url: '/ft/order/process/ps/clearShoppingCart',
                        type: 'POST',
                        dataType: 'json',
                        success: function(response){
                            location.reload();
                        },
                    });
                }
            });
        });
        $('#confirmBtn').click(function(){
            if($('#confirmBtn').attr('disabled')){
                return false;
            }
            var payment = $('select[name="fields[payment]"]').val();
            if(payment == ''){
                swal({
                    type: 'error',
                    title: '請選擇付款方式',
                    confirmButtonText: '確定'
                });
                return false;
            }
            $('#confirmBtn').attr('disabled', true);
            $('#confirmBtn').text('處理中...');
            $.ajax({
                url: '/ft/order/process/ps/createOrder',
                type: 'POST',
                dataType: 'json',
                data: {
                    paymentId: payment
                },
                success: function(response){
                    if(response.status == 'success'){
                        location.href = `/ft/order/sendPayment/orderID/${response.orderID}`;
                    }else{
                        swal({
                            type: 'error',
                            title: response.message,
                            confirmButtonText: '確定'
                        });
                        $('#confirmBtn').attr('disabled', false);
                        $('#confirmBtn').text('前往付款');
                    }
                },
            });
        });
    });
</script>