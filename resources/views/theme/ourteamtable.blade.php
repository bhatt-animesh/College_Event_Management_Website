<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Committee Name</th>
            <th>Mobile No</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($ourteam as $banner) {
        ?>
        <tr id="dataid{{$banner->id}}">
            <td>{{$banner->id}}</td>
            <td><img src='{!! asset("public/images/ourteam/".$banner->image) !!}' class='img-fluid' style='max-height: 50px;'></td>
            <td>{{$banner->name}}</td>
            <td>{{$banner->committee_name}}</td>
            <td>{{$banner->mobile}}</td>
            <td>
                <span>
                    <a href="#" data-toggle="tooltip" data-placement="top" onclick="GetData('{{$banner->id}}')" title="" data-original-title="Edit">
                        <span class="badge badge-success">Edit</span>
                    </a>
                    <a href="#" data-toggle="tooltip" data-placement="top" onclick="DeleteData('{{$banner->id}}')" title="" data-original-title="Delete">
                        <span class="badge badge-danger">Delete</span>
                    </a>
                </span>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>