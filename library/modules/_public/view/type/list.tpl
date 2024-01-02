{#foreach $rows as $rowkey=>$rowitem#}
    <div class="col-md-12">
        <div class="box box-success secondbox">
            <div class="box-header with-border">
                <h3 class="box-title">{#$rowitem.propertyA#} ({#$rowitem.create_at#})</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table class="table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            {#foreach $subcolumns as $key=>$item#}
                                <th>{#$item#}</th>
                            {#/foreach#}
                        </tr>
                    </thead>
                    <tbody>
                        {#foreach $rowitem.column as $columnkey=>$columnitem#}
                            <tr>
                                {#foreach $columnitem as $key=>$item#}
                                    <td>{#$item#}</td>
                                {#/foreach#}
                            </tr>
                        {#/foreach#}
                    </tbody>
                    <tfoot>
                        <tr>
                            {#foreach $subcolumns as $key=>$item#}
                                <th>{#$item#}</th>
                            {#/foreach#}
                        </tr>
                    </tfoot>
                </table>
                {#if $rowitem.bottom#}
                    {#$rowitem.bottom#}
                {#/if#}
            </div>
        </div>
    </div>
{#/foreach#}