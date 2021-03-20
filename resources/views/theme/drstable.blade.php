<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>DR Name(Boy)</th>
            <th>DR Contact No(Boy)</th>
            <th>DR Name(Girl)</th>
            <th>DR Contact No(Girl)</th>
            <th>DR Department</th>
            <th>Department HOD</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($get_hod_details as $item) {
            // print_r($item);
        ?>
        <tr id="dataid{{$item->id}}">
            <td>{{$item->dr_name}}</td>
            <td>{{$item->dr_con}}</td>
            <td>{{$item->cr_name}}</td>
            <td>{{$item->cr_con}}</td>
            <td>{{$item->department_name}}</td>
            <td>{{@$item['user']->name}}</td>
            
            <td>
                <span>
                    <a class="badge badge-danger px-2" onclick="StatusUpdate('{{$item->id}}','1')" style="color: #fff;">Delete</a>
                </span>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>