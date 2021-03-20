<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Category Name</th>
            <th>Created at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($getcategory as $category) {
        ?>
        <tr id="dataid{{$category->id}}">
            <td>{{$category->id}}</td>
            <td><img src='{!! asset("public/images/category/".$category->image) !!}' class='img-fluid' style='max-height: 50px;'></td>
            <td>{{$category->category_name}}</td>
            <td>{{$category->created_at}}</td>
            <td>
                <span>
                    <a href="#" data-toggle="tooltip" data-placement="top" onclick="GetData('{{$category->id}}')" title="" data-original-title="Edit">
                        <span class="badge badge-success">Edit</span>
                    </a>
                    @if($category->is_available == '1')
                        <a class="badge badge-info px-2" onclick="StatusUpdate('{{$category->id}}','2')" style="color: #fff;">Delete</a>
                    @else
                        <a class="badge badge-primary px-2" onclick="StatusUpdate('{{$category->id}}','1')" style="color: #fff;">Unavailable</a>
                    @endif
                </span>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>