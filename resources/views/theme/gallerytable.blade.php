<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($gallery as $banner) {
        ?>
        <tr id="dataid{{$banner->id}}">
            <td>{{$banner->id}}</td>
            <td><img src='{!! asset("public/images/gallery/".$banner->profile_image) !!}' class='img-fluid' style='max-height: 50px;'></td>
            <td>{{$banner->day}}</td>
            <td>
                <span>
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