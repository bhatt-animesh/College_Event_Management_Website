<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th>Category Name</th>
            <th>Item Name</th>
            <th>Addons Name</th>
            <th>Price</th>
            <th>Created at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($getaddons as $addons) {
        ?>
        <tr id="dataid{{$addons->id}}">
            <td>{{$addons->id}}</td>
            <td>{{$addons['category']->category_name}}</td>
            <td>{{$addons['item']->item_name}}</td>
            <td>{{$addons->name}}</td>
            <td><?php echo env('CURRENCY').''.number_format($addons->price, 2); ?></td>
            <td>{{$addons->created_at}}</td>
            <td>
                <span>
                    <a href="#" data-toggle="tooltip" data-placement="top" onclick="GetData('{{$addons->id}}')" title="" data-original-title="Edit">
                        <span class="badge badge-success">Edit</span>
                    </a>
                    <a class="badge badge-danger px-2" onclick="StatusUpdate('{{$addons->id}}','2')" style="color: #fff;">Delete</a>
                </span>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>