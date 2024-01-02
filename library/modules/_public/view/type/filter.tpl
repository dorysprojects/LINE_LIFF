<label for="{#$item.name#}">
    {#$item.label#}
    <div class="btn btn-warning" onclick="EstimatedProcess();">預估人數</div>
</label>
{#if $item.Tags#}
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">標籤</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" onclick="if($('#FilterTagsBody').css('display')==='none'){ $(this).find('i').addClass('fa-minus').removeClass('fa-plus');$('#FilterTagsBody').show(); }else{ $(this).find('i').addClass('fa-plus').removeClass('fa-minus');$('#FilterTagsBody').hide(); }">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div id="FilterTagsBody" class="box-body">
                {#foreach $item.Tags as $key=>$value#}
                    <input id="FilterTags{#$key#}" type="checkbox" name="fields[content][filter][Tags][]" value="{#$key#}" {#if $item.TagsVal&&in_array($key, $item.TagsVal)#}checked{#/if#}>
                    <label for="FilterTags{#$key#}">{#$value#}</label>
                {#/foreach#}
            </div>
        </div>
    </div>
{#/if#}

<script>
    function EstimatedProcess() {
        var tmp;
        var options = {
        target:        '#state'   
        ,beforeSubmit:  function(){
            swal({
                onOpen: function () {
                    swal.showLoading()
                },
                title: '預估人數中',
                showConfirmButton: false
            });
        },success: function (data, status){
            console.log(data);
            if(data.state){
                swal({type: 'success',title: '預估成功',text:data.msg,showConfirmButton: true});
            }else{
                swal({type: 'error',title: '預估失敗',text:data.msg,showConfirmButton: true});
            }
        }, error: function (data, status, e){
            console.log(data);		        	  
        } ,url:     '/be/System/process/ps/EstimatedProcess'
        ,type:      'POST'   
        ,dataType:  'json'   
        }; 	
        $('#DataForm').ajaxSubmit(options);
    }
</script>