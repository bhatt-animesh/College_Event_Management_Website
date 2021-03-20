<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th>Category</th>
            <th>Event Name</th>
            <th>Venue</th>
            <th>Date</th>
            <th>Time</th>
            <th>Type</th>
            <th>Team Size</th>
            <th>Gender</th>
            <th>Register By</th>
            <th>Coordinator Name</th>
            <th>Coordinator No.</th>
            <th>Description</th>
            <th>Rules</th>
            <th>Guidelines</th>
            <th>Prize For Inter</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($getitem as $item) {
            // print_r($item);
        ?>
        <tr id="dataid{{$item->id}}">
            <td>{{$item->id}}</td>
            <td>{{@$item['category']->category_name}}</td>
            <td>{{$item->e_name}}</td>
            <td>{{$item->e_venue}}</td>
            <td>{{$item->e_date}}</td>
            <td>{{$item->e_time}}</td>
            <td>{{$item->e_type}}</td>
            <td>{{$item->e_team_size}}</td>
            <td>{{$item->e_gender}}</td>
            <td>{{$item->e_parti}}</td>
            <td>{{$item->e_c_name}}</td>
            <td>{{$item->e_c_contact}}</td>
            <td>{{$item->e_description}}</td>
            <td>{{$item->e_rules}}</td>
            <td>{{$item->e_guidlines}}</td>
            <td>{{$item->e_prize}}</td>
            <td>
                <span>
                    <a href="#" data-toggle="tooltip" data-placement="top" onclick="GetData('{{$item->id}}')" title="" data-original-title="Edit">
                        <span class="badge badge-success">Edit</span>
                    </a>
                    <a data-toggle="tooltip" href="{{URL::to('admin/item-images/'.$item->id)}}" data-original-title="View">
                        <span class="badge badge-warning">View</span>
                    </a>
                    <a class="badge badge-danger px-2" onclick="StatusUpdate('{{$item->id}}','2')" style="color: #fff;">Delete</a>
                </span>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>