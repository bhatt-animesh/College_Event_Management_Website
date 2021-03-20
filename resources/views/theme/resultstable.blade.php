
        <table class="table table-striped table-bordered zero-configuration">
        
                        <thead>
                            <tr>
                                <th>Event Name</th>
                                <th>Winner Name</th>
                                <th>Winner Reg</th>
                                <th>Runner-UP Name</th>
                                <th>Runner-UP Reg</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <?php
                foreach ($getitem as $item) {
            // print_r($item);
            ?>
                        <tbody>
                            <tr id="dataid{{$item->id}}">
                                <td>{{@$item['events']->e_name}}</td>
                                <td>{{$item->w_name}}</td>
                                <td>{{$item->w_reg}}</td>
                                <td>{{$item->r_name}}</td>
                                <td>{{$item->r_reg}}</td>
                                <td>
                                    <span>
                                        <a href="#" data-toggle="tooltip" data-placement="top" onclick="GetData('{{$item->id}}')" title="" data-original-title="Edit">
                                            <span class="badge badge-success">Edit</span>
                                        </a>
                                        <a class="badge badge-danger px-2" onclick="StatusUpdate('{{$item->id}}','1')" style="color: #fff;">Delete</a>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                        <?php
            }
            ?>
                    </table>
            