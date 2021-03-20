<table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Event Name</th>
                                    <th>Gender(Male/Female/Both)</th>
                                    <th>Coordinator Name</th>
                                    <th>Coordinator No.</th>
                                    <th>Team Size</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($getitems as $item) {
                                        // print_r($item);
                                    ?>
                                    <tr id="dataid{{$item->id}}">
                                        <td>#</td>
                                        <td>{{$item->e_name}}</td>
                                        <td>{{$item->e_gender}}</td>
                                        <td>{{$item->e_c_name}}</td>
                                        <td>{{$item->e_c_contact}}</td>
                                        <td>{{$item->e_team_size}}</td>
                                        <td>
                                            <span>
                                                <a href="#" data-toggle="tooltip" data-placement="top" onclick="GetData('{{$item->id}}')" title="" data-original-title="Edit">
                                                    <span class="badge badge-success">Register Now</span>
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>