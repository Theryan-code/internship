<section class="content-header">
    <h1><?=ucwords($title)?>
        <small>Data Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i></a></li>
		<li><a>Products</a></li>
        <li class="active"><?=ucwords($title)?></li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Items</h3>
            <div class="pull-right">
                <a href="<?=site_url('item/add')?>" class="btn btn-flat btn-primary">
                    <i class="fa fa-plus"></i> Add Product Item
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Barcode</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row as $r => $data) { ?>
                        <tr>
                            <td width="35px"><?=$no++?>.</td>
                            <td><?=$data->barcode?></td>
                            <td><?=$data->name?></td>
                            <td><?=$data->category_name?></td>
                            <td><?=$data->unit_name?></td>
                            <td class="text-right"><?=indo_currency($data->price)?> IDR</td>
                            <td class="text-right"><?=$data->stock?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('item/edit/'.$data->item_id)?>" class="btn btn-xs btn-primary">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <a href="<?=site_url('item/del/'.$data->item_id)?>" onclick="return confirm('Apakah Anda yakin?')"  class="btn btn-xs btn-danger">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>