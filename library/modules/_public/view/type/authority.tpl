{#foreach $AuthorityList as $Module=>$Actions#}
    <div class="col-md-3">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">{#$ModuleNameList.$Module#}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" onclick="if($('#{#$Module#}Body').css('display')==='none'){ $(this).find('i').addClass('fa-minus').removeClass('fa-plus');$('#{#$Module#}Body').show(); }else{ $(this).find('i').addClass('fa-plus').removeClass('fa-minus');$('#{#$Module#}Body').hide(); }">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div id="{#$Module#}Body" class="box-body">
                {#foreach $Actions as $ActionKey=>$ActionName#}
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="fields[subject][authority][{#$Module#}][{#$ActionName#}]" value="on" {#if $row.subject.authority.$Module.$ActionName==='on'#}checked{#/if#}>
                                {#$ActionNameList.$ActionName#}
                            </label>
                        </div>
                    </div>
                {#/foreach#}
            </div>
        </div>
    </div>
{#/foreach#}